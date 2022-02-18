<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Http\Controllers\Inmuebles;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('module-inmuebles::dashboard.inmuebles.indexwrapper');
    }
}