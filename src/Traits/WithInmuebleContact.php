<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Traits;

use Bolsainmobiliariape\ModuleInmuebles\Models\InmuebleContact;
use Illuminate\Support\Facades\Request;

trait WithInmuebleContact 
{
    public $icontact;

    public function imount($request)
    {
        $this->icontact = new  InmuebleContact;
        $this->icontact->inmueble = $request->fullURL();
    }

    protected $rules = [
        'icontact.inmueble' => ['required', 'string'],
        'icontact.name' => ['required', 'string'],
        'icontact.phone' => ['required', 'string'],
        'icontact.email' => ['required', 'string'],
        'icontact.message' => ['required', 'string'],
    ];

    public function store()
    {
        $this->validate();

        $this->icontact->save();

        $this->doingAfter();
    }

    public function doingAfter()
    {}
}