<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Categories Tabs -->
            <div class="bg-white overflow-hidden  shadow-sm sm:rounded-lg">
                <div class="p-6">
                   <x-category-tabs>
                    <div class="text-center">No Categories Found.</div>
                   </x-category-tabs>
                </div>
            </div>

            <!-- Posts Grid -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <div class="p-10   sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($posts as $post)
                      <x-post-item :post="$post"> </x-post-item>
                    @empty
                    
                  
                        <div class="col-span-4 text-center">
                            <p class="text-gray-500">No posts available.</p>
                        </div>

                    @endforelse
                </div>
            </div>
            {{ $posts->links() }}

        </div>
    </div>
</x-app-layout>
