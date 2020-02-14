<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Customer;

class Customers extends ClientList
{
    const ENDPOINT = 'Aperture/Customer';

    protected $_dataClass = Customer::class;
}
