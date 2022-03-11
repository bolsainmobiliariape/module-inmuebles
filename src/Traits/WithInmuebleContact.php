<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Traits;

use Bolsainmobiliariape\ModuleInmuebles\Models\InmuebleContact;
use Illuminate\Support\Facades\Request;
use Bolsainmobiliariape\ModuleInmuebles\Mail\InmuebleContactMail;
use App\Traits\WithSendMails;

trait WithInmuebleContact 
{
    use WithSendMails;

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

        if(env('MAIL', false)){
            $this->sendMail('Nuevo interesado en un inmueble - '. config('app.name'), $this->icontact, InmuebleContactMail::class);
        }


        $this->doingAfter();
    }

    public function doingAfter()
    {}
}