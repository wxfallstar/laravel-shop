<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/7/28
 * Time: 23:06
 */

namespace Wxfallstar\LaravelShop\Wap\Member\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use EasyWeChat\OfficialAccount\Application as OfficialAccount;

class MemberServiceProvider extends ServiceProvider
{
    //member 需要注入的中间件
    protected $routeMiddleware = [
        'wechat.oauth' => \Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class,
    ];

    // 这是命令的注册地点
    protected $commands = [
        \Wxfallstar\LaravelShop\Wap\Member\Console\Commands\InstallCommand::class
    ];

    protected $middlewareGroups = [];

    /*
    从laravel的执行来说 register 会先执行
    所有的操作都可以写在一个方法中

    意义 方法名的意义 执行区别不大,主要是名字的意义区分
    register 注册文件 注册服务

    boot 开启事件,启动某些功能
     */
    public function register()
    {
        //
        //echo '这是sjunit服务提供者1';
        //注册组件路由
        $this->registerRoutes();
        //怎么加载配置文件
        $this->mergeConfigFrom(__DIR__.'/../Config/member.php', 'wap.member');
        //怎么根据配置文件去加载auth信息
        $this->registerRouteMiddleware();
        // php artisan vendor:publish --provider="Wxfallstar\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        $this->registerPublishing();
    }

    public function boot(){
        //加载配置
        $this->loadMemberConfig();
        $this->loadMemberMigrations();
        $this->commands($this->commands);

        $this->app->singleton("wechat.official_account.default", function ($laravelApp) {
            $app = new OfficialAccount(array_merge(config('wechat.official_account.default', []),
                config('wechat.official_account')));

            if (config('wechat.defaults.use_laravel_cache')) {
                $app['cache'] = $laravelApp['cache.store'];
            }
            $app['request'] = $laravelApp['request'];
            return $app;
        });
    }


    public function loadMemberMigrations(){
        if($this->app->runningInConsole()){
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }
    }

    public function registerPublishing($value = ""){
        if($this->app->runningInConsole()){
            // [当前组件的配置文件路径 =》 这个配置复制那个目录] , 文件标识
            // 1. 不填就是默认的地址 config_path 的路径 发布配置文件名不会改变
            // 2. 不带后缀就是一个文件夹
            // 3. 如果是一个后缀就是一个文件
            $this->publishes([__DIR__.'/../Config' => config_path('wap')], 'laravel-shop-wap-member');
        }

    }

    //把这个组件的auth信息合并到config的auth
    public function loadMemberConfig(){

        // Arr 基础操方法封装
        // 这个数组合并之后，一定要再此保持laravel项目中
        config(Arr::dot(config('wap.member.wechat', []), 'wechat.'));
        config(Arr::dot(config('wap.member.auth', []), 'auth.'));
    }

    //注册路由中间件
    public function registerRouteMiddleware(){
        foreach ($this->middlewareGroups as $key => $middleware) {
            $this->app["router"]->middlewareGroup($key, $middleware);
        }

        foreach ($this->routeMiddleware as $key => $middleware) {
            $this->app["router"]->aliasMiddleware($key, $middleware);
        }
    }



    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
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
            'namespace' => 'Wxfallstar\LaravelShop\Wap\Member\Http\Controllers',
            //这是前缀
            'prefix' => 'wap/member',
            //这是中间件
            'middleware' => 'web',
        ];
    }
}