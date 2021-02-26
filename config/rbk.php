<?php

return [
    'site' => 'https://www.rbc.ru',
    'pattern' => [
        'title' => '.article__header__title',
        'text' => '.article__text p',
        'pre_text' => '.article__text p',
    ],
    'domain' => [
        'www.rbc.ru',
        'pro.rbc.ru',
        'nsk.rbc.ru',
        'quote.rbc.ru',
        'sport.rbc.ru',
    ],
    'orders' => [
        "s" => "1",
        "m" => "orders",
        "d" => [
            "ordid" => "1",
            "u_id" => "49",
            "products" => [
                [
                    "id" => "115",
                    "amount" => "500",
                    "prod_id" => "107"
                ],
                [
                    "id" => "116",
                    "amount" => "1000",
                    "prod_id" => "109"
                ]
            ],
            "total_mrp" => 1068,
            "total_discount" => 112
        ]
    ]
];
