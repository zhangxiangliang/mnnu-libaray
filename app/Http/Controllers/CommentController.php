<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return redirect()->route('show_book',[$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if(\Auth::user()->can('forbin')) {
            $this->validate($request, ['content' => 'required|min:5']);
            $comment = Comment::create($request->all());
            $comment->book()->attach($id);
            $comment->user()->attach(\Auth::user()->id);
            return redirect()->route('show_book', [$id]);
        } else {
            return redirect()->back()->withErrors('对不起，您已被禁言，请与管理员联系');
        }
    }

    public function destroy($id)
    {
        if(\Auth::user()->isAdmin()){
            $comment = Comment::findOrFail($id);
            $comment->delete();
        }
        return redirect()->back();
    }
}
