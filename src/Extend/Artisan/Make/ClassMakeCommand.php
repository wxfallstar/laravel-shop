<?php

namespace Wxfallstar\LaravelShop\Extend\Artisan\Make;

use Illuminate\Console\GeneratorCommand as Command;


class ClassMakeCommand extends Command
{

    use GeneratorCommand;
    protected $signature = 'shop-make:class {name}';

    protected $description = '这是给laravel-shop创建类的';

    protected $type = 'Class';

    protected function getStub()
    {
        // TODO: Implement getStub() method.
        return __DIR__ . "/stubs/Class.stub";
    }
}
