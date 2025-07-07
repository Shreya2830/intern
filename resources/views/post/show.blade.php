<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <!-- Posts Grid -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6 p-8">
               <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-4 space-y-4 border border-gray-200">
    <!-- Post Header -->
    <div class="flex items-center gap-3">
       <x-user-avtar :user="$post->user" />
        <div class="">
            <div class="flex gap-2">
            <a href="{{ route('public.profile.show', $post->user) }}" class="hover:underline" > <h3 class="font-semibold font-serif  text-sm">{{ $post->user->name }}</h3></a>

             <a href="" class="text-emerald-500">Follow + </a>
            </div>
           


            {{-- <div class="text-xs text-gray-500">{{ $post->readTime() }} min read</div> --}}

            
            
           <div class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</div>

        </div>
    </div>

    <!-- Post Content -->

   <h3 class="text-5xl mb-4 font-serif font-semibold tracking-tight text-gray-900 leading-tight">
    {{ $post->title }}
</h3>

    <div class="text-xl text-gray-800">
        {{ $post->content }}
    </div>

    <!-- Post Image -->
    <div>
        <img src="{{ $post->imageUrl() }}" 
     alt="{{ $post->title }}" 
     class="w-full max-h-[500px]  object-contain rounded-xl shadow-md border border-gray-200" />

    </div>

    <!-- Reactions -->
   <x-like-button  />

    #{{ $post->category->name }}
</div>

            </div>


        </div>
    </div>
</x-app-layout>
