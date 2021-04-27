<?php

namespace App\Http\Controllers;

use App\Association;
use App\Union;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AssociationController extends Controller
{
    public function index()
    {
        /*status:
        0==على رأس العمل
        1==متقاعد
        2==متوفي
        3==مفصول
        4==ايقاف عمل
        */
        $assoc = Association::find(Auth::user()->association->id);
        $onthejob = $assoc->members->where('status',0)->count();
        $retired =  $assoc->members->where('status',1)->count();
        $deceased = $assoc->members->where('status',2)->count();
        $disconnected =  $assoc->members->where('status',3)->count();
        $stoped =  $assoc->members->where('status',4)->count();
        return view('association.index')->with('onthejob',$onthejob)
                                        ->with('retired',$retired)
                                        ->with('deceased',$deceased)
                                        ->with('disconnected',$disconnected)
                                        ->with('stoped',$stoped);
    }

    public function create()
    {
        return view('association.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'unique:associations,union_id|unique:associations,name|max:25',
            'decision_number' => 'unique:associations',
            
        ],[
            'name.max' => 'اسم الجمعية يجب ان يحوي على الاكثر 25 محرف.',
            'name.unique'=>'اسم الجمعية موجود مسبقا ضمن نفس الاتحاد .',
            'decision_number.unique' => 'رقم الاشهار موجود مسبقا .',
        ]);
        $assoc = new Association;
        $last_association=Association::where('union_id',Auth::user()->union->id)->latest()->first();
        if($last_association){
            $assoc->association_id=($last_association->association_id)+1;
        }else{
            $assoc->association_id=1;
        }
        $assoc->name = $request->name;
        $assoc->decision_number = $request->decision_number;
        $assoc->decision_date = $request->decision_date;
        $assoc->union_id= Auth::user()->union->id;
        $assoc->save();
        session()->flash('success', 'تمت اضافة الجمعية بنجاح');
        return redirect()->route('union.index',['name'=>Auth::user()->union->name]);
    }


    public function edit($id)
    {
        $assoc = Association::find($id);
        return view('association.edit')->with('assoc', $assoc);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:25|unique:associations,name,'. $request->assoc_id,
            'decision_number' => 'unique:associations,decision_number,'.$request->assoc_id,

        ], [
            'name.max' => 'اسم الجمعية يجب ان يحوي على الاكثر 25 محرف.',
            'name.unique' => 'اسم الجمعية موجود مسبقا ضمن نفس الاتحاد .',
            'decision_number.unique' => 'رقم الاشهار موجود مسبقا .',
        ]);
        $assoc=Association::find($request->assoc_id);
        $assoc->name = $request->name;
        $assoc->decision_number = $request->decision_number;
        $assoc->decision_date = $request->decision_date;
        $assoc->save();
        session()->flash('success', 'تمت تعديل بيانات الجمعية بنجاح');
        return redirect()->route('union.index', ['name' => Auth::user()->union->name]);
        
    }

    public function destroy($id)
    {
        $assoc = Association::find($id);
        $assoc->user->delete();
        $assoc->diwan->delete();
        foreach ($assoc->members as $member) {
            $member->forcedelete();
        }
        $assoc->delete();
        session()->flash('success', 'تمت حذف الجمعية بنجاح');
        return redirect()->route('union.index', ['name' => Auth::user()->union->name]);
    }


}
