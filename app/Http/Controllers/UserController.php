<?php

namespace App\Http\Controllers;

use App\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Union;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users=collect();
        if (Auth::user()->union_id == 1) {
            $users = $users->merge(User::wherenotnull('union_id')->get());
        }
        $assocs = Auth::user()->union->associations;
        foreach($assocs as $assoc){
            $user=User::where('association_id',$assoc->id)->get();
            $users=$users->merge($user);
        }
        
        return view('user.index')->with('users',$users);
    }
    public function create()
    {   
        return view('user.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:25|unique:users',
            'email' => 'unique:users',
            'password' => 'min:8',
            'confirmation_password' => 'same:password',
        ],[
            'name.unique'=>'اسم المستخدم موجود مسبقا.',
            'name.max'=>'اسم المستخدم يجب ان يحوي على الاكثر 25 محرف.',
            'email.unique'=>'البريد الالكتروني موجود مسبقا.',
            'password.min'=>'كلمة المرور يجب أن تحوي 8 محارف على الاقل.',
            'confirmation_password.same'=>'لا يوجد تطابق بين كلمة المرور وتأكيد كلمة المرور.'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->added_by=Auth::id();
        $user->save();
        session()->flash('success', 'تمت اضافة المستخدم بنجاح');
        return redirect()->route('union.index', ['name' => Auth::user()->union->name]);
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('user.edit')->with('user',$user);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'max:25|unique:users,name,'.$request->user_id,
            'email' => 'unique:users,email,'.$request->user_id,
            'password' => 'min:8',
            'confirmation_password' => 'same:password',
        ],[
            'name.unique' => 'اسم المستخدم موجود مسبقا.',
            'name.max' => 'اسم المستخدم يجب ان يحوي على الاكثر 25 محرف.',
            'email.unique' => 'البريد الالكتروني موجود مسبقا.',
            'password.min' => 'كلمة المرور يجب أن تحوي 8 محارف على الاقل.',
            'confirmation_password.same' => 'لا يوجد تطابق بين كلمة المرور وتأكيد كلمة المرور.'
        ]);

        $user=User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success', 'تمت تعديل بيانات المستخدم بنجاح');
        return redirect()->route('user.index');

    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        session()->flash('success', 'تمت حذف المستخدم بنجاح');
        return redirect()->route('user.index');
    }

    public function union_admin(Request $request){
        $new_admin =User::find($request->user_id);
        $current_admin=User::where('union_id',$request->union_id)->first();
        if($current_admin){
            $current_admin->union_id=NULL;
            $new_admin->union_id = $request->union_id;
            if ($new_admin->save() && $current_admin->save()) {
                $union = Union::find($request->union_id);
                session()->flash('success', 'تم تغيير مدير  ' . $union->name . ' بنجاح');
            }
        }else{
            $new_admin->union_id = $request->union_id;
            if ($new_admin->save()) {
                $union = Union::find($request->union_id);
                session()->flash('success', 'تم تعيين مدير' . $union->name . ' بنجاح');
            }
        }

        return redirect()->route('union.index', ['name' => Auth::user()->union->name]);
    }
    public function assoc_admin(Request $request)
    {
        $new_admin = User::find($request->user_id);
        $current_admin=User::where('association_id',$request->assoc_id)->first();
        if($current_admin){
            $current_admin->association_id=NuLL;
            $new_admin->association_id=$request->assoc_id;
            if ($new_admin->save() && $current_admin->save()) {
                $assoc = Association::find($request->assoc_id);
                session()->flash('success', 'تم تغيير مدير  ' . $assoc->name . ' بنجاح');
            }
        }else{
            $new_admin->association_id = $request->assoc_id;
            if ($new_admin->save()) {
            $assoc = Association::find($request->assoc_id);
            session()->flash('success', 'تم تعيين مدير  ' . $assoc->name . ' بنجاح');
            }

        }
        return redirect()->route('union.index', ['name' => Auth::user()->union->name]);
                                                     
    }
}
