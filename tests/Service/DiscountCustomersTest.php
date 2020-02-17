<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\DiscountCustomer;
use TangoTiendas\Service\DiscountCustomers;

class DiscountCustomersTest extends TestCase
{
    /**
     * @dataProvider getFullList
     */
    public function testgetDiscounts($data)
    {
        $mock = new MockHandler([
            new Response(200, [], $data),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $service = new DiscountCustomers('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);

        $rta = $service->getList();
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(500, $rta->getPageSize());
        $this->assertEquals(true, $rta->hasMoreData());

        /**
         * @var DiscountCustomer[]
         */
        $data = $rta->getData();

        $dataModel = $data[0];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100200703', $dataModel->getSKUCode());
        $this->assertEquals('010002', $dataModel->getCustomerCode());
        $this->assertEquals(0, $dataModel->getDiscount());

        $dataModel = $data[1];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100134', $dataModel->getSKUCode());
        $this->assertEquals('99998', $dataModel->getCustomerCode());
        $this->assertEquals(15, $dataModel->getDiscount());

        $dataModel = $data[2];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100129', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

        $dataModel = $data[3];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100134', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

        $dataModel = $data[4];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100135', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

        $dataModel = $data[5];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100136', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

        $dataModel = $data[6];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100150', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

        $dataModel = $data[7];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100151', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

        $dataModel = $data[8];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100152', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

        $dataModel = $data[9];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100153', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());
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

        $service = new DiscountCustomers('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);

        $rta = $service->getList(500, 1, null, '0100100134');
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(2, $rta->getPageSize());
        $this->assertEquals(false, $rta->hasMoreData());

        /**
         * @var DiscountCustomer[]
         */
        $data = $rta->getData();

        $dataModel = $data[0];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100134', $dataModel->getSKUCode());
        $this->assertEquals('99998', $dataModel->getCustomerCode());
        $this->assertEquals(15, $dataModel->getDiscount());

        $dataModel = $data[1];
        $this->assertInstanceOf(DiscountCustomer::class, $dataModel);
        $this->assertEquals('0100100134', $dataModel->getSKUCode());
        $this->assertEquals('CLI_5', $dataModel->getCustomerCode());
        $this->assertEquals(2, $dataModel->getDiscount());

    }

    public function getFullList()
    {
        return
            [
            ['{
                "Paging": {
                    "PageNumber": 1,
                    "PageSize": 500,
                    "MoreData": true
                },
                "Data": [
                    {
                        "SKUCode": "0100200703",
                        "CustomerCode": "010002",
                        "Discount": 0
                    },
                    {
                        "SKUCode": "0100100134",
                        "CustomerCode": "99998",
                        "Discount": 15
                    },
                    {
                        "SKUCode": "0100100129",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    },
                    {
                        "SKUCode": "0100100134",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    },
                    {
                        "SKUCode": "0100100135",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    },
                    {
                        "SKUCode": "0100100136",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    },
                    {
                        "SKUCode": "0100100150",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    },
                    {
                        "SKUCode": "0100100151",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    },
                    {
                        "SKUCode": "0100100152",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    },
                    {
                        "SKUCode": "0100100153",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
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
                    "PageSize": 2,
                    "MoreData": false
                },
                "Data": [
                    {
                        "SKUCode": "0100100134",
                        "CustomerCode": "99998",
                        "Discount": 15
                    },
                    {
                        "SKUCode": "0100100134",
                        "CustomerCode": "CLI_5",
                        "Discount": 2
                    }
                ]
            }',
            ],
        ];
    }

}
