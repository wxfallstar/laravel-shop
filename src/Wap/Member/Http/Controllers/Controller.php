<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/7/28
 * Time: 23:03
 */

namespace Wxfallstar\LaravelShop\Wap\Member\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}