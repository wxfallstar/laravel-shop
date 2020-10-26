<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/8/20
 * Time: 23:21
 */

namespace Wxfallstar\LaravelShop\Wap\Shop\Http\Controllers;


class IndexController extends Controller
{
    public function index(){
        return view('wap.shop::index.index');
    }
}