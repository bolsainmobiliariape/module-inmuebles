<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bolsainmobiliariape\ModuleInmuebles\ModuleInmuebles
 */
class ModuleInmuebles extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'module-inmuebles';
    }
}
