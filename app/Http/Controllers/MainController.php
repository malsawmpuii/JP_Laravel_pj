<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class MainController extends Controller
{
    public function main($value='')
  {
    return view('frontend.main');
  }

  public function detail($id)
  {
  	$post=Post::find($id);
    return view('frontend.detail',compact('post'));

    /*$items=Item::where('brand_id',$id)->get();

     return view('/frontend/brand',compact('items'));*/
  }
}
