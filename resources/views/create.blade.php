<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStreamBlog | Post-Blog</title>
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
                <a href="/bloger/{{auth()->user()->blogers->id}}">
                <img src="{{ Storage::disk('s3')->url(auth()->user()->blogers->logo) }}" class="w-8 h-8 sm:flex md:flex lg:flex hidden" alt="pika"> </a>
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


    <div class="min-h-screen bg-[#F8FAFC] pb-20">
        <div class="glass sticky top-0 z-50 border-b border-slate-200 bg-white/80">
            <div class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="/" class="text-slate-400 hover:text-pink-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    {{-- <span class="text-sm font-semibold text-slate-500 uppercase tracking-widest">Draft in Bloggers</span> --}}
                    
                  <div class="px-2">
You're posting this blog as:<a href="/bloger/{{ auth()->user()->blogers->id }}">
<span class="text-pink-700 underline">{{ auth()->user()->blogers->name }}</span></a>
    </div>
                    
                </div>
                <div class="flex items-center gap-3">
                    <button type="submit" form="post-form" class="bg-pink-700 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-gray-800 transition shadow-lg shadow-indigo-100 cursor-pointer">
                        Publish Post
                    </button>
                </div>
            </div>
        </div>
        <div class="px-4 text-center">
        <p class="text-red-600 ">---#You will recieve a mail after posting this blog as this app is connected to an email SMTP server :<a href="https://mailtrap.io/home" class="underline text-green-600">MailTrap</a>---</p>
