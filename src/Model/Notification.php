<?php

namespace TangoTiendas\Model;

class Notification extends AbstractModel
{
    protected $topic = '';

    /**
     * Getter for topic
     * @codeCoverageIgnore
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Setter for topic
     * @codeCoverageIgnore
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    protected $resource = '';
    
    /**
     * Getter for resource
     * @codeCoverageIgnore
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Setter for resource
     * @codeCoverageIgnore
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }
}
