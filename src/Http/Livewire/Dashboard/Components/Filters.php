<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\Components;

use Livewire\Component;
use Bolsainmobiliariape\ModuleInmuebles\Models\Inmueble;
use Livewire\WithPagination;

class Filters extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    // public Inmueble $inmueble;
    public $slug;
    public $operacion;
    public $tipo;
    public $preciomin;
    public $preciomax;
    public $dormitorios;
    public $ubicacion;
    public $title;
    public $asesor;

    protected $queryString = [
        'operacion',
        'tipo',
        'preciomin',
        'preciomax',
        'dormitorios',
        'ubicacion',
        'asesor'
    ];

    public function submit()
    {
        
    }

    public function render()
    {
        $inmuebles = new Inmueble;
        $inmuebles = $inmuebles->join('distritos', 'inmuebles.distrito_id', '=', 'distritos.id');
        $inmuebles = $this->ubicacion ? $inmuebles->where('distritos.nombre', 'LIKE', "%{$this->ubicacion}%"):$inmuebles;
        $inmuebles = $this->operacion ? $inmuebles->where('inmuebles.operation', $this->operacion): $inmuebles;
        $inmuebles = $this->tipo ? $inmuebles->where('inmuebles.type', $this->tipo): $inmuebles;
        $inmuebles = $this->preciomin ? $inmuebles->where('inmuebles.price', '>', $this->preciomin):$inmuebles;
        $inmuebles = $this->preciomax ? $inmuebles->where('inmuebles.price', '<', $this->preciomax):$inmuebles;
        $inmuebles = $this->dormitorios ? $inmuebles->where('inmuebles.dormitorios', $this->dormitorios):$inmuebles;

        $this->title = empty($this->title) ? "Inmuebles en Perú": $this->title;
        // here logic for title

        if ($this->asesor) {
            $idUser = explode('-', $this->asesor);
            $inmuebles = $inmuebles->where('inmuebles.user_id', $idUser[count($idUser)-1]);
        }

        $inmuebles = $inmuebles->orderBy('inmuebles.id', 'DESC')->select('inmuebles.*')->paginate(30);
        return view('module-inmuebles::dashboard.components.filters', [
            'inmuebles' => $inmuebles
        ]);
    }
}
