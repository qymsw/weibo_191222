<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    //
    public function index(User $user){
    	return view('test.test',compact('user'));
    }

   	public function test(Request $request){
   		// $result = $this->validate($request,[
   		// 	'name' => 'required|max:10',
   		// 	'email' => 'required|emaile|max:20',
   		// ]);

   		$result = $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:255',
            // 'password' => 'required|confirmed|min:6'
        ]);

   		// echo $result;
   		// 
   		echo 'aasasassas';
   		return;
   	}
}
