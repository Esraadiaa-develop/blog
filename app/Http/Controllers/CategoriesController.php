<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        //return view('categories.index');
        return view('categories.index')->with('categories',category::all());
    }

    
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
        ]);
        //dd($request->all());
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        //return redirect()->back();
        return redirect()->route('category.create');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit')->with('category',$category);
    }

    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories');
    }

   
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories');
    }
}
