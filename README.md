# Laravel 5 IsoCodes Validation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pixelpeter/laravel5-isocodes-validation.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel5-isocodes-validation)
[![Software License](https://img.shields.io/badge/license-GPL-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis Build](https://img.shields.io/travis/pixelpeter/laravel5-isocodes-validation/master.svg?style=flat-square)](https://travis-ci.org/pixelpeter/laravel5-isocodes-validation)
[![Scrutinizer Quality](https://img.shields.io/scrutinizer/g/pixelpeter/laravel5-isocodes-validation.svg?style=flat-square)](https://scrutinizer-ci.com/g/pixelpeter/laravel5-isocodes-validation)
[![Scrutinizer Build](https://img.shields.io/scrutinizer/build/g/pixelpeter/laravel5-isocodes-validation.svg?style=flat-square)](https://scrutinizer-ci.com/g/pixelpeter/laravel5-isocodes-validation)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/32635b20-a120-46de-a1af-4ce876bdcfbe.svg?style=flat-square)](https://insight.sensiolabs.com/projects/32635b20-a120-46de-a1af-4ce876bdcfbe)
[![Total Downloads](https://img.shields.io/packagist/dt/pixelpeter/laravel5-isocodes-validation.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel5-isocodes-validation)
[![Dependency Status](https://www.versioneye.com/user/projects/5741a445ce8d0e004505ea3c/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5741a445ce8d0e004505ea3c)
[![Coverage Status](https://coveralls.io/repos/github/pixelpeter/laravel5-isocodes-validation/badge.svg?branch=master)](https://coveralls.io/github/pixelpeter/laravel5-isocodes-validation?branch=master)

A simple Laravel 5 wrapper for the [IsoCodes Validation library](https://github.com/ronanguilloux/IsoCodes) from ronanguilloux.

## Installation

### Step 1: Install Through Composer
``` bash
composer require pixelpeter/laravel5-isocodes-validation
```

### Step 2: Add the Service Provider (not needed with v2.x because of auto discovery)
Add the service provider in `app/config/app.php`
```php
'provider' => [
    ...
    Pixelpeter\IsoCodesValidation\IsoCodesValidationServiceProvider::class,
    ...
];
```

## Usage

### Simple examples

```php
// Checking out your e-commerce shopping cart?
$payload = [
    'creditcard' => '12345679123456'
];
$rules = [
    'creditcard' => 'creditcard'
];

$validator = Validator::make($payload, $rules);
```

### Examples with parameter
Some rules need a reference to be validated against (e.g. `country` for `zipcode`).

Just pass the name of the field holding the reference to the rule.

```php
// Sending letters to the Labrador Islands ?
$payload = [
    'zipcode' => 'A0A 1A0',
    'country' => 'CA'
];
$rules = [
    'zipcode' => 'zipcode:country'
];

$validator = Validator::make($payload, $rules);

// Publishing books?
$payload = [
    'isbn' => '2-2110-4199-X',
    'isbntype' => 13
];
$rules = [
    'zipcode' => 'isbn:isbntype'
];

$validator = Validator::make($payload, $rules);
```

### Validation error messages
Error messages can contain the name and value of the field and the value of the reference
```php
$payload = [
    'phonenumber' => 'invalid',
    'country' => 'GB'
];
$rules = [
    'phonenumber' => 'phonenumber:country'
];

$validator = Validator::make($payload, $rules);

print $validator->errors()->first(); // The value "invalid" of phonenumber is not valid for "GB".
```

### More Examples
Refer to [IsoCodes Validation library](https://github.com/ronanguilloux/IsoCodes) for more examples and documentation.

## Testing
Run the tests with:
```bash
vendor/bin/phpunit
```

## License

GNU General Public License v3.0 only. Please see [License File](LICENSE.md) for more information.
