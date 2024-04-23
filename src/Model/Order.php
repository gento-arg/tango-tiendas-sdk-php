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
     * Número de la orden. Es el número con el cual podrá identificar la orden
     * desde revisión de pedidos de Tango Tiendas
     * @var string
     */
    protected $OrderNumber;
    /**
     * Fecha de la orden. Puede ser anterior a 7 días de la fecha actual.
     * @var \DateTime
     */
    protected $Date;
    /**
     * Importe de descuento total de la operación. Sólo valido en pesos argentinos.
     * @var float
     */
    protected $TotalDiscount;
    /**
     * Importe del recargo financiero. Sólo válido en pesos argentinos.
     * @var float
     */
    protected $FinancialSurcharge;
    /**
     * Indica que la orden está cancelada
     * @var bool
     */
    protected $CancelOrden;
    /**
     * @var Customer
     */
    protected $Customer;
    /**
     * @var OrderItem[]
     */
    protected $OrderItems = [];
    /**
     * Se puede completar ya sea que el envío sea con o sin costo para el comprador.
     * @var Shipping
     */
    protected $Shipping;
    /**
     * @var Payment[]
     */
    protected $Payments;
    /**
     * @var CashPayment[]
     */
    protected $CashPayments;
    /**
     * Indica si el pago de la orden se acuerda con el vendedor
     * @var bool
     */
    protected $AgreedWithSeller;

    /**
     * @param $CashPayment
     *
     * @return $this
     */
    public function addCashPayment($CashPayment)
    {
        $this->CashPayments[] = $CashPayment;
        return $this;
    }

    /**
     * Append for OrderItems
     *
     * @param OrderItem OrderItem
     *
     * @return self
     */
    public function addOrderItem($OrderItem)
    {
        $existing = $this->getOrderItem($OrderItem->getProductCode());
        if ($existing) {
            $existing->setQuantity($existing->getQuantity() + $OrderItem->getQuantity());
        }

        if (!$existing) {
            $this->OrderItems[] = $OrderItem;
        }
        return $this;
    }

    /**
     * Add Payment
     *
     * @param Payment Payment
     *
     * @return self
     */
    public function addPayment(Payment $Payment)
    {
        $this->_checkValidDate($Payment);

        $this->Payments[] = $Payment;
        return $this;
    }

    /**
     * Getter for CashPayment
     * @return CashPayment[]
     */
    public function getCashPayments()
    {
        return $this->CashPayments ?? [];
    }

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
     *
     * @param Customer Customer
     *
     * @return self
     */
    public function setCustomer($Customer)
    {
        $this->Customer = $Customer;
        return $this;
    }

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
     *
     * @param \DateTime $Date
     *
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
     * Getter for FinancialSurcharge
     * @return float
     */
    public function getFinancialSurcharge()
    {
        return $this->FinancialSurcharge;
    }

    /**
     * Setter for FinancialSurcharge
     *
     * @param float $FinancialSurcharge
     *
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
     * Getter for OrderID
     * @return string
     */
    public function getOrderID()
    {
        return $this->OrderID;
    }

    /**
     * Setter for OrderID
     *
     * @param string $OrderID
     *
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
     * @param $productCode
     *
     * @return OrderItem|null
     */
    public function getOrderItem($productCode)
    {
        foreach ($this->getOrderItems() as $orderItem) {
            if ($orderItem->getProductCode() === $productCode) {
                return $orderItem;
            }
        }
        return null;
    }

    /**
     * Getter for OrderItems
     * @return OrderItem[]
     */
    public function getOrderItems()
    {
        return $this->OrderItems;
    }

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
     *
     * @param string $OrderNumber
     *
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
        foreach ($this->getCashPayments() as $item) {
            $total += ($item->getPaymentTotal());
        }

        return $total;
    }

    /**
     * Getter for Payments
     * @return Payment[]
     */
    public function getPayments()
    {
        return $this->Payments ?? [];
    }

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
     *
     * @param Shipping Shipping
     *
     * @return self
     */
    public function setShipping($Shipping)
    {
        $this->Shipping = $Shipping;
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
     *
     * @param float $TotalDiscount
     *
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

    public function getTotalWithDiscount()
    {
        $total = $this->getTotal();
        $total -= $this->getTotalDiscount();
        return $total;
    }

    /**
     * Getter for AgreedWithSeller
     * @return bool
     * @codeCoverageIgnore
     */
    public function isAgreedWithSeller()
    {
        return $this->AgreedWithSeller;
    }

    /**
     * Setter for AgreedWithSeller
     *
     * @param bool $AgreedWithSeller
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setAgreedWithSeller($AgreedWithSeller)
    {
        $this->AgreedWithSeller = $AgreedWithSeller;
        return $this;
    }

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
     *
     * @param bool $CancelOrden
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setCancelOrden($CancelOrden)
    {
        $this->CancelOrden = $CancelOrden;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): mixed
    {
        $data = parent::jsonSerialize();
        return $data + [
                'Total' => $this->getTotal(),
                'PaidTotal' => $this->getPaidTotal(),
            ];
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
            throw new ModelException(sprintf($message, $Payment->getPaymentId()));
        }
    }
}
