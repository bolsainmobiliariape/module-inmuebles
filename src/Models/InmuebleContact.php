<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InmuebleContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'inmueble', 'name', 'phone', 'email', 'message'
    ];
}
