<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class SessionsController extends Controller
{
    //
    public function create() {
    	return view('sessions.create');
    }

    public function store(Request $request)
    {
    	$credentials = $this->validate($request,[
    		'email' => 'required|email|max:255',
    		'password' => 'required',
    	]);

    	if(Auth::attempt($credentials)){
    		session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
    	}else{
    		session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
    	}
    	// 
    	// echo $request->has('remember');
    	// echo $request->has('email');
    	// echo $request->get('email');

    	return;
    }

    public function test(){
    	if(Auth::check()){
    		echo "已经登录";
    	}else{
    		echo "未登录";
    	}
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
