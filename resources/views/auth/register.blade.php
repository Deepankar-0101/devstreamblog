<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Register-Page</title>
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
            <a href="">
            <div class="flex items-center gap-1">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                    <img src="{{ Vite::asset('resources/images/dev.png') }}" alt="">
                </div>
                <span class="text-2xl font-extrabold tracking-tight">DEV<span class="text-indigo-600 ">STREAMBLOG</span></span>
            </div>
            </a>
             <div class=" px-2 hidden md:flex items-center gap-8 text-md font-semibold text-slate-600">
                <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>

            </div> 
            <div class="flex items-center gap-4">
                <a href="/login">
                <button class="bg-slate-900 text-white px-2 py-2 rounded-full text-sm font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200 cursor-pointer">SignUp</button>
            </a>
               
            </div>
        </div>
        <div class=" p-2 md:hidden lg:hidden flex items-center justify-center gap-8 text-md font-semibold bg-slate-900 text-white shadow-slate-200 flex-1">
                <a href="/blogs" class=" hover:text-indigo-600 transition-colors underline">Blogs</a>
                <a href="/top-blogers" class=" hover:text-indigo-600 transition-colors underline">Top Bloggers</a>
            </div> 
        
    </nav>
    <div class="min-h-screen flex flex-col justify-center py-12 px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-xl">
            <h2 class="text-center text-4xl font-extrabold tracking-tight text-slate-900">Start Writing & Become <span class="text-indigo-600 ">DEVSTREAM BLOGGER</span></h2>
            <p class="mt-3 text-center text-slate-500">Create your account and set up your blog space.</p>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-xl">
            <div class="bg-white py-10 px-6 shadow-2xl shadow-slate-200/60 border border-slate-100 rounded-[2.5rem] sm:px-12">
                <form action="/register" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-indigo-600 mb-4">Account Details</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-slate-700">Name</label>
                                <input type="text" name="name" id="name" required placeholder="Brad Pitt"
                                    class="mt-1 focus:text-indigo-700  block w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                @error('name') <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p> @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-bold text-slate-700">Email Address</label>
                                <input type="email" name="email" id="email" required placeholder="bradpitt@gmail.com"
                                    class="mt-1 focus:text-indigo-700  block w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                @error('email') <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="border-slate-200">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-indigo-600 mb-4">Security</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                                <input name="password" type="password" id="password" required placeholder="••••••••"
                                    class="mt-1 block w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                @error('password') <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-bold text-slate-700">Confirm Password</label>
                                <input name="password_confirmation" type="password" id="password_confirmation" required placeholder="••••••••"
                                    class="mt-1 block w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            </div>
                        </div>
                    </div>
                                       <hr class="border-slate-200">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-indigo-600 mb-4">Blogger's Identity</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="bname" class="block text-sm font-bold text-slate-700">Blogger's Name</label>
                                <input type="text" name="bname" id="bname" required placeholder="The Tech Journal"
                                    class="mt-1 block focus:text-indigo-700 w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                @error('bname') <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="logo" class="block text-sm font-bold text-slate-700">Blogger's Logo</label>
                                <input type="file" name="logo" id="blog_logo"
                                    class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 transition cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">



                    <div class="pt-4">
                        <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold text-lg hover:bg-slate-800 shadow-xl shadow-slate-200 transition-all transform active:scale-[0.99]">
                            Create Account & Blog
                        </button>
                        <p class="text-center text-xs text-slate-400 mt-6">
                            By clicking "Create Account", you agree to our Terms of Service.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <x-footer></x-footer>

</body>
</html>