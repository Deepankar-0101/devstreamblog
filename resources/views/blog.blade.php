<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Blog-Read</title>
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
            <img src="{{ Storage::disk('s3')->url(auth()->user()->blogers->logo) }}" class="w-8 h-8 rounded-full text-center" alt="pika">
            <span class="text-[12px]">{{auth()->user()->blogers->name}}</span>
            @endauth</a>
            </div>  
    <div class="bg-white min-h-screen">
        <div class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
            <div class="max-w-3xl mx-auto px-6 h-16 flex items-center justify-between">
                <a href="/" class="flex items-center gap-2 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 group-hover:text-indigo-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="text-sm font-bold text-slate-500 group-hover:text-slate-900 transition">Back to Feed</span>
                </a>
                @auth
                @if(Auth::id() === $blog->blogers->user_id)
                    <a href="{{ route('blog.update', $blog->id) }}" class="btn btn-primary text-slate-600 underline">
                    Edit this blog
                    </a>
                    <a href="/blogs/create" class="btn btn-primary text-slate-600 underline">
                        Post your Blog +
                    </a>
                 @endif
                    @endauth

                <div class="flex items-center gap-4">
                    <form action="{{ route('blog.like', $blog->id) }}" method="POST">
    @csrf
    <button type="submit" 
        class="group flex items-center gap-3 px-5 py-2.5 bg-white border border-slate-200 rounded-2xl transition-all duration-300 hover:border-red-200 hover:bg-red-50 active:scale-95 shadow-sm hover:shadow-md">
        
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-5 w-5 text-slate-400 group-hover:text-red-500 transition-colors duration-300 {{ $blog->isLikedByUser ? 'fill-red-500 text-red-500' : '' }}" 
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </button>
</form>
                </div>
            </div>
            <div id="progress-bar" class="h-1 bg-indigo-600 w-0 transition-all duration-150"></div>
        </div>

        <article class="max-w-3xl mx-auto px-6 pt-12 pb-24">
            <header class="space-y-6 mb-12">
                <div class="flex flex-wrap gap-2">
                    @foreach( $blog->tags as $tag)
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-full uppercase tracking-widest">
                            <a href="/tags/{{strtolower($tag->name)}}">{{strtolower($tag->name)}}</a>
                        </span>
                    @endforeach
                </div>

                <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.1]">
                    {{ $blog->heading }}
                </h1>

                <p class="text-xl text-slate-500 italic leading-relaxed">
                    {{ $blog->desc }}
                </p>

                <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                    <div class="flex items-center gap-3">
                        {{-- <img src="{{ asset('storage/' . $blog->blogers->logo) }}" alt="img.jpg" class="w-12 h-12 rounded-full border-2 border-white shadow-sm object-cover"> --}}
                        <img src="{{ Storage::disk('s3')->url($blog->blogers->logo) }}" alt="blog-img.jpg" class="w-12 h-12 rounded-full border-2 border-white shadow-sm object-cover">
                        <div>
                            <p class="font-bold text-slate-900">{{ $blog->blogers->name }}</p>
                            <p class="text-xs text-slate-400 font-medium">{{ $blog->created_at->format('M d, Y') }} </p>
                        </div>
                    </div>
                </div>
            </header>

            @if($blog->image)
            <div class="mb-12">
                <img src="{{Storage::disk('s3')->url($blog->image) }}" class="w-full h-450px object-cover rounded-[2.5rem] shadow-2xl shadow-slate-200">
            </div>
            @endif

            <div class="prose prose-lg max-w-none text-slate-800 leading-relaxed space-y-8">
                <div class="text-lg whitespace-pre-line">
                    {{ $blog->paragraph }}
                </div>

                <div class="bg-slate-50 p-8 md:p-12 rounded-4xl border-l-4 border-indigo-500 mt-12">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-indigo-600 mb-4">Final Thoughts</h4>
                    <p class="text-slate-700 italic text-xl font-medium leading-relaxed">
                        {{ $blog->conclusion }}
                    </p>
                </div>
            </div>
            
            <footer class="mt-20 pt-10 border-t border-slate-100 flex flex-col items-center gap-6">
                <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em]">Enjoyed this post?</p>
                <div class="flex items-center gap-4">
                    <div class=" cursor-pointer flex items-center gap-2 px-8 py-3 bg-slate-900 text-white rounded-full font-bold hover:bg-indigo-600 transition shadow-xl shadow-slate-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                         <form action="{{ route('blog.like', $blog->id) }}" method="POST">
                          @csrf
                        <button>{{ $blog->likes }} Likes</button></form>
                         </div>
                </div>
            </footer>
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
