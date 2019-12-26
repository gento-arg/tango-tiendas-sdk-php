<?php

use TangoTiendas\Exceptions\ModelException;
use TangoTiendas\Model\Shipping;

class ShippingTest extends \PHPUnit\Framework\TestCase
{
    public function testShippingID()
    {
        $item = new Shipping();

        $item->setShippingID(1);
        $this->assertEquals(1, $item->getShippingID());
    }

    public function testShippingIdInvalid()
    {
        $item = new Shipping();
        $this->expectException(ModelException::class);

        $item->setShippingID(0);
    }

    public function testShippingCost()
    {
        $item = new Shipping();
        $item->setShippingCost(10);

        $this->assertEquals(10, $item->getShippingCost());
    }

    public function testShippingCostInvalid()
    {
        $item = new Shipping();
        $this->expectException(ModelException::class);

        $item->setShippingCost(-20);
    }
}
