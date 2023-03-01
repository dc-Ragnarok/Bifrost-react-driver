<?php

declare(strict_types=1);

namespace Tests\Ragnarok\Bifrost\Drivers\React;

use Ragnarok\Bifrost\DriverInterface;
use Ragnarok\Bifrost\Drivers\React\Driver;
use Ragnarok\Bifrost\TestCase\DriverInterfaceTestCase;

class DriverTest extends DriverInterfaceTestCase
{
    protected function getDriver(): DriverInterface
    {
        return new Driver();
    }
}
