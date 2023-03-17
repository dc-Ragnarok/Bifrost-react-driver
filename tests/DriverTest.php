<?php

declare(strict_types=1);

namespace Tests\Ragnarok\Bifrost\Drivers\React;

use Ragnarok\Bifrost\DriverInterface;
use Ragnarok\Bifrost\Drivers\React\Driver;
use Tests\Ragnarok\Bifrost\Driver\DriverInterfaceTestCase;

class DriverTest extends DriverInterfaceTestCase
{
    protected function getDriver(): DriverInterface
    {
        return new Driver();
    }
}
