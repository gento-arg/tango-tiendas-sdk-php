<?php

namespace TangoTiendas\Traits;

trait Header
{
    protected $headers = [];

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;

        return $this->headers;
    }

    /**
     * @param $key
     * @return string
     */
    public function getHeader($key)
    {
        return $this->headers[$key];
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
