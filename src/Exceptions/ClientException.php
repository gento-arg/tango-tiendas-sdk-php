<?php

namespace TangoTiendas\Exceptions;

class ClientException extends \Exception
{
    /**
     * @var mixed
     */
    private $response = null;

    /**
     * @return null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $response
     * @return self
     */
    public function setResponse($response): self
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasResponse(): bool
    {
        return $this->response !== null;
    }
}
