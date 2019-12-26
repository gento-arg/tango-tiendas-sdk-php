<?php

use TangoTiendas\Service\Orders;

class OrdersTest extends \PHPUnit\Framework\TestCase
{
    public function testSendOrder()
    {
        $service = new Orders('123456789');
    }
}
