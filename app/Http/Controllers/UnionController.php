<?php

namespace App\Http\Controllers;

use App\Association;
use App\Union;
use App\User;
use Illuminate\Support\Facades\Auth;
class UnionController extends Controller
{
    public function index($name)
    {
        $union=Union::where('name',$name)->first();
        return view('union.index')->with('union',$union);
    }
    public function select_union_admin()
    {
        $users = User::wherenull('union_id')->wherenull('association_id')->where('added_by',Auth::id())->get();
        return view('union.select_union_admin')->with('users', $users);
    }

    public function select_assoc_admin()
    {
        $users = User::wherenull('association_id')->wherenull('union_id')->where('added_by', Auth::id())->get();
        return view('union.select_assoc_admin')->with('users', $users);
    }

    public function associations_members_number()
    {
        return view('union.associations_members_number');
    }
}
