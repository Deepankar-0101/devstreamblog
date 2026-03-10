<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Http\Request;
// $blogs=Blog::where('')
class TagController extends Controller
{
    public function __invoke(Tag $tag){
        return view('results',['Blogs'=>$tag->blog]);
    }
}
