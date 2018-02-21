<?php

namespace PhpMiddlewareTest\PhpDebugBar;

use PhpMiddleware\PhpDebugBar\PhpDebugBarMiddleware;
use PhpMiddleware\PhpDebugBar\PhpDebugBarMiddlewareFactory;
use PHPUnit\Framework\TestCase;

/**
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class PhpDebugBarMiddlewareFactoryTest extends TestCase
{
    public function testFactory()
    {
        $factory = new PhpDebugBarMiddlewareFactory();

        $result = $factory();

        $this->assertInstanceOf(PhpDebugBarMiddleware::class, $result);
    }
}
