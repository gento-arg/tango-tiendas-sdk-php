<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use TangoTiendas\Model\Store;
use TangoTiendas\Service\Stores;

class StoresTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Stores
     */
    protected $_service;

    protected function setUp(): void
    {
        $mock = new MockHandler([
            new Response(200, [], '{
                "Paging": {
                    "PageNumber": 1,
                    "PageSize": 2,
                    "MoreData": false
                },
                "Data": [
                    {
                        "StoreNumber": 1,
                        "Description": "CASA CENTRAL",
                        "Street": "",
                        "Number": "",
                        "Floor": "",
                        "Apartment": "",
                        "Tower": "",
                        "Block": "",
                        "City": "",
                        "PostalCode": "",
                        "ProvinceCode": "",
                        "Email": "",
                        "WebPage": "",
                        "Contact": "PRUEBA",
                        "PhoneNumber1": "(33333)3333-3333",
                        "PhoneNumber2": "(22222)2222-2222"
                    },
                    {
                        "StoreNumber": 2,
                        "Description": "MAR DEL PLATA",
                        "Street": "",
                        "Number": "",
                        "Floor": "",
                        "Apartment": "",
                        "Tower": "",
                        "Block": "",
                        "City": "",
                        "PostalCode": "",
                        "ProvinceCode": "",
                        "Email": "",
                        "WebPage": "",
                        "Contact": "",
                        "PhoneNumber1": "(22222)2222-2222",
                        "PhoneNumber2": "(88888)8888-8888"
                    }
                ]
            }'),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client([
            'handler' => $handler,
            'base_uri' => 'https://ttiendas.axoft.com/api',
        ]);

        $this->_service = new Stores('044f5ff5-74e6-43bf-9e9b-9788214b08b1_10778', $guzzleClient);
    }

    public function testGetStores()
    {
        $rta = $this->_service->getList();
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(2, $rta->getPageSize());
        $this->assertEquals(false, $rta->hasMoreData());

        /**
         * @var Store[]
         */
        $data = $rta->getData();

        $this->assertEquals(Store::class, get_class($data[0]));
        $this->assertEquals(1, $data[0]->getStoreNumber());
        $this->assertEquals('CASA CENTRAL', $data[0]->getDescription());
        $this->assertEquals('', $data[0]->getStreet());
        $this->assertEquals('', $data[0]->getNumber());
        $this->assertEquals('', $data[0]->getFloor());
        $this->assertEquals('', $data[0]->getApartment());
        $this->assertEquals('', $data[0]->getTower());
        $this->assertEquals('', $data[0]->getBlock());
        $this->assertEquals('', $data[0]->getCity());
        $this->assertEquals('', $data[0]->getPostalCode());
        $this->assertEquals('', $data[0]->getProvinceCode());
        $this->assertEquals('', $data[0]->getEmail());
        $this->assertEquals('', $data[0]->getWebPage());
        $this->assertEquals('PRUEBA', $data[0]->getContact());
        $this->assertEquals('(33333)3333-3333', $data[0]->getPhoneNumber1());
        $this->assertEquals('(22222)2222-2222', $data[0]->getPhoneNumber2());

        $this->assertEquals(Store::class, get_class($data[1]));
        $this->assertEquals(2, $data[1]->getStoreNumber());
        $this->assertEquals('MAR DEL PLATA', $data[1]->getDescription());
        $this->assertEquals('', $data[1]->getStreet());
        $this->assertEquals('', $data[1]->getNumber());
        $this->assertEquals('', $data[1]->getFloor());
        $this->assertEquals('', $data[1]->getApartment());
        $this->assertEquals('', $data[1]->getTower());
        $this->assertEquals('', $data[1]->getBlock());
        $this->assertEquals('', $data[1]->getCity());
        $this->assertEquals('', $data[1]->getPostalCode());
        $this->assertEquals('', $data[1]->getProvinceCode());
        $this->assertEquals('', $data[1]->getEmail());
        $this->assertEquals('', $data[1]->getWebPage());
        $this->assertEquals('', $data[1]->getContact());
        $this->assertEquals('(22222)2222-2222', $data[1]->getPhoneNumber1());
        $this->assertEquals('(88888)8888-8888', $data[1]->getPhoneNumber2());
    }

    public function testGetStoresFilter()
    {
        $rta = $this->_service->getList(500, 1, '2222');
        $this->assertEquals(1, $rta->getPageNumber());
        $this->assertEquals(2, $rta->getPageSize());
        $this->assertEquals(false, $rta->hasMoreData());

        /**
         * @var Store[]
         */
        $data = $rta->getData();

        $this->assertEquals(Store::class, get_class($data[0]));
        $this->assertEquals(1, $data[0]->getStoreNumber());
        $this->assertEquals('CASA CENTRAL', $data[0]->getDescription());
        $this->assertEquals('', $data[0]->getStreet());
        $this->assertEquals('', $data[0]->getNumber());
        $this->assertEquals('', $data[0]->getFloor());
        $this->assertEquals('', $data[0]->getApartment());
        $this->assertEquals('', $data[0]->getTower());
        $this->assertEquals('', $data[0]->getBlock());
        $this->assertEquals('', $data[0]->getCity());
        $this->assertEquals('', $data[0]->getPostalCode());
        $this->assertEquals('', $data[0]->getProvinceCode());
        $this->assertEquals('', $data[0]->getEmail());
        $this->assertEquals('', $data[0]->getWebPage());
        $this->assertEquals('PRUEBA', $data[0]->getContact());
        $this->assertEquals('(33333)3333-3333', $data[0]->getPhoneNumber1());
        $this->assertEquals('(22222)2222-2222', $data[0]->getPhoneNumber2());

        $this->assertEquals(Store::class, get_class($data[1]));
        $this->assertEquals(2, $data[1]->getStoreNumber());
        $this->assertEquals('MAR DEL PLATA', $data[1]->getDescription());
        $this->assertEquals('', $data[1]->getStreet());
        $this->assertEquals('', $data[1]->getNumber());
        $this->assertEquals('', $data[1]->getFloor());
        $this->assertEquals('', $data[1]->getApartment());
        $this->assertEquals('', $data[1]->getTower());
        $this->assertEquals('', $data[1]->getBlock());
        $this->assertEquals('', $data[1]->getCity());
        $this->assertEquals('', $data[1]->getPostalCode());
        $this->assertEquals('', $data[1]->getProvinceCode());
        $this->assertEquals('', $data[1]->getEmail());
        $this->assertEquals('', $data[1]->getWebPage());
        $this->assertEquals('', $data[1]->getContact());
        $this->assertEquals('(22222)2222-2222', $data[1]->getPhoneNumber1());
        $this->assertEquals('(88888)8888-8888', $data[1]->getPhoneNumber2());
    }
}
