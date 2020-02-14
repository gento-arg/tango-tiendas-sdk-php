<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Product;

class Products extends ClientList
{
    const ENDPOINT = 'Aperture/Product';

    protected $_dataClass = Product::class;

}
