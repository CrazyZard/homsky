<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends BaseController
{
    use AuthenticatesUsers;


    protected $redirectTo = '/manage/index';
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
        $this->username = 'name';
    }

    public function showLoginForm()
    {
        return view('manage.common.login');
    }

    public function username()
    {
        return $this->username;
    }

    /**
     * 自定义认证驱动
     * @return [type]  [description]
     */
    protected function guard()
    {
        return auth()->guard('admin');
    }
}
