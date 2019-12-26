<?php

namespace TangoTiendas\Model;

use TangoTiendas\Exceptions\ModelException;

class Shipping extends AbstractModel
{
    /**
     * Identificador del envío. Debe ser distinto para cada operación.
     * @var int
     */
    protected $ShippingID;

    /**
     * Getter for ShippingID
     * @return int
     * @codeCoverageIgnore
     */
    public function getShippingID()
    {
        return $this->ShippingID;
    }

    /**
     * Setter for ShippingID
     * @param int ShippingID
     * @return self
     * @codeCoverageIgnore
     */
    public function setShippingID($ShippingID)
    {
        if ($ShippingID <= 0) {
            throw new ModelException('ShippingID must be greater than 0');
        }

        if (strlen((string) $ShippingID) > 50) {
            throw new ModelException('ShippingID length must be equals or lower than 50');
        }

        $this->ShippingID = $ShippingID;
        return $this;
    }

    /**
     * Importe correspondiente al costo de envío.
     * @var float
     */
    protected $ShippingCost;

    /**
     * Getter for ShippingCost
     * @return float
     * @codeCoverageIgnore
     */
    public function getShippingCost()
    {
        return $this->ShippingCost;
    }

    /**
     * Setter for ShippingCost
     * @param float ShippingCost
     * @return self
     * @codeCoverageIgnore
     */
    public function setShippingCost($ShippingCost)
    {
        $this->ShippingCost = $ShippingCost;
        return $this;
    }
}
