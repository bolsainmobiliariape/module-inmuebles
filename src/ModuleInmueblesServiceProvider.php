<?php

namespace Bolsainmobiliariape\ModuleInmuebles;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ModuleInmueblesServiceProvider extends PackageServiceProvider
{
    public function bootingPackage()
    {
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
            // ->hasViews()
            ->hasMigration('create_module_inmuebles_table');
    }
}
