# omnipay-ideallite

iDeal Payment adapter for [Omnipay](https://github.com/thephpleague/omnipay). Use with caution!


### Installation

Requires PHP 5.4 or later. It is installable and autoloadable via Composer as
[genkgo/omnipay-ideallite](https://packagist.org/packages/genkgo/omnipay-ideallite).

## Supported banks

* Rabobank iDeallite (deprecated)
* ING Basic

## Use with caution

Do not use this library for your webshop. The payment validation methods by iDeal lite, easy and basic are not considered
safe. You might use it for donations. This library can also help you upgrade clients that are still using iDeal lite, basic
and easy payments.