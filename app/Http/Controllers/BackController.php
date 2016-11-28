<?php

namespace App\Http\Controllers;

use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use APP\Book;
use App\Comment;
use Illuminate\Support\Facades\DB;


class BackController extends Controller
{

    public function index()
    {
        $database = DB::table('backdatas')->orderBy('id', 'desc')->first();
        return view('back.index',compact('database'));
    }

    public function book()
    {
        $books = Book::latest()->paginate(5);
        return view('back.book', compact('books'));
    }

    public function comment()
    {
        $comments = Comment::latest()->paginate(4);
        return view('back.comment', compact('comments'));
    }

    public function user()
    {
        $users = User::latest()->whereHas('roles',function($q){
                $q->where('level', '!=', '1')
                    ->where('level', '!=', '3');})->simplePaginate(15);
        $title = "学生";
        return view('back.user', compact('users','title'));
    }

    public function admin()
    {
        if(\Auth::user()->isAdmin()){
            $users = User::latest()->whereHas('roles',function($q){
                $q->where('level', '=', '1');})->simplePaginate(15);
            $title = "管理员";
            return view('back.user', compact('users','title'));
        } else {
            return redirect()->back();
        }
    }

    public function teacher()
    {
        $users = User::latest()->whereHas('roles', function($q){
            $q->where('level', '=', '3');})->simplePaginate(15);
        $title = "老师";
        return view('back.user', compact('users','title'));
    }

    public function forbin(){
        $users = User::latest()->simplePaginate(15);
        return view('back.forbin',compact('users'));
    }

    public function infomation(){
        DB::select('call backdatas');
        $database = Book::latest();
        return redirect()->back();
    }
}
