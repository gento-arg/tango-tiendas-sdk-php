<?php

use TangoTiendas\Exceptions\ModelException;
use TangoTiendas\Model\CashPayment;

class CashPaymentTest extends \PHPUnit\Framework\TestCase
{
    public function testPaymentId()
    {
        $item = new CashPayment();
        $item->setPaymentID(1);
        $this->assertEquals(1, $item->getPaymentID());

        $expected = str_repeat('9', 50);
        $item->setPaymentID($expected);
        $this->assertEquals($expected, $item->getPaymentID());
    }

    public function testPaymentIdInvalidMin()
    {
        $item = new CashPayment();
        $this->expectException(ModelException::class);

        $item->setPaymentID(0);
    }

    public function testPaymentIdInvalidMax()
    {
        $item = new CashPayment();
        $this->expectException(ModelException::class);

        $item->setPaymentID(str_repeat('9', 51));
    }

    public function testPaymentTotalInvalid()
    {
        $item = new CashPayment();
        $this->expectException(ModelException::class);

        $item->setPaymentTotal(0);
    }
}
