<?php

namespace TangoTiendas\Model;

use TangoTiendas\Exceptions\ModelException;

class Order extends AbstractModel
{
    /**
     * Identificador de la orden. Debe ser distinto para cada operación.
     * @var string
     */
    protected $OrderID;

    /**
     * Getter for OrderID
     * @return string
     */
    public function getOrderID()
    {
        return $this->OrderID;
    }

    /**
     * Setter for OrderID
     * @param string $OrderID
     * @return self
     */
    public function setOrderID($OrderID)
    {
        if ($OrderID <= 0) {
            throw new ModelException('OrderID must be greater than 0');
        }

        if (strlen($OrderID) > 200) {
            throw new ModelException('OrderID length must be lower than 200 chars');
        }

        $this->OrderID = $OrderID;
        return $this;
    }

    /**
     * Número de la orden. Es el número con el cual podrá identificar la orden 
     * desde revisión de pedidos de Tango Tiendas
     * @var string
     */
    protected $OrderNumber;

    /**
     * Getter for OrderNumber
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->OrderNumber;
    }

    /**
     * Setter for OrderNumber
     * @param string $OrderNumber
     * @return self
     */
    public function setOrderNumber($OrderNumber)
    {
        if ($OrderNumber <= 0) {
            throw new ModelException('OrderNumber must be greater than 0');
        }

        if (strlen($OrderNumber) > 200) {
            throw new ModelException('OrderNumber length must be lower than 200 chars');
        }

        $this->OrderNumber = $OrderNumber;
        return $this;
    }

    /**
     * Fecha de la orden. Puede ser anterior a 7 días de la fecha actual.
     * @var \DateTime
     */
    protected $Date;

    /**
     * Getter for Date
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Setter for Date
     * @param \DateTime $Date
     * @return self
     * @codeCoverageIgnore
     */
    public function setDate($Date)
    {
        foreach ($this->getPayments() as $Payment) {
            $this->_checkValidDate($Payment, $Date);
        }

        $this->Date = $Date;
        return $this;
    }

    /**
     * Getter for Total
     * @return float
     */
    public function getTotal()
    {
        /**
         * >0 ∑[
         *      (OrderItems.Quantity x OrderItems.UnitPrice) – OrderItems.DiscountPorcentage)
         *    ] 
         *    + Shipping.ShippingCost 
         *    + Principal.FinancialSurcharge 
         *    – Principal.TotalDiscount
         */

        $total = 0;
        foreach ($this->getOrderItems() as $item) {
            $total += ($item->getSubtotal() - $item->getDiscount());
        }

        if ($this->getShipping() != null) {
            $total += $this->getShipping()->getShippingCost();
        }

        $total += $this->getFinancialSurcharge();

        return $total;
    }

    public function getTotalWithDiscount()
    {
        $total = $this->getTotal();
        $total -= $this->getTotalDiscount();
        return $total;
    }

    /**
     * Importe de descuento total de la operación. Sólo valido en pesos argentinos.
     * @var float
     */
    protected $TotalDiscount;

    /**
     * Getter for TotalDiscount
     * @return float
     */
    public function getTotalDiscount()
    {
        return $this->TotalDiscount;
    }

    /**
     * Setter for TotalDiscount
     * @param float $TotalDiscount
     * @return self
     */
    public function setTotalDiscount($TotalDiscount)
    {
        if ($TotalDiscount > $this->getTotal()) {
            throw new ModelException('TotalDiscount must be lower than Total amount');
        }

        $this->TotalDiscount = $TotalDiscount;
        return $this;
    }

    /**
     * Getter for PaidTotal
     * @return float
     */
    public function getPaidTotal()
    {
        /**
         * >=0 ∑(Payments.Installments * Payments.InstallmentsAmount) 
         *     + CashPayment.PaymentTotal
         */

        $total = 0;
        foreach ($this->getPayments() as $item) {
            $total += ($item->getTotal());
        }

        if ($this->getCashPayment() != null) {
            $total += $this->getCashPayment()->getPaymentTotal();
        }

        return $total;
    }

