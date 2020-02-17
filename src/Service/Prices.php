<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Price;

class Prices extends ClientList
{
    const ENDPOINT = 'Aperture/Price';

    protected $_dataClass = Price::class;

    public function getList($pageSize = 500, $pageNumber = 1, $filter = null, $extra = null)
    {
        if ($extra !== null) {
            return parent::getList($pageSize, $pageNumber, $filter, 'SKUCode=' . $extra);
        }

        return parent::getList($pageSize, $pageNumber, $filter);
    }
}
