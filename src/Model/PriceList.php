<?php

namespace TangoTiendas\Model;

class PriceList extends AbstractModel
{
    /**
     * @var int
     */
    protected $PriceListNumber;

    /**
     * Getter for PriceListNumber
     * @return int
     */
    public function getPriceListNumber()
    {
        return $this->PriceListNumber;
    }

    /**
     * Setter for PriceListNumber
     * @param int PriceListNumber
     * @return self
     */
    public function setPriceListNumber($PriceListNumber)
    {
        $this->PriceListNumber = $PriceListNumber;
        return $this;
    }

    /**
     * @var string
     */
    protected $Description;

    /**
     * Getter for Description
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Setter for Description
     * @param string Description
     * @return self
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @var bool
     */
    protected $CommonCurrency;

    /**
     * Getter for CommonCurrency
     * @return bool
     */
    public function hasCommonCurrency()
    {
        return $this->CommonCurrency;
    }

    /**
     * Setter for CommonCurrency
     * @param bool CommonCurrency
     * @return self
     */
    public function setCommonCurrency($CommonCurrency)
    {
        $this->CommonCurrency = $CommonCurrency;
        return $this;
    }

    /**
     * @var bool
     */
    protected $IvaIncluded;

    /**
     * Getter for IvaIncluded
     * @return bool
     */
    public function hasIvaIncluded()
    {
        return $this->IvaIncluded;
    }

    /**
     * Setter for IvaIncluded
     * @param bool IvaIncluded
     * @return self
     */
    public function setIvaIncluded($IvaIncluded)
    {
        $this->IvaIncluded = $IvaIncluded;
        return $this;
    }

    /**
     * @var bool
     */
    protected $InternalTaxIncluded;

    /**
     * Getter for InternalTaxIncluded
     * @return bool
     */
    public function hasInternalTaxIncluded()
    {
        return $this->InternalTaxIncluded;
    }

    /**
     * Setter for InternalTaxIncluded
     * @param bool InternalTaxIncluded
     * @return self
     */
    public function setInternalTaxIncluded($InternalTaxIncluded)
    {
        $this->InternalTaxIncluded = $InternalTaxIncluded;
        return $this;
    }

    /**
     * @var datetime|null
     */
    protected $ValidityDateSince;

    /**
     * Getter for ValidityDateSince
     * @return datetime|null
     */
    public function getValidityDateSince()
    {
        return $this->ValidityDateSince;
    }

    /**
     * Setter for ValidityDateSince
     * @param datetime|null ValidityDateSince
     * @return self
     */
    public function setValidityDateSince($ValidityDateSince)
    {
        $this->ValidityDateSince = $ValidityDateSince;
        return $this;
    }

    /**
     * @var datetime|null
     */
    protected $ValidityDateUntil;

    /**
     * Getter for ValidityDateUntil
     * @return datetime|null
     */
    public function getValidityDateUntil()
    {
        return $this->ValidityDateUntil;
    }

    /**
     * Setter for ValidityDateUntil
     * @param datetime|null ValidityDateUntil
     * @return self
     */
    public function setValidityDateUntil($ValidityDateUntil)
    {
        $this->ValidityDateUntil = $ValidityDateUntil;
        return $this;
    }

    /**
     * @var bool
     */
    protected $Disabled;

    /**
     * Getter for Disabled
     * @return bool
     */
    public function isDisabled()
    {
        return $this->Disabled;
    }

    /**
     * Setter for Disabled
     * @param bool Disabled
     * @return self
     */
    public function setDisabled($Disabled)
    {
        $this->Disabled = $Disabled;
        return $this;
    }
}
