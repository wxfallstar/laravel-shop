<?php

namespace Wxfallstar\LaravelShop\Extend\Artisan\Make;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as Commad;
use Symfony\Component\Console\Input\InputArgument;

class SeederMakeCommand extends Commad
{
    use GeneratorCommand;

    protected $name = 'shop-make:seeder ';

    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

    protected function getPackageInput()
    {
        return trim($this->argument('package'));
    }

    protected function getPath($name)
    {
        return $this->getPackagePath().'/'.$this->getPackageInput().'/Database/seeds/'.$name.'.php';
    }
}
