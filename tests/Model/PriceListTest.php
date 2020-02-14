<?php

use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\PriceList as DataModel;

class PriceListTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDataModel($data)
    {
        $dataModel = new DataModel();
        $dataModel->loadData($data);

        $this->assertEquals($data['PriceListNumber'], $dataModel->getPriceListNumber());
        $this->assertEquals($data['Disabled'], $dataModel->isDisabled());
        $this->assertEquals($data['CommonCurrency'], $dataModel->hasCommonCurrency());
        $this->assertEquals($data['IvaIncluded'], $dataModel->hasIvaIncluded());
        $this->assertEquals($data['InternalTaxIncluded'], $dataModel->hasInternalTaxIncluded());

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
        $this->assertEquals($data['Description'], $dataModel->getDescription());
    }

    public function dataProvider()
    {
        return
            [
            'Venta Mayorista1' => [[
                "PriceListNumber" => 1,
                "Description" => "Venta Mayorista1",
                "CommonCurrency" => true,
                "IvaIncluded" => true,
                "InternalTaxIncluded" => true,
                "ValidityDateSince" => "2018-01-01T00:00:00",
                "ValidityDateUntil" => "2019-01-01T00:00:00",
                "Disabled" => false,
            ]],
            'Venta Minorista1' => [[
                "PriceListNumber" => 2,
                "Description" => "Venta Minorista1",
                "CommonCurrency" => true,
                "IvaIncluded" => true,
                "InternalTaxIncluded" => true,
                "ValidityDateSince" => null,
                "ValidityDateUntil" => null,
                "Disabled" => false,
            ]],
            'LISTA DE PRECIOS1' => [[
                "PriceListNumber" => 4,
                "Description" => "LISTA DE PRECIOS1",
                "CommonCurrency" => false,
                "IvaIncluded" => true,
                "InternalTaxIncluded" => true,
                "ValidityDateSince" => null,
                "ValidityDateUntil" => null,
                "Disabled" => false,
            ]],
            'LISTA VENTA MAYORIST' => [[
                "PriceListNumber" => 20,
                "Description" => "LISTA VENTA MAYORIST",
                "CommonCurrency" => true,
                "IvaIncluded" => true,
                "InternalTaxIncluded" => true,
                "ValidityDateSince" => "2019-01-01T00:00:00",
                "ValidityDateUntil" => "2019-02-01T00:00:00",
                "Disabled" => false,
            ]],
        ];
    }

}
