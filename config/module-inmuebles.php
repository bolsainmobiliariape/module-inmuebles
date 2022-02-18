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
        'lng'
    ],

    'rules' => [

        'inmueble.type' => ['string'],
        'inmueble.operation' => ['string'],
        'inmueble.slug' => ['nullable','string'],
        'inmueble.description' => ['string'],
        'inmueble.price' => ['string'],
        'inmueble.soles' => ['string'],
        'inmueble.ubication' => ['string'],
        'inmueble.area_terreno' => ['string'],
        'inmueble.area_construida' => ['string'],
        'inmueble.dormitorios' => ['string'],
        'inmueble.banos' => ['string'],
        'inmueble.garages' => ['string'],
        'inmueble.antiguedad' => ['string'],
        'inmueble.lat' => ['nullable','integer'],
        'inmueble.lng' => ['nullable','integer'],

        'picture.*' => ['image'],
        'inmueble.user_id' => ['required'],
        'inmueble.distrito_id' => ['required']
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
    ],

    'foreignid' => [
        'user_id' => ['users'],
        'distrito_id' => ['distritos']
    ],

];
