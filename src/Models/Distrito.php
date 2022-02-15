<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'provincia_id',
        'nombre'
    ];

    /**
     * Get the inmuebles for distrito.
     * 
     * 
     */
    // public function inmuebles()
    // {
    //     return $this->hasMany('App\Models\Inmueble');
    // }

    /**
     * Get the provincia that owns the distrito.
     * 
     * 
     */
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

}
