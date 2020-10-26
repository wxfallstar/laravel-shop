<?php
/**
 * Created by PhpStorm.
 * User: fallstar
 * Date: 2019/7/31
 * Time: 22:27
 */

namespace Wxfallstar\LaravelShop\Wap\Member\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Wxfallstar\LaravelShop\Wap\Member\Facades\Member;
use Wxfallstar\LaravelShop\Wap\Member\Models\User;

class AuthorizationsController extends Controller
{
    public function wechatStore(Request $request){
        //获取微信的用户信息
        $wechatUser = session('wechat.oauth_user.default');
        $user = User::where("weixin_openid", $wechatUser->id)->first();
        if(!$user){
            //不存在是记录用户信息
            $user = User::create([
                "nickname"=>$wechatUser->name,
                "weixin_openid"=>$wechatUser->id,
                "image_head"=>$wechatUser->avatar
            ]);
        }
        //改变用户的登录状态为登入
        //迁移性问题
        Member::login($user);
        return "通过";
        //return redirect()->route("wap.member.index");
    }

}