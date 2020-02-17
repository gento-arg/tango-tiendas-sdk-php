<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\PriceCustomer;

class PriceCustomers extends ClientList
{
    const ENDPOINT = 'Aperture/PriceByCustomer';

    protected $_dataClass = PriceCustomer::class;

    public function getList($pageSize = 500, $pageNumber = 1, $filter = null, $extra = null)
    {
        if ($extra !== null) {
            return parent::getList($pageSize, $pageNumber, $filter, 'PriceListNumber=' . $extra);
        }

        return parent::getList($pageSize, $pageNumber, $filter);
    }
}
