<?php

use Bolsainmobiliariape\ModuleInmuebles\Http\Controllers\Inmuebles\IndexController;
use Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\Inmuebles\Form;
use Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\InmueblesContactos\Index;
use Illuminate\Support\Facades\Route;

Route::as('dashboard.')->middleware(['web', 'auth'])->prefix('/dashboard')->group(function () {
    Route::as('inmuebles.')->prefix('/inmuebles')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/create', Form::class)->name('create');
        Route::get('/edit/{inmueble}', Form::class)->name('edit');
    });

    Route::as('inmuebleContact.')->prefix('/inmuebles-contactos')->group(function () {
        Route::get('/', Index::class)->name('index');
    });
});