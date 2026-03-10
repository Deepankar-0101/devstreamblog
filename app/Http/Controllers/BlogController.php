<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogers;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogPosted;
use Illuminate\Support\Arr;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function like(Blog $blog)
{
    $blog->increment('likes');

    return back();
}
    public function index()
    {
        $featuredBlogs = Blog::where('featured', true)->latest()->get();
        return view('index',[
           'blogs'=>Blog::latest()->get(),
           'tags'=>Tag::all(), 
           'featuredBlogs'=>$featuredBlogs,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'desc'       => 'required|string|max:500',
            'featured'   => 'nullable|boolean',
            'heading'    => 'required|string|max:255',
            'paragraph'  => 'required|string',
            'conclusion' => 'required|string|max:500',
            'tags'       => [
                'required',
                'string',
                'max:100',
                function ($attribute, $value, $fail) {
                    // Custom validation: max 3 tags
                    $tags = array_filter(array_map('trim', explode(',', $value)));
                    if (count($tags) > 3) {
                        $fail('You can only add up to 3 tags.');
                    }
                }
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
        $path = $request->file('image')->store('blogs', 'public'); // stores in storage/app/public/blogs
        $validated['image'] = $path; // save path to database
    }
        $blog=Auth::user()->blogers->blogs()->create(Arr::except($validated,'tags'));
         if ($validated['tags'] ?? false) {

        $tags = array_filter(array_map('trim', explode(',', $validated['tags'])));
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        $blog->tags()->attach($tagIds);
    }
     Mail::to($request->user()->email)->send(new BlogPosted($blog));
        return redirect('/');
    //     return ( [
    //     'message' => 'Blog created successfully!',
    //     'redirectUrl' => route('blogs.index'), // replace with your route
    //     'countdown' => 5, // seconds
    // ]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

  $blog=Blog::find($id);
    return view('blog', ['blog' => $blog]);

    }
    public function showall()
{
    // Getting 9 posts per page, ordered by newest first
    $blogs = Blog::with('blogers')->latest()->paginate(9);
    
    return view('blogs', compact('blogs'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $blog = Auth::user()->blogers->blogs()->findOrFail($id);

    return view('blog-edit', compact('blog'));
}

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
            $blog =  Blog::findOrFail($id)->delete();
    return redirect('/blogs');
    }
    public function update(Request $request, $id)
{
    $blog = Auth::user()->blogers->blogs()->findOrFail($id);

    $validated = $request->validate([
        'title'      => 'required|string|max:255',
        'desc'       => 'required|string|max:500',
        'featured'   => 'nullable|boolean',
        'heading'    => 'required|string|max:255',
        'paragraph'  => 'required|string',
        'conclusion' => 'required|string|max:500',
        'tags'       => [
            'required',
            'string',
            'max:100',
            function ($attribute, $value, $fail) {
                $tags = array_filter(array_map('trim', explode(',', $value)));
                if (count($tags) > 3) {
                    $fail('You can only add up to 3 tags.');
                }
            }
        ],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Upload new image if exists
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('blogs', 'public');
        $validated['image'] = $path;
    }

    // Update blog
    $blog->update(Arr::except($validated, 'tags'));

    // Update tags
   if ($validated['tags'] ?? false) {

        $tags = array_filter(array_map('trim', explode(',', $validated['tags'])));
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => strtolower($tagName)]);
            $tagIds[] = $tag->id;
        }

        // Replace old tags with new ones
        $blog->tags()->sync($tagIds);
    }
    return redirect('/blogs');
}
}
