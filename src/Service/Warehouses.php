<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Warehouse;

class Warehouses extends ClientList
{
    const ENDPOINT = 'Aperture/Warehouse';

    protected $_dataClass = Warehouse::class;

}
