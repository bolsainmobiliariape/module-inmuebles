<?php
// config for Bolsainmobiliariape/ModuleInmuebles
return [
    "migrations" => [
        "type" => ["string"],
        "operation" => ["string"],
        "slug" => ["string", "nullable"],
        "description" => ["text"],
        "price" => ["bigInteger", "nullable"],
        "soles" => ["bigInteger", "nullable"],

        "ubication" => ["text", "nullable"],
        "area_terreno" => ["bigInteger", "nullable"],
        "area_construida" => ["bigInteger", "nullable"],
        "dormitorios" => ["bigInteger", "nullable"],
        "banos" => ["bigInteger", "nullable"],
        "garages" => ["bigInteger", "nullable"],
        "antiguedad" => ["string", "nullable"],
        
    ],

    'foreignid' => [
        "user_id" => ["users"],
        "distrito_id" => ["distritos"]
    ]
];
