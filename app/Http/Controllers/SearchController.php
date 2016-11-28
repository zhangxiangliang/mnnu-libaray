<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
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
        
        if(count($book_content) > 0 || count($book_name) > 0 || count($book_author) > 0 || count($book_company) > 0 || 
        count($users) > 0){
            return view('search.result', compact('book_content', 'book_name', 'book_author', 'book_company', 'users'));
        } else {
            $books = Book::latest()->simplePaginate(15);
            return view('search.result', compact('books'));
        }
    }
}
