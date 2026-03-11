<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>DevStreamBlog | Modern Laravel Developer Blog</title>

<meta name="description" content="DevStreamBlog is a modern developer blog where programmers share tutorials, coding tips, and Laravel insights.">
<meta name="keywords" content="laravel blog, php blog, developer tutorials, coding blog">
<meta name="author" content="DevStreamBlog">
<meta name="robots" content="index, follow">

<link rel="canonical" href="{{ url()->current() }}">

<meta name="theme-color" content="#111827">

<!-- OpenGraph -->
<meta property="og:type" content="website">
<meta property="og:title" content="DevStreamBlog">
<meta property="og:description" content="Programming tutorials, coding articles, and developer insights.">
<meta property="og:image" content="{{ Vite::asset('resources/images/dev.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="DevStreamBlog">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="DevStreamBlog">
<meta name="twitter:description" content="Programming tutorials and developer insights.">
<meta name="twitter:image" content="{{ Vite::asset('resources/images/dev.png') }}">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/images/dev.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/images/dev.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

@vite('resources/css/app.css')

<style>
body{
font-family:'Plus Jakarta Sans',sans-serif;
}
.glass{
background:rgba(255,255,255,0.7);
backdrop-filter:blur(12px);
}
</style>

@vite(['resources/js/app.js'])

</head>
<body class="bg-[#F8FAFC] text-slate-900">

    <nav class="glass sticky top-0 z-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/">
            <div class="flex items-center gap-1">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                   
                    <img src="{{ Vite::asset('resources/images/dev.png') }}" alt="logo.jgp">
                
                </div>
                <span class="text-2xl font-extrabold tracking-tight">DEV<span class="text-indigo-600 ">STREAMBLOG</span></span>
            </div>
            </a>
             <div class=" px-2 hidden md:flex items-center gap-8 text-md font-semibold text-slate-600">
                <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>
                <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Top Bloggers</a>
            </div> 
      <div class="flex items-center gap-4 font-bold  ">
                {{-- <button class="text-sm font-bold text-indigo-600 hover:text-indigo-700">Login</button> --}}
                @auth 
                <div class=" flex gap-x-0.5 sm:hidden md:hidden lg:hidden ">
                   {{-- <a href="/blogs/create">
                <button class="bg-slate-900 cursor-pointer  text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200">Post Blog +</button>
                </a> --}}
                
             
                    <img src="{{Storage::disk('s3')->url(auth()->user()->blogers->logo) }}" alt="pika" class="w-8 h-8 ml-1 bg-black  rounded-full object-cover">

                <form action="{{ route('logout') }}" method="POST" class="">
    @csrf
   <button type="submit" class=" cursor-pointer  bg-slate-900 text-white p-1 py-2.5 rounded-full text-[12px] font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200">LogOut</button>
</form>
                </div>
                    <div class="md:flex sm:flex gap-x-3 hidden">
                        
                        <a href="/blogs/create">
                <button class="bg-slate-900 cursor-pointer  text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200">Post a Blog +</button>
                </a>
                
             
                    <img src="{{ Storage::disk('s3')->url(auth()->user()->blogers->logo) }}" alt="pika" class="w-8 h-8 bg-black  rounded-full object-cover">

                <form action="{{ route('logout') }}" method="POST">
    @csrf
   <button type="submit" class="cursor-pointer  bg-slate-900 text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200">LogOut</button>
