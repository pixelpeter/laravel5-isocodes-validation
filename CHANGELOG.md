# Changelog

All Notable changes for the Laravel 5 IsoCodes Validation  will be documented in this file

## 3.0.0
- Fix issue #8: missing function replaceVat
- Laravel 5.8
- Upgrade to phpunit 7.5.x
- Add php 7.3 to travis-ci
- Add support for arrays with dot notations to all validation methods
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
- Refactor: fix scrutinizer issues  
- Refactor: add (external) fixtures to tests to reduce number of lines
- Refactor: remove unused function params

## 2.0.0
- Laravel 5.5 compatibility with Auto-Discovery
- Require php 7.0+
- Upgrade to phpunit 6.5.x
- Add php 7.2 to travis-ci

## 1.2.0
Added support for following validation rules
- BSN
- GDTI
- GLN
- GRAI
- GSRN
- ISMN
- ISWC
- UDI
- UPCA

## 1.1.0
- Laravel 5.4 compatibility 

## 1.0.0
- Stable first release
