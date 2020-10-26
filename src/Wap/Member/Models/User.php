<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/7/28
 * Time: 23:06
 */

namespace Wxfallstar\LaravelShop\Wap\Member\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "sys_user";

    protected $fillable = [
        'nickname', 'weixin_openid', 'image_head',
    ];
}