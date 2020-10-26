<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/7/31
 * Time: 22:42
 */
use Illuminate\Support\Facades\Route;

Route::get('/wechatStore', 'AuthorizationsController@wechatStore')->middleware("wechat.oauth");
// 为什么使用这个中间件会陷入死循环
// middleware("wechat.oauth")

// wechat.oauth => 把用户的信息存在session中
//
// laravel 的session如何使用的问题
//
// laravel中的中间件组有一个 中间件   \Illuminate\Session\Middleware\StartSession::class,
//
// csrf ->
//
// 数据库的参数配置