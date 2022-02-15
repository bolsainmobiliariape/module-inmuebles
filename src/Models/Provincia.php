<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento_id',
        'nombre'
    ];

    /**
     * Get the departamento that owns the Provincia.
     * 
     * 
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    /**
     * Get the distritos for provincia.
     * 
     * 
     */
    public function distritos()
    {
        return $this->hasMany(Distrito::class);
    }

}
