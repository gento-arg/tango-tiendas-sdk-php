<?php

namespace TangoTiendas\Model;

class DiscountCustomer extends AbstractModel
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
     * @var int
     */
    protected $Discount;

    /**
     * Getter for Discount
     * @return int
     */
    public function getDiscount()
    {
        return $this->Discount;
    }

    /**
     * Setter for Discount
     * @param int Discount
     * @return self
     */
    public function setDiscount($Discount)
    {
        $this->Discount = $Discount;
        return $this;
    }
}
