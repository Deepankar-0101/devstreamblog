
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Edit Blog </title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); }
    </style>
    @vite(['resources/js/app.js'])
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
    <div class="min-h-screen bg-[#F8FAFC] pb-20">
        <div class="glass sticky top-0 z-50 border-b border-slate-200 bg-white/80">
            <div class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="/blog/{{ $blog->id }}" class="text-slate-400 hover:text-slate-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <span class="text-sm font-semibold text-slate-500 uppercase tracking-widest italic">Editing Post</span>
                </div>
                
                <div class="flex items-center gap-4">
                    
                    <button type="button"  onclick="toggleDeleteModal()" class="text-xs font-bold text-red-400 hover:text-red-600 transition tracking-widest uppercase cursor-pointer">
                        Delete Post
                    </button>
                    
                    <button type="submit" for="edit-form" class= " cursor-pointer bg-indigo-600 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">
                        Update Post
                    </button>
                </div>
            </div>
        </div>

        <main class="max-w-4xl mx-auto px-6 pt-12">
            <form action="/blog/{{ $blog->id }}" method="POST" id="edit-form" enctype="multipart/form-data" class="space-y-12">
                @csrf
                @method('PATCH')

                <section class="space-y-6 bg-white p-8 rounded-4xl border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-xs italic">Edit</span>
                        <h2 class="font-bold text-slate-800">Post Settings</h2>
                    </div>
                    
                    <div>
                        <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title (SEO)</label>
                        <input type="text" name="title" id="title" value="{{ $blog->title }}" required
                            class="w-full text-xl font-bold border-none focus:ring-0 placeholder-slate-200 p-0 bg-transparent">
                    </div>

                    <div class="pt-4 border-t border-slate-50">
                        <label for="desc" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Short Description</label>
                        <textarea name="desc" id="desc" rows="2" required
                            class="w-full border-none focus:ring-0 placeholder-slate-200 p-0 resize-none text-slate-600 bg-transparent">{{ $blog->desc }}</textarea>
                    </div>

                    <div class="flex items-center gap-6 pt-4 border-t border-slate-50">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="featured" value="1" {{ $blog->featured ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 border-slate-300 rounded-lg focus:ring-indigo-500">
                            <span class="text-sm font-semibold text-slate-600">Feature this post</span>
                        </label>
                    </div>
                </section>

                <section class="space-y-4">
                    <div class="relative group max-w-xl">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-1">
                            <span class="text-indigo-400 font-bold">#</span>
                        </div>
                       <input type="text" name="tags" id="tags"
value="{{ $blog->tags->pluck('name')->implode(', ') }}"
class="block w-full pl-6 pr-4 py-3 bg-transparent border-b-2 border-slate-200 text-slate-700 font-medium focus:outline-none focus:border-indigo-600 focus:ring-0 transition-all">
                    </div>
                </section>

                 <section class="space-y-4">
                    <div id="image-preview-container" class="relative group w-full">
                        <label for="image"
                               class="relative flex flex-col items-center justify-center w-full h-80 border-2 border-dashed border-slate-200 rounded-[2.5rem] bg-white hover:bg-slate-50 transition-all cursor-pointer overflow-hidden">
                            
                            <img id="image-preview"
                                 src="{{ Storage::disk('s3')->url($blog->image) ? Storage::disk('s3')->url($blog->image) : 'https://placehold.co/1200x600' }}"
                                 class="absolute inset-0 w-full h-full object-cover">

                            <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                        </label>
                    </div>
                </section>

                <section class="space-y-8">
                    <div>
                        <textarea name="heading" id="heading" rows="1" required
                            class="w-full text-4xl md:text-5xl font-extrabold border-none focus:ring-0 placeholder-slate-200 bg-transparent p-0 overflow-hidden resize-none leading-tight">{{ $blog->heading }}</textarea>
                    </div>

                    <div class="relative group">
                        <div class="absolute -left-6 top-0 bottom-0 w-1 bg-indigo-500 rounded-full"></div>
                        <textarea name="paragraph" id="paragraph" rows="8" required
                            class="w-full text-lg text-slate-700 border-none focus:ring-0 bg-transparent p-0 leading-relaxed">{{ $blog->paragraph }}</textarea>
                    </div>

                    <div class="bg-indigo-50/50 p-8 rounded-3xl border border-indigo-100">
                        <textarea name="conclusion" id="conclusion" rows="3" required
                            class="w-full bg-transparent border-none focus:ring-0 text-indigo-900 p-0 italic">{{ $blog->conclusion }}</textarea>
                    </div>
                </section>
            </form>
        </main>
    </div>

    <div id="delete-modal" class=" hidden fixed inset-0 z-100  items-center justify-center bg-slate-900/60 backdrop-blur-sm px-4">
        <div class="bg-white max-w-md w-full rounded-[2.5rem] p-10 text-center shadow-2xl">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Delete this post?</h3>
            <p class="text-slate-500 mb-8">This action is permanent and cannot be undone. Are you sure you want to proceed?</p>
            
            <form action="/blog/{{ $blog->id }}" method="POST" class="flex flex-col gap-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="cursor-pointer w-full py-4 bg-red-500 text-white font-bold rounded-2xl hover:bg-red-600 transition shadow-lg shadow-red-100">
                    Yes, Delete Post
                </button>
                <button type="button" onclick="toggleDeleteModal()" class="cursor-pointer w-full py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition">
                    Cancel
                </button>
            </form>
        </div>
    </div>

  <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) { preview.src = e.target.result; };
                reader.readAsDataURL(input.files[0]);
            }
        }

        const dropZone = document.querySelector('label[for="image"]');
        const fileInput = document.getElementById('image');

        ['dragenter','dragover','dragleave','drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, e => { e.preventDefault(); e.stopPropagation(); });
        });

        ['dragenter','dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('border-indigo-500','bg-indigo-50/50');
            });
        });

        ['dragleave','drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('border-indigo-500','bg-indigo-50/50');
            });
        });

        dropZone.addEventListener('drop', e => {
            const files = e.dataTransfer.files;
            if(files.length){ fileInput.files = files; previewImage(fileInput); }
        });

        // Auto-resize textareas
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach(tr => {
            tr.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        });
        function toggleDeleteModal() {
    const modal = document.getElementById('delete-modal');
    
    if (modal.classList.contains('hidden')) {
        // Show it
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // Prevent background scrolling while modal is open
        document.body.style.overflow = 'hidden';
    } else {
        // Hide it
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        // Restore scrolling
        document.body.style.overflow = 'auto';
    }
}
    </script>
    <x-footer></x-footer>

</body>
</html>