<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Association;
use App\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'unique:members',
            'exam_id' => 'unique:members',

        ], [
            'phone.unique' => 'رقم الهاتف موجود مسبقا .',
            'exam_id.unique' => 'رقم قرار الفحص المسلكي موجود مسبقا .',
        ]);

        //upload image file to uploads/members
        $image = $request->image;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/members', $image_new);

        $member = new Member;
        $member->name = $request->name;
        $member->fname = $request->fname;
        $member->mname = $request->mname;
        $member->lname = $request->lname;
        $member->birthdate = $request->birthdate;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->affiliation_year = Carbon::now()->format('Y');
        $member->exam_id = $request->exam_id;
        $member->image = 'uploads/members/' . $image_new;
        $member->member_id=Member::where('association_id', Auth::user()->association->id)->max('member_id')+1;
        $member->craft_id = Auth::user()->association->union->city->postal_code . str_pad(Auth::user()->association->association_id,2,"0",STR_PAD_LEFT). str_pad($member->member_id, 4, "0", STR_PAD_LEFT);
        $member->association_id = Auth::user()->association->id;
        $member->save();
        session()->flash('success', 'تمت اضافة العضو بنجاح');
        return redirect()->route('association.index');
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.edit')->with('member', $member);
    }

    public function update(Request $request)
    {
        // $this->validate($request,[
        //     'phone'=>'unique:members,phone,'.$request->phone
        // ],[
        //     'phone.unique' => 'رقم الهاتف موجود مسبقا.'
        // ]);
        $member=Member::find($request->member_id);
        $member->name = $request->name;
        $member->fname = $request->fname;
        $member->mname = $request->mname;
        $member->lname = $request->lname;
        $member->birthdate = $request->birthdate;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->status=$request->status;
        $member->save();
        session()->flash('success', 'تم تعديل بيانات العضو بنجاح');
        return redirect()->route('association.index');
    }

    public function union_members()
    {
        $members=collect();
        if(Auth::user()->union->id==1){
        $members=Member::all();
        }else{
            $assocs=Auth::user()->union->associations;
            foreach($assocs as $assoc){
            $temp=Member::where('association_id',$assoc->id)->get();
            $members=$members->merge($temp);
            }
        }
        return view('union.members_info')->with('members',$members);
    }

    public function assoc_members($status)
    {
        $assoc = Association::where('id', Auth::user()->association->id)->first();
        $members = $assoc->members->where('status',$status);
        return view('association.members_info')->with('members', $members);
    }

    public function all_assoc_members()
    {
        $members = Member::where('association_id', Auth::user()->association->id)->get();
        return view('association.members_info')->with('members', $members);
    }

    public function members_count(Request $request){
        $memberscount=collect();
        $assocsnames=collect();
        $assocs =Association::where('union_id', Auth::user()->union->id)->get();
        foreach($assocs as $assoc){
            $assocsnames=$assocsnames->merge($assoc->name);
            $counts=$assoc->members->where('affiliation_year',$request->ye)->count();
            $memberscount=$memberscount->merge($counts);
        }
        return response()->json(['names' => $assocsnames,'counts'=>$memberscount],200);
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        foreach($member->fees as $fee){
            $fee->forcedelete();
        }
        $member->delete();
        session()->flash('success', 'تمت حذف العضو بنجاح');
        return redirect()->route('member.all_assoc_members');
    }

}

