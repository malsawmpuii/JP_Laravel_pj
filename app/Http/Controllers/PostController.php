<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('backend.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create',compact('categories')); // form
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            "title"=>"required",
            "photo"=>"required",
            "category"=>"required",
            "content"=>"required"
        ]);

        //if file include, upload
         if ($request->file()) {
             $fileName= time().'_'.$request->photo->getClientOriginalName();
             $filePath= $request->file('photo')->storeAs('posts_photo',$fileName,'public');
             $filePath='/storage/'.$filePath;
         }
        //data store

         $post= new Post;
         $post->title= $request->title;
         $post->photo= $filePath;
         $post->category_id= $request->category;
         $post->content=$request->content;
         $post->save();

        //return redirect
         return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.posts.detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('backend.posts.edit',compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
                //validation
        $request->validate([
            "title"=>"required",
            "photo"=>"sometimes",
            "category"=>"required",
            "content"=>"required"
        ]);

        //if file include, upload
         if ($request->file()) {
             $fileName= time().'_'.$request->photo->getClientOriginalName();
             $filePath= $request->file('photo')->storeAs('posts_photo',$fileName,'public');
             $filePath='/storage/'.$filePath;
         }
         else{
            $filePath= $request->oldprofile;

         }
        //data store
         $post->title= $request->title;
         $post->photo= $filePath;
         $post->category_id= $request->category;
         $post->content=$request->content;
         $post->save();

        //return redirect
         return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $posts->delete();
        return redirect()->route('posts.index');
    }
}
