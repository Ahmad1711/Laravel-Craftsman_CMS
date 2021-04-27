<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends BaseController
{
    public function login(){
    	return view('authentication.login');
    }
    public function user_Login(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only(['name','password']);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(isset(Auth::user()->union_id)){
                return redirect()->route('union.index',['name'=> Auth::user()->union->name]);
            }elseif(isset(Auth::user()->association_id)){
                return redirect()->route('association.index');
            }else{
                session()->flash('faild', 'عذرا هذا الحساب غير مرتبط  بأي جمعية أو اتحاد');
                return redirect()->route('authentication.login');
            }
            
        }else{
            session()->flash('faild', 'اسم المستخدم او كلمة المرور غير صحيحة');
            return redirect()->route('authentication.login');
        }
        
    }

    public function user_logout(){
        Auth::logout();
        return redirect()->route('authentication.login');
    }
   
}
