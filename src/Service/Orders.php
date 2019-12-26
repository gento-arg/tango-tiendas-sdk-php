<?php

namespace TangoTiendas\Service;

use TangoTiendas\Client;
use TangoTiendas\Model\Order;

class Orders extends Client
{
    const ENDPOINT = 'v2/Aperture/order';

    public function sendOrder(Order $order)
    {
        return $this->call(self::ENDPOINT, 'post', $order);
    }
}
