<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use TangoTiendas\Model\Customer;
use TangoTiendas\Model\Order;
use TangoTiendas\Model\OrderItem;
use TangoTiendas\Service\Orders;

class OrdersTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Orders
     */
    protected $_service;

    protected function setUp(): void
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
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $this->_service = new Orders('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);
    }

    public function testSendOrder()
    {
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

        $rta = $this->_service->sendOrder($dataModel);
        $this->assertEquals('OrderProcessed', $rta->getTopic());
        $this->assertEquals($dataModel->getOrderID(), $rta->getResource());
    }

    public function testDummy()
    {
        $mock = new MockHandler([
            new Response(200, [], '{"Status":0,"Message":"Valid AccessToken","Data":null,"isOk":true}'),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $this->_service = new Orders('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);
        $rta = $this->_service->getStatus();
        $this->assertEquals(0, $rta->getStatus());
        $this->assertEquals('Valid AccessToken', $rta->getMessage());
        $this->assertEmpty($rta->getData());
        $this->assertTrue($rta->isOk());
    }
}
