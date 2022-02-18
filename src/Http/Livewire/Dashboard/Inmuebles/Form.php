<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\Inmuebles;

use Bolsainmobiliariape\ModuleInmuebles\Models\Departamento;
use Bolsainmobiliariape\ModuleInmuebles\Models\Distrito;
use Bolsainmobiliariape\ModuleInmuebles\Models\Inmueble;
use Bolsainmobiliariape\ModuleInmuebles\Models\Photo;
use Bolsainmobiliariape\ModuleInmuebles\Models\Provincia;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

use Illuminate\Support\Str;

class Form extends Component
{
    use WithFileUploads;

    public $map = true;

    public $inmueble;
    public $departamentoid;
    public $provinciaid;
    public $distritoid;

    public $departamentos;
    public $provincias;
    public $distritos;

    public $picture = [];

    public function mount(Inmueble $inmueble)
    {
        $this->inmueble = $inmueble;
        $this->departamentos = Departamento::all();
    }

    public function updatedDepartamentoid()
    {
        $this->provincias = Provincia::where('departamento_id', $this->departamentoid)->get();
    }

    public function updatedProvinciaid()
    {
        $this->distritos = Distrito::where('provincia_id', $this->provinciaid)->get();
    }

    public function rules()
    {
        return config('module-inmuebles.rules') ;
    }

    public function store()
    {
        $this->inmueble->distrito_id = $this->distritoid;
        $this->validate();


        $this->inmueble->save();

        $slug = $this->inmueble->titulo() . ' ' . $this->inmueble->id;
        $this->inmueble->slug = Str::slug($slug);


        foreach($this->picture as $image){
                Photo::create([
                    'inmueble_id' => $this->inmueble->id,
                    'path' => $image->store('public/inmuebles'),
                ]);
        }

        $this->inmueble->save();
        
        $this->dispatchBrowserEvent('notice', ['type'=>'success','text'=> 'Se ha guardado con exito!']);

    }

    public function render()
    {
        return view('module-inmuebles::dashboard.inmuebles.form', [
            "users" => User::all()
        ])->layoutData(["header"=> "Inmuebles / Form"]);
    }
}