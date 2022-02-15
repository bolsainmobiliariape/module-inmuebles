<?php

namespace Bolsainmobiliariape\ModuleInmuebles\Commands;

use Illuminate\Console\Command;

class ModuleInmueblesCommand extends Command
{
    public $signature = 'module-inmuebles';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
