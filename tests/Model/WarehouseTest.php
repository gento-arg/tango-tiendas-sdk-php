<?php

use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\Warehouse as DataModel;

class WarehouseTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDataModel($data)
    {
        $dataModel = new DataModel();
        $dataModel->loadData($data);

        $this->assertEquals($data['Code'], $dataModel->getCode());
        $this->assertEquals($data['Disabled'], $dataModel->isDisabled());
        $this->assertEquals($data['Description'], $dataModel->getDescription());
    }

    public function dataProvider()
    {
        return [
            'Deposito central' => [[
                "Code" => "1",
                "Description" => "DEPOSITO CASA CENTRAL1",
                "Disabled" => false,
            ]],
            'Galpon 1' => [[
                "Code" => "2",
                "Description" => "DEPOSITO GALPON1",
                "Disabled" => false,
            ]],
            'Prueba' => [[
                "Code" => "80",
                "Description" => "DEPOSITO PRUEBA",
                "Disabled" => false,
            ]],
        ];
    }

}
