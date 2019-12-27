<?php

namespace TangoTiendas\Model;

abstract class AbstractModel implements \JsonSerializable
{
    public function jsonSerialize()
    {
        $objVars = get_object_vars($this);
        $return = [];
        foreach ($objVars as $ind => $value) {
            if (is_iterable($value)) {
                foreach ($value as $vi => $vv) {
                    $this->_extractData($vv, $vi, $return[$ind]);
                }
                continue;
            }

            $this->_extractData($value, $ind, $return);
        }

        return $return;
    }

    protected function _extractData($value, $ind, &$data)
    {
        if ($value === null) {
            return;
        }

        if ($value instanceof \JsonSerializable) {
            $data[$ind] = $value->jsonSerialize();
            return;
        }

        if ($value instanceof \DateTime) {
            $data[$ind] = $value->format('Y-m-d\TH:i:s');
            return;
        }

        $data[$ind] = $value;
    }

    public function loadData($data)
    {
        array_walk($data, function ($value, $ind) {
            $method = 'set' . $ind;
            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $value);
            }
        });
        return $this;
    }
}
