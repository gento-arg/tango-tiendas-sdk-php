<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use TangoTiendas\Model\Customer;
use TangoTiendas\Model\Notification;
use TangoTiendas\Model\Order;
use TangoTiendas\Model\OrderItem;
use TangoTiendas\Model\Shipping;
use TangoTiendas\Service\Orders;

class OrdersTest extends \PHPUnit\Framework\TestCase
{
    public function testSendOrder()
    {
        $mock = new MockHandler([
            new Response(200, [], '{
                "Topic": "OrderProcessed",
                "Resource": "1"
              }'),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api'
        ]);

        $service = new Orders('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);

        $dataModel = new Order();
        $dataModel->setOrderID(1)
            ->setOrderNumber('1000001')
            ->setDate(new \DateTime());

        $customer = new Customer();
        $customer->setCustomerId(1)
            ->setDocumentType(96) // DNI
            ->setUser('manuelcanepa@gmail.com')
            ->setEmail('manuelcanepa@gmail.com')
            ->setProvinceCode('1')
            ->setIvaCategoryCode('CF');
        $dataModel->setCustomer($customer);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(1)
            ->setProductCode('PRD001')
            ->setDescription('PRD001')
            ->setUnitPrice(200);
        $dataModel->addOrderItem($orderItem);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(3)
            ->setProductCode('PRD002')
            ->setDescription('PRD002')
            ->setUnitPrice(100);
        $dataModel->addOrderItem($orderItem);

        $rta = $service->sendOrder($dataModel);
        $this->assertEquals('OrderProcessed', $rta['Topic']);
        $this->assertEquals($dataModel->getOrderID(), $rta['Resource']);
    }
}
