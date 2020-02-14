<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Store;

class Stores extends ClientList
{
    const ENDPOINT = 'Aperture/Store';

    protected $_dataClass = Store::class;

}
