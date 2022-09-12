<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\InmueblesContactos;

use Bolsainmobiliariape\ModuleInmuebles\Models\InmuebleContact;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSorting;
use Maatwebsite\Excel\Facades\Excel;
use Bolsainmobiliariape\ModuleInmuebles\Exports\InmuebleContactsExport;


class Index extends Component
{
    use WithPagination;
    use WithSorting;

    public $idDelete;

    public function mount()
    {
        $this->sortField = "contacted";
    }

    public function markAsContacted($id)
    {
        $contact = InmuebleContact::find($id);

        $contact->contacted = !$contact->contacted;

        $contact->save();

    }
    
    public function delete()
    {
        InmuebleContact::destroy($this->idDelete);
        $this->dispatchBrowserEvent('notice', ['type'=>'success','text'=> 'Contacto eliminado con exito!']);
    }

    public function render()
    {
        return view('module-inmuebles::dashboard.inmueblescontactos.index', [
            'contacts' => InmuebleContact::orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
        ])->layoutData(['header'=>'Inmueble Contactos']);
    }

    public function export()
    {
        return Excel::download(new InmuebleContactsExport, 'InmuebleContacts.xlsx');
    }
}