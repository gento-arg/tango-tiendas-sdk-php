<?php

use TangoTiendas\Exceptions\ClientException;

class ClientExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testResponse()
    {
        $exception = new ClientException();

        $this->assertFalse($exception->hasResponse());

        $exception->setResponse([]);

        $this->assertTrue($exception->hasResponse());
        $this->assertEquals([], $exception->getResponse());
    }
}