</div>
        <main class="max-w-4xl mx-auto px-6 pt-12">
            <form action="/blogs" method="POST" id="post-form" class="space-y-12"  enctype="multipart/form-data">
                @csrf

                <section class="space-y-6 bg-white p-8 rounded-2rem border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-8 h-8 rounded-lg bg-indigo-50 text-pink-700 flex items-center justify-center font-bold">01</span>
                        <h2 class="font-bold text-slate-800">Post Settings</h2>
                    </div>
                    
                    <div>
                        <label for="title" class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Internal Title (SEO)</label>
                        <input type="text" name="title" id="title" required placeholder="e.g., ALL ABOUT LARAVEL 12"
                            class="w-full text-xl font-bold border border-gray-600 p-2 focus:ring-0 placeholder-slate-200 ">
                        @error('title') <p class="text-red-500 text-xs mt-2 italic">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-4 border-t border-slate-50">
                        <label for="desc" class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Short Description</label>
                        <textarea name="desc" id="desc" rows="2" required placeholder="A brief summary for the blog card..."
                            class="w-full border border-gray-600 p-2 focus:ring-0 placeholder-slate-200  resize-none text-slate-600"></textarea>
                        @error('desc') <p class="text-red-500 text-xs mt-2 italic">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-6 pt-4 border-t border-slate-50">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="featured" value="1" class="w-5 h-5 text-indigo-600 border-slate-300 rounded-lg focus:ring-indigo-500">
                            <span class="text-sm font-semibold text-slate-600">Feature this post (Costs Extra)</span>
                        </label>
                    </div>
                </section>

                <section class="space-y-8">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-indigo-50 text-pink-700  flex items-center justify-center font-bold">02</span>
                        <h2 class="font-bold text-slate-800">Article Content</h2>
                    </div>

                    <div>
                        <textarea name="heading" id="heading" rows="1" required placeholder="The Main Article Heading..."
                            class="w-full border border-gray-600 p-2 text-4xl md:text-5xl font-extrabold  focus:ring-0 placeholder-slate-200 bg-transparent  overflow-hidden resize-none leading-tight"></textarea>
                        @error('heading') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="relative group">
                        <div class="absolute -left-6 top-0 bottom-0 w-1 bg-pink-100 rounded-full group-focus-within:bg-pink-700 transition-colors"></div>
                        <textarea name="paragraph" id="paragraph" rows="8" required placeholder="Start writing your blog here..."
                            class="w-full text-lg text-slate-700  focus:ring-0 placeholder-slate-600 bg-transparent border border-gray-600 p-2 leading-relaxed"></textarea>
                        @error('paragraph') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class= " bg-slate-100/50 p-8 rounded-3xl border-2 border-dashed hover:border-pink-700 border-slate-200 group-focus-within:bg-pink-700">
                        <label for="conclusion" class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-4">Conclusion / Final Thoughts</label>
                        <textarea name="conclusion" id="conclusion" rows="3" required placeholder="Wrap up your post..."
                            class=" w-full bg-transparent  focus:ring-0 text-slate-800 p-2s italic"></textarea>
                        @error('conclusion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </section>
              
    <section class="space-y-4">
    <div class="flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-indigo-50 text-pink-700 flex items-center justify-center font-bold">03</span>
        <h2 class="font-bold text-slate-800">Cover Media</h2>
    </div>

    <div id="image-preview-container" class="relative group w-full">
        <label for="image" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-slate-200 rounded-4xl bg-white hover:bg-slate-50 hover:border-pink-700 transition-all cursor-pointer overflow-hidden">
            
            <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6">
                <div class="w-12 h-12 bg-indigo-50 text-pink-700 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="mb-2 text-sm text-slate-700 font-bold">Click to upload cover image</p>
                <p class="text-xs text-slate-400">PNG, JPG or WEBP (Recommended 1200x600px)</p>
            </div>

            <img id="image-preview" src="#" alt="Preview" class="hidden absolute inset-0 w-full h-full object-cover">
            
            <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(this)">
        </label>
        
        <button type="button" onclick="removeImage()" id="remove-btn" class="hidden absolute top-4 right-4 bg-white/90 backdrop-blur text-red-500 p-2 rounded-full shadow-lg hover:bg-red-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    @error('image') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
</section>
                <section class="space-y-4">
    <div class="flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-indigo-50 text-pink-700 flex items-center justify-center font-bold">02</span>
        <h2 class="font-bold text-slate-800">Add Tags</h2>
    </div>

    <div class="relative group max-w-xl">
        <div class="absolute inset-y-0 left-0 flex items-center pl-1 pointer-events-none">
            <span class="text-pink-700 font-bold text-2xl mb-3 inline-block"># </span>
        </div>
        <input type="text" 
               name="tags" 
               id="tags" 
               placeholder="coding, Android, lifestyle..." 
               class="block w-full pl-6 pr-4 py-3 pb-0 bg-transparent border-b-2 border-slate-200 text-slate-800 font-medium focus:outline-none focus:border-indigo-600 focus:ring-0 transition-all placeholder-slate-300"
               required>
        <p class="mt-2 text-[10px] text-slate-600 uppercase tracking-widest font-bold">Separate up to 3 tags with commas</p>
    </div>
    @error('tags') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
</section></section>
            </form>
        </main>
    </div>

    <script>
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach(tr => {
            tr.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        });
        function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');
    const removeBtn = document.getElementById('remove-btn');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
            removeBtn.classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const input = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');
    const removeBtn = document.getElementById('remove-btn');

    input.value = ""; // Clear the file input
    preview.src = "#";
    preview.classList.add('hidden');
    placeholder.classList.remove('hidden');
    removeBtn.classList.add('hidden');
}
const dropZone = document.querySelector('label[for="image"]');
const fileInput = document.getElementById('image');

// 1. Prevent default browser behavior (which is to open the file)
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, e => {
        e.preventDefault();
        e.stopPropagation();
    }, false);
});

// 2. Add visual feedback when dragging over the zone
['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, () => {
        dropZone.classList.add('border-indigo-500', 'bg-indigo-50/50');
    }, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, () => {
        dropZone.classList.remove('border-indigo-500', 'bg-indigo-50/50');
    }, false);
});

// 3. Handle the dropped file
dropZone.addEventListener('drop', e => {
    const dt = e.dataTransfer;
    const files = dt.files;

    if (files.length) {
        fileInput.files = files; // Sync the dropped file to the hidden input
        previewImage(fileInput); // Trigger the preview function we wrote earlier
    }
});
    </script>

    <x-footer></x-footer>

</body>
</html>
