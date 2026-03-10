<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Top-Bloggers</title>
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
            <div class="flex items-center gap-1">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                    <img src="{{ Vite::asset('resources/images/dev.png') }}" alt="">
                </div>
                <span class="text-2xl font-extrabold tracking-tight">DEV<span class="text-indigo-600 ">STREAMBLOG</span></span>
            </div>
            </a>
             <div class=" px-2 hidden md:flex items-center gap-8 text-md font-semibold text-slate-600">
                <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>
               <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Top-Bloggers</a>
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
<div class="bg-[#F8FAFC] min-h-screen pb-20">
    
    <header class="bg-white border-b border-slate-200 pt-16 pb-12 mb-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase tracking-[0.2em]">
                    The Community
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                    Top <span class="text-indigo-600">Bloggers</span>
                </h1>
                <p class="text-slate-500 max-w-lg text-lg">
                    The brilliant minds sharing their journey through code, language, and life.
                </p>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($blogers as $index => $bloger)
                    <a href="{{ route('bloger.profile', $bloger->id) }}"
                   class="group cursor-pointery relative bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-indigo-100/50 transition-all duration-500 transform hover:-translate-y-2">
                    
                    <div class="absolute top-6 right-6 text-amber-400 font-black text-4xl group-hover:text-amber-600 transition-colors">
                        {{ $index + 1 }}
                    </div>

                    <div class="relative mb-6">
                        <div class="w-24 h-24 mx-auto relative z-10">
                            <img src="{{ asset('storage/' . $bloger->logo) }}" 
                                 alt="{{ $bloger->name }}" 
                                 class="w-full h-full rounded-4xlject-cover shadow-inner border-4 border-white">
                        </div>
                        <div class="absolute inset-0 bg-amber-200 rounded-4xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500 scale-75 group-hover:scale-110"></div>
                    </div>

                    <div class="text-center relative z-10">
                        <h2 class="text-xl font-bold text-slate-900 group-hover:text-amber-500 transition-colors">
                            {{ $bloger->name }}
                        </h2>
                        
                        <div class="mt-4 flex flex-col items-center gap-2">
                            <span class="px-4 py-1.5 bg-slate-50 text-slate-600 text-[10px] font-bold rounded-full uppercase tracking-widest group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                {{ $bloger->blogs_count }} Published Blogs
                            </span>
                            
                            <div class="flex items-center gap-1 text-indigo-500 mt-2 opacity-0 group-hover:opacity-100 transition-all transform translate-y-2 group-hover:translate-y-0">
                                <span class="text-xs font-bold">View Profile</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </div>
                    </div>
          </a>
            @endforeach
        </div>
    </main>
</div>

   <x-footer></x-footer>
</body>
</html>