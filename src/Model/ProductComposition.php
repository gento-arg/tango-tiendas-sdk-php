<?php

namespace TangoTiendas\Model;

class ProductComposition extends AbstractModel
{
    /**
     * @var string
     */
    protected $ComponentSKUCode;

    /**
     * Getter for ComponentSKUCode
     * @return string
     */
    public function getComponentSKUCode()
    {
        return $this->ComponentSKUCode;
    }

    /**
     * Setter for ComponentSKUCode
     * @param string ComponentSKUCode
     * @return self
     */
    public function setComponentSKUCode($ComponentSKUCode)
    {
        $this->ComponentSKUCode = $ComponentSKUCode;
        return $this;
    }

    /**
     * @var int
     */
    protected $Quantity;

    /**
     * Getter for Quantity
     * @return int
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * Setter for Quantity
     * @param int Quantity
     * @return self
     */
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
        return $this;
    }

}
