<?php

use TangoTiendas\Service\Orders;

class HeaderTest extends \PHPUnit\Framework\TestCase
{
    public function testAddHeader()
    {
        $service = new Orders();

        $this->assertEquals([], $service->getHeaders());

        $service->addHeader('HeaderTest', 123);
        $this->assertEquals(['HeaderTest' => 123], $service->getHeaders());

        $this->assertEquals(123, $service->getHeader('HeaderTest'));
    }
}
