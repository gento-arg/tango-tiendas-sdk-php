<?php

use TangoTiendas\Exceptions\ModelException;
use TangoTiendas\Model\Payment;

class PaymentTest extends \PHPUnit\Framework\TestCase
{
    public function testPaymentId()
    {
        $payment = new Payment();
        $payment->setPaymentsId(1);

        $this->assertEquals(1, $payment->getPaymentsId());

        $expected = str_repeat('9', 50);
        $payment->setPaymentsId($expected);
        $this->assertEquals($expected, $payment->getPaymentsId());
    }

    public function testPaymentIdInvalidMin()
    {
        $payment = new Payment();
        $this->expectException(ModelException::class);

        $payment->setPaymentsId(0);
    }

    public function testPaymentIdInvalidMax()
    {
        $payment = new Payment();
        $this->expectException(ModelException::class);

        $payment->setPaymentsId(str_repeat('9', 51));
    }

    public function testPayment()
    {
        $payment = new Payment();

        $payment->setInstallments(2)
            ->setInstallmentsAmount(100);

        $this->assertEquals(200, $payment->getTotal());
    }

    public function testPaymentInvalid()
    {
        $payment = new Payment();
        $this->expectException(ModelException::class);

        $payment->setInstallmentsAmount(-1100);
    }

    public function testPaymentInvalidInstallments()
    {
        $payment = new Payment();
        $this->expectException(ModelException::class);

        $payment->setInstallments(0);
    }

    public function testPaymentMaxInstallments()
    {
        $payment = new Payment();
        $this->expectException(ModelException::class);

        $payment->setInstallments(100);
    }

    public function testPaymentInstallments()
    {
        $payment = new Payment();
        $payment->setInstallments(99);
        $this->assertEquals(99, $payment->getInstallments());
        $payment->setInstallments(50);
        $this->assertEquals(50, $payment->getInstallments());
        $payment->setInstallments(4);
        $this->assertEquals(4, $payment->getInstallments());
    }

    public function testAuthorizationCode()
    {
        $payment = new Payment();
        $payment->setAuthorizationCode(123);
        $this->assertEquals(123, $payment->getAuthorizationCode());
    }

    public function testAuthorizationCodeInvalid()
    {
        $payment = new Payment();
        $this->expectException(ModelException::class);

        $payment->setAuthorizationCode(str_repeat('9', 9));
    }

    public function testTransactionNumber()
    {
        $payment = new Payment();
        $payment->setTransactionNumber(123);
        $this->assertEquals(123, $payment->getTransactionNumber());
    }

    public function testTransactionNumberInvalid()
    {
        $payment = new Payment();
        $this->expectException(ModelException::class);

        $payment->setTransactionNumber(str_repeat('9', 41));
    }
}
