<?php
// config for Bolsainmobiliariape/ModuleInmuebles
return [

    'fields' => [
        'user_id',
        'distrito_id',
        'type',
        'operation',
        'slug',
        'description',
        'price',
        'soles',

        'ubication',
        'area_terreno',
        'area_construida',
        'dormitorios',
        'banos',
        'garages',
        'antiguedad',
        'lat', 
        'lng',
        'youtube'
    ],

    'rules' => [

        'inmueble.type' => ['string'],
        'inmueble.operation' => ['string'],
        'inmueble.slug' => ['nullable','string'],
        'inmueble.description' => ['string'],
        'inmueble.price' => ['integer'],
        'inmueble.soles' => ['nullable', 'integer'],
        'inmueble.ubication' => ['nullable', 'string'],
        'inmueble.area_terreno' => ['nullable', 'integer'],
        'inmueble.area_construida' => ['nullable', 'integer'],
        'inmueble.dormitorios' => ['nullable', 'integer'],
        'inmueble.banos' => ['nullable', 'integer'],
        'inmueble.garages' => ['nullable', 'integer'],
        'inmueble.antiguedad' => ['nullable', 'string'],
        'inmueble.lat' => ['nullable','string'],
        'inmueble.lng' => ['nullable','string'],
        'inmueble.youtube' => ['nullable', 'string'],

        "picture.*" => ["image"],
        "inmueble.user_id" => ['required'],
        "inmueble.distrito_id" => ['required']
    ],
    
    'migrations' => [
        'type' => ['string'],
        'operation' => ['string'],
        'slug' => ['string', 'nullable'],
        'description' => ['text'],
        'price' => ['bigInteger', 'nullable'],
        'soles' => ['bigInteger', 'nullable'],

        'ubication' => ['text', 'nullable'],
        'area_terreno' => ['bigInteger', 'nullable'],
        'area_construida' => ['bigInteger', 'nullable'],
        'dormitorios' => ['bigInteger', 'nullable'],
        'banos' => ['bigInteger', 'nullable'],
        'garages' => ['bigInteger', 'nullable'],
        'antiguedad' => ['string', 'nullable'],
        'lat' => ['string', 'nullable'],
        'lng' => ['string', 'nullable'],
        'youtube' => ['text', 'nullable'],
    ],

    'foreignid' => [
        'user_id' => ['users'],
        'distrito_id' => ['distritos']
    ],

];
