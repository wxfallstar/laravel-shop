<?php

namespace Wxfallstar\LaravelShop\Extend\Artisan\Make;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

trait GeneratorCommand
{
    //包创建地址
    protected $packagePath = __DIR__."/../../..";
    protected function getPackagePath(){
        //return config('shop.artisan.package.path');
        return $this->packagePath;
    }

    //扩展组件的根命名空间
    protected function rootNamespace()
    {
        return config('shop.artisan.package.namespace');
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->getPackagePath().'/'.str_replace('\\', '/', $name).'.php';
    }

    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            ['DummyNamespace', 'DummyRootNamespace', 'NamespacedDummyUserModel'],
            [$this->getNamespace($name), $this->rootNamespace().'\\'.$this->getPackageInput().'\\', $this->userProviderModel()],
            $stub
        );

        return $this;
    }

    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The name of the package'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

    //获取输入的组件的包目录
    protected function getPackageInput()
    {
        return str_replace('/', '\\', trim($this->argument('package')));
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace."\\".$this->getPackageInput().$this->defaultNamespace;
    }

}
