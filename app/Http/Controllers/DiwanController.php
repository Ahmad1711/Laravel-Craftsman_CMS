<?php

namespace App\Http\Controllers;

use App\Diwan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiwanController extends Controller
{
    public function index()
    {
        $books=Diwan::where('association_id',Auth::user()->association->id)->get();
        return view('diwan.index')->with('books',$books);
    }
    public function create()
    {
        return view('diwan.create');
    }

    public function store(Request $request)
    {
        //upload image file to uploads/books
        $image = $request->book_file;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/books', $image_new);

        $diwan = new Diwan();
        $diwan->book_id = $request->book_id;
        $diwan->book_type = $request->book_type;
        $diwan->book_date = $request->book_date;
        $diwan->book_address = $request->book_address;
        $diwan->book_file = 'uploads/books/' . $image_new;
        $diwan->association_id = Auth::user()->association->id;
        $diwan->save();
        session()->flash('success', 'تمت اضافة الكتاب بنجاح');
        return redirect()->route('diwan.index');
    }
}
