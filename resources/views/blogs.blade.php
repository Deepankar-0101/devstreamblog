<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Blogs</title>
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
<body>
    


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
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase tracking-[0.2em]">
                            Our Archive
                        </div>
                        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                            The <span class="text-indigo-600">DevStream</span> Journal
                        </h1>
                        <p class="text-slate-500 max-w-lg text-lg">
                            All Blogs
                        </p>
                    </div>
                    
                    <div class="relative w-full md:w-80">
                        <form action="/search" method="GET" >
                            <input placeholder="Search articles..."type="text" name="q" class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition text-sm" placeholder="Search For a Blog here..">
                            <button type="submit" class="cursor-pointer ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="border border-y-0 border-l-0 border-indigo-600 h-5 w-5 absolute left-4 top-3.5 text-slate-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg></button>
                        </form>
                    </div>
                </div>
            </div>

        </header>

        <main class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
                
                @forelse($blogs as $blog)
                    <article class="group flex flex-col bg-white rounded-4xl border border-slate-100 overflow-hidden hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500 transform hover:-translate-y-1">
                        
                        <a href="/blog/{{ $blog->id }}" class="relative aspect-16/10 overflow-hidden">
                            @if($blog->featured)
                                <div class="absolute top-4 left-4 z-10 bg-indigo-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                                    Featured
                                </div>
                            @endif
                            
                            <img src="{{ asset('storage/' . $blog->image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-in-out">
                            
                            <div class="absolute inset-0 bg-indigo-900/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>

                        <div class="p-8 flex flex-col grow">
                            <div class="flex gap-2 mb-4">
                                @foreach( $blog->tags as $tag)
                                <a href="/tags/{{strtolower($tag->name) }}">
                                    <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest">
                                        {{ `#`.strtolower($tag->name) }}
                                    </span></a>
                                @endforeach
                            </div>

                            <a href="/blog/{{ $blog->id }}">
                                <h3 class="text-2xl font-bold leading-tight text-slate-900 group-hover:text-indigo-600 transition-colors mb-3">
                                    {{ $blog->heading }}
                                </h3>
                            </a>

                            <p class="text-slate-500 text-sm line-clamp-3 mb-6 grow">
                                {{ $blog->desc }}
                            </p>

                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                                <a href="{{ route('bloger.profile', $blog->blogers->id) }}" class="cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $blog->blogers->logo) }}" 
                                         class="w-8 h-8 rounded-full object-cover grayscale group-hover:grayscale-0 transition duration-500">
                                    <span class="text-xs font-bold text-slate-700">{{ $blog->blogers->name }}</span>
                                </div></a>
                                <span class="text-[10px] font-medium text-slate-400 uppercase italic">
                                    {{ $blog->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">No stories found</h3>
                        <p class="text-slate-500">Be the first to publish a new post!</p>
                        <a href="/posts/create" class="mt-6 inline-block bg-indigo-600 text-white px-8 py-3 rounded-full font-bold shadow-lg shadow-indigo-100">Write Now</a>
                    </div>
                @endforelse

            </div>

            <div class="mt-20">
                {{ $blogs->links() }} 
            </div>
        </main>
</div>

        </article>
    </div>

    <script>
        window.onscroll = function() {
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrolled = (winScroll / height) * 100;
            document.getElementById("progress-bar").style.width = scrolled + "%";
        };
    </script>

 <x-footer></x-footer>

</body>
</html>
