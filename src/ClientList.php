<?php

namespace TangoTiendas;

use TangoTiendas\Model\Paging;

abstract class ClientList extends Client
{
    const ENDPOINT = '';

    protected $_dataClass;

    /**
     * @return Paging
     */
    public function getList($pageSize = 500, $pageNumber = 1, $filter = null)
    {
        $url = sprintf('%s?pageSize=%s&pageNumber=%',
            self::ENDPOINT,
            $pageSize,
            $pageNumber);

        if ($filter !== null) {
            $url .= '&filter=' . $filter;
        }

        $this->call($url, 'get');
        $data = $this->getParsedResponse();

        $result = new Paging($this->_dataClass);
        $result->loadData($data);

        return $result;
    }

}
