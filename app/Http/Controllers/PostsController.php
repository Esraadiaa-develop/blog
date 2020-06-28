<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    //    return view('posts.index');

        return view('posts.index')->with('posts',Post::all());  
    }


    public function create()
    {
        // return view('posts.create');
        return view('posts.create')->with('categories',Category::all());
    }

  
    public function store(Request $request)
    {
        $this->validate($request,[
            "title"=>"required",
            "content"=>"required",
            "category_id"=>"required",
            "image"=>"required",
        ]);
        // dd($request->all());
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/posts',$image_new_name);
        
        $post = Post::create([
            "title" =>$request->title,
            "content" =>$request->content,
            "category_id" =>$request->category_id,
            "image" =>'uploads/posts/'.$image_new_name,
        ]);
        // dd($request->all());
        return redirect()->route('posts');
    }


    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $post = Post::find($id);
        // return view('posts.edit')->with('posts',$post);
        return view('posts.edit')->with('posts',$post)->with('categories',Category::all());
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id); 
        $this->validate($request,[
            "title"=>"required",
            "content"=>"required",
            "category_id"=>"required",
        ]);

        if ($request->hasFile('image')) {
           $image = $request->image;
           $image_new_name = time() . $image->getClientOriginalName();
           $image->move('uploads/posts/', $image_new_name);
           $post->image = 'uploads/posts/' . $image_new_name;
        }     
           $post->title = $request->title;
           $post->content = $request->content;
           $post->category_id = $request->category_id;
           $post->save();
           return redirect()->route('posts');

    }

  
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }


    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
        return view('posts.softdeleted')->with('posts',$post);
    }


    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->route('posts');
    }

}