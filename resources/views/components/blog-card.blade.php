@props(['blog'])

<div class="mt-4 group cursor-pointer flex gap-3 p-3 bg-gray-200 rounded-xl hover:border hover:border-indigo-600 transition">

    {{-- Image --}}
    <div class="shrink-0">
        <img
        class="w-20 h-20 md:w-28 md:h-28 object-cover rounded-lg group-hover:scale-105 transition duration-500"
        src="{{ asset('storage/' . $blog->image) }}"
        alt="cover.jpg">
    </div>

    {{-- Content --}}
    <div class="flex flex-col justify-between w-full">

        {{-- Title + Description --}}
        <div>
            <a href="/blog/{{$blog->id}}">
                <h3 class="text-sm md:text-lg font-bold leading-tight group-hover:text-indigo-600 line-clamp-2">
                    {{$blog->title}}
                </h3>
            

            <p class="text-xs md:text-sm text-gray-600 mt-1 line-clamp-2 md:line-clamp-3">
                {{$blog->desc}}
            </p>
        </div>
</a>
        {{-- Bottom Row --}}
        <div class="flex items-center justify-between mt-2">

            {{-- Author --}}
            <a href="{{ route('bloger.profile', $blog->blogers->id) }}">
            <div class="flex items-center gap-2">
                 <img class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-[10px] font-bold" src="{{ asset('storage/' . $blog->blogers->logo) }}" alt="bloger.jpg">
                <span class="text-xs md:text-sm font-semibold text-slate-700 cursor-pointer hover:bg-indigo-300">
                    {{$blog->blogers->name}}
                </span>
            </div></a>

            {{-- Tags (hide extra on mobile) --}}
            <div class="hidden sm:flex gap-1">
                @foreach($blog->tags as $tag)
                    <a href="/tags/{{strtolower($tag->name)}}" class="cursor-pointer">
                    <span class="bg-white px-2 py-0.5 rounded-full text-[9px] md:text-[10px] font-bold uppercase hover:bg-indigo-500 hover:text-white">
                        {{strtolower($tag->name)}}
                    </span></a>
                @endforeach
            </div>

            {{-- Time --}}
            <span class="text-[10px] md:text-xs italic text-gray-700">
                {{ $blog->created_at->diffForHumans() }}
            </span>

        </div>

    </div>

</div>