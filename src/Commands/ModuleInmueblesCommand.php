<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Commands;

use Illuminate\Console\Command;

class ModuleInmueblesCommand extends Command
{
    public $signature = 'module:inmuebles';

    public $description = 'Publish config, migration and seeds';

    public function handle(): int
    {
        
        $this->callSilent('vendor:publish', ['--tag'=>'module-inmuebles-config']);
        $this->callSilent('vendor:publish', ['--tag'=>'module-inmuebles-migrations']);
        $this->callSilent('vendor:publish', ['--tag'=>'module-inmuebles-seeds']);

        $this->comment('Published module-inmuebles config file, migration and seeds');

        return self::SUCCESS;
    }
}
