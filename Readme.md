# Laravel Infobip 

This a minimal infobip API package for laravel.

## Installation

`composer require digitonic/laravel-infobip`

## Usage

Before you start you should have in your env file the following ENVS.

```

INFOBIP_DOMAIN=https://yourdomain.api.infobip.com
INFOBIP_KEY=secret

```

This package supports 2 endpoint so far with a basic request validation.

#### SendMessages

`Infobip::sendMessages($request)`

This method accepts a collection with messages to be sent example can be found in [Sms](tests/sms.json) More details can be found [here](https://www.infobip.com/docs/api/channels/sms) on the infobip API page


#### SendMessages

`Infobip::numbersLookup($request)`

This method accepts a collection with messages to be looked up example can be found in [Sms](tests/lookup.json) More details can be found [here](https://www.infobip.com/docs/api/platform-connectivity/number-lookup/number-context-lookup-async) on the infobip API page



### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


### Security

If you discover any security related issues, please email steven@digitonic.co.uk instead of using the issue tracker.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

