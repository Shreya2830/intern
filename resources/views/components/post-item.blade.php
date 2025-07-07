 <div class="max-w-5xl mx-auto space-y-6">
        <!-- Card 1 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row">
           <img class="w-full md:w-1/3 h-48 object-contain bg-gray-100 p-2" src="{{ Storage::url($post->image) }}" alt="Card Image">

            <div class="p-6 flex flex-col justify-between">
                <h2 class="text-2xl font-bold text-green-800 mb-2">{{ $post->title }}</h2>
                <p class="text-gray-700 mb-4">{{Str::words ($post->content, 15) }}</p>
                <a href="{{ route('post.show', [
                'username' => $post->user->username,
                'post' => $post
                ]) }}" class="inline-block bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition">
                    view Post →
                </a>
            </div>
        </div>