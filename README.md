# Laravel 5 IsoCodes Validation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pixelpeter/laravel5-isocodes-validation.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel5-isocodes-validation)
[![Total Downloads](https://img.shields.io/packagist/dt/pixelpeter/laravel5-isocodes-validation.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel5-isocodes-validation)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Coverage Status](https://coveralls.io/repos/github/pixelpeter/laravel5-isocodes-validation/badge.svg?branch=master)](https://coveralls.io/github/pixelpeter/laravel5-isocodes-validation?branch=master)
[![Tests](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/run-tests.yml)
[![Fix PHP code style issues](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/fix-php-code-style-issues.yml)
[![PHPStan](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/phpstan.yml/badge.svg)](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/phpstan.yml)
[![dependabot-auto-merge](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/dependabot-auto-merge.yml/badge.svg)](https://github.com/pixelpeter/laravel5-isocodes-validation/actions/workflows/dependabot-auto-merge.yml)

A simple Laravel 5 wrapper for the [IsoCodes Validation library](https://github.com/ronanguilloux/IsoCodes) from ronanguilloux.

For a **Laravel 8** compatible version please use https://github.com/pixelpeter/laravel-isocodes-validation

## Installation

### Step 1: Install Through Composer
``` bash
composer require pixelpeter/laravel5-isocodes-validation
```

### Step 2: Add the Service Provider
*(not needed starting with v2.x because of auto discovery)*

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

### Examples with reference parameter
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

### Example with arrays and dot notation
*(added in v3.x)*

As suggested by @otr-tomek I've added support for all validation methods using arrays in dot notation as an input.

```php
$payload = [
    'data' => [
        [
            'country' => 'DE',
            'zipcode' => 63741
        ],
        [
            'country' => 'AT',
            'zipcode' => 1180
        ]
  ] 
];

$validator = Validator::make($payload, [
    'data.*.zipcode' => 'zipcode:data.*.country'
]);
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
