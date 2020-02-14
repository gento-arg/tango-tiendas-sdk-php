<?php

namespace TangoTiendas\Model;

use DateTime;

/**
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class Product extends AbstractModel
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
     * @var string
     */
    protected $AdditionalDescription;

    /**
     * Getter for AdditionalDescription
     * @return string
     */
    public function getAdditionalDescription()
    {
        return $this->AdditionalDescription;
    }

    /**
     * Setter for AdditionalDescription
     * @param string AdditionalDescription
     * @return self
     */
    public function setAdditionalDescription($AdditionalDescription)
    {
        $this->AdditionalDescription = $AdditionalDescription;
        return $this;
    }

    /**
     * @var string
     */
    protected $AlternativeCode;

    /**
     * Getter for AlternativeCode
     * @return string
     */
    public function getAlternativeCode()
    {
        return $this->AlternativeCode;
    }

    /**
     * Setter for AlternativeCode
     * @param string AlternativeCode
     * @return self
     */
    public function setAlternativeCode($AlternativeCode)
    {
        $this->AlternativeCode = $AlternativeCode;
        return $this;
    }

    /**
     * @var string
     */
    protected $BarCode;

    /**
     * Getter for BarCode
     * @return string
     */
    public function getBarCode()
    {
        return $this->BarCode;
    }

    /**
     * Setter for BarCode
     * @param string BarCode
     * @return self
     */
    public function setBarCode($BarCode)
    {
        $this->BarCode = $BarCode;
        return $this;
    }

    /**
     * @var float
     */
    protected $Commission;

    /**
     * Getter for Commission
     * @return float
     */
    public function getCommission()
    {
        return $this->Commission;
    }

    /**
     * Setter for Commission
     * @param float Commission
     * @return self
     */
    public function setCommission($Commission)
    {
        $this->Commission = $Commission;
        return $this;
    }

    /**
     * @var float
     */
    protected $Discount;

    /**
     * Getter for Discount
     * @return float
     */
    public function getDiscount()
    {
        return $this->Discount;
    }

    /**
     * Setter for Discount
     * @param float Discount
     * @return self
     */
    public function setDiscount($Discount)
    {
        $this->Discount = $Discount;
        return $this;
    }

    /**
     * @var string
     */
    protected $MeasureUnitCode;

    /**
     * Getter for MeasureUnitCode
     * @return string
     */
    public function getMeasureUnitCode()
    {
        return $this->MeasureUnitCode;
    }

    /**
     * Setter for MeasureUnitCode
     * @param string MeasureUnitCode
     * @return self
     */
    public function setMeasureUnitCode($MeasureUnitCode)
    {
        $this->MeasureUnitCode = $MeasureUnitCode;
        return $this;
    }

    /**
     * @var int
     */
    protected $MaximumStock;

    /**
     * Getter for MaximumStock
     * @return int
     */
    public function getMaximumStock()
    {
        return $this->MaximumStock;
    }

    /**
     * Setter for MaximumStock
     * @param int MaximumStock
     * @return self
     */
    public function setMaximumStock($MaximumStock)
    {
        $this->MaximumStock = $MaximumStock;
        return $this;
    }

    /**
     * @var int
     */
    protected $MinimumStock;

    /**
     * Getter for MinimumStock
     * @return int
     */
    public function getMinimumStock()
    {
        return $this->MinimumStock;
    }

    /**
     * Setter for MinimumStock
     * @param int MinimumStock
     * @return self
     */
    public function setMinimumStock($MinimumStock)
    {
        $this->MinimumStock = $MinimumStock;
        return $this;
    }

    /**
     * @var int
     */
    protected $RestockPoint;

    /**
     * Getter for RestockPoint
     * @return int
     */
    public function getRestockPoint()
    {
        return $this->RestockPoint;
    }

    /**
     * Setter for RestockPoint
     * @param int RestockPoint
     * @return self
     */
    public function setRestockPoint($RestockPoint)
    {
        $this->RestockPoint = $RestockPoint;
        return $this;
    }

    /**
     * @var string
     */
    protected $Observations;

    /**
     * Getter for Observations
     * @return string
     */
    public function getObservations()
    {
        return $this->Observations;
    }

    /**
     * Setter for Observations
     * @param string Observations
     * @return self
     */
    public function setObservations($Observations)
    {
        $this->Observations = $Observations;
        return $this;
    }

    /**
     * @var bool
     */
    protected $Kit;

    /**
     * Getter for Kit
     * @return bool
     */
    public function isKit()
    {
        return $this->Kit;
    }

    /**
     * Setter for Kit
     * @param bool Kit
     * @return self
     */
    public function setKit($Kit)
    {
        $this->Kit = $Kit;
        return $this;
    }

    /**
     * @var DateTime|null
     */
    protected $KitValidityDateSince;

    /**
     * Getter for KitValidityDateSince
     * @return DateTime|null
     */
    public function getKitValidityDateSince()
    {
        return $this->KitValidityDateSince;
    }

    /**
     * Setter for KitValidityDateSince
     * @param DateTime|null KitValidityDateSince
     * @return self
     */
    public function setKitValidityDateSince($KitValidityDateSince)
    {
        if ($KitValidityDateSince !== null) {
            $KitValidityDateSince = new DateTime($KitValidityDateSince);
        }

        $this->KitValidityDateSince = $KitValidityDateSince;
        return $this;
    }

    /**
     * @var DateTime|null
     */
    protected $KitValidityDateUntil;

    /**
     * Getter for KitValidityDateUntil
     * @return DateTime|null
     */
    public function getKitValidityDateUntil()
    {
        return $this->KitValidityDateUntil;
    }

    /**
     * Setter for KitValidityDateUntil
     * @param DateTime|null KitValidityDateUntil
     * @return self
     */
    public function setKitValidityDateUntil($KitValidityDateUntil)
    {
        if ($KitValidityDateUntil !== null) {
            $KitValidityDateUntil = new DateTime($KitValidityDateUntil);
        }

        $this->KitValidityDateUntil = $KitValidityDateUntil;
        return $this;
    }

    /**
     * @var string
     */
    protected $UseScale;

    /**
     * Getter for UseScale
     * @return string
     */
    public function getUseScale()
    {
        return $this->UseScale;
    }

    /**
     * Setter for UseScale
     * @param string UseScale
     * @return self
     */
    public function setUseScale($UseScale)
    {
        $this->UseScale = $UseScale;
        return $this;
    }

    /**
     * @var string
     */
    protected $Scale1;

    /**
     * Getter for Scale1
     * @return string
     */
    public function getScale1()
    {
        return $this->Scale1;
    }

    /**
     * Setter for Scale1
     * @param string Scale1
     * @return self
     */
    public function setScale1($Scale1)
    {
        $this->Scale1 = $Scale1;
        return $this;
    }

    /**
     * @var string
     */
    protected $Scale2;

    /**
     * Getter for Scale2
     * @return string
     */
    public function getScale2()
    {
        return $this->Scale2;
    }

    /**
     * Setter for Scale2
     * @param string Scale2
     * @return self
     */
    public function setScale2($Scale2)
    {
        $this->Scale2 = $Scale2;
        return $this;
    }

    /**
     * @var string
     */
    protected $BaseArticle;

    /**
     * Getter for BaseArticle
     * @return string
     */
    public function getBaseArticle()
    {
        return $this->BaseArticle;
    }

    /**
     * Setter for BaseArticle
     * @param string BaseArticle
     * @return self
     */
    public function setBaseArticle($BaseArticle)
    {
        $this->BaseArticle = $BaseArticle;
        return $this;
    }

    /**
     * @var string
     */
    protected $ScaleValue1;

    /**
     * Getter for ScaleValue1
     * @return string
     */
    public function getScaleValue1()
    {
        return $this->ScaleValue1;
    }

    /**
     * Setter for ScaleValue1
     * @param string ScaleValue1
     * @return self
     */
    public function setScaleValue1($ScaleValue1)
    {
        $this->ScaleValue1 = $ScaleValue1;
        return $this;
    }

    /**
     * @var string
     */
    protected $ScaleValue2;

    /**
     * Getter for ScaleValue2
     * @return string
     */
    public function getScaleValue2()
    {
        return $this->ScaleValue2;
    }

    /**
     * Setter for ScaleValue2
     * @param string ScaleValue2
     * @return self
     */
    public function setScaleValue2($ScaleValue2)
    {
        $this->ScaleValue2 = $ScaleValue2;
        return $this;
    }

    /**
     * @var string
     */
    protected $DescriptionScale1;

    /**
     * Getter for DescriptionScale1
     * @return string
     */
    public function getDescriptionScale1()
    {
        return $this->DescriptionScale1;
    }

    /**
     * Setter for DescriptionScale1
     * @param string DescriptionScale1
     * @return self
     */
    public function setDescriptionScale1($DescriptionScale1)
    {
        $this->DescriptionScale1 = $DescriptionScale1;
        return $this;
    }

    /**
     * @var string
     */
    protected $DescriptionScale2;

    /**
     * Getter for DescriptionScale2
     * @return string
     */
    public function getDescriptionScale2()
    {
        return $this->DescriptionScale2;
    }

    /**
     * Setter for DescriptionScale2
     * @param string DescriptionScale2
     * @return self
     */
    public function setDescriptionScale2($DescriptionScale2)
    {
        $this->DescriptionScale2 = $DescriptionScale2;
        return $this;
    }

    /**
     * @var string
     */
    protected $DescriptionValueScale1;

    /**
     * Getter for DescriptionValueScale1
     * @return string
     */
    public function getDescriptionValueScale1()
    {
        return $this->DescriptionValueScale1;
    }

    /**
     * Setter for DescriptionValueScale1
     * @param string DescriptionValueScale1
     * @return self
     */
    public function setDescriptionValueScale1($DescriptionValueScale1)
    {
        $this->DescriptionValueScale1 = $DescriptionValueScale1;
        return $this;
    }

    /**
     * @var string
     */
    protected $DescriptionValueScale2;

    /**
     * Getter for DescriptionValueScale2
     * @return string
     */
    public function getDescriptionValueScale2()
    {
        return $this->DescriptionValueScale2;
    }

    /**
     * Setter for DescriptionValueScale2
     * @param string DescriptionValueScale2
     * @return self
     */
    public function setDescriptionValueScale2($DescriptionValueScale2)
    {
        $this->DescriptionValueScale2 = $DescriptionValueScale2;
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

    /**
     * @var ProductComposition[]
     */
    protected $ProductComposition;

    /**
     * Getter for ProductComposition
     * @return ProductComposition[]
     */
    public function getProductComposition()
    {
        return $this->ProductComposition;
    }

    /**
     * Setter for ProductComposition
     * @param ProductComposition[] ProductComposition
     * @return self
     */
    public function setProductComposition($ProductComposition)
    {
        $this->ProductComposition = $ProductComposition;
        return $this;
    }

    /**
     * @var ProductComment[]
     */
    protected $ProductComments;

    /**
     * Getter for ProductComments
     * @return ProductComment[]
     */
    public function getProductComments()
    {
        return $this->ProductComments;
    }

    /**
     * Setter for ProductComments
     * @param ProductComment[] ProductComments
     * @return self
     */
    public function setProductComments($ProductComments)
    {
        $this->ProductComments = $ProductComments;
        return $this;
    }

    public function loadData($data)
    {
        parent::loadData($data);

        $composition = $data['ProductComposition'] ?? [];
        $composition = array_map(function ($value) {
            $class = new ProductComposition();
            $class->loadData($value);
            return $class;
        }, $composition);
        $this->setProductComposition($composition);

        $comments = $data['ProductComments'] ?? [];
        $comments = array_map(function ($value) {
            $class = new ProductComment();
            $class->loadData($value);
            return $class;
        }, $comments);
        $this->setProductComments($comments);

        return $this;
    }
}
