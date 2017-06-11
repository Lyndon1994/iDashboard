<?php

namespace App\Http\Middleware;

use App\Http\Controllers\WechatController;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Log;

class WechatRedirect
{
    /**
     * 如果通过微信浏览器打开，那么首先登录
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isWechat() && Auth::guest() && !$request->session()->exists('wechat_auth')) {
            $app = WechatController::app();
            try {
                $user = $app->oauth->setRequest($request)->user();
                Log::info('微信登录：' . $user->getNickname());
                $u = User::where('openid', $user->getId())->first();
                if ($u) {
                    Auth::login($u);
                }
            } catch (\Exception $exception) {
                //如果尝试过获取一次微信授权信息，就不会再获取了
                $request->session()->push('wechat_auth', true);
                $response = $app->oauth->scopes(['snsapi_base'])
                    ->setRequest($request)
                    ->redirect();
                return $response;
            }
        }
        return $next($request);
    }
}
