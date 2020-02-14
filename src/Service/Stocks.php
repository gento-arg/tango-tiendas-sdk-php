<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Stock;

class Stocks extends ClientList
{
    const ENDPOINT = 'Aperture/Stock';

    protected $_dataClass = Stock::class;

}
