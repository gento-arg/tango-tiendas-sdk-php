<?php

namespace TangoTiendas\Model;

use TangoTiendas\Exceptions\ModelException;

class OrderItem extends AbstractModel
{
    /**
     * Código del artículo de la publicación.
     * @var string
     */
    protected $ProductCode;
    /**
     * Código del artículo de Tango Gestión (se refiere al que se guarda en el
     * campo STA11.Cod_Sta11 de las tablas de Tango Gestión)
     * @var string
     */
    protected $SKUCode;
    /**
     * Código del artículo que representa una combinación.
     * @var string
     */
    protected $VariantCode;
    /**
     * Descripción del artículo.
     * @var string
     */
    protected $Description;
    /**
     * Descripción del artículo que representa una variación.
     * @var string
     */
    protected $VariantDescription;
    /**
     * Cantidad del artículo.
     * @var float
     */
    protected $Quantity;
    /**
     * Precio unitario.
     * @var float
     */
    protected $UnitPrice;
    /**
     * Porcentaje de descuento aplicado al artículo.
     * @var float
     */
    protected $DiscountPercentage;

    /**
     * Getter for Description
     * @return string
     * @codeCoverageIgnore
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Setter for Description
     *
     * @param string Description
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    public function getDiscount()
    {
        if ($this->getDiscountPercentage() <= 0) {
            return 0;
        }
        return $this->getSubtotal() * ($this->getDiscountPercentage() / 100);
    }

    /**
     * Getter for DiscountPercentage
     * @return float
     */
    public function getDiscountPercentage()
    {
        return $this->DiscountPercentage;
    }

    /**
     * Setter for DiscountPercentage
     *
     * @param float DiscountPercentage
     *
     * @return self
     */
    public function setDiscountPercentage($DiscountPercentage)
    {
        $this->DiscountPercentage = $DiscountPercentage;
        return $this;
    }

    public function getSubtotal()
    {
        return $this->getQuantity() * $this->getUnitPrice();
    }

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
     *
     * @param float Quantity
     *
     * @return self
     * @throws ModelException
     */
    public function setQuantity($Quantity)
    {
        if ($Quantity <= 0) {
            throw new ModelException('Quantity length must be greater than 0');
        }

        $this->Quantity = $Quantity;
        return $this;
    }

    /**
     * Getter for UnitPrice
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->UnitPrice;
    }

    /**
     * Setter for UnitPrice
     *
     * @param float UnitPrice
     *
     * @return self
     */
    public function setUnitPrice($UnitPrice)
    {
        $this->UnitPrice = $UnitPrice;
        return $this;
    }

    /**
     * Getter for ProductCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getProductCode()
    {
        return $this->ProductCode;
    }

    /**
     * Setter for ProductCode
     *
     * @param string ProductCode
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setProductCode($ProductCode)
    {
        $this->ProductCode = $ProductCode;
        return $this;
    }

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
     *
     * @param string SKUCode
     *
     * @return self
     */
    public function setSKUCode($SKUCode)
    {
        $this->SKUCode = $SKUCode;
        return $this;
    }

    /**
     * Getter for VariantCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getVariantCode()
    {
        return $this->VariantCode;
    }

    /**
     * Setter for VariantCode
     *
     * @param string VariantCode
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setVariantCode($VariantCode)
    {
        $this->VariantCode = $VariantCode;
        return $this;
    }

    /**
     * Getter for VariantDescription
     * @return string
     * @codeCoverageIgnore
     */
    public function getVariantDescription()
    {
        return $this->VariantDescription;
    }

    /**
     * Setter for VariantDescription
     *
     * @param string VariantDescription
     *
     * @return self
     * @codeCoverageIgnore
     */
    public function setVariantDescription($VariantDescription)
    {
        $this->VariantDescription = $VariantDescription;
        return $this;
    }
}
