<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

     /**
     * Get the provincia for Departamento.
     * 
     * 
     */
    public function provincias()
    {
        return $this->hasMany(Provincia::class);
    }
}
