<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\DiscountCustomer;

class DiscountCustomers extends ClientList
{
    const ENDPOINT = 'Aperture/DiscountByCustomer';

    protected $_dataClass = DiscountCustomer::class;

    /**
     * @param int $pageSize
     * @param int $pageNumber
     * @param string|null $customerCode Customer code to filter
     * @param string|null $skuCode Product sku to filter
     */
    public function getList($pageSize = 500, $pageNumber = 1, $customerCode = null, $skuCode = null)
    {
        if ($skuCode !== null) {
            return parent::getList($pageSize, $pageNumber, $customerCode, 'SKUCode=' . $skuCode);
        }

        return parent::getList($pageSize, $pageNumber, $customerCode);
    }
}
