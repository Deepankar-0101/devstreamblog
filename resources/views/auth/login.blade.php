<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Login-Page</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/images/dev.png') }}">
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
                <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Top-Bloggers</a>
            </div> 
            <div class="flex items-center gap-4">
                {{-- <button class="text-sm font-bold text-indigo-600 hover:text-indigo-700">Login</button> --}}
               <a href="/register">
                <button class="bg-slate-900 text-white px-2 py-2 rounded-full text-sm font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200 cursor-pointer">SignUp</button>
            </a>
            </div>
        </div>
        <div class=" p-2 md:hidden lg:hidden flex items-center justify-center gap-8 text-md font-semibold bg-slate-900 text-white shadow-slate-200 flex-1">
                <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>
                <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Top-Bloggers</a>
            </div>   
    </nav>
<div class="min-h-[calc(100vh-80px)] flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">

            <h2 class="text-center text-3xl font-extrabold tracking-tight text-slate-900">Welcome Back Dear <span class="text-pink-600 ">BLOGGER </span></h2>
            <p class="mt-2 text-center text-sm text-slate-600">
                Or <a href="/register" class="font-bold text-indigo-600 hover:text-indigo-500 transition">create a new account</a>
            </p>
        </div>
        
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-center text-3xl font-extrabold tracking-tight text-slate-900"> Login </h2>
            <div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 border border-slate-100 sm:rounded-3xl sm:px-10">
                <form action="/login" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700">Email address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="focus:text-pink-600 appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition text-sm"
                                placeholder="name@company.com">
                        </div>
                        @error('email') <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required 
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition text-sm"
                                placeholder="••••••••">
                        </div>
                        @error('password') <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p> @enderror
                    </div>

                    {{-- <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-slate-600 text-medium">Remember me</label>
                        </div>
                    </div> --}}

                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform active:scale-[0.98]">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>

 <x-footer></x-footer>

</body>
</html>