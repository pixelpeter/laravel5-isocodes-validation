<?php

namespace Pixelpeter\IsoCodesValidation;

use Validator;

class IsoCodesValidatorTest extends TestCase
{

    /**
     * Test the correct error messages ist returned
     * with all pace holder replaced
     *
     * @test
     * @dataProvider invalidDataProvider
     */
    public function validator_returns_correct_error_message($payload, $rules, $expected)
    {
        $validator = Validator::make($payload, $rules);

        $this->assertEquals($expected, $validator->errors()->first());
    }

    /**
     * Test each validator returns true for valid data
     *
     * @test
     * @dataProvider validDataProvider
     * @param $payload
     * @param $rules
     */
    public function it_validates_correctly($field, $value)
    {
        $validator = Validator::make([$field => $value], [$field => $field]);

        $this->assertTrue($validator->passes());
    }

    /**
     * Test each validator with a reference value returns true for valid data
     *
     * @test
     * @dataProvider validDataWithReferencesProvider
     * @param $payload
     * @param $rules
     */
    public function it_validates_correctly_with_references($field, $value, $referenceField='', $referenceValue='')
    {
        $payload = [
            $field => $value,
            $referenceField => $referenceValue
        ];

        $rules = [
            $field => "{$field}:{$referenceField}"
        ];

        $validator = Validator::make($payload, $rules);

        $this->assertTrue($validator->passes());
    }

    /**
     * DataProvider for rules with references
     *
     * @return array
     */
    public function validDataWithReferencesProvider()
    {
        return [
            ['isbn', '978-88-8183-718-2', 'type', 13],
            ['organisme_type12_norme_b2', '76031208', 'clef', 2],
            ['phonenumber', '+1-650-798-2800', 'country', 'US'],
            ['zipcode', '1234AA', 'country', 'NL']
        ];
    }

    /**
     * DataProvider for simple rules
     *
     * @return array
     */
    public function validDataProvider()
    {
        return [
            ['bban', '15459450000411700920U62'],
            ['bsn', '075278431'],
            ['cif', 'N0032484H'],
            ['creditcard', '4111111111111111'],
            ['ean8', '90311017'],
            ['ean13', '4719512002889'],
            ['gdti', '4719512002889 1234567890 123456'],
            ['gln', '0614141000012'],
            ['grai', '04719512002889 1234567890 12345A'],
            ['gsrn', '735005385000000011'],
            ['gtin8', '12345670'],
            ['gtin12', '1-23456-78999-9'],
            ['gtin13', '4006381333931'],
            ['gtin14', '12345678901231'],
            ['iban', 'AL86751639367318444714198669'],
            ['insee', '253012B073004'],
            ['ipaddress', '73.194.66.94'],
            ['isin', 'US0378331005'],
            ['ismn', '979-0-2600-0043-8'],
            ['iswc', 'T-000.000.001-0'],
            ['mac', '01-2d-4c-ef-89-59'],
            ['nif', '04381012H'],
            ['sedol', 'B0YBKJ7'],
            ['siren', 523311082],
            ['siret', 33493272000017],
            ['sscc', '340123450000000000'],
            ['ssn', '651-01-3431'],
            ['structured_communication', '123456789002'],
            ['swift_bic', 'BCEELULL'],
            ['udi', '07610221010301'],
            ['uknin', 'EH123456A'],
            ['upca', '1-23456-78999-9'],
            ['vat', 'LV12345678901'],
        ];
    }

