<?php

namespace TangoTiendas\Model;

use TangoTiendas\Exceptions\ModelException;

/**
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
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
     */
    public function getShippingID()
    {
        return $this->ShippingID;
    }

    /**
     * Setter for ShippingID
     * @param int ShippingID
     * @return self
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
     */
    public function getShippingCost()
    {
        return $this->ShippingCost;
    }

    /**
     * Setter for ShippingCost
     * @param float ShippingCost
     * @return self
     */
    public function setShippingCost($ShippingCost)
    {
        if ($ShippingCost < 0) {
            throw new ModelException('ShippingCost must be equals or greater than 0');
        }
        $this->ShippingCost = $ShippingCost;
        return $this;
    }

    /**
     * @var string
     */
    protected $Street;

    /**
     * Getter for Street
     * @return string
     * @codeCoverageIgnore
     */
    public function getStreet()
    {
        return $this->Street;
    }

    /**
     * Setter for Street
     * @param string Street
     * @return self
     * @codeCoverageIgnore
     */
    public function setStreet($Street)
    {
        $this->Street = $Street;
        return $this;
    }


    /**
     * @var string
     */
    protected $HouseNumber;

    /**
     * Getter for HouseNumber
     * @return string
     * @codeCoverageIgnore
     */
    public function getHouseNumber()
    {
        return $this->HouseNumber;
    }

    /**
     * Setter for HouseNumber
     * @param string HouseNumber
     * @return self
     * @codeCoverageIgnore
     */
    public function setHouseNumber($HouseNumber)
    {
        $this->HouseNumber = $HouseNumber;
        return $this;
    }

    /**
     * @var string
     */
    protected $Floor;

    /**
     * Getter for Floor
     * @return string
     * @codeCoverageIgnore
     */
    public function getFloor()
    {
        return $this->Floor;
    }

    /**
     * Setter for Floor
     * @param string Floor
     * @return self
     * @codeCoverageIgnore
     */
    public function setFloor($Floor)
    {
        $this->Floor = $Floor;
        return $this;
    }

    /**
     * @var string
     */
    protected $Apartment;

    /**
     * Getter for Apartment
     * @return string
     * @codeCoverageIgnore
     */
    public function getApartment()
    {
        return $this->Apartment;
    }

    /**
     * Setter for Apartment
     * @param string Apartment
     * @return self
     * @codeCoverageIgnore
     */
    public function setApartment($Apartment)
    {
        $this->Apartment = $Apartment;
        return $this;
    }

    /**
     * @var string
     */
    protected $City;

    /**
     * Getter for City
     * @return string
     * @codeCoverageIgnore
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Setter for City
     * @param string City
     * @return self
     * @codeCoverageIgnore
     */
    public function setCity($City)
    {
        $this->City = $City;
        return $this;
    }

    /**
     * @var string
     */
    protected $PostalCode;

    /**
     * Getter for PostalCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * Setter for PostalCode
     * @param string PostalCode
     * @return self
     * @codeCoverageIgnore
     */
    public function setPostalCode($PostalCode)
    {
        $this->PostalCode = $PostalCode;
        return $this;
    }

    /**
     * @var string
     */
    protected $ProvinceCode;

    /**
     * Getter for ProvinceCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getProvinceCode()
    {
        return $this->ProvinceCode;
    }

    /**
     * Setter for ProvinceCode
     * @param string ProvinceCode
     * @return self
     * @codeCoverageIgnore
     */
    public function setProvinceCode($ProvinceCode)
    {
        $this->ProvinceCode = $ProvinceCode;
        return $this;
    }

    /**
     * Número de teléfono del cliente.
     * @var string
     */
    protected $PhoneNumber1;

    /**
     * Getter for PhoneNumber1
     * @return string
     * @codeCoverageIgnore
     */
    public function getPhoneNumber1()
    {
        return $this->PhoneNumber1;
    }

    /**
     * Setter for PhoneNumber1
     * @param string PhoneNumber1
     * @return self
     * @codeCoverageIgnore
     */
    public function setPhoneNumber1($PhoneNumber)
    {
        $this->PhoneNumber1 = $PhoneNumber;
        return $this;
    }

    /**
     * Número de teléfono del cliente.
     * @var string
     */
    protected $PhoneNumber2;

    /**
     * Getter for PhoneNumber2
     * @return string
     * @codeCoverageIgnore
     */
    public function getPhoneNumber2()
    {
        return $this->PhoneNumber2;
    }

    /**
     * Setter for PhoneNumber2
     * @param string PhoneNumber2
     * @return self
     * @codeCoverageIgnore
     */
    public function setPhoneNumber2($PhoneNumber)
    {
        $this->PhoneNumber2 = $PhoneNumber;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliversMonday;

    /**
     * Getter for DeliversMonday
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliversMonday()
    {
        return $this->DeliversMonday;
    }

    /**
     * Setter for DeliversMonday
     * @param string DeliversMonday
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliversMonday($DeliversMonday)
    {
        $this->DeliversMonday = $DeliversMonday;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliversTuesday;

    /**
     * Getter for DeliversTuesday
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliversTuesday()
    {
        return $this->DeliversTuesday;
    }

    /**
     * Setter for DeliversTuesday
     * @param string DeliversTuesday
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliversTuesday($DeliversTuesday)
    {
        $this->DeliversTuesday = $DeliversTuesday;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliversWednesday;

    /**
     * Getter for DeliversWednesday
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliversWednesday()
    {
        return $this->DeliversWednesday;
    }

    /**
     * Setter for DeliversWednesday
     * @param string DeliversWednesday
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliversWednesday($DeliversWednesday)
    {
        $this->DeliversWednesday = $DeliversWednesday;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliversThursday;

    /**
     * Getter for DeliversThursday
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliversThursday()
    {
        return $this->DeliversThursday;
    }

    /**
     * Setter for DeliversThursday
     * @param string DeliversThursday
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliversThursday($DeliversThursday)
    {
        $this->DeliversThursday = $DeliversThursday;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliversFriday;

    /**
     * Getter for DeliversFriday
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliversFriday()
    {
        return $this->DeliversFriday;
    }

    /**
     * Setter for DeliversFriday
     * @param string DeliversFriday
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliversFriday($DeliversFriday)
    {
        $this->DeliversFriday = $DeliversFriday;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliversSaturday;

    /**
     * Getter for DeliversSaturday
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliversSaturday()
    {
        return $this->DeliversSaturday;
    }

    /**
     * Setter for DeliversSaturday
     * @param string DeliversSaturday
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliversSaturday($DeliversSaturday)
    {
        $this->DeliversSaturday = $DeliversSaturday;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliversSunday;

    /**
     * Getter for DeliversSunday
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliversSunday()
    {
        return $this->DeliversSunday;
    }

    /**
     * Setter for DeliversSunday
     * @param string DeliversSunday
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliversSunday($DeliversSunday)
    {
        $this->DeliversSunday = $DeliversSunday;
        return $this;
    }

    /**
     * @var string
     */
    protected $DeliveryHours;

    /**
     * Getter for DeliveryHours
     * @return string
     * @codeCoverageIgnore
     */
    public function getDeliveryHours()
    {
        return $this->DeliveryHours;
    }

    /**
     * Setter for DeliveryHours
     * @param string DeliveryHours
     * @return self
     * @codeCoverageIgnore
     */
    public function setDeliveryHours($DeliveryHours)
    {
        $this->DeliveryHours = $DeliveryHours;
        return $this;
    }
}
