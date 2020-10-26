<?php

namespace Wxfallstar\LaravelShop\Wap\Shop\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerRoutes();
        $this->registerPublishing();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__."/../Resources/views", "wap.shop");
    }

    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../Routes/shop.php');
        });
    }

    public function registerPublishing($value = ""){
        if($this->app->runningInConsole()){
            $this->publishes([__DIR__.'/../Resources/assets' =>
                public_path('vendor/wxfallstar/laravel-wap-shop')], 'laravel-shop-wap-shop');
        }

    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            //定义访问路由的域名
            //'domain' => config('telescope.domain', null),
            //定义路由的命名空间
            'namespace' => 'Wxfallstar\LaravelShop\Wap\Shop\Http\Controllers',
            //这是前缀
            'prefix' => 'wap/shop',
            //这是中间件
            'middleware' => 'web',
        ];
    }
}
