
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Search Result Page</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); }
    </style>
    @vite(['resources/js/app.js'])
    <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ Vite::asset('resources/images/dev.png') }}">
</head>
<body class="bg-[#F8FAFC] text-slate-900">

   
<nav class="glass sticky top-0 z-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/">
            <div class="flex items-center gap-1 ">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                    <img src="{{ Vite::asset('resources/images/dev.png') }}" alt="">
                </div>
                <span class="text-2xl font-extrabold tracking-tight">DEV<span class="text-indigo-600 ">STREAMBLOG</span></span>
            </div>
            </a>
             <div class=" px-2 hidden md:flex items-center gap-8 text-md font-semibold text-slate-600">
                <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>
               <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Bloggers</a>
            </div> 
          <div class="flex items-center gap-4 font-bold ">
                {{-- <button class="text-sm font-bold text-indigo-600 hover:text-indigo-700">Login</button> --}}
                @auth 
                    <div class="flex gap-x-3">
                {{-- <img src="{{ asset('storage/' . auth()->user()->blogers->logo) }}" class="w-8 h-8" alt="pika"> --}}
                <form action="{{ route('logout') }}" method="POST">
    @csrf
   <button type="submit" class="cursor-pointer  bg-slate-900 text-white px-2 p-1  rounded-full text-sm font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200">LogOut</button>
</form>
                
            </div>
            @endauth
            @guest
                <div class=" flex items-center gap-1 cursor-pointer pl-2">
                   <a href="/register" class="text-[12px] sm:text-sm  md:text-lg md:p-1  rounded-2xl bg-slate-800 p-0.5  text-white sm:block md:block lg:block">SignUp</a>
                    <a href="/login" class=" text-[12px] sm:text-sm  md:text-lg md:p-1 rounded-2xl bg-slate-800 p-0.5 text-white sm:block md:block lg:block">Login</a>
                </div>
            @endguest
        </div>
        </div>
         

    </nav>
    <div class=" p-2 md:hidden lg:hidden flex items-center justify-center gap-8 text-md font-semibold bg-slate-900 text-white shadow-slate-200 flex-1">
            
            <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>
            <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Top-Bloggers</a>
            @auth
            <a href="/bloger/{{auth()->user()->blogers->id}}"class="ml-10">
            <img src="{{ asset('storage/' . auth()->user()->blogers->logo) }}" class="w-8 h-8 rounded-full text-center" alt="pika">
            <span class="text-[12px]">{{auth()->user()->blogers->name}}</span>
            @endauth</a>
            </div> 
    {{-- @if(isset($searchedBlogs))
@foreach ($searchedBlogs as $blog)
           <x-blog-card :blog=$blog></x-blog-card>     
@endforeach
@endif --}}
<div class=" text-center w-[90%]">
<form action="/search" method="GET" class="mt-5 ml-5 flex items-center gap-2 max-w-xl mx-auto">

        <button type="submit" class=" p-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>

        <input 
            type="text"
            name="q"
            class="flex-1 hover:border-indigo-600 focus:border-indigo-700 text-gray-800 bg-gray-100 border p-2 rounded-2xl"
            placeholder="Search For a Blog here.."
        >

    </form></div>
@php
    $blogCollection = isset($searchedBlogs) ? $searchedBlogs : $Blogs;
@endphp
<div class="min-h-[100vw]">
@forelse ($blogCollection as $blog)
    
    <x-blog-card :blog="$blog"></x-blog-card>
@empty
    <div class="col-span-full text-center py-10 text-slate-500 font-semibold ">
        No blogs found for your search.
    </div>
@endforelse
</div>
<x-footer></x-footer>

</body>
</html>