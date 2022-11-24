<?php

use Digitonic\Infobip\Facades\Infobip;
use Illuminate\Support\Facades\Http;

test('required secret config', function () {

    config(['infobip.secret' => null]);

    Infobip::getClient();

})->throws(Exception::class, 'You must provide a valid Secret to use Infobip API.');

test('required domain config', function () {

    config(['infobip.domain' => null]);

    Infobip::getClient();

})->throws(Exception::class, 'You must provide a valid Base URL to use Infobip API.');


test('required messages in the payload', function () {

    Infobip::sendMessages(collect());

})->throws(Exception::class, 'messages key is required in the payload.');

test('required body key in message the payload', function () {

    $request = collect(json_decode(file_get_contents(__DIR__.'/files/sms-no-text.json'), true));

    Infobip::sendMessages($request);

})->throws(Exception::class, 'One item in the messages array has key text missing in the payload.');

test('send request if valid payload', function () {

    $domain = config('infobip.domain');
    Http::fake(["${domain}/*" => Http::response(['foo' => 'bar'], 200, ['Headers'])]);

    $request = collect(json_decode(file_get_contents(__DIR__.'/files/sms.json'), true));

    $response = Infobip::sendMessages($request);

    Http::assertSentCount(1);
});

