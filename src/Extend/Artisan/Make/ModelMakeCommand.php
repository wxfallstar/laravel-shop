<?php

namespace Wxfallstar\LaravelShop\Extend\Artisan\Make;

use Illuminate\Support\Str;
use Illuminate\Foundation\Console\ModelMakeCommand as Commad;

class ModelMakeCommand extends Commad
{
    // trait 方法的优先级大于继承
    use GeneratorCommand;
    protected $name = 'shop-make:model';

    protected $defaultNamespace = '\Models';

    //制定创建的文件的默认地址
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace."\\".$this->getPackageInput().$this->defaultNamespace;
    }

    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('shop-make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--path' => $this->getPackageInput()
        ]);
    }

}
