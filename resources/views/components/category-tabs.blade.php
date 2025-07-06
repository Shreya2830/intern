
 <ul class="flex flex-wrap justify-center gap-2 text-sm font-medium text-gray-600">
                        <li>
                            <a href="#"
                                class="px-4 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-all">All</a>
                        </li>
                        @forelse ($categories as $category)
                            <li>
                                <a href="#"
                                    class="px-4 py-2 rounded-full bg-gray-100 hover:bg-blue-100 text-gray-800 transition-all">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @empty

                        {{ $slot }}

                        @endforelse 
                    </ul>