<?php

namespace TangoTiendas\Model;

class PriceCustomer extends AbstractModel
{
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
    protected $CustomerCode;

    /**
     * Getter for CustomerCode
     * @return string
     */
    public function getCustomerCode()
    {
        return $this->CustomerCode;
    }

    /**
     * Setter for CustomerCode
     * @param string CustomerCode
     * @return self
     */
    public function setCustomerCode($CustomerCode)
    {
        $this->CustomerCode = $CustomerCode;
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

}
