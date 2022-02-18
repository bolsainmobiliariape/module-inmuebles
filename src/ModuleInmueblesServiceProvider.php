<?php

namespace Bolsainmobiliariape\ModuleInmuebles;

use Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\Inmuebles\Form;
use Bolsainmobiliariape\ModuleInmuebles\Http\Livewire\Dashboard\Inmuebles\Index;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Livewire\Livewire;

class ModuleInmueblesServiceProvider extends PackageServiceProvider
{
    public function bootingPackage()
    {

        Livewire::component('dashboard.inmuebles.index', Index::class);
        Livewire::component('dashboard.inmuebles.form', Form::class);

        $this->publishes([
            __DIR__ . '/../database/seeds/' => database_path('seeders/'),
        ], 'module-inmuebles-seeds');
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('module-inmuebles')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('inmuebles')
            ->hasMigration('create_module_inmuebles_table');
    }
}
