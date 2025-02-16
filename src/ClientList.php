<?php

namespace TangoTiendas;

use TangoTiendas\Exceptions\ClientException;
use TangoTiendas\Model\PagingResult;

abstract class ClientList extends Client
{
    const ENDPOINT = '';

    protected $_dataClass;

    /**
     * @throws ClientException
     * @return PagingResult
     */
    public function getList($pageSize = 500, $pageNumber = 1, $filter = null, $extra = null)
    {
        $url = sprintf('%s?pageSize=%s&pageNumber=%s',
            static::ENDPOINT,
            $pageSize,
            $pageNumber);

        if ($filter !== null) {
            $url .= '&filter=' . $filter;
        }

        if ($extra !== null) {
            $url .= '&' . $extra;
        }

        $this->call($url, 'get');
        $data = $this->getParsedResponse();

        $result = new PagingResult($this->_dataClass);
        $result->loadData($data);

        return $result;
    }

}
