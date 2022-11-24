<?php

namespace Digitonic\Infobip\Tests;

use Digitonic\Infobip\Providers\InfobipServiceProvider;
use Orchestra\Testbench\TestCase;

class InfobipTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            InfobipServiceProvider::class,
        ];
    }
}
