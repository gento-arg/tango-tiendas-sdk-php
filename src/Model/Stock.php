<?php

namespace TangoTiendas\Model;

/**
 * @codeCoverageIgnore
 */
class Stock extends AbstractModel
{
    /**
     * @var int
     */
    protected $StoreNumber;

    /**
     * Getter for StoreNumber
     * @return int
     */
    public function getStoreNumber()
    {
        return $this->StoreNumber;
    }

    /**
     * Setter for StoreNumber
     * @param int StoreNumber
     * @return self
     */
    public function setStoreNumber($StoreNumber)
    {
        $this->StoreNumber = $StoreNumber;
        return $this;
    }

    /**
     * @var string
     */
    protected $WarehouseCode;

    /**
     * Getter for WarehouseCode
     * @return string
     */
    public function getWarehouseCode()
    {
        return $this->WarehouseCode;
    }

    /**
     * Setter for WarehouseCode
     * @param string WarehouseCode
     * @return self
     */
    public function setWarehouseCode($WarehouseCode)
    {
        $this->WarehouseCode = $WarehouseCode;
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
     * @var float
     */
    protected $Quantity;

    /**
     * Getter for Quantity
     * @return float
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * Setter for Quantity
     * @param float Quantity
     * @return self
     */
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
        return $this;
    }

    /**
     * @var float
     */
    protected $EngagedQuantity;

    /**
     * Getter for EngagedQuantity
     * @return float
     */
    public function getEngagedQuantity()
    {
        return $this->EngagedQuantity;
    }

    /**
     * Setter for EngagedQuantity
     * @param float EngagedQuantity
     * @return self
     */
    public function setEngagedQuantity($EngagedQuantity)
    {
        $this->EngagedQuantity = $EngagedQuantity;
        return $this;
    }

    /**
     * @var float
     */
    protected $PendingQuantity;

    /**
     * Getter for PendingQuantity
     * @return float
     */
    public function getPendingQuantity()
    {
        return $this->PendingQuantity;
    }

    /**
     * Setter for PendingQuantity
     * @param float PendingQuantity
     * @return self
     */
    public function setPendingQuantity($PendingQuantity)
    {
        $this->PendingQuantity = $PendingQuantity;
        return $this;
    }

}
