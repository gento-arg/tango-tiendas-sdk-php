<?php

namespace TangoTiendas\Service;

use TangoTiendas\ClientList;
use TangoTiendas\Model\Measure;

class Measures extends ClientList
{
    const ENDPOINT = 'Aperture/Measure';

    protected $_dataClass = Measure::class;

}
