<?php

namespace Wxfallstar\LaravelShop\Extend\Artisan\Make;
use \Illuminate\Routing\Console\ControllerMakeCommand as Command;

class ControllerMakeCommand extends Command
{
    use GeneratorCommand;

    protected $name = 'shop-make:controller';

    protected $defaultNamespace = '\Http\Controllers';

}