    /**
     * Importe del recargo financiero. Sólo válido en pesos argentinos.
     * @var float
     */
    protected $FinancialSurcharge;

    /**
     * Getter for FinancialSurcharge
     * @return float
     */
    public function getFinancialSurcharge()
    {
        return $this->FinancialSurcharge;
    }

    /**
     * Setter for FinancialSurcharge
     * @param float $FinancialSurcharge
     * @return self
     */
    public function setFinancialSurcharge($FinancialSurcharge)
    {
        if ((float) $FinancialSurcharge < 0) {
            throw new ModelException('FinancialSurcharge must be equals or greater than 0');
        }

        $this->FinancialSurcharge = $FinancialSurcharge;
        return $this;
    }

    /**
     * Indica que la orden está cancelada
     * @var bool
     */
    protected $CancelOrden;

    /**
     * Getter for CancelOrden
     * @return bool
     * @codeCoverageIgnore
     */
    public function isCancelOrden()
    {
        return $this->CancelOrden;
    }

    /**
     * Setter for CancelOrden
     * @param bool $CancelOrden
     * @return self
     * @codeCoverageIgnore
     */
    public function setCancelOrden($CancelOrden)
    {
        $this->CancelOrden = $CancelOrden;
        return $this;
    }

    /**
     * @var Customer
     */
    protected $Customer;

    /**
     * Getter for Customer
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * Setter for Customer
     * @param Customer Customer
     * @return self
     */
    public function setCustomer($Customer)
    {
        $this->Customer = $Customer;
        return $this;
    }

    /**
     * @var OrderItem[]
     */
    protected $OrderItems = [];

    /**
     * Getter for OrderItems
     * @return OrderItem[]
     */
    public function getOrderItems()
    {
        return $this->OrderItems;
    }

    /**
     * Append for OrderItems
     * @param OrderItem OrderItem
     * @return self
     */
    public function addOrderItem($OrderItem)
    {
        $this->OrderItems[] = $OrderItem;
        return $this;
    }

    /**
     * Se puede completar ya sea que el envío sea con o sin costo para el comprador.
     * @var Shipping
     */
    protected $Shipping;

    /**
     * Getter for Shipping
     * @return Shipping
     */
    public function getShipping()
    {
        return $this->Shipping;
    }

    /**
     * Setter for Shipping
     * @param Shipping Shipping
     * @return self
     */
    public function setShipping($Shipping)
    {
        $this->Shipping = $Shipping;
        return $this;
    }

    /**
     * @var Payment[]
     */
    protected $Payments;

    /**
     * Getter for Payments
     * @return Payment[]
     */
    public function getPayments()
    {
        return $this->Payments ?? [];
    }

    /**
     * Add Payment
     * @param Payment Payment
     * @return self
     */
    public function addPayment(Payment $Payment)
    {
        $this->_checkValidDate($Payment);

        $this->Payments[] = $Payment;
        return $this;
    }

    /**
     * @var CashPayment
     */
    protected $CashPayment;

    /**
     * Getter for CashPayment
     * @return CashPayment
     */
    public function getCashPayment()
    {
        return $this->CashPayment;
    }

    /**
     * Setter for CashPayment
     * @param CashPayment CashPayment
     * @return self
     */
    public function setCashPayment($CashPayment)
    {
        $this->CashPayment = $CashPayment;
        return $this;
    }

    protected function _checkValidDate(Payment $Payment, \DateTime $fecha = null)
    {
        if ($fecha === null) {
            $fecha = $this->getDate();
        }

        if ($fecha === null) {
            return;
        }

        if ($Payment->getTransactionDate() == null) {
            return;
        }

        if ($Payment->getTransactionDate() <= $fecha) {
            $message = 'The date of payment %s is greater than date of order';
            throw new ModelException(sprintf($message, $Payment->getPaymentsId()));
        }

        return;
    }

    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();
        return $data + [
            'Total' => $this->getTotal(),
            'PaidTotal' => $this->getPaidTotal(),
        ];
    }
}
