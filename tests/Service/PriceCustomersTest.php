<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\Price;
use TangoTiendas\Model\PriceCustomer;
use TangoTiendas\Service\PriceCustomers;

class PriceCustomersTest extends TestCase
{
    /**
     * @dataProvider getFullList
     */
    public function testGetPrices($data)
    {
        $mock = new MockHandler([
            new Response(200, [], $data),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $service = new PriceCustomers('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);

        $rta = $service->getList();
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(500, $rta->getPageSize());
        $this->assertEquals(false, $rta->hasMoreData());

        /**
         * @var PriceCustomer[]
         */
        $data = $rta->getData();

        $dataModel = $data[0];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('010001', $dataModel->getCustomerCode());
        $this->assertEquals(10, $dataModel->getPrice());

        $dataModel = $data[1];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('010002', $dataModel->getCustomerCode());
        $this->assertEquals(0, $dataModel->getPrice());

        $dataModel = $data[2];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('020025', $dataModel->getCustomerCode());
        $this->assertEquals(20, $dataModel->getPrice());

        $dataModel = $data[3];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('CLAUS', $dataModel->getCustomerCode());
        $this->assertEquals(30, $dataModel->getPrice());

        $dataModel = $data[4];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('EXTER', $dataModel->getCustomerCode());
        $this->assertEquals(0, $dataModel->getPrice());
    }

    /**
     * @dataProvider getFullList
     */
    public function testGetList1Prices($data)
    {
        $mock = new MockHandler([
            new Response(200, [], $data),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $service = new PriceCustomers('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);

        $rta = $service->getList(500, 1, null, 1);
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(500, $rta->getPageSize());
        $this->assertEquals(false, $rta->hasMoreData());

        /**
         * @var PriceCustomer[]
         */
        $data = $rta->getData();

        $dataModel = $data[0];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('010001', $dataModel->getCustomerCode());
        $this->assertEquals(10, $dataModel->getPrice());

        $dataModel = $data[1];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('010002', $dataModel->getCustomerCode());
        $this->assertEquals(0, $dataModel->getPrice());

        $dataModel = $data[2];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('020025', $dataModel->getCustomerCode());
        $this->assertEquals(20, $dataModel->getPrice());

        $dataModel = $data[3];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('CLAUS', $dataModel->getCustomerCode());
        $this->assertEquals(30, $dataModel->getPrice());

        $dataModel = $data[4];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('EXTER', $dataModel->getCustomerCode());
        $this->assertEquals(0, $dataModel->getPrice());
    }

    /**
     * @dataProvider getFilterList
     */
    public function testGetFilterPrices($data)
    {
        $mock = new MockHandler([
            new Response(200, [], $data),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $service = new PriceCustomers('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);

        $rta = $service->getList(500, 1, '010001');
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(500, $rta->getPageSize());
        $this->assertEquals(false, $rta->hasMoreData());

        /**
         * @var PriceCustomer[]
         */
        $data = $rta->getData();

        $dataModel = $data[0];
        $this->assertInstanceOf(PriceCustomer::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('010001', $dataModel->getCustomerCode());
        $this->assertEquals(10, $dataModel->getPrice());
    }

    public function getFullList()
    {
        return
            [
            ['{
                "Paging": {
                    "PageNumber": 1,
                    "PageSize": 500,
                    "MoreData": false
                },
                "Data": [
                    {
                        "SKUCode": "0100100129",
                        "CustomerCode": "010001",
                        "Price": 10,
                        "PriceListNumber": 1
                    },
                    {
                        "SKUCode": "0100100129",
                        "CustomerCode": "010002",
                        "Price": 0,
                        "PriceListNumber": 1
                    },
                    {
                        "SKUCode": "0100100129",
                        "CustomerCode": "020025",
                        "Price": 20,
                        "PriceListNumber": 1
                    },
                    {
                        "SKUCode": "0100100129",
                        "CustomerCode": "CLAUS",
                        "Price": 30,
                        "PriceListNumber": 1
                    },
                    {
                        "SKUCode": "0100100129",
                        "CustomerCode": "EXTER",
                        "Price": 0,
                        "PriceListNumber": 1
                    }
                ]
            }',
            ],
        ];
    }

    public function getFilterList()
    {
        return
            [
            ['{
                "Paging": {
                    "PageNumber": 1,
                    "PageSize": 500,
                    "MoreData": false
                },
                "Data": [
                    {
                        "SKUCode": "0100100129",
                        "CustomerCode": "010001",
                        "Price": 10,
                        "PriceListNumber": 1
                    }
                ]
            }',
            ],
        ];
    }

}
