<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Exports;

use Bolsainmobiliariape\ModuleContact\Models\InmuebleContact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InmuebleContacsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $arra = array('inmueble',
            'name',
            'phone,',
            'email',
            'message');

        $merge = array_merge(array('id'), $arra);
        $merge = array_merge($merge, array('created_at'));
        return InmuebleContact::select($merge)->get();
    }

    public function headings() : array
    {
        $arra = array('Inmueble',
            'Nombre',
            'Telefon,o',
            'email',
            'Menssaje');

        $merge = array_merge(array('id'), $arra);
        $merge = array_merge($merge, array('Hora / Fecha'));
        return $merge;
    }
}