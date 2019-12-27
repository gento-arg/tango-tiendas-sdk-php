<?php

namespace TangoTiendas\Model;

class Status extends AbstractModel
{
    /**
     * @var int
     */
    protected $Status;

    /**
     * Getter for Status
     * @return int
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Setter for Status
     * @param int Status
     * @return self
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * @var string
     */
    protected $Message;

    /**
     * Getter for Message
     * @return string
     */
    public function getMessage()
    {
        return $this->Message;
    }

    /**
     * Setter for Message
     * @param string Message
     * @return self
     */
    public function setMessage($Message)
    {
        $this->Message = $Message;
        return $this;
    }

    /**
     * @var mixed
     */
    protected $Data;

    /**
     * Getter for Data
     * @return mixed
     */
    public function getData()
    {
        return $this->Data;
    }

    /**
     * Setter for Data
     * @param mixed Data
     * @return self
     */
    public function setData($Data)
    {
        $this->Data = $Data;
        return $this;
    }

    /**
     * @var bool
     */
    protected $isOk;

    /**
     * Getter for isOk
     * @return bool
     */
    public function isOk()
    {
        return $this->isOk;
    }

    /**
     * Setter for isOk
     * @param bool isOk
     * @return self
     */
    public function setisOk($isOk)
    {
        $this->isOk = $isOk;
        return $this;
    }
}
