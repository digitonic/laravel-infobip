<?php

namespace Digitonic\Infobip\Contracts;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Http\Client\Response;

interface InfobipApi
{
    public function getClient(): PendingRequest;
    public function sendMessages(Collection $request) : Response;
    public function numbersLookup(Collection $request) : Response;
}
