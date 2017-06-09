<?php
namespace App\Http\Controllers\Auth;
use App\Models\Role;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    private $user;

    function __construct(UserRepositoryEloquent $user)
    {
        $this->user = $user;
    }

    /**
     * 查看用户信息
     */
    public function index()
    {
        $user = getUser();
        return view('auth.user.show')->with(compact('user'));
    }


    /**
     * 修改用户视图
     */
    public function edit()
    {
        $user = getUser();
        return view('auth.user.edit')->with(compact('user'));
    }

    /**
     * 修改用户
     */
    public function update(UserRequest $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ];
        $this->user->update($data,getUerId());
        return redirect('user');
    }
}
