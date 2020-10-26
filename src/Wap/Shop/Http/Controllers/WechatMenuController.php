<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/8/14
 * Time: 23:27
 */

namespace Wxfallstar\LaravelShop\Wap\Shop\Http\Controllers;


class WechatMenuController extends Controller
{
    public function index(){
        $buttons = [
            [
                "type" => "view",
                "name" => "laravel-shop",
                "url"  => "http://w8kmzs.natappfree.cc/laravel/laravel/public/wap/shop"
            ],
            [
                "type" => "view",
                "name" => "测试授权",
                "url"  => "http://w8kmzs.natappfree.cc/laravel/laravel/public/wap/member/wechatStore"
            ],
        ];
        return app('wechat.official_account')->menu->create($buttons);
    }

}