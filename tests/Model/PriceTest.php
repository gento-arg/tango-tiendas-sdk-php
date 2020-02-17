<?php

use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\Price as DataModel;

class PriceTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDataModel($data)
    {
        $dataModel = new DataModel();
        $dataModel->loadData($data);

        $this->assertEquals($data['PriceListNumber'], $dataModel->getPriceListNumber());
        $this->assertEquals($data['SKUCode'], $dataModel->getSKUCode());
        $this->assertEquals($data['Price'], $dataModel->getPrice());

        $validSince = $data['ValidityDateSince'];
        if ($validSince !== null) {
            $validSince = new \DateTime($data['ValidityDateSince']);
        }
        $this->assertEquals($validSince, $dataModel->getValidityDateSince());

        $validUntil = $data['ValidityDateUntil'];
        if ($validUntil !== null) {
            $validUntil = new \DateTime($data['ValidityDateUntil']);
        }
        $this->assertEquals($validUntil, $dataModel->getValidityDateUntil());
    }

    public function dataProvider()
    {
        return
            [
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0200200065",
                "Price" => 45.08,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0100100134",
                "Price" => 20215.55,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0100100265",
                "Price" => 30330.55,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0100200528",
                "Price" => 87408.05,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0100200530",
                "Price" => 53465,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0100200630",
                "Price" => 41168.05,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0200100013",
                "Price" => 27.51,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0200100124",
                "Price" => 98.26,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0200200033",
                "Price" => 41.62,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
            [[
                "PriceListNumber" => 1,
                "SKUCode" => "0200200034",
                "Price" => 199.46,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
            ]],
        ];
    }

}
