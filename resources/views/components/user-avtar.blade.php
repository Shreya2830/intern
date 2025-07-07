@props(['user', 'size' => 'w-12 h-12'])

{{-- Display user avatar with a default image if not set --}}

@if($user->image)
        <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
        @else
        <img src="https://www.pngkey.com/png/detail/73-730434_04-dummy-avatar.png" alt="Default Avtar" class="{{ $size }} rounded-full">
        @endif