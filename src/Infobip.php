<?php

namespace Digitonic\Infobip;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Infobip implements Contracts\InfobipApi
{
    private string $domain;

    private string $prefix;

    private string $secret;

    public function __construct(array $config)
    {
        $this->domain = $config['domain'];
        $this->prefix = $config['prefix'];
        $this->secret = $config['secret'];
    }

    public function getClient(): PendingRequest
    {
        return Http::baseUrl($this->domain)
                   ->withHeaders([
                                     'Authorization' => $this->prefix
                                                        . ' '
                                                        . $this->secret,
                                 ]);
    }

    public function sendMessages(Collection $request): Response
    {
        $this->validateRequest($request);

        return $this->getClient()->post('/sms/2/text/advanced', $request);
    }

    public function numbersLookup(Collection $request): Response
    {
        return $this->getClient()->post('/sms/2/text/advanced', $request);
    }

    private function validateRequest(Collection $request)
    {
        if(!$request->has('messages') || empty($request->get('messages'))){
            throw new Exception('messages key is required in the payload.');
        }
        $messages = collect($request->get('messages'));

        $message = collect($messages->random());

        $requiredFields = ['callbackData','destinations','from','notifyContentType','notifyUrl','text','validityPeriod'];
        foreach ($requiredFields as $requiredField) {
            if(!$message->has($requiredField) || empty($message->get($requiredField))) {
                throw new Exception('One item in the messages array has key '. $requiredField .' missing in the payload.');
            }
        }

    }
}
