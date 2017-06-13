<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        for ($i = 0; $i < 10; $i++) {
//            echo Redis::spop('prize');
//        }
//        ini_set('max_execution_time', 300);
//        for ($i = 0; $i < 50000; $i++) {
//            Redis::sadd('prize',uniqid());
//        }
        echo Redis::scard('prize');
        echo "<br>";
        echo Redis::scard('log');
    }

    public function test()
    {
        $u = User::find(1);
        Auth::login($u);
        $prize = Redis::spop('prize');
        if($prize){
            $d = ['user'=>$u->name,'id'=>$prize];
            Redis::sadd('log',json_encode($d));
        }
        echo Redis::scard('log');
    }
}
