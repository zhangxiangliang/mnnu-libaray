<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Bican\Roles\Models\Permission;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function library()
    {
        $books = Book::latest()->Paginate(8);
        return view('index',compact('books'));
    }

    /**
     * Borrow book.
     *
     * @return \Illuminate\Http\Response
     */
    public function borrow($id)
    {
        $user = Auth::user();
        $book = Book::findOrFail($id);
        $borrow = $user->book()->wherePivot('status',0)->where('book_id', '=', $id)->get();
        $borrowed = $user->book()->wherePivot('status',1)->where('book_id', '=', $id)->get();

        if($borrow->count()){
            return redirect()->route('show_book', [$id])
                    ->withErrors('您已经借阅了本书，请不要重复借阅');
        }else if($borrowed->count()){
            $user->book()->updateExistingPivot($id,['status' => 0]);
            $book->borrow = $book->borrow + 1;
            $book->save();
            return redirect()->route('show_book', [$id])
                    ->with('success', '借阅成功');
        } else if($book->number == $book->borrow){
            return redirect()->route('show_book', [$id])
                    ->withErrors('对不起，在馆书籍已全部借出');
        }else{
            $user->book()->attach($id,['status' => 0]);
            $book->borrow = $book->borrow + 1;
            $book->save();
            return redirect()->route('show_book', [$id])
                    ->with('success', '借阅成功');
        }
    }

    public function back($id){
        $user = Auth::user();
        $book = Book::findOrFail($id);
        $borrow = $user->book()->wherePivot('status',0)->where('book_id', '=', $id)->get();

        if($borrow->count()){
            $user->book()->updateExistingPivot($id,['status' => 1]);
            $book->borrow = $book->borrow - 1;
            $user->borrow = $user->book()->count();
            $user->save();
            $book->save();
            return redirect()->route('info_user', [$user->id])
                ->withSuccess('还书成功');
        }else{
            return redirect()->route('info_user', [$user->id])
                ->withErrors('您并未借阅此本书');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = new Book;
        $books = $books->Paginate(8);
        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin()){
            $categorys = \App\Category::all();
            return view('book.create', compact('categorys'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        $file = Input::file('fileselect');
        if(!$file){
            $error = '请不要上传空图片';
            return redirect()->back()->withErrors($error);
        }
        $input = array('image' => $file);
        $rules = array('image' => 'image');
        $validator = Validator::make($input, $rules);
        if ( $validator->fails() ) {
            $error = '请不要上传非图片文件';
            return redirect()->back()->withErrors($error);
        }
        $destinationPath = 'assets/book/';
        $filename = $request->input('name').'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $book = Book::create($request->all());
        $book->cover = $filename;
        $book->save();
        return redirect('back');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $comments = $book->comment;
        return view('book.show', compact('book', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categorys = \App\Category::all();
        return view('book.edit', compact('book', 'comments', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = Input::file('fileselect');
        if(!$file){
            $book = Book::find($id);
            $book->update($request->all());
            return redirect('back/book');
        }
        $input = array('image' => $file);
        $rules = array('image' => 'image');
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            $error = '请不要上传非图片文件';
            return redirect('back/book/create')
                ->withErrors($error);
        }
        $destinationPath = 'assets/book/';
        $filename = md5($request->input('name')).'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $book = Book::find($id);
        $book->update($request->all());
        $book->cover = $filename;
        $book->save();
        return redirect('back/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user()->isAdmin()){
            $book = Book::findOrFail($id);
            $book->delete();
        }
        return redirect()->back();
    }
}
