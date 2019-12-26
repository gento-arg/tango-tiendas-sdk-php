<?php

namespace TangoTiendas\Model;

use TangoTiendas\Exceptions\ModelException;

class Customer extends AbstractModel
{
    /**
     * Identificador del cliente.
     * @var int
     */
    protected $CustomerId;

    /**
     * Getter for CustomerId
     * @return int
     * @codeCoverageIgnore
     */
    public function getCustomerId()
    {
        return $this->CustomerId;
    }

    /**
     * Setter for CustomerId
     * @param int CustomerId
     * @return self
     * @throw ModelException
     */
    public function setCustomerId(int $CustomerId)
    {
        if ($CustomerId <= 0) {
            throw new ModelException('CustomerId must be greater than 0');
        }

        if ($CustomerId > 9999999999) {
            throw new ModelException('CustomerId must be lower than 9999999999');
        }

        $this->CustomerId = $CustomerId;
        return $this;
    }

    /**
     * Código del tipo de documento.
     * @var int
     */
    protected $DocumentType;

    /**
     * Getter for DocumentType
     * @return int
     * @codeCoverageIgnore
     */
    public function getDocumentType()
    {
        return $this->DocumentType;
    }

    /**
     * Setter for DocumentType
     * @param int DocumentType
     * @return self
     * @codeCoverageIgnore
     */
    public function setDocumentType($DocumentType)
    {
        $this->DocumentType = $DocumentType;
        return $this;
    }

    /**
     * Número de documento sin símbolos ni puntuaciones.
     * @var string
     */
    protected $DocumentNumber;

    /**
     * Getter for DocumentNumber
     * @return string
     * @codeCoverageIgnore
     */
    public function getDocumentNumber()
    {
        return $this->DocumentNumber;
    }

    /**
     * Setter for DocumentNumber
     * @param string DocumentNumber
     * @return self
     * @codeCoverageIgnore
     */
    public function setDocumentNumber($DocumentNumber)
    {
        $this->DocumentNumber = $DocumentNumber;
        return $this;
    }

    /**
     * @var string
     */
    protected $User;

    /**
     * Getter for User
     * @return string
     * @codeCoverageIgnore
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Setter for User
     * @param string User
     * @return self
     * @codeCoverageIgnore
     */
    public function setUser($User)
    {
        $this->User = $User;
        return $this;
    }

    /**
     * Razón social del cliente a nombre de quién se emitirá la factura.
     * @var string
     */
    protected $BussinessName;

    /**
     * Getter for BussinessName
     * @return string
     * @codeCoverageIgnore
     */
    public function getBussinessName()
    {
        return $this->BussinessName;
    }

    /**
     * Setter for BussinessName
     * @param string BussinessName
     * @return self
     * @codeCoverageIgnore
     */
    public function setBussinessName($BussinessName)
    {
        $this->BussinessName = $BussinessName;
        return $this;
    }

    /**
     * Nombre del cliente. Se utilizará para emitir la factura si mediante el 
     * C.U.I.L / C.U.I.T. / D.N.I. no se encontraron datos en la A.F.I.P.
     * @var string
     */
    protected $FirstName;

    /**
     * Getter for FirstName
     * @return string
     * @codeCoverageIgnore
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * Setter for FirstName
     * @param string FirstName
     * @return self
     * @codeCoverageIgnore
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    /**
     * Apellido del cliente. Se utilizará para emitir la factura si mediante el 
     * C.U.I.L / C.U.I.T. / D.N.I. no se encontraron datos en la A.F.I.P.
     * @var string
     */
    protected $LastName;

    /**
     * Getter for LastName
     * @return string
     * @codeCoverageIgnore
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * Setter for LastName
     * @param string LastName
     * @return self
     * @codeCoverageIgnore
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        return $this;
    }

    /**
     * Calle del domicilio del cliente.
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
     * Altura del domicilio del cliente.
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
     * Piso del domicilio del cliente.
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
     * Departamento del domicilio del cliente.
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
     * Localidad del domicilio del cliente.
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
     * Correo electrónico del cliente.
     * @var string
     */
    protected $Email;

    /**
     * Getter for Email
     * @return string
     * @codeCoverageIgnore
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Setter for Email
     * @param string Email
     * @return self
     * @codeCoverageIgnore
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * Comentarios realizados por el cliente.
     * @var string
     */
    protected $Comments;

    /**
     * Getter for Comments
     * @return string
     * @codeCoverageIgnore
     */
    public function getComments()
    {
        return $this->Comments;
    }

    /**
     * Setter for Comments
     * @param string Comments
     * @return self
     * @codeCoverageIgnore
     */
    public function setComments($Comments)
    {
        $this->Comments = $Comments;
        return $this;
    }

    /**
     * Número de celular del cliente.
     * @var string
     */
    protected $MobilePhoneNumber;

    /**
     * Getter for MobilePhoneNumber
     * @return string
     * @codeCoverageIgnore
     */
    public function getMobilePhoneNumber()
    {
        return $this->MobilePhoneNumber;
    }

    /**
     * Setter for MobilePhoneNumber
     * @param string MobilePhoneNumber
     * @return self
     * @codeCoverageIgnore
     */
    public function setMobilePhoneNumber($MobilePhoneNumber)
    {
        $this->MobilePhoneNumber = $MobilePhoneNumber;
        return $this;
    }

    /**
     * Dirección comercial del cliente.
     * @var string
     */
    protected $BusinessAdress;

    /**
     * Getter for BusinessAdress
     * @return string
     * @codeCoverageIgnore
     */
    public function getBusinessAdress()
    {
        return $this->BusinessAdress;
    }

    /**
     * Setter for BusinessAdress
     * @param string BusinessAdress
     * @return self
     * @codeCoverageIgnore
     */
    public function setBusinessAdress($BusinessAdress)
    {
        $this->BusinessAdress = $BusinessAdress;
        return $this;
    }

    /**
     * Código A.F.I.P. con la cual se identifica la provincia del cliente.
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
     * Código postal del domicilio del cliente
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
     * Código de Categoría de I.V.A. del cliente
     * @var string
     */
    protected $IvaCategoryCode;

    /**
     * Getter for IvaCategoryCode
     * @return string
     * @codeCoverageIgnore
     */
    public function getIvaCategoryCode()
    {
        return $this->IvaCategoryCode;
    }

    /**
     * Setter for IvaCategoryCode
     * @param string IvaCategoryCode
     * @return self
     * @codeCoverageIgnore
     */
    public function setIvaCategoryCode($IvaCategoryCode)
    {
        $this->IvaCategoryCode = $IvaCategoryCode;
        return $this;
    }
}
