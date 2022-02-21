<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\Inmuebles;

use Bolsainmobiliariape\ModuleInmuebles\Models\Inmueble;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSorting;

class Index extends Component
{
    use WithPagination;
    use WithSorting;

    public $idDelete;

    public function delete()
    {
        Inmueble::destroy($this->idDelete);

        $this->dispatchBrowserEvent('notice', ['type'=>'success', 'text'=> "Se ha eliminado con exito"]);
    }

    public function render()
    {
        return view('module-inmuebles::dashboard.inmuebles.index', [
            'inmuebles' => Inmueble::paginate($this->perPage)
        ]);
    }
}