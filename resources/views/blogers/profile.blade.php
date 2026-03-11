<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Bloger's Profile</title>
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
               <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Bloggers</a>
            </div> 
          <div class="flex items-center gap-4 font-bold ">
                {{-- <button class="text-sm font-bold text-indigo-600 hover:text-indigo-700">Login</button> --}}
                @auth 
                    <div class="flex gap-x-3">
                {{-- <img src="{{Storage::disk('s3')->url(auth()->user()->blogers->logo) }}" class="w-8 h-8" alt="pika"> --}}
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
            <img src="{{Storage::disk('s3')->url(auth()->user()->blogers->logo) }}" class="w-8 h-8 rounded-full text-center" alt="pika">
            <span class="text-[12px]">{{auth()->user()->blogers->name}}</span>
            @endauth</a>
            </div> 
<div class="bg-[#F8FAFC] min-h-screen pb-20">
    
    <header class="relative bg-white border-b border-slate-200 overflow-hidden">
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-indigo-50 rounded-full blur-3xl opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-6 py-16 relative z-10">
            <div class="flex flex-col md:flex-row items-center md:items-end gap-8">
                <div class="relative">
                    <div class="w-32 h-32 md:w-40 md:h-40 bg-white p-2 rounded-[2.5rem] shadow-2xl shadow-indigo-100 border border-slate-100">
                        <img src="{{Storage::disk('s3')->url($bloger->logo) }}" 
                             alt="{{ $bloger->name }}" 
                             class="w-full h-full object-cover rounded-4xl">
                    </div>
                    <div class="absolute -bottom-2 -right-2 bg-green-500 w-6 h-6 rounded-full border-4 border-white shadow-sm" title="Active Creator"></div>
                </div>

                <div class="flex-1 text-center md:text-left space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase tracking-[0.2em]">
                        Verified Blogger
                    </div>
                    <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        {{ $bloger->name }}
                    </h1>
                    
                    <div class="flex flex-wrap justify-center md:justify-start items-center gap-6 pt-2">
                        <div class="flex flex-col">
                            <span class="text-2xl font-black text-slate-900">{{ $bloger->blogs->count() }}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Stories</span>
                        </div>
                        <div class="h-8 w-px bg-slate-200 hidden md:block"></div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-black text-slate-900">{{ number_format($bloger->blogs->sum('likes')) }}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Global Appreciation</span>
                        </div>
                    </div>
                </div>

                {{-- <div class="flex gap-3">
                    <button class="bg-slate-900 text-white px-8 py-3 rounded-2xl text-sm font-bold hover:bg-slate-800 transition shadow-xl shadow-slate-200">
                        Follow Creator
                    </button>
                </div> --}}
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 pt-16">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Recent Publications</h2>
            <div class="h-px flex-1 bg-slate-200 mx-8 hidden md:block"></div>
            <p class="text-sm font-bold text-indigo-600 uppercase tracking-widest italic">Sorted by Date</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($bloger->blogs as $blog)
                <article class="group bg-white rounded-[2.5rem] border border-slate-100 overflow-hidden hover:shadow-2xl hover:shadow-indigo-100/40 transition-all duration-500">
                    <div class="relative aspect-video overflow-hidden">
                        <img src="{{Storage::disk('s3')->url($blog->image) }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <div class="p-8">
                        <div class="flex gap-2 mb-3">
                            @foreach ($blog->tags as $tag)
                <a href="/tags/{{strtolower($tag->name)}}" class="hover:text-indigo-600   border border-white  hover:border hover:border-indigo-600   transition-colors px-3 py-1 text-[12px] bg-gray-200 rounded-full">{{$tag->name}}</a>
            @endforeach
             
                        </div>

                        <h3 class="text-xl font-extrabold text-slate-900 mb-3 leading-snug group-hover:text-indigo-600 transition-colors">
                            <a href="/blog/{{ $blog->id }}">{{ $blog->heading }}</a>
                        </h3>

                        <p class="text-slate-500 text-sm line-clamp-2 leading-relaxed mb-6">
                            {{ $blog->desc }}
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                            <span class="text-[10px] font-bold text-slate-400 uppercase italic">
                                {{ $blog->created_at->format('M Y') }}
                            </span>
                            <a href="/blog/{{ $blog->id }}" class="text-indigo-600 text-xs font-black uppercase tracking-widest flex items-center gap-1 group/link">
                                Read This Blog
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-100">
                    <p class="text-slate-400 font-bold uppercase tracking-widest">This creator hasn't published anything yet.</p>
                </div>
            @endforelse
        </div>
    </main>
</div>



   <x-footer></x-footer>

</body>
</html>