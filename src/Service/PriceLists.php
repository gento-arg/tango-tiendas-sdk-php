<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\PriceList;

class PriceLists extends ClientList
{
    const ENDPOINT = 'Aperture/PriceList';

    protected $_dataClass = PriceList::class;
}
