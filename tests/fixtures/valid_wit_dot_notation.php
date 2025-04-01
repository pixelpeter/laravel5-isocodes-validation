<?php

return [
    [
        'data' => [
            [
                'country' => 'DE',
                'zipcode' => 63741,
            ],
            [
                'country' => 'AT',
                'zipcode' => 1180,
            ],
        ],
        'rule' => [
            'data.*.zipcode' => 'zipcode:data.*.country',
        ],
    ],
    [
        'data' => [
            [
                'country' => 'DE',
                'phonenumber' => '035384-08723',
            ],
            [
                'country' => 'US',
                'phonenumber' => '+1-650-798-2800',
            ],
        ],
        'rule' => [
            'data.*.phonenumber' => 'phonenumber:data.*.country',
        ],
    ],
    [
        'data' => [
            [
                'type' => 10,
                'isbn' => '3-598-21500-2',
            ],
            [
                'type' => 13,
                'isbn' => '978-88-8183-718-2',
            ],
        ],
        'rule' => [
            'data.*.isbn' => 'isbn:data.*.type',
        ],
    ],
    [
        'data' => [
            [
                'clef' => 2,
                'organisme_type12_norme_b2' => '76031208',
            ],
            [
                'clef' => 2,
                'organisme_type12_norme_b2' => '76031208',
            ],
        ],
        'rule' => [
            'data.*.organisme_type12_norme_b2' => 'organisme_type12_norme_b2:data.*.clef',
        ],
    ],
];

// ['organisme_type12_norme_b2', '76031208', 'clef', 2],
