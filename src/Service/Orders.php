<?php

namespace TangoTiendas\Service;

use TangoTiendas\Client;
use TangoTiendas\Model\Notification;
use TangoTiendas\Model\Order;

class Orders extends Client
{
    const ENDPOINT = 'v2/Aperture/order';

    public function sendOrder(Order $order)
    {
        $this->call(static::ENDPOINT, 'post', $order);
        $data = $this->getParsedResponse();

        $notification = new Notification();
        $notification->loadData($data);

        return $notification;
    }
}
