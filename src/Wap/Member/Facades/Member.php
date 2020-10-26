<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/8/14
 * Time: 23:00
 */

namespace Wxfallstar\LaravelShop\Wap\Member\Facades;


use Illuminate\Support\Facades\Facade;

class Member extends Facade
{
    protected static function getFacadeAccessor(){
        return \Wxfallstar\LaravelShop\Wap\Member\Member::class;
    }

}