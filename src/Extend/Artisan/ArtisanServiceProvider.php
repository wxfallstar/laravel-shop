<?php

namespace Wxfallstar\LaravelShop\Extend\Artisan;

use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider
{
    protected $commands = [
        Make\ClassMakeCommand::class,
        Make\ModelMakeCommand::class,
        Make\ControllerMakeCommand::class,
        Make\MigrateMakeCommand::class,
        Make\SeederMakeCommand::class,
        Make\ObserverMakeCommand::class
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/artisan.php', 'shop.artisan');
    }

    public function boot()
    {
        $this->commands($this->commands);
    }
}