</form>
                
            </div>
            @endauth
            @guest
                <div class=" flex items-center gap-1 cursor-pointer pl-1 ">
                    <a href="/register" class="text-[12px] sm:text-sm  md:text-lg md:p-1  rounded-2xl bg-slate-800 p-0.5  text-white sm:block md:block lg:block">SignUp</a>
                    <a href="/login" class="text-[12px] sm:text-sm  md:text-lg md:p-1 rounded-2xl bg-slate-800 p-0.5 text-white sm:block md:block lg:block">Login</a>
                </div>
            @endguest
        </div>
        </div>
        <div class=" p-2 md:hidden lg:hidden flex items-center justify-center gap-8 text-md font-semibold bg-slate-900 text-white shadow-slate-200 flex-1">
                <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>
               <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Top Bloggers</a>
                @guest
                <a href="/login" class=" hover:text-indigo-600 transition-colors underline sm:hidden">Post a Blog+
                </a>
                @endguest
               @auth
               <a href="/blogs/create" class=" hover:text-indigo-600 transition-colors underline sm:hidden">Post a Blog+</a>
                @endauth
            </div> 
        
    </nav>


    <header class="max-w-7xl mx-auto px-6 pt-12 pb-20">

        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-wider">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-600"></span>
                    </span>
                    Laravel Project
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold leading-[1.1] tracking-tight text-slate-900">
                   A Modern <span class="text-indigo-600">Laravel Blog Platform</span>.
                </h1>
                <p class="text-lg text-slate-600 leading-relaxed max-w-lg">
                    A full-stack blogging application built with Laravel and TailwindCSS where developers can publish articles, explore topics, and discover top contributors. 
            Features include authentication, blog management, tagging, search, featured posts, and a scalable content structure.
                </p>
                <section>
                    <div class="text-center"> 
                        <form action="/search" method="GET" class="flex items-center gap-2 max-w-xl mx-auto">

        <button type="submit" class="p-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>

        <input 
            type="text"
            name="q"
            class="flex-1 hover:border-indigo-600 focus:border-indigo-700 text-gray-800 bg-gray-100 border p-4 rounded-2xl"
            placeholder="Search For a Blog here.."
        >

    </form>
                    </div>
                </section>
                {{-- <div class="flex items-center gap-4 pt-4">
                    <img src="https://ui-avatars.com/api/?name=User&background=6366f1&color=fff" class="w-12 h-12 rounded-full border-2 border-white shadow-sm" alt="Author">
                    <div>
                        <p class="font-bold text-slate-900">Alex Rivera</p>
                        <p class="text-sm text-slate-500">Mar 6, 2026 • 12 min read</p>
                    </div>
                </div> --}}
            </div>
            <div class="relative group">
                <div class="absolute -inset-1 bg-linear-to-r from-indigo-500 to-purple-600 rounded-3xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
                <img src="https://images.pexels.com/photos/3521937/pexels-photo-3521937.jpeg" 
                     class="relative rounded-3xl shadow-2xl w-full object-cover aspect-4/3" alt="Featured Image">
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 pb-24">
        {{-- <div class="flex items-end justify-between mb-12 border-b border-slate-200 pb-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight">Recent Updates</h2>
                <p class="text-slate-500 mt-2">The latest industry insights and technical guides.</p>
            </div>
            <div class="hidden sm:flex gap-2">
                <button class="p-2 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg></button>
                <button class="p-2 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></button>
            </div>
        </div> --}}
            <x-section-heading> Tags</x-section-heading>
         <div class="p-2 flex flex-wrap items-center justify-center gap-2 text-md font-semibold text-slate-800">
            @foreach ($tags as $tag)
                <a href="/tags/{{strtolower($tag->name)}}" class="hover:text-indigo-600   border border-white  hover:border hover:border-indigo-600   transition-colors px-3 py-1 text-[12px] bg-gray-200 rounded-full">{{$tag->name}}</a>
            @endforeach
             
</div>
        <x-section-heading>Featured Blogs</x-section-heading>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16">
            @foreach($featuredBlogs as $fblog)
            <article class="group cursor-pointer">
               <a href="/blog/{{$fblog->id}}">
                <div class="relative overflow-hidden rounded-2xl mb-6 bg-slate-200 aspect-16/10">
                    <img src="{{ Storage::disk('s3')->url($fblog->image) }}" alt="blog-image.jgp" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500 transform ease-in-out" alt="Post thumbnail">
                    <div class="absolute top-4 left-4">
                        {{-- <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Development</span> --}}
                         @if($fblog->featured)
                                <span class=" top-4 left-4 z-10 bg-indigo-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                                    Featured
                                </span>
                            @endif
                    </div>
                </div> 
                <h3 class="text-2xl font-bold leading-tight group-hover:text-indigo-600 transition-colors">{{ \Illuminate\Support\Str::limit($fblog->title, 27, '...') }}</h3>
                <p class="text-slate-600 mt-3 line-clamp-2 leading-relaxed text-sm">{{ \Illuminate\Support\Str::limit($fblog->desc, 116, '...') }}</p>
                </a>
                <div class="mt-6 flex items-center justify-between">
                    <a href="{{ route('bloger.profile', $fblog->blogers->id) }}">
                    <div class="flex items-center gap-2 bg-indigo-100 hover:bg-indigo-200 p-1 rounded">
                        <img class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-[10px] font-bold" src="{{ Storage::disk('s3')->url($fblog->blogers->logo) }}">
                        <span class="text-sm font-semibold text-black rounded hover:text-white hover:bg-indigo-600 px-1">{{$fblog->blogers->name}}</span>
                    </div>
                    </a>
                    <span class="text-xs text-slate-400 font-medium italic">{{ $fblog->created_at->diffForHumans() }}</span>
                </div>
               
            </article>
             @endforeach           
        </div>
        <x-section-heading>Blogs</x-section-heading>
        <div class=" ">
            @foreach ($blogs as $blog)
           <x-blog-card :blog='$blog'></x-blog-card>     
            @endforeach
        </div>
</div>
    </main>

<x-footer></x-footer>

</body>
</html>