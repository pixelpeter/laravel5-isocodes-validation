<?php

return [
    [
        'data' => [
            [
                'country' => 'DE',
                'zipcode' => 'invalid',
            ],
            [
                'country' => 'AT',
                'zipcode' => 'invalid',
            ],
        ],
        'rule' => [
            'data.*.zipcode' => 'zipcode:data.*.country',
        ],
        'errors' => [
            'The value "invalid" of data.0.zipcode is not valid for "DE".',
        ],
    ],
    [
        'data' => [
            [
                'country' => 'DE',
                'phonenumber' => 'invalid',
            ],
            [
                'country' => 'US',
                'phonenumber' => 'invalid',
            ],
        ],
        'rule' => [
            'data.*.phonenumber' => 'phonenumber:data.*.country',
        ],
        'errors' => [
            'The value "invalid" of data.0.phonenumber is not valid for "DE".',
        ],
    ],
    [
        'data' => [
            [
                'type' => 10,
                'isbn' => 'invalid',
            ],
            [
                'type' => 13,
                'isbn' => 'invalid',
            ],
        ],
        'rule' => [
            'data.*.isbn' => 'isbn:data.*.type',
        ],
        'errors' => [
            'The value "invalid" of data.0.isbn is not a valid ISBN.',
        ],
    ],
    [
        'data' => [
            [
                'clef' => 2,
                'organisme_type12_norme_b2' => 'invalid',
            ],
            [
                'clef' => 2,
                'organisme_type12_norme_b2' => 'invalid',
            ],
        ],
        'rule' => [
            'data.*.organisme_type12_norme_b2' => 'organisme_type12_norme_b2:data.*.clef',
        ],
        'errors' => [
            'The value "invalid" of data.0.organisme_type12_norme_b2 is not a valid Organisme Type12 Norme B2.',
        ],
    ],
];