    /**
     * DataProvider for failing tests
     *
     * @return array
     */
    public function invalidDataProvider()
    {
        return [
            // BBAN
            [
                'payload' => [
                    'bban' => 'invalid'
                ],
                'rules' => [
                    'bban' => 'bban'
                ],
                'message' => 'The value "invalid" of bban is not a valid BBAN code.'
            ],
            // BSN
            [
                'payload' => [
                    'bsn' => 'invalid'
                ],
                'rules' => [
                    'bsn' => 'bsn'
                ],
                'message' => 'The value "invalid" of bsn is not a valid BSN.'
            ],
            // CIF
            [
                'payload' => [
                    'cif' => 'invalid'
                ],
                'rules' => [
                    'cif' => 'cif'
                ],
                'message' => 'The value "invalid" of cif is not a valid CIF code.'
            ],
            // CREDITCARD
            [
                'payload' => [
                    'creditcard' => 'invalid'
                ],
                'rules' => [
                    'creditcard' => 'creditcard'
                ],
                'message' => 'The value "invalid" of creditcard is not a valid credit card number.'
            ],
            // EAN8
            [
                'payload' => [
                    'ean8' => 'invalid'
                ],
                'rules' => [
                    'ean8' => 'ean8'
                ],
                'message' => 'The value "invalid" of ean8 is not a valid EAN8 code.'
            ],
            // EAN13
            [
                'payload' => [
                    'ean13' => 'invalid'
                ],
                'rules' => [
                    'ean13' => 'ean13'
                ],
                'message' => 'The value "invalid" of ean13 is not a valid EAN13 code.'
            ],
            // GDTI
            [
                'payload' => [
                    'gdti' => 'invalid'
                ],
                'rules' => [
                    'gdti' => 'gdti'
                ],
                'message' => 'The value "invalid" of gdti is not a valid Global Document Type Identifier (GDTI).'
            ],
            // GLN
            [
                'payload' => [
                    'gln' => 'invalid'
                ],
                'rules' => [
                    'gln' => 'gln'
                ],
                'message' => 'The value "invalid" of gln is not a valid Global Location Number (GLN).'
            ],
            // GRAI
            [
                'payload' => [
                    'grai' => 'invalid'
                ],
                'rules' => [
                    'grai' => 'grai'
                ],
                'message' => 'The value "invalid" of grai is not a valid Global Returnable Asset Identifier.'
            ],
            // GSRN
            [
                'payload' => [
                    'gsrn' => 'invalid'
                ],
                'rules' => [
                    'gsrn' => 'gsrn'
                ],
                'message' => 'The value "invalid" of gsrn is not a valid Global Service Relation Number (GS1).'
            ],
            // GTIN8
            [
                'payload' => [
                    'gtin8' => 'invalid'
                ],
                'rules' => [
                    'gtin8' => 'gtin8'
                ],
                'message' => 'The value "invalid" of gtin8 is not a valid GTIN-8 code.'
            ],
            // GTIN12
            [
                'payload' => [
                    'gtin12' => 'invalid'
                ],
                'rules' => [
                    'gtin12' => 'gtin12'
                ],
                'message' => 'The value "invalid" of gtin12 is not a valid GTIN-12 code.'
            ],
            // GTIN13
            [
                'payload' => [
                    'gtin13' => 'invalid'
                ],
                'rules' => [
                    'gtin13' => 'gtin13'
                ],
                'message' => 'The value "invalid" of gtin13 is not a valid GTIN-13 code.'
            ],
            // GTIN14
            [
                'payload' => [
                    'gtin14' => 'invalid'
                ],
                'rules' => [
                    'gtin14' => 'gtin14'
                ],
                'message' => 'The value "invalid" of gtin14 is not a valid GTIN-14 code.'
            ],
            // IBAN
            [
                'payload' => [
                    'iban' => 'invalid'
                ],
                'rules' => [
                    'iban' => 'iban'
                ],
                'message' => 'The value "invalid" of iban is not a valid IBAN.'
            ],
            // INSEE
            [
                'payload' => [
                    'insee' => 'invalid'
                ],
                'rules' => [
                    'insee' => 'insee'
                ],
                'message' => 'The value "invalid" of insee is not a valid INSEE code.'
            ],
            // IP
            [
                'payload' => [
                    'ipaddress' => 'invalid'
                ],
                'rules' => [
                    'ipaddress' => 'ipaddress'
                ],
                'message' => 'The value "invalid" of ipaddress is not a valid ip address.'
            ],
            // ISBN
            [
                'payload' => [
                    'isbn' => 'invalid',
                    'type' => 13
                ],
                'rules' => [
                    'isbn' => 'isbn:type'
                ],
                'message' => 'The value "invalid" of isbn is not a valid ISBN.'
            ],
            // ISIN
            [
                'payload' => [
                    'isin' => 'invalid'
                ],
                'rules' => [
                    'isin' => 'isin'
                ],
                'message' => 'The value "invalid" of isin is not a valid ISIN.'
            ],
            // ISMN
            [
                'payload' => [
                    'ismn' => 'invalid'
                ],
                'rules' => [
                    'ismn' => 'ismn'
                ],
                'message' => 'The value "invalid" of ismn is not a valid International Standard Music Number or ISMN (ISO 10957)',
            ],
            // ISWC
            [
                'payload' => [
                    'iswc' => 'invalid'
                ],
                'rules' => [
                    'iswc' => 'iswc'
                ],
                'message' => 'The value "invalid" of iswc is not a valid International Standard Musical Work Code (ISWC)'
            ],
            // MAC
            [
                'payload' => [
                    'mac' => 'invalid'
                ],
                'rules' => [
                    'mac' => 'mac'
                ],
                'message' => 'The value "invalid" of mac is not a valid MAC address.'
            ],
            // NIF
            [
                'payload' => [
                    'nif' => 'invalid'
                ],
                'rules' => [
                    'nif' => 'nif'
                ],
                'message' => 'The value "invalid" of nif is not a valid NIF.'
            ],
            // ORGANISME_TYPE12_NORME_B2
            [
                'payload' => [
                    'organisme_type12_norme_b2' => 'invalid',
                    'clef' => 2
                ],
                'rules' => [
                    'organisme_type12_norme_b2' => 'organisme_type12_norme_b2:clef'
                ],
                'message' => 'The value "invalid" of organisme type12 norme b2 is not a valid Organisme Type12 Norme B2.'
            ],
            // PHONE NUMBER
            [
                'payload' => [
                    'country' => 'GB',
                    'phonenumber' => 'invalid'
                ],
                'rules' => [
                    'phonenumber' => 'phonenumber:country'
                ],
                'message' => 'The value "invalid" of phonenumber is not valid for "GB".'
            ],
            // SEDOL
            [
                'payload' => [
                    'sedol' => 'invalid'
                ],
                'rules' => [
                    'sedol' => 'sedol'
                ],
                'message' => 'The value "invalid" of sedol is not a valid SEDOL.'
            ],
            // SIREN
            [
                'payload' => [
                    'siren' => 'invalid'
                ],
                'rules' => [
                    'siren' => 'siren'
                ],
                'message' => 'The value "invalid" of siren is not a valid SIREN code.'
            ],
            // SIRET
            [
                'payload' => [
                    'siret' => 'invalid'
                ],
                'rules' => [
                    'siret' => 'siret'
                ],
                'message' => 'The value "invalid" of siret is not a valid SIRET code.'
            ],
            // SSCC
            [
                'payload' => [
                    'sscc' => 'invalid'
                ],
                'rules' => [
                    'sscc' => 'sscc'
                ],
                'message' => 'The value "invalid" of sscc is not a valid SSCC.'
            ],
            // SSN
            [
                'payload' => [
                    'ssn' => 'invalid'
                ],
                'rules' => [
                    'ssn' => 'ssn'
                ],
                'message' => 'The value "invalid" of ssn is not a valid SSN.'
            ],
            // STRUCTURED_COMMUNICATION
            [
                'payload' => [
                    'structured_communication' => 'invalid'
                ],
                'rules' => [
                    'structured_communication' => 'structured_communication'
                ],
                'message' => 'The value "invalid" of structured communication is not a valid structured communication code.'
            ],
            // SWIFT_BIC
            [
                'payload' => [
                    'swift_bic' => 'invalid'
                ],
                'rules' => [
                    'swift_bic' => 'swift_bic'
                ],
                'message' => 'The value "invalid" of swift bic is not a valid SWIFT/BIC.'
            ],
            // UDI
            [
                'payload' => [
                    'udi' => 'invalid'
                ],
                'rules' => [
                    'udi' => 'udi'
                ],
                'message' => 'The value "invalid" of udi is not a valid UDI.'
            ],
            // UKNIN
            [
                'payload' => [
                    'uknin' => 'invalid'
                ],
                'rules' => [
                    'uknin' => 'uknin'
                ],
                'message' => 'The value "invalid" of uknin is not a valid UK National Insurance Number.'
            ],
            // UPCA
            [
                'payload' => [
                    'upca' => 'invalid'
                ],
                'rules' => [
                    'upca' => 'upca'
                ],
                'message' => 'The value "invalid" of upca is not a valid UPCA.'
            ],
            // VAT
            [
                'payload' => [
                    'ssn' => 'invalid'
                ],
                'rules' => [
                    'ssn' => 'ssn'
                ],
                'message' => 'The value "invalid" of ssn is not a valid SSN.'
            ],
            // ZIPCODE
            [
                'payload' => [
                    'country' => 'GB',
                    'zipcode' => 63741
                ],
                'rules' => [
                    'zipcode' => 'zipcode:country'
                ],
                'message' => 'The value "63741" of zipcode is not valid for "GB".'
            ],
        ];
    }
}
