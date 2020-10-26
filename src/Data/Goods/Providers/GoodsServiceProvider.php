<?php

namespace Wxfallstar\LaravelShop\Data\Goods\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Wxfallstar\LaravelShop\Data\Goods\Observers\GategoryObserver;
use Wxfallstar\LaravelShop\Data\Goods\Models\Category;

class GoodsServiceProvider extends ServiceProvider
{
    public function register()
    {
        // 预习内容
        // 注册
        // Illuminate\Database\Eloquent\Concerns\HasEvents::observe();

        // 所有注册的事件绑定 Illuminate\Events\Dispatcher 中的 $listeners属性

        // 查找并执行
        // Illuminate\Database\Eloquent\Concerns\HasEvents::fireModelEvent();

        // 批量新增的问题

        $this->mergeConfigFrom(__DIR__.'/../Config/goods.php', 'data.goods');
    }

    public function boot()
    {
        //加载观察者
        Category::observe(GategoryObserver::class);
        $this->loadGoodsMigrations();
        $this->loadGoodsConfig();
    }

    public function loadGoodsMigrations(){
        if($this->app->runningInConsole()){
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }
    }

    //把这个组件的auth信息合并到config的auth
    public function loadGoodsConfig(){
        // 根据默认连接的信息去database.php配置分属于goods组件的连接信息
        config(
            Arr::dot(
                config('database.connections.'.config('data.goods.database.connection.type'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.')
        );
        // 在把goods组件的单独信息 放到 database中的goods连接的信息
        config(
            Arr::dot(
                config('data.goods.database.'.config('data.goods.database.connection.name'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.')
        );
    }
}
