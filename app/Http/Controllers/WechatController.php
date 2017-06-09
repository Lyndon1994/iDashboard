<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Log;
use Cache;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use EasyWeChat\OpenPlatform\Guard;

/**
 * 微信相关
 * 本系统设计为只可以绑定一个公众号，重新授权会覆盖之前的信息
 * Class WechatController
 * @package App\Http\Controllers
 */
class WechatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function callback($appid)
    {
        $app = self::app();
        $app->server->setMessageHandler(function($message){
            Log::info('微信消息：' . $message);
            switch ($message->MsgType) {
                case 'event':
                    break;
                case 'text':
                    break;
                case 'image':
                    break;
                case 'voice':
                    break;
                case 'video':
                    break;
                case 'location':
                    break;
                case 'link':
                    break;
                default:
                    break;
            }
        });
        return $app->server->serve();
    }

    /**
     * 第三方平台绑定微信公众号
     * @param Application $wechat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function bind(Application $wechat)
    {
        $openPlatform = $wechat->open_platform;
        $response = $openPlatform->pre_auth->redirect('https://weapp.meizucampus.com/wechat/auth');
        return $response;
    }

    /**
     * 微信公众号授权，待测试
     * @param Application $wechat
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function auth(Application $wechat)
    {
        // $wechat 则为容器中 EasyWeChat\Foundation\Application 的实例
        $openPlatform = $wechat->open_platform;
        $server = $openPlatform->server;
        $server->setMessageHandler(function($event) use ($openPlatform) {
            // 事件类型常量定义在 \EasyWeChat\OpenPlatform\Guard 类里
            switch ($event->InfoType) {
                case Guard::EVENT_AUTHORIZED: // 授权成功
                    $authorizationInfo = $openPlatform->getAuthorizationInfo($event->AuthorizationCode);
                    Cache::forever('authorizer_appid',$authorizationInfo->authorization_info->authorizer_appid);
                    Cache::forever('authorizer_refresh_token',$authorizationInfo->authorization_info->authorizer_refresh_token);
                    Log::debug('授权成功');
                    Log::debug($authorizationInfo);
                    break;
                // 保存数据库操作等...
                case Guard::EVENT_UPDATE_AUTHORIZED: // 更新授权
                    Log::debug('更新授权');
                    $authorizationInfo = $openPlatform->getAuthorizationInfo($event->AuthorizationCode);
                    Cache::forever('authorizer_appid',$authorizationInfo->authorization_info->authorizer_appid);
                    Cache::forever('authorizer_refresh_token',$authorizationInfo->authorization_info->authorizer_refresh_token);
                    Log::debug($authorizationInfo);
                    break;
                    // 更新数据库操作等...
                case Guard::EVENT_UNAUTHORIZED: // 授权取消
                    // 更新数据库操作等...
                    Log::debug('授权取消');
                    break;
            }
        });
        $response = $server->serve();
        return $response;
    }

    public function test(Request $request)
    {
        var_dump(getUser());
    }

    //空方法，用于微信登录回调
    public function login()
    {

    }

    public function headimgurl()
    {
        $userService = self::app()->user;
        $users = User::all();
        foreach ($users as $user) {
            $openid = $user->openid;
            if (!empty($openid)) {
                $u = $userService->get($openid);
                $user->headimgurl=$u->headimgurl;
                echo $u->headimgurl.'<br>';
                $user->save();
            }
        }

    }

    /**
     * @return Application
     */
    public static function app()
    {
        $wechat = app('wechat');
        $authorizerAppId = env('AUTHORIZER_APPID');
        $authorizerRefreshToken = env('AUTHORIZER_REFRESH_TOKEN');
        $app = $wechat->open_platform->createAuthorizerApplication($authorizerAppId, $authorizerRefreshToken);
        return $app;
    }
}
