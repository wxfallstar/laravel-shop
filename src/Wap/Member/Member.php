<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/8/14
 * Time: 22:52
 */

namespace Wxfallstar\LaravelShop\Wap\Member;


use Illuminate\Support\Facades\Auth;

class Member
{
    public function guard(){
        return Auth::guard(config("wap.member.guard"));
    }

    // 魔术方法
    // 零基础讲过 -> 当我们这个调用了不存在的方法 就会执行
    public function __call($method, $parameters)
    {
        // ...传递参数的方式
        return $this->guard()->$method(...$parameters);
    }
}