<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Exports;

use Bolsainmobiliariape\ModuleInmuebles\Models\InmuebleContact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InmuebleContactsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $arra = array('inmueble', 'name', 'phone', 'email', 'message');

        $merge = array_merge(array('id'), $arra);
        $merge = array_merge($merge, array('created_at'));
        return InmuebleContact::select($merge)->get();
    }

    public function headings() : array
    {
        $arra = array('Inmueble',
            'Nombre',
            'Telefono',
            'email',
            'Mensaje');

        $merge = array_merge(array('id'), $arra);
        $merge = array_merge($merge, array('Hora / Fecha'));
        return $merge;
    }
}