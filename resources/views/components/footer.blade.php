 <footer class="bg-slate-900 text-slate-400 py-12">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10 items-start">

        <!-- Project Info -->
        <div>
            <div class="flex items-center gap-2 text-white mb-4">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center font-bold">
                    <img src="{{ Vite::asset('resources/images/dev.png') }}" alt="logo.jgp">
                </div>
                <span class="text-xl font-extrabold tracking-tight italic">DEVSTREAMBLOG</span>
            </div>

            <p class="max-w-sm text-sm">
                A modern blogging platform built as a developer project to showcase
                full-stack Laravel skills including authentication, blog publishing,
                tagging, search,success emailing using SMTP, and featured posts.
            </p>
        </div>

        <!-- Tech Stack -->
        <div class="flex justify-between item">
        <div>
            <h4 class="text-white font-bold mb-4 uppercase text-xs tracking-widest">Tech Stack</h4>
            <ul class="space-y-2 text-sm">
                <li>Laravel</li>
                <li>Blade Templates</li>
                <li>TailwindCSS</li>
                <li>MySQL</li>
            </ul></div>
        <div>
            <h4 class="text-white font-bold mb-4 uppercase text-xs tracking-widest">Hosting</h4>
            <ul class="space-y-2 text-sm">
                <li>Laravel : <a href="https://cloud.laravel.com" class="text-red-600 underline cursor-pointer">Laravel Cloud</a></li>
                <li>Mysql DB: <a href="https://tidbcloud.com" class=" text-red-600 underline cursor-pointer">tidbcloud.com</a></li>
                <li>Email SMTP SERVER: <a href="https://mailtrap.io/home" class=" text-red-600 underline cursor-pointer">mailtrap.io</a></li>
            
            </ul>
        

        </div></div>
        
        <!-- Links -->
        <div>
            <h4 class="text-white font-bold mb-4 uppercase text-xs tracking-widest">Links</h4>
            <div class="flex gap-4 mb-4">
                <a href="https://github.com/Deepankar-0101" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center hover:text-white transition">GH</a>
                <a href="#" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center hover:text-white transition">in</a>
                {{-- <a href="#" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center hover:text-white transition">𝕏</a> --}}
            </div>

            <p class="text-xs text-slate-500">
                © {{ date('Y') }} DevStreamBlog. Built as a portfolio project.
            </p>
        </div>

    </div>
</footer>