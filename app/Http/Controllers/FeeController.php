<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Member;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index($fee_type)
    {
       
        $fees=Fee::where('fee_type',$fee_type)->get();
        
        return view('fee.index')->with('fees',$fees);
    }

    public function create($member_id)
    {
        $member=Member::find($member_id);
        return view('fee.create')->with('member',$member);
    }

    public function store(Request $request)
    {
        $fee = new Fee;
        $fee->fee_type = $request->fee_type;
        $fee->fee_amount = $request->fee_amount;
        $fee->fee_date = $request->fee_date;
        $fee->member_id = $request->member_id;
        $fee->craft_id = $request->craft_id;
        $fee->save();
        session()->flash('success', 'تم دفع الرسم بنجاح');
        return redirect()->route('fee.index',['fee_type'=>$request->fee_type]);
        
    }
}
