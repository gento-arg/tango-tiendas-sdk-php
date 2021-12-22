<?php

namespace TangoTiendas\Model;

use TangoTiendas\Exceptions\ModelException;

class CashPayment extends AbstractModel
{
    /**
     * Identificador del pago. Debe ser distinto para cada operación. Incluso
     * con PaymentsID si se combina con tarjetas.
     * @var int
     */
    protected $PaymentID;
    /**
     * Código de Forma de Pago.
     * @var string
     */
    protected $PaymentMethod;
    /**
     * Total, del pago.
     * @var float
     */
    protected $PaymentTotal;

    /**
     * Getter for PaymentID
     * @return int
     */
    public function getPaymentID()
    {
        return $this->PaymentID;
    }

    /**
     * Setter for PaymentID
     *
     * @param int PaymentID
     *
     * @throws ModelException
     * @return self
     */
    public function setPaymentID($PaymentID)
    {
        if ($PaymentID <= 0) {
            throw new ModelException('PaymentID must be greater than 0');
        }

        if (strlen((string) $PaymentID) > 50) {
            throw new ModelException('PaymentID length must be equals or lower than 50');
        }

        $this->PaymentID = $PaymentID;
        return $this;
    }

    /**
     * Getter for PaymentMethod
     * @return string
     * @codeCoverageIgnore
     */
    public function getPaymentMethod()
    {
        return $this->PaymentMethod;
    }

    /**
     * Setter for PaymentMethod
     *
     * @param string PaymentMethod
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setPaymentMethod($PaymentMethod)
    {
        $this->PaymentMethod = $PaymentMethod;
        return $this;
    }

    /**
     * Getter for PaymentTotal
     * @return float
     */
    public function getPaymentTotal()
    {
        return $this->PaymentTotal;
    }

    /**
     * Setter for PaymentTotal
     *
     * @param float PaymentTotal
     *
     * @throws ModelException
     * @return self
     */
    public function setPaymentTotal($PaymentTotal)
    {
        $this->PaymentTotal = $PaymentTotal;
        return $this;
    }
}
