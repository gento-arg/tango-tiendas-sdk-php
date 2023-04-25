<?php

namespace TangoTiendas\Model;

use TangoTiendas\Exceptions\ModelException;

class Payment extends AbstractModel
{
    /**
     * Identificador del pago. Debe ser distinto para cada operación. Incluso
     * con PaymentID si se combina con efectivo.
     * @var int
     */
    protected $PaymentId;
    /**
     * Fecha en que se realizó el pago.
     * @var \DateTime
     */
    protected $TransactionDate;
    /**
     * Código de autorización del pago de tarjeta.
     * @var string
     */
    protected $AuthorizationCode;
    /**
     * @var string
     */
    protected $TransactionNumber;
    /**
     * Cantidad de cuotas.
     * @var int
     */
    protected $Installments;
    /**
     * Importe correspondiente a la cuota.
     * @var float
     */
    protected $InstallmentAmount;
    /**
     * Código de la tarjeta de crédito.
     * @var string
     */
    protected $CardCode;
    /**
     * @var string
     */
    protected $CardPlanCode;
    /**
     * Número de cupón de tarjeta de crédito.
     * @var int
     */
    protected $VoucherNo;
    /**
     * Código de promoción de la tarjeta de crédito.
     * @var string
     */
    protected $CardPromotionCode;
    /**
     * Total, del pago.
     * @var float
     */
    protected $PaymentTotal = null;

    /**
     * Getter for AuthorizationCode
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->AuthorizationCode;
    }

    /**
     * Setter for AuthorizationCode
     *
     * @param string AuthorizationCode
     *
     * @return self
     */
    public function setAuthorizationCode($AuthorizationCode)
    {
        if (strlen((string) $AuthorizationCode) > 8) {
            throw new ModelException('AuthorizationCode length must be equals or lower than 8');
        }

        $this->AuthorizationCode = $AuthorizationCode;
        return $this;
    }

    /**
     * Getter for CardCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getCardCode()
    {
        return $this->CardCode;
    }

    /**
     * Setter for CardCode
     *
     * @param string CardCode
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setCardCode($CardCode)
    {
        if (strlen((string) $CardCode) > 3) {
            throw new ModelException('CardCode length must be equals or lower than 3');
        }

        $this->CardCode = $CardCode;
        return $this;
    }

    /**
     * Getter for CardPlanCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getCardPlanCode()
    {
        return $this->CardPlanCode;
    }

    /**
     * Setter for CardPlanCode
     *
     * @param string CardPlanCode
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setCardPlanCode($CardPlanCode)
    {
        if (strlen((string) $CardPlanCode) > 10) {
            throw new ModelException('CardPlanCode length must be equals or lower than 10');
        }

        $this->CardPlanCode = $CardPlanCode;
        return $this;
    }

    /**
     * Getter for CardPromotionCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getCardPromotionCode()
    {
        return $this->CardPromotionCode;
    }

    /**
     * Setter for CardPromotionCode
     *
     * @param string CardPromotionCode
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setCardPromotionCode($CardPromotionCode)
    {
        if (strlen((string) $CardPromotionCode) > 10) {
            throw new ModelException('CardPromotionCode length must be equals or lower than 10');
        }

        $this->CardPromotionCode = $CardPromotionCode;
        return $this;
    }

    /**
     * Getter for InstallmentAmount
     * @return float
     */
    public function getInstallmentAmount()
    {
        return $this->InstallmentAmount;
    }

    /**
     * Setter for InstallmentAmount
     *
     * @param float InstallmentAmount
     *
     * @return self
     */
    public function setInstallmentAmount($InstallmentAmount)
    {
        if ($InstallmentAmount <= 0) {
            throw new ModelException('InstallmentAmount must be greater than 0');
        }

        $this->InstallmentAmount = $InstallmentAmount;
        return $this;
    }

    /**
     * Getter for Installments
     * @return int
     */
    public function getInstallments()
    {
        return $this->Installments;
    }

    /**
     * Setter for Installments
     *
     * @param int Installments
     *
     * @return self
     */
    public function setInstallments($Installments)
    {
        if ($Installments <= 0) {
            throw new ModelException('Installments must be greater than 0');
        }

        if (strlen((string) $Installments) > 2) {
            throw new ModelException('Installments length must be equals or lower than 2');
        }

        $this->Installments = $Installments;
        return $this;
    }

    /**
     * Getter for PaymentsId
     * @return int
     */
    public function getPaymentId()
    {
        return $this->PaymentId;
    }

    /**
     * Setter for PaymentId
     *
     * @param int PaymentId
     *
     * @throws ModelException
     * @return self
     */
    public function setPaymentId($PaymentId)
    {
        if ($PaymentId <= 0) {
            throw new ModelException('PaymentsId must be greater than 0');
        }

        if (strlen((string) $PaymentId) > 50) {
            throw new ModelException('PaymentsId length must be equals or lower than 50');
        }

        $this->PaymentId = $PaymentId;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        if ($this->PaymentTotal !== null) {
            return $this->PaymentTotal;
        }
        return $this->getInstallments() * $this->getInstallmentAmount();
    }

    /**
     * Getter for TransactionDate
     * @return \DateTime
     */
    public function getTransactionDate()
    {
        return $this->TransactionDate;
    }

    /**
     * Setter for TransactionDate
     *
     * @param \DateTime TransactionDate
     *
     * @return self
     */
    public function setTransactionDate($TransactionDate)
    {
        $this->TransactionDate = $TransactionDate;
        return $this;
    }

    /**
     * Getter for TransactionNumber
     * @return string
     */
    public function getTransactionNumber()
    {
        return $this->TransactionNumber;
    }

    /**
     * Setter for TransactionNumber
     *
     * @param string TransactionNumber
     *
     * @throws ModelException
     * @return self
     */
    public function setTransactionNumber($TransactionNumber)
    {
        if (strlen((string) $TransactionNumber) > 40) {
            throw new ModelException('TransactionNumber length must be equals or lower than 40');
        }

        $this->TransactionNumber = $TransactionNumber;
        return $this;
    }

    /**
     * Getter for VoucherNo
     * @return int
     * @codeCoverageIgnore
     */
    public function getVoucherNo()
    {
        return $this->VoucherNo;
    }

    /**
     * Setter for VoucherNo
     *
     * @param int VoucherNo
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setVoucherNo($VoucherNo)
    {
        if ($VoucherNo < 0) {
            throw new ModelException('VoucherNo must be greater than 0');
        }

        if (strlen((string) $VoucherNo) > 8) {
            throw new ModelException('VoucherNo length must be equals or lower than 8');
        }

        $this->VoucherNo = $VoucherNo;
        return $this;
    }

    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();
        return $data + [
                'Total' => $this->getTotal(),
            ];
    }

    /**
     * Setter for PaymentTotal
     *
     * @param float $PaymentTotal
     *
     * @return self
     */
    public function setPaymentTotal($PaymentTotal)
    {
        $this->PaymentTotal = $PaymentTotal;
        return $this;
    }
}
