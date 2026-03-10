<x-mail::message>
# Blog Successfully Posted 🎉

Hi {{ auth()->user()->$bloger->name }},  

Your blog post titled **"{{ $blog->title }}"** was successfully published on DevStreamBlog.

<x-mail::panel>
{{ $blog->excerpt }}
</x-mail::panel>

<x-mail::button :url="url('/blogs/'.$blog->id)">
Read Your Blog
</x-mail::button>

Thanks for sharing your knowledge!<br>
{{ config('app.name') }}
</x-mail::message>