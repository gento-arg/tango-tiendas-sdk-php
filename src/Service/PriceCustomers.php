<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\PriceCustomer;

class PriceCustomers extends ClientList
{
    const ENDPOINT = 'Aperture/PriceByCustomer';

    protected $_dataClass = PriceCustomer::class;

    /**
     * @param int $pageSize
     * @param int $pageNumber
     * @param string|null $customerCode Customer code to filter
     * @param string|null $listNumber List number to filter
     */
    public function getList($pageSize = 500, $pageNumber = 1, $customerCode = null, $listNumber = null)
    {
        if ($listNumber !== null) {
            return parent::getList($pageSize, $pageNumber, $customerCode, 'PriceListNumber=' . $listNumber);
        }

        return parent::getList($pageSize, $pageNumber, $customerCode);
    }
}
