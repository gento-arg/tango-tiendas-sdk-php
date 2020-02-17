<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\Price;
use TangoTiendas\Service\Prices;

class PricesTest extends TestCase
{
    public function testGetPrices()
    {
        $mock = new MockHandler([
            new Response(200, [], '{
            "Paging": {
                "PageNumber": 1,
                "PageSize": 10,
                "MoreData": true
            },
            "Data": [
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200200065",
                    "Price": 45.08,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0100100134",
                    "Price": 20215.55,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0100100265",
                    "Price": 30330.55,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0100200528",
                    "Price": 87408.05,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0100200530",
                    "Price": 53465,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0100200630",
                    "Price": 41168.05,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200100013",
                    "Price": 27.51,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200100124",
                    "Price": 98.26,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200200033",
                    "Price": 41.62,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200200034",
                    "Price": 199.46,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                }
            ]
        }'),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $service = new Prices('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);

        $rta = $service->getList();
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(10, $rta->getPageSize());
        $this->assertEquals(true, $rta->hasMoreData());

        /**
         * @var Price[]
         */
        $data = $rta->getData();

        $dataModel = $data[0];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200200065', $dataModel->getSKUCode());
        $this->assertEquals(45.08, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[1];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100134', $dataModel->getSKUCode());
        $this->assertEquals(20215.55, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[2];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100100265', $dataModel->getSKUCode());
        $this->assertEquals(30330.55, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[3];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100200528', $dataModel->getSKUCode());
        $this->assertEquals(87408.05, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[4];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100200530', $dataModel->getSKUCode());
        $this->assertEquals(53465, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[5];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0100200630', $dataModel->getSKUCode());
        $this->assertEquals(41168.05, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[6];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200100013', $dataModel->getSKUCode());
        $this->assertEquals(27.51, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[7];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200100124', $dataModel->getSKUCode());
        $this->assertEquals(98.26, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[8];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200200033', $dataModel->getSKUCode());
        $this->assertEquals(41.62, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[9];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200200034', $dataModel->getSKUCode());
        $this->assertEquals(199.46, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());
    }

    public function testGetPriceFilter()
    {
        $mock = new MockHandler([
            new Response(200, [], '{
            "Paging": {
                "PageNumber": 1,
                "PageSize": 3,
                "MoreData": false
            },
            "Data": [
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200200065",
                    "Price": 45.08,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200200033",
                    "Price": 41.62,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                },
                {
                    "PriceListNumber": 1,
                    "SKUCode": "0200200034",
                    "Price": 199.46,
                    "ValidityDateSince": "2018-01-01T00:00:00",
                    "ValidityDateUntil": "2019-01-01T00:00:00"
                }
            ]
        }'),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $service = new Prices('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);
        $rta = $service->getList(500, 1, null, '02002');

        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(3, $rta->getPageSize());
        $this->assertEquals(false, $rta->hasMoreData());

        /**
         * @var Price[]
         */
        $data = $rta->getData();

        $dataModel = $data[0];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200200065', $dataModel->getSKUCode());
        $this->assertEquals(45.08, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[1];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200200033', $dataModel->getSKUCode());
        $this->assertEquals(41.62, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());

        $dataModel = $data[2];
        $this->assertInstanceOf(Price::class, $dataModel);
        $this->assertEquals(1, $dataModel->getPriceListNumber());
        $this->assertEquals('0200200034', $dataModel->getSKUCode());
        $this->assertEquals(199.46, $dataModel->getPrice());
        $validSince = new \DateTime('2018-01-01T00:00:00');
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());
        $validUntil = new \DateTime('2019-01-01T00:00:00');
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());
    }
}
