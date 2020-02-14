<?php

use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\Measure as DataModel;

class MeasureTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDataModel($data)
    {
        $dataModel = new DataModel();
        $dataModel->loadData($data);

        $this->assertEquals($data['Code'], $dataModel->getCode());
        $this->assertEquals($data['Initials'], $dataModel->getInitials());
        $this->assertEquals($data['Description'], $dataModel->getDescription());
    }

    public function dataProvider()
    {
        return [
            'Metros' => [[
                "Code" => "M",
                "Initials" => "MTS",
                "Description" => "Metros",
            ]],
            'Unidades' => [[
                "Code" => "UNI",
                "Initials" => "UN",
                "Description" => "Unidades",
            ]],
        ];
    }

}
