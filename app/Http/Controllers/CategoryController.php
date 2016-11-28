<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    // 定义颜色
    protected $colors = array(
        'red' => '红色',
        'orange' => '橙色',
        'yellow' => '黄色',
        'olive' => '橄榄绿',
        'green' => '绿色',
        'teal' => '青色',
        'blue' => '蓝色',
        'violet' => '紫罗兰',
        'purple' => '紫色',
        'pink' => '粉色',
        'grey' => '灰色',
        'black' => '黑色'
    );
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::latest()->Paginate(8);
        return view('category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = $this->colors;
        return view('category.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'color' => 'required'
        ]);
        Category::create($request->all());
        return redirect('back/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $books = $category->book()->paginate(8);
        return view('category.show',compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $colors = $this->colors;
        return view('category.edit', compact('category', 'colors'));
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
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('back/category');
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
            $category = Category::findOrFail($id);
            $category->delete();
        }
        return redirect()->back();
    }
}
