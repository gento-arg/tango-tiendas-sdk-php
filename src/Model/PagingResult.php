<?php

namespace TangoTiendas\Model;

class PagingResult extends AbstractModel
{

    /**
     * @var int
     */
    protected $PageNumber;

    /**
     * Getter for PageNumber
     * @return int
     */
    public function getPageNumber()
    {
        return $this->PageNumber;
    }

    /**
     * Setter for PageNumber
     * @param int PageNumber
     * @return self
     */
    public function setPageNumber($PageNumber)
    {
        $this->PageNumber = $PageNumber;
        return $this;
    }

    /**
     * @var int
     */
    protected $PageSize;

    /**
     * Getter for PageSize
     * @return int
     */
    public function getPageSize()
    {
        return $this->PageSize;
    }

    /**
     * Setter for PageSize
     * @param int PageSize
     * @return self
     */
    public function setPageSize($PageSize)
    {
        $this->PageSize = $PageSize;
        return $this;
    }

    /**
     * @var bool
     */
    protected $MoreData;

    /**
     * Getter for MoreData
     * @return bool
     */
    public function hasMoreData()
    {
        return $this->MoreData;
    }

    /**
     * Setter for MoreData
     * @param bool MoreData
     * @return self
     */
    public function setMoreData($MoreData)
    {
        $this->MoreData = $MoreData;
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

    protected $_dataClass;

    public function __construct($dataClass)
    {
        $this->_dataClass = $dataClass;
    }

    public function loadData($data)
    {
        parent::loadData($data['Paging']);
        $items = array_map(function ($value) {
            $class = new $this->_dataClass();
            $class->loadData($value);
            return $class;
        }, $data['Data']);
        $this->setData($items);
        return $this;
    }
}
