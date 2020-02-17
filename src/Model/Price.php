<?php

namespace TangoTiendas\Model;

use DateTime;

class Price extends AbstractModel
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
    protected $SKUCode;

    /**
     * Getter for SKUCode
     * @return string
     */
    public function getSKUCode()
    {
        return $this->SKUCode;
    }

    /**
     * Setter for SKUCode
     * @param string SKUCode
     * @return self
     */
    public function setSKUCode($SKUCode)
    {
        $this->SKUCode = $SKUCode;
        return $this;
    }

    /**
     * @var string
     */
    protected $Price;

    /**
     * Getter for Price
     * @return string
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Setter for Price
     * @param string Price
     * @return self
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
        return $this;
    }

    /**
     * @var DateTime|null
     */
    protected $ValidityDateSince;

    /**
     * Getter for ValidityDateSince
     * @return DateTime|null
     */
    public function getValidityDateSince()
    {
        return $this->ValidityDateSince;
    }

    /**
     * Setter for ValidityDateSince
     * @param DateTime|null ValidityDateSince
     * @return self
     */
    public function setValidityDateSince($ValidityDateSince)
    {
        if ($ValidityDateSince !== null) {
            $ValidityDateSince = new DateTime($ValidityDateSince);
        }

        $this->ValidityDateSince = $ValidityDateSince;
        return $this;
    }

    /**
     * @var DateTime|null
     */
    protected $ValidityDateUntil;

    /**
     * Getter for ValidityDateUntil
     * @return DateTime|null
     */
    public function getValidityDateUntil()
    {
        return $this->ValidityDateUntil;
    }

    /**
     * Setter for ValidityDateUntil
     * @param DateTime|null ValidityDateUntil
     * @return self
     */
    public function setValidityDateUntil($ValidityDateUntil)
    {
        if ($ValidityDateUntil !== null) {
            $ValidityDateUntil = new DateTime($ValidityDateUntil);
        }

        $this->ValidityDateUntil = $ValidityDateUntil;
        return $this;
    }

}
