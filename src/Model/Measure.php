<?php

namespace TangoTiendas\Model;

class Measure extends AbstractModel
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
     * @var string
     */
    protected $Initials;
    
    /**
     * Getter for Initials
     * @return string
     */
    public function getInitials()
    {
        return $this->Initials;
    }
    
    /**
     * Setter for Initials
     * @param string Initials
     * @return self
     */
    public function setInitials($Initials)
    {
        $this->Initials = $Initials;
        return $this;
    }

}
