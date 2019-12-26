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
     * @param string ProductCode
     * @return self
     * @codeCoverageIgnore
     */
    public function setProductCode($ProductCode)
    {
        $this->ProductCode = $ProductCode;
        return $this;
    }

    /**
     * Código del artículo de Tango Gestión (se refiere al que se guarda en el 
     * campo STA11.Cod_Sta11 de las tablas de Tango Gestión)
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
        if (strlen($SKUCode) > 17) {
            throw new ModelException('SKUCode length must be lower than 17');
        }

        $this->SKUCode = $SKUCode;
        return $this;
    }

    /**
     * Código del artículo que representa una combinación.
     * @var string
     */
    protected $VariantCode;

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
     * @param string VariantCode
     * @return self
     * @codeCoverageIgnore
     */
    public function setVariantCode($VariantCode)
    {
        if (strlen($VariantCode) > 200) {
            throw new ModelException('VariantCode length must be lower than 200');
        }

        $this->VariantCode = $VariantCode;
        return $this;
    }

    /**
     * Descripción del artículo.
     * @var string
     */
    protected $Description;

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
     * @param string Description
     * @return self
     * @codeCoverageIgnore
     */
    public function setDescription($Description)
    {
        if (strlen($Description) > 400) {
            throw new ModelException('Description length must be lower than 400');
        }

        $this->Description = $Description;
        return $this;
    }

    /**
     * Descripción del artículo que representa una variación.
     * @var string
     */
    protected $VariantDescription;

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
     * @param string VariantDescription
     * @return self
     * @codeCoverageIgnore
     */
    public function setVariantDescription($VariantDescription)
    {
        if (strlen($VariantDescription) > 400) {
            throw new ModelException('VariantDescription length must be lower than 400');
        }

        $this->VariantDescription = $VariantDescription;
        return $this;
    }

    /**
     * Cantidad del artículo.
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
        if ($Quantity <= 0) {
            throw new ModelException('Quantity length must be greater than 0');
        }

        $this->Quantity = $Quantity;
        return $this;
    }

    /**
     * Precio unitario.
     * @var float
     */
    protected $UnitPrice;

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
     * @param float UnitPrice
     * @return self
     */
    public function setUnitPrice($UnitPrice)
    {
        if ($UnitPrice <= 0) {
            throw new ModelException('UnitPrice length must be greater than 0');
        }

        $this->UnitPrice = $UnitPrice;
        return $this;
    }

    /**
     * Porcentaje de descuento aplicado al artículo.
     * @var float
     */
    protected $DiscountPercentage;

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
     * @param float DiscountPercentage
     * @return self
     */
    public function setDiscountPercentage($DiscountPercentage)
    {
        if ($DiscountPercentage < 0) {
            throw new ModelException('DiscountPercentage length must be equals or greater than 0');
        }

        $this->DiscountPercentage = $DiscountPercentage;
        return $this;
    }

    public function getSubtotal()
    {
        return $this->getQuantity() * $this->getUnitPrice();
    }

    public function getDiscount()
    {
        return $this->getSubtotal() * $this->getDiscountPercentage();
    }
}
