<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dash';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * 自定义登录字段
     * @author 晚黎
     * @date   2016-10-20
     * @return [type]
     */
    public function username()
    {
        return config('admin.global.username');
    }

    /**
     * 登录时写入cookie，兼容老系统，直接登录
     * @param Request $request
     * @param $user
     */
    public function authenticated(Request $request, $user)
    {
        $key = env('APP_KEY');
        $data = base64_encode($user->username.'@'.md5($user->username.$key));
        \Cookie::queue('auth_data', $data, 9999999, null, '.'.getHost());
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        \Cookie::unqueue('auth_data');

        return redirect('/');
    }
}
