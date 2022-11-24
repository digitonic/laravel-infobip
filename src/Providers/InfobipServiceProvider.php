<?php

namespace Digitonic\Infobip\Providers;

use Digitonic\Infobip\Contracts\InfobipApi;
use Digitonic\Infobip\Infobip;
use Illuminate\Support\ServiceProvider;
use Exception;

final class InfobipServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->publishes([
                             __DIR__.'/../../config/infobip.php' => config_path('infobip.php'),
                         ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/infobip.php',
            'infobip'
        );

        $this->app->singleton(InfobipApi::class, function () {
            $config = config('infobip');

            $this->catchInvalidConfig($config);

            return new Infobip($config);
        });
    }

    protected function catchInvalidConfig(array $config = null)
    {
        if (empty($config['domain'])) {
            throw new Exception('You must provide a valid Base URL to use Infobip API.');
        }
        if (empty($config['secret'])) {
            throw new Exception('You must provide a valid Secret to use Infobip API.');
        }
    }
}
