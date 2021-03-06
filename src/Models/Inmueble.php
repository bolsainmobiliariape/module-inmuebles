<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class Inmueble extends Model
{
    use HasFactory;

    public function getFillable()
    {
        return config('module-inmuebles.fields');
    }


    /**
     * Relationship between distrito and inmueble
     *
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship between distrito and inmueble
     *
     *
     */
    public function distrito()
    {
        return $this->belongsTo(Distrito::class, "distrito_id", "id");
    }

    /**
     * Relationship with Inmueblephoto
     *
     */
    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
    
    /**
     * Get the first foto for this inmueble
     *
     *
     */
    public function imagen()
    {
        $photos = $this->photo;
        if (count($photos)>0) {
            return $photos[0]->path;
        }

        return '/img/default-inmueble.png';
    }

    /**
     * Get the localization of inmueble
     *
     *
     */
    public function direccion()
    {
        return ucfirst(strtolower($this->distrito->nombre)). ", ".  ucfirst(strtolower($this->distrito->provincia->nombre));
    }

    /**
     * Get complete Title
     *
     */
    public function titulo()
    {
        return ucfirst($this->operation)." de {$this->type} en " . $this->direccion();
    }

    /**
     * Getting data of Inmueble
     *
     */
    public function data()
    {
        return "$this->dormitorios dorm. $this->banos ba. $this->area_terreno m2";
    }
}
