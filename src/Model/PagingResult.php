<?php

namespace TangoTiendas\Model;

class PagingResult extends AbstractModel
{
    /**
     * @var int
     */
    protected $pageNumber;

    /**
     * Getter for pageNumber
     * @return int
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * Setter for pageNumber
     * @param int pageNumber
     * @return self
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    /**
     * @var int
     */
    protected $pageSize;

    /**
     * Getter for pageSize
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * Setter for pageSize
     * @param int pageSize
     * @return self
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @var bool
     */
    protected $moreData;

    /**
     * Getter for moreData
     * @return bool
     */
    public function isMoreData()
    {
        return $this->moreData;
    }

    /**
     * Setter for moreData
     * @param bool moreData
     * @return self
     */
    public function setMoreData($moreData)
    {
        $this->moreData = $moreData;
        return $this;
    }

    /**
     * @var object[]
     */
    protected $data = [];

    /**
     * Getter for data
     * @return object[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Setter for data
     * @param object[] data
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function loadData($data)
    {
        $paging = $data['Paging'];
        $data = $data['Data'] ?? [];

        array_walk($paging, function ($value, $ind) {
            $method = 'set' . $ind;
            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $value);
            }
        });

        $this->setData($data);
        return $this;
    }

    public function parseData($className)
    {
        $dataParsed = [];
        $data = $this->getData();
        
        array_walk($data, function ($value) use ($className, &$dataParsed) {
            $instance = new $className();

            if (method_exists($instance, 'loadData')) {
                call_user_func([$instance, 'loadData'], $value);
            }
            $dataParsed[] = $instance;
        });

        $this->setData($dataParsed);

        return $this;
    }

}
