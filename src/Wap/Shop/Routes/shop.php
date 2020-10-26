<?php

use Illuminate\Support\Facades\Route;

Route::get("/wechat-menu", "WechatMenuController@index");
Route::get('/', function(){
    return "商城的首页";
})->middleware("wechat.oauth");

Route::get('/', "IndexController@index");