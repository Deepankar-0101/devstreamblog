
<x-layout>
    <x-slot:heading>
        Edit Job : <a href="/job/{{$job->id}}" class=" underline underline-offset-4  hover:decoration-2 text-indigo-600 text-lg inline">{{$job->title}}</a> 
    </x-slot:heading>
<div>
<form class="max-w-sm mx-auto space-y-4" id="myform" action="/job/{{$job->id}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="h-auto">
        <label for="title" class="block mb-2.5 text-md font-bold text-heading">Job Title </label>
        <input name="title" 
        type="text" id="title" 
        value="{{$job->title}}"
        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="ex:John Wick" required />
        @error('title')
        <p class="italic text-red-600"> {{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="location" class="block mb-2.5 text-md font-bold text-heading">Location</label>
        <input name="location" 
        type="text" id="location"
        value="{{$job->location}}" 
        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="ex:Bermuda Islands" required />
        @error('location')
        <p class="italic text-red-600"> {{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="salary" class="block mb-2.5 text-md font-bold text-heading">Salary</label>
        <input name="salary" 
        type="text" id="salary" 
        value="{{$job->salary}}"
        class="bg-neutral-secondary-medium border border-default-medium text-heading text-base rounded-base focus:ring-brand focus:border-brand block w-full px-3.5 py-2.5 shadow-xs placeholder:text-body" placeholder="ex:$60,000" required />
        @error('salary')
        <p class="italic text-red-600"> {{$message}}</p>
        @enderror
    </div>
    {{-- @if($errors->any())
    <ul class="text-red-600 italic">
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
    @endif --}}
    <p class=" h-4 m-0 block text-right script text-red-600 italic" ></p>
    <div class="form-btn flex">
        
    <a href="/job/{{$job->id}}"
    id="cancel"
     class= " hover:border-white text-white
      bg-black rounded-xl bg-brand box-border 
       border-2  hover:bg-brand-strong focus:ring-4 
       focus:ring-brand-medium shadow-xs font-medium 
       leading-5 rounded-base text-sm px-4 py-2.5 
       focus:outline-none">Cancel</a>
    <div class="sub w-2/3  text-sm font-medium text-heading text-left ">
        
   <button type="submit"
    id="submit"
     class= " hover:border-white text-white
      bg-black rounded-xl bg-brand box-border 
       border-2  hover:bg-brand-strong focus:ring-4 
       focus:ring-brand-medium shadow-xs font-medium 
       leading-5 rounded-base text-sm px-4 py-2.5 
       focus:outline-none">Update</button>
    </div></div>

</form>
<div class="sub text-left max-w-sm space-x-4 mx-auto my-2  text-sm font-medium text-heading  ">
  
    <button form="delete" type="submit"
    id="submit"
     class= " border border-red-600 hover:border-black text-red-600
      bg-white rounded-xl bg-brand box-border 
         hover:bg-black
         hover:text-white focus:ring-4 
       focus:ring-brand-medium shadow-xs font-medium 
       leading-5 rounded-base text-sm px-2 py-1 ml-1
       focus:outline-none">Delete</button>
    </div>
     
   
</div>
<form id="delete" action="/job/{{$job->id}}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
<script>
const title = document.querySelector('#title');
const btn = document.querySelector('#submit');
const sub = document.querySelector('.sub');
let p = document.querySelector('.script');
const myform = document.querySelector('#myform')
const Jlocation = document.querySelector('#location')
const salary = document.querySelector('#salary')
// myform.addEventListener("mouseover",function(){
// if (title.value.trim() !== "" && Jlocation.value.trim() !== "" && salary.value.trim() !== ""){
//     p.classList.remove('text-red-600')
//     p.classList.add('text-green-600')
//     p.innerText=(' All fields are filled, ✅ Click Save now to make changes!');
// }       
// })
btn.addEventListener("mouseenter", function () {
    
    if (title.value.trim() === "" || Jlocation.value.trim() === "" || salary.value.trim() === "") {
        p.innerText=('!! ❌ONE OR MORE FIELD IS EMPTY ❌ !!');
        if(sub.classList.contains("text-left")){
        sub.classList.remove("text-left");
        sub.classList.add("text-right");  
        }else{
            sub.classList.remove("text-right")
            sub.classList.add("text-left");
        }
    }
});
</script>
</x-layout>