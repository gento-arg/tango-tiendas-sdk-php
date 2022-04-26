<?php

use TangoTiendas\Exceptions\ModelException;
use TangoTiendas\Model\OrderItem;

class OrderItemTest extends \PHPUnit\Framework\TestCase
{
    public function testSkuCode()
    {
        $item = new OrderItem();
        $item->setSKUCode(123);
        $this->assertEquals(123, $item->getSKUCode());

        $expected = str_repeat('9', 17);
        $item->setSKUCode($expected);
        $this->assertEquals($expected, $item->getSKUCode());
    }

    public function testSkuCodeInvalid()
    {
        $item = new OrderItem();
        $this->expectException(ModelException::class);

        $item->setSKUCode(str_repeat('9', 18));
    }

    public function testQuantity()
    {
        $item = new OrderItem();
        $item->setQuantity(123);
        $this->assertEquals(123, $item->getQuantity());
    }

    public function testQuantityInvalid()
    {
        $item = new OrderItem();
        $this->expectException(ModelException::class);

        $item->setQuantity(0);
    }

    public function testUnitPrice()
    {
        $item = new OrderItem();
        $item->setUnitPrice(123);

        $this->assertEquals(123, $item->getUnitPrice());
    }

    public function testUnitPriceInvalid()
    {
        $item = new OrderItem();
        $this->expectException(ModelException::class);

        $item->setUnitPrice(0);
    }

    public function testDiscountPercentage()
    {
        $item = new OrderItem();
        $item->setDiscountPercentage(0);
        $this->assertEquals(0, $item->getDiscountPercentage());

        // Precio   124
        // Qty      0
        // %        100%
        $item->setUnitPrice(124);
        $this->assertEquals(0, $item->getSubtotal());
        $this->assertEquals(0, $item->getDiscount());

        // Precio   124
        // Qty      1
        // %        100%
        $item->setQuantity(1);
        $this->assertEquals(124, $item->getSubtotal());
        $this->assertEquals(0, $item->getDiscount());

        // Precio   124
        // Qty      1
        // %        50%
        $item->setDiscountPercentage(50);
        $this->assertEquals(124, $item->getSubtotal());
        $this->assertEquals(62, $item->getDiscount());
    }

    public function testDiscountPercentageInvalid()
    {
        $item = new OrderItem();

        $this->expectException(ModelException::class);

        $item->setDiscountPercentage(-1);
    }
}
