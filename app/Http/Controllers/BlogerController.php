<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogers;
use App\Models\User;
class BlogerController extends Controller
{
    public function profile($id)
{
    $bloger = Blogers::with('blogs')->findOrFail($id);
    return view('blogers.profile', compact('bloger'));
}
 public function topBlogers()
{
    // Get users who have blogs, ordered by number of blogs
    $blogers = Blogers::has('blogs')
        ->withCount('blogs') // adds blogs_count attribute
        ->orderByDesc('blogs_count')
        ->take(20) // top 20 blogers
        ->get();

    return view('blogers.top', compact('blogers'));
}
}
