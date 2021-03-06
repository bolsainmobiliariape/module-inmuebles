<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Bolsainmobiliariape\ModuleInmuebles\Models\InmuebleContact as ModelContact;

class InmuebleContact extends Mailable
{
    use Queueable, SerializesModels;

    public $InmuebleContact;
    public $names ;

    public function __construct(ModelContact $InmuebleContact)
    {
        $this->InmuebleContact = $InmuebleContact;
        $this->names = [
            'inmueble' => "Inmueble",
            'name' => "Nombre",
            'phone' => "Telefono",
            'email' => "Email",
            'message' => "Mensaje",
        ];

    }

    public function build()
    {
        return $this->markdown('module-inmuebles::mails.inmueble-contact-mail');
    }
}
