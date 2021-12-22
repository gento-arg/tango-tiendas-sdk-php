<?php

use PHPUnit\Framework\TestCase;
use TangoTiendas\Exceptions\ModelException;
use TangoTiendas\Model\CashPayment;
use TangoTiendas\Model\Customer;
use TangoTiendas\Model\Order as DataModel;
use TangoTiendas\Model\OrderItem;
use TangoTiendas\Model\Payment;
use TangoTiendas\Model\Shipping;

class OrderTest extends TestCase
{
    public function testCustomer()
    {
        $dataModel = new DataModel();
        $customer = new Customer();

        $dataModel->setCustomer($customer);
        $this->assertEquals($customer, $dataModel->getCustomer());
    }

    public function testCustomerEmpty()
    {
        $dataModel = new DataModel();
        $this->assertEmpty($dataModel->getCustomer());
    }

    public function testDiscount()
    {
        $dataModel = new DataModel();

        $orderItem = new OrderItem();
        $orderItem->setQuantity(1);
        $orderItem->setUnitPrice(200);
        $dataModel->addOrderItem($orderItem);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(3);
        $orderItem->setUnitPrice(100);
        $dataModel->addOrderItem($orderItem);

        $dataModel->setTotalDiscount(200);

        $this->assertEquals(200, $dataModel->getTotalDiscount());
    }

    public function testDiscountInvalid()
    {
        $dataModel = new DataModel();

        $orderItem = new OrderItem();
        $orderItem->setQuantity(1);
        $orderItem->setUnitPrice(200);
        $dataModel->addOrderItem($orderItem);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(3);
        $orderItem->setUnitPrice(100);
        $dataModel->addOrderItem($orderItem);

        $this->expectException(ModelException::class);

        $dataModel->setTotalDiscount(7000);
    }

    public function testFinancialSurcharge()
    {
        $dataModel = new DataModel();
        $this->assertEmpty($dataModel->getFinancialSurcharge());
        $dataModel->setFinancialSurcharge(200);
        $this->assertEquals(200, $dataModel->getFinancialSurcharge());
    }

    public function testFinancialSurchargeInvalid()
    {
        $dataModel = new DataModel();
        $this->assertEmpty($dataModel->getFinancialSurcharge());

        $this->expectException(ModelException::class);
        $dataModel->setFinancialSurcharge(-1);
    }

    public function testInvalidMaxOrderID()
    {
        $dataModel = new DataModel();
        $this->expectException(ModelException::class);

        $dataModel->setOrderID(str_repeat('9', 201));
    }

    public function testInvalidMaxOrderNumber()
    {
        $dataModel = new DataModel();
        $this->expectException(ModelException::class);

        $dataModel->setOrderNumber(str_repeat('9', 201));
    }

    public function testInvalidMinOrderID()
    {
        $dataModel = new DataModel();
        $this->expectException(ModelException::class);

        $dataModel->setOrderID(0);
    }

    public function testInvalidMinOrderNumber()
    {
        $dataModel = new DataModel();
        $this->expectException(ModelException::class);

        $dataModel->setOrderNumber(0);
    }

    public function testPaidInstallmentsDate()
    {
        $dataModel = new DataModel();
        $dataModel->setDate(new \DateTime());

        $orderItem = new OrderItem();
        $orderItem->setQuantity(1);
        $orderItem->setUnitPrice(200);
        $dataModel->addOrderItem($orderItem);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(3);
        $orderItem->setUnitPrice(100);
        $dataModel->addOrderItem($orderItem);

        $dataModel->setTotalDiscount(200);

        $payment = new Payment();
        $payment->setTransactionDate(new \DateTime());
        $dataModel->addPayment($payment);
        $this->assertEquals(0, $dataModel->getPaidTotal());

        $payment = new Payment();
        $dataModel->addPayment($payment);
        $this->assertEquals(0, $dataModel->getPaidTotal());

        $payment = new Payment();
        $payment->setTransactionDate($dataModel->getDate()->sub(new \DateInterval('P2D')));

        $payment->setInstallments(2)
            ->setInstallmentAmount(100);

        $this->expectException(ModelException::class);
        $dataModel->addPayment($payment);

        $this->assertEquals(200, $dataModel->getPaidTotal());
    }

    public function testPaidPartialCash()
    {
        $dataModel = new DataModel();

        $orderItem = new OrderItem();
        $orderItem->setQuantity(1);
        $orderItem->setUnitPrice(200);
        $dataModel->addOrderItem($orderItem);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(3);
        $orderItem->setUnitPrice(100);
        $dataModel->addOrderItem($orderItem);

        $dataModel->setTotalDiscount(200);

        $payment = new CashPayment();
        $dataModel->addCashPayment($payment);

        $this->assertEquals(0, $dataModel->getPaidTotal());

        $payment = new CashPayment();
        $payment->setPaymentTotal(200);

        $dataModel->addCashPayment($payment);

        $this->assertEquals(200, $dataModel->getPaidTotal());
    }

    public function testPaidPartialInstallments()
    {
        $dataModel = new DataModel();

        $orderItem = new OrderItem();
        $orderItem->setQuantity(1);
        $orderItem->setUnitPrice(200);
        $dataModel->addOrderItem($orderItem);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(3);
        $orderItem->setUnitPrice(100);
        $dataModel->addOrderItem($orderItem);

        $dataModel->setTotalDiscount(200);

        $payment = new Payment();
        $dataModel->addPayment($payment);

        $this->assertEquals(0, $dataModel->getPaidTotal());

        $payment = new Payment();

        $payment->setInstallments(2)
            ->setInstallmentAmount(100);

        $dataModel->addPayment($payment);

        $this->assertEquals(200, $dataModel->getPaidTotal());
    }

    public function testSetOrderID()
    {
        $dataModel = new DataModel();
        $expected = 1;
        $dataModel->setOrderID($expected);
        $this->assertEquals($expected, $dataModel->getOrderID());
    }

    public function testSetOrderNumber()
    {
        $dataModel = new DataModel();
        $expected = 1;
        $dataModel->setOrderNumber($expected);
        $this->assertEquals($expected, $dataModel->getOrderNumber());
    }

    public function testTotal()
    {
        $dataModel = new DataModel();

        $orderItem = new OrderItem();
        $orderItem->setQuantity(1);
        $orderItem->setUnitPrice(200);
        $dataModel->addOrderItem($orderItem);

        $orderItem = new OrderItem();
        $orderItem->setQuantity(3);
        $orderItem->setUnitPrice(100);
        $dataModel->addOrderItem($orderItem);

        $this->assertEquals(500, $dataModel->getTotalWithDiscount());

        $shipping = new Shipping();
        $dataModel->setShipping($shipping);
        $this->assertEquals(500, $dataModel->getTotalWithDiscount());
    }
}
