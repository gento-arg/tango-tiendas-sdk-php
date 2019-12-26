<?php

use TangoTiendas\Exceptions\ModelException;
use TangoTiendas\Model\Customer as DataModel;

class CustomerTest extends \PHPUnit\Framework\TestCase
{
    public function testSetCustomerId()
    {
        $dataModel = new DataModel();
        $expected = 1;
        $this->returnSelf($dataModel->setCustomerId($expected));
        $this->assertEquals($expected, $dataModel->getCustomerId());
    }

    public function testInvalidMinCustomerId()
    {
        $dataModel = new DataModel();
        $this->expectException(ModelException::class);

        $dataModel->setCustomerId(0);
    }

    public function testInvalidMaxCustomerId()
    {
        $dataModel = new DataModel();
        $this->expectException(ModelException::class);

        $dataModel->setCustomerId(99999999999);
    }
}
