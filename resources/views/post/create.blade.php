<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <!-- Posts Grid -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6 p-8">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <!-- Image -->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        
                        <x-text-input id="image" class="block w-full text-sm text-gray-900 border border-green-300 rounded-lg cursor-pointer bg-green-100 
               dark:text-green-300 dark:bg-green-950 dark:border-green-700 dark:placeholder-green-600 focus:outline-none"
                            type="file"
                            name="image"
                            :value="old('image')"
                            autofocus />
                        
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>





                    <!-- title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title')"  autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>


                    <!-- categories -->
                    <div>
                        <x-input-label for="category_id" :value="__('Title')" />
                      <select id="category_id" name="category_id"
    class="block w-full px-4 py-2 bg-white dark:bg-green-950 text-gray-800 dark:text-green-200 border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150 ease-in-out">
    <option value="" disabled selected class="text-gray-400 dark:text-green-500">-- Select Category --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
             @selected(old('category_id') == $category->id)>
             {{ $category->name }}
            </option>
    @endforeach
</select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>  


                    <!-- text area/content-->
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-input-textarea id="content" class="block mt-1 w-full" type="text" name="content"
                             >{{old('content')}}</x-input-textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <x-primary-button class="mt-4">Submit</x-primary-button>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>
