<?php

namespace TangoTiendas\Service;

use TangoTiendas\Client;
use TangoTiendas\Model\PagingResult;
use TangoTiendas\Model\Stock as DataModel;

class Stock extends Client
{
    const ENDPOINT = 'Aperture/Stock';

    public function getList($pageSize = 500, $pageNumber = 1)
    {
        $url = self::ENDPOINT . sprintf('pageSize=%i&pageNumber=%i', $pageSize, $pageNumber);

        $this->call($url, 'get');
        $data = $this->getParsedResponse();

        $pagingResult = new PagingResult();
        $pagingResult->loadData($data)
            ->parseData(DataModel::class);

        return $pagingResult;
    }
}
