<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="">
                     <div class=" w-[320px] border-l px-8">
                         <div class="flex gap-4">
                                  <x-user-avtar :user="$user" size="w-24 h-24" />


                                   <div class="mt-4">
                            <button
                                class="bg-emerald-600 text-white px-4 py-2 rounded-full hover:bg-emerald-500 px-4 py-2 mt-4 transition-colors duration-200">
                                Follow +
                            </button>
                        </div>
                         </div>
                      

                          <h1
                            class="text-4xl font-extrabold bg-gradient-to-r from-emerald-500 to-green-500 text-transparent bg-clip-text">
                            {{ $user->name }}
                        </h1>
                        {{-- <h3 class="">{{ $user->name }}</h3> --}}
                        <p class="text-gray-500">26k followes</p>
                        <p class="">{{ $user->bio }}</p>

                       

                    </div>
                </div>
                {{-- <div class="flex"> --}}
                    {{-- <div class="flex-1"> --}}
                      
                       
                        <div class="mt-4">
                             @forelse ($posts as $post)
                      <x-post-item :post="$post"> </x-post-item>
                    @empty
                    
                  
                        <div class="col-span-4 text-center">
                            <p class="text-gray-500">No posts available.</p>
                        </div>

                    @endforelse

                        </div>
                        
                       
                    </div>
                            

                    {{-- <div class=" w-[320px] border-l px-8">

                        <x-user-avtar :user="$user" size="w-24 h-24" />
                        <h3 class="">{{ $user->name }}</h3>
                        <p class="text-gray-500">26k followes</p>
                        <p class="">{{ $user->bio }}</p>

                        <div class="mt-4">
                            <button
                                class="bg-emerald-600 text-white px-4 py-2 rounded-full hover:bg-emerald-500 px-4 py-2 mt-4 transition-colors duration-200">
                                Follow +
                            </button>
                        </div>

                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
