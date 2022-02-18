<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\Inmuebles;

use Bolsainmobiliariape\ModuleInmuebles\Models\Inmueble;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('module-inmuebles::dashboard.inmuebles.index', [
            'inmuebles' => Inmueble::paginate()
        ]);
    }
}