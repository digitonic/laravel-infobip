<?php

namespace Digitonic\Infobip\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed getClient()
 * @method static Response sendMessages(Collection $request)
 * @method static Response numbersLookup(Collection $request)
 */
final class Infobip extends Facade
{
    /**
     * @return class-string
     */
    protected static function getFacadeAccessor(): string
    {
        return \Digitonic\Infobip\Contracts\InfobipApi::class;
    }
}
