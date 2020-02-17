<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Price;

class Prices extends ClientList
{
    const ENDPOINT = 'Aperture/Price';

    protected $_dataClass = Price::class;

    /**
     * @param int $pageSize
     * @param int $pageNumber
     * @param int|null $priceList Price list number to filter
     * @param string|null $productSku Product sku to filter
     */
    public function getList($pageSize = 500, $pageNumber = 1, $priceList = null, $productSku = null)
    {
        if ($productSku !== null) {
            return parent::getList($pageSize, $pageNumber, $priceList, 'SKUCode=' . $productSku);
        }

        return parent::getList($pageSize, $pageNumber, $priceList);
    }
}
