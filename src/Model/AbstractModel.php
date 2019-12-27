<?php

namespace TangoTiendas\Model;

abstract class AbstractModel implements \JsonSerializable
{
    public function jsonSerialize()
    {
        $objVars = get_object_vars($this);
        $return = [];
        foreach ($objVars as $k => $v) {
            if (is_iterable($v)) {
                foreach ($v as $vi => $vv) {
                    $this->_extractData($vv, $vi, $return[$k]);
                }
                continue;
            }

            $this->_extractData($v, $k, $return);
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

        $data[$ind] = (string) $value;
    }
}
