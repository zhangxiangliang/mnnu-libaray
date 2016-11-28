<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('content');
        $book_content = Book::where('content', 'like', '%'.$search.'%')->get();
        $book_name = Book::where('name', 'like', '%'.$search.'%')->get();
        $book_author = Book::where('author', 'like', '%'.$search.'%')->get();
        $book_company = Book::where('published_company', 'like', '%'.$search.'%')->get();
        $users = User::where('name', 'like', '%'.$search.'%')->get();
        $categorys = Category::where('name', 'like', '%'.$search.'%')->get();
        $books = array();

        if(count($book_content) == 0 && count($book_name) == 0 && count($book_author) == 0 && count($book_company) == 0 && count($users) == 0 && count($categorys)){
            $books = Book::latest()->simplePaginate(4);
        }

        return view('search.result', compact('book_content', 'book_name', 'book_author', 'book_company', 'users', 'categorys', 'books'));
    }
}
