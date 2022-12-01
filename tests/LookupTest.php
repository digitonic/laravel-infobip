<?php

use Digitonic\Infobip\Facades\Infobip;
use Illuminate\Support\Facades\Http;



test('required to in numbersLookup payload', function () {

    Infobip::numbersLookup(collect());

})->throws(Exception::class, 'to key is required in the payload.');

test('required notifyUrl in numbersLookup payload', function () {

    Infobip::numbersLookup(collect(['to' => '44555667777']));

})->throws(Exception::class, 'notifyUrl key is required in the payload.');



test('send request if valid payload', function () {

    $domain = config('infobip.domain');
    Http::fake(["${domain}/*" => Http::response(['foo' => 'bar'], 200, ['Headers'])]);

    $request = collect(json_decode(file_get_contents(__DIR__.'/files/lookup.json'), true));

    Infobip::numbersLookup($request);

    Http::assertSentCount(1);
});



test('do not send request if invalid payload numbersLookupQuery', function () {

    $domain = config('infobip.domain');
    Http::fake(["${domain}/*" => Http::response(['foo' => 'bar'], 200, ['Headers'])]);

    $request = collect(json_decode(file_get_contents(__DIR__.'/files/lookup.json'), true));

    Infobip::numbersLookupQuery($request);

    Http::assertSentCount(1);

})->throws(Exception::class, 'notifyUrl key is NOT allowed in the payload.');



test('send request if valid payload numbersLookupQuery', function () {

    $domain = config('infobip.domain');
    Http::fake(["${domain}/*" => Http::response(['foo' => 'bar'], 200, ['Headers'])]);

    $request = collect(json_decode(file_get_contents(__DIR__.'/files/lookup-query.json'), true));

    Infobip::numbersLookupQuery($request);

    Http::assertSentCount(1);

});
