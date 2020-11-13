<?php

namespace TangoTiendas;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use TangoTiendas\Exceptions\ClientException;
use TangoTiendas\Model\Status;

abstract class Client
{
    use Traits\Header;

    const ENDPOINT_DUMMY = 'Aperture/dummy';

    /**
     * @var array
     */
    protected $clientConfig = [
        'timeout' => 30,
        'base_uri' => 'https://tiendas.axoft.com/api/',
    ];

    /**
     * @var GuzzleClient|null
     */
    protected $client = null;

    /**
     * @var Response
     */
    protected $lastResponse = null;

    /**
     * @var mixed
     */
    protected $parsedResponse = null;

    /**
     * Request Body Data Type
     * @var string
     */
    protected $requestDataType = RequestOptions::JSON;

    /**
     * Response Body Data Type
     * @var string
     */
    protected $responseDataType = RequestOptions::JSON;

    public function __construct(
        $accessToken = null,
        $guzzleClient = null
    ) {
        $this->client = $guzzleClient ?? new GuzzleClient($this->clientConfig);
        if (null !== $accessToken) {
            $this->addAccessToken($accessToken);
        }
    }

    public function addAccessToken($accessToken)
    {
        $this->addHeader('AccessToken', $accessToken);
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     * @codeCoverageIgnore
     */
    protected function addClientConfig($key, $value)
    {
        $this->clientConfig[$key] = $value;

        return $this;
    }

    /**
     * @param $baseUri
     * @return $this
     * @codeCoverageIgnore
     */
    protected function setBaseUri($baseUri)
    {
        $this->clientConfig['base_uri'] = $baseUri;

        return $this;
    }

    /**
     * @param $endpoint
     * @param $method
     * @param array $data
     * @param array $headers
     * @param null $baseUri
     * @throws ClientException
     * @codeCoverageIgnore
     */
    public function call($endpoint, $method, $data = [], $headers = [], $baseUri = null)
    {
        $method = strtolower($method);
        //this will catch any 4xx & 5xx errors
        try {
            $guzzleRequestConfig = ['headers' => array_merge($this->getHeaders(), $headers)];
            if (!empty($data) && in_array($method, ['put', 'post'])) {
                $guzzleRequestConfig[$this->requestDataType] = $data;
            }

            $this->lastResponse = $this->getClient($this->clientConfig, $baseUri)
                ->$method($endpoint, $guzzleRequestConfig);
        } catch (RequestException $e) {
            $exception = new ClientException($e->getMessage());
            if ($e->hasResponse()) {
                $this->lastResponse = $e->getResponse();
                $this->parseResponse();
                $exception->setResponse($this->parsedResponse);
            }
            throw $exception;
        }

        //this will catch errors with 2xx response code
        if (!$this->isValidResponse()) {
            throw new ClientException('Response is invalid');
        }

        return $this->parseResponse();
    }

    /**
     * @codeCoverageIgnore
     */
    protected function getClient($config, $baseUri = null)
    {
        if (is_null($baseUri)) {
            return $this->client;
        }
        $config['base_uri'] = $baseUri;
        return new GuzzleClient($config);
    }

    /**
     * @return bool
     */
    protected function isValidResponse()
    {
        return in_array($this->lastResponse->getStatusCode(), [200, 201]);
    }

    protected function getParsedResponse()
    {
        return $this->parsedResponse;
    }

    /**
     * Parse Response
     * @return void
     */
    protected function parseResponse()
    {
        $responseBody = (string) $this->lastResponse->getBody();
        switch ($this->responseDataType) {
            case RequestOptions::JSON:
                $this->parsedResponse = json_decode($responseBody, true);
                break;
            default:
                $this->parsedResponse = $responseBody; // @codeCoverageIgnore
        }

        return $this->parsedResponse;
    }

    public function getStatus()
    {
        $this->call(static::ENDPOINT_DUMMY, 'post');
        $data = $this->getParsedResponse();

        $notification = new Status();
        $notification->loadData($data);

        return $notification;
    }
}
