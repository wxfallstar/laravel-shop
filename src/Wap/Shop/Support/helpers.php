<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/8/25
 * Time: 11:01
 */
if (! function_exists('shop_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function shop_asset($path, $secure = null)
    {
        $path = "vendor/wxfallstar/laravel-wap-shop\\".$path;
        return app('url')->asset($path, $secure);
    }
}