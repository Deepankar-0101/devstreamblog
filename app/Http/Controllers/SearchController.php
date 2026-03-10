<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
class SearchController extends Controller
{
    public function __invoke(){
        $searchedBlogs=Blog::where('title','LIKE','%'.request('q').'%')->get();
        return view('results',['searchedBlogs'=>$searchedBlogs]);

    }
}
