<?php

namespace TangoTiendas\Model;

class Warehouse extends AbstractModel
{
    /**
     * @var string
     */
    protected $Code;

    /**
     * Getter for Code
     * @return string
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * Setter for Code
     * @param string Code
     * @return self
     */
    public function setCode($Code)
    {
        $this->Code = $Code;
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

}
