<?php

namespace TangoTiendas\Service;

use TangoTiendas\Client;
use TangoTiendas\Exceptions\ClientException;
use TangoTiendas\Model\Notification;
use TangoTiendas\Model\Order;
use TangoTiendas\Model\Status;

class Orders extends Client
{
    const ENDPOINT = 'v2/Aperture/order';

    public function sendOrder(Order $order)
    {
        $data = $this->call(static::ENDPOINT, 'post', $order);
        if (isset($data['Status'])) {
            $status = new Status();
            $status->loadData($data);

            if (!$status->isOk()) {
                throw new ClientException($status->getMessage());
            }

            return $status;
        }

        $notification = new Notification();
        $notification->loadData($data);

        return $notification;
    }
}
