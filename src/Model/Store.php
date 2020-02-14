<?php

namespace TangoTiendas\Model;

class Store extends AbstractModel
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
    protected $Street;

    /**
     * Getter for Street
     * @return string
     */
    public function getStreet()
    {
        return $this->Street;
    }

    /**
     * Setter for Street
     * @param string Street
     * @return self
     */
    public function setStreet($Street)
    {
        $this->Street = $Street;
        return $this;
    }

    /**
     * @var string
     */
    protected $Number;

    /**
     * Getter for Number
     * @return string
     */
    public function getNumber()
    {
        return $this->Number;
    }

    /**
     * Setter for Number
     * @param string Number
     * @return self
     */
    public function setNumber($Number)
    {
        $this->Number = $Number;
        return $this;
    }

    /**
     * @var mixed
     */
    protected $Floor;

    /**
     * Getter for Floor
     * @return mixed
     */
    public function getFloor()
    {
        return $this->Floor;
    }

    /**
     * Setter for Floor
     * @param mixed Floor
     * @return self
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
     */
    public function getApartment()
    {
        return $this->Apartment;
    }

    /**
     * Setter for Apartment
     * @param string Apartment
     * @return self
     */
    public function setApartment($Apartment)
    {
        $this->Apartment = $Apartment;
        return $this;
    }

    /**
     * @var string
     */
    protected $Tower;

    /**
     * Getter for Tower
     * @return string
     */
    public function getTower()
    {
        return $this->Tower;
    }

    /**
     * Setter for Tower
     * @param string Tower
     * @return self
     */
    public function setTower($Tower)
    {
        $this->Tower = $Tower;
        return $this;
    }

    /**
     * @var string
     */
    protected $Block;

    /**
     * Getter for Block
     * @return string
     */
    public function getBlock()
    {
        return $this->Block;
    }

    /**
     * Setter for Block
     * @param string Block
     * @return self
     */
    public function setBlock($Block)
    {
        $this->Block = $Block;
        return $this;
    }

    /**
     * @var string
     */
    protected $City;

    /**
     * Getter for City
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Setter for City
     * @param string City
     * @return self
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
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * Setter for PostalCode
     * @param string PostalCode
     * @return self
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
     */
    public function getProvinceCode()
    {
        return $this->ProvinceCode;
    }

    /**
     * Setter for ProvinceCode
     * @param string ProvinceCode
     * @return self
     */
    public function setProvinceCode($ProvinceCode)
    {
        $this->ProvinceCode = $ProvinceCode;
        return $this;
    }

    /**
     * @var string
     */
    protected $Email;

    /**
     * Getter for Email
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Setter for Email
     * @param string Email
     * @return self
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @var string
     */
    protected $WebPage;

    /**
     * Getter for WebPage
     * @return string
     */
    public function getWebPage()
    {
        return $this->WebPage;
    }

    /**
     * Setter for WebPage
     * @param string WebPage
     * @return self
     */
    public function setWebPage($WebPage)
    {
        $this->WebPage = $WebPage;
        return $this;
    }

    /**
     * @var string
     */
    protected $Contact;

    /**
     * Getter for Contact
     * @return string
     */
    public function getContact()
    {
        return $this->Contact;
    }

    /**
     * Setter for Contact
     * @param string Contact
     * @return self
     */
    public function setContact($Contact)
    {
        $this->Contact = $Contact;
        return $this;
    }

    /**
     * @var string
     */
    protected $PhoneNumber1;

    /**
     * Getter for PhoneNumber1
     * @return string
     */
    public function getPhoneNumber1()
    {
        return $this->PhoneNumber1;
    }

    /**
     * Setter for PhoneNumber1
     * @param string PhoneNumber1
     * @return self
     */
    public function setPhoneNumber1($PhoneNumber1)
    {
        $this->PhoneNumber1 = $PhoneNumber1;
        return $this;
    }

    /**
     * @var string
     */
    protected $PhoneNumber2;

    /**
     * Getter for PhoneNumber2
     * @return string
     */
    public function getPhoneNumber2()
    {
        return $this->PhoneNumber2;
    }

    /**
     * Setter for PhoneNumber2
     * @param string PhoneNumber2
     * @return self
     */
    public function setPhoneNumber2($PhoneNumber2)
    {
        $this->PhoneNumber2 = $PhoneNumber2;
        return $this;
    }

}
