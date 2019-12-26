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
    protected $PaymentsId;

    /**
     * Getter for PaymentsId
     * @return int
     */
    public function getPaymentsId()
    {
        return $this->PaymentsId;
    }

    /**
     * Setter for PaymentsId
     * @param int PaymentsId
     * @return self
     */
    public function setPaymentsId($PaymentsId)
    {
        if ($PaymentsId <= 0) {
            throw new ModelException('PaymentsId must be greater than 0');
        }

        if (strlen((string) $PaymentsId) > 50) {
            throw new ModelException('PaymentsId length must be equals or lower than 50');
        }

        $this->PaymentsId = $PaymentsId;
        return $this;
    }

    /**
     * Fecha en que se realizó el pago.
     * @var \DateTime
     */
    protected $TransactionDate;

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
     * @param \DateTime TransactionDate
     * @return self
     */
    public function setTransactionDate($TransactionDate)
    {
        $this->TransactionDate = $TransactionDate;
        return $this;
    }

    /**
     * Código de autorización del pago de tarjeta.
     * @var string
     */
    protected $AuthorizationCode;

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
     * @param string AuthorizationCode
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
     * @var string
     */
    protected $TransactionNumber;

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
     * @param string TransactionNumber
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
     * Cantidad de cuotas.
     * @var int
     */
    protected $Installments;

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
     * @param int Installments
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
     * Importe correspondiente a la cuota.
     * @var float
     */
    protected $InstallmentsAmount;

    /**
     * Getter for InstallmentsAmount
     * @return float
     */
    public function getInstallmentsAmount()
    {
        return $this->InstallmentsAmount;
    }

    /**
     * Setter for InstallmentsAmount
     * @param float InstallmentsAmount
     * @return self
     */
    public function setInstallmentsAmount($InstallmentsAmount)
    {
        if ($InstallmentsAmount <= 0) {
            throw new ModelException('InstallmentsAmount must be greater than 0');
        }

        $this->InstallmentsAmount = $InstallmentsAmount;
        return $this;
    }

    /**
     * Código de la tarjeta de crédito.
     * @var string
     */
    protected $CardCode;

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
     * @param string CardCode
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
     * @var string
     */
    protected $CardPlanCode;

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
     * @param string CardPlanCode
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
     * Número de cupón de tarjeta de crédito.
     * @var int
     */
    protected $VoucherNro;

    /**
     * Getter for VoucherNro
     * @return int
     * @codeCoverageIgnore
     */
    public function getVoucherNro()
    {
        return $this->VoucherNro;
    }

    /**
     * Setter for VoucherNro
     * @param int VoucherNro
     * @return self
     * @codeCoverageIgnore
     */
    public function setVoucherNro($VoucherNro)
    {
        if ($VoucherNro < 0) {
            throw new ModelException('VoucherNro must be greater than 0');
        }

        if (strlen((string) $VoucherNro) > 10) {
            throw new ModelException('VoucherNro length must be equals or lower than 10');
        }

        $this->VoucherNro = $VoucherNro;
        return $this;
    }

    /**
     * Código de promoción de la tarjeta de crédito.
     * @var string
     */
    protected $CardPromotionCode;

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
     * @param string CardPromotionCode
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
     * @return float
     */
    public function getTotal()
    {
        return $this->getInstallments() * $this->getInstallmentsAmount();
    }
}
