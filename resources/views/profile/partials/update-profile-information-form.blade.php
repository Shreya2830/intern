<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    @if ($errors->any())
        <div class="mb-4 font-medium text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="Post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        {{-- This is the form to update profile information --}}
        {{-- The form will send a PATCH req
                uest to the profile.update route --}}
        {{-- The enctype is set to multipart/form-data to handle file uploads --}}
        @csrf
        @method('put')

        @if($user->image)   
        <div class="mb-4">
            <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="w-32 h-32 rounded-full">        
        </div>
        @endif
          

        <div>
            <x-input-label for="image" :value="__('Choose your Avtar')" />
            <x-text-input id="image"
                class="block w-full text-sm text-gray-900 border border-green-300 rounded-lg cursor-pointer bg-green-100 
               dark:text-green-300 dark:bg-green-950 dark:border-green-700 dark:placeholder-green-600 focus:outline-none"
                type="file" name="image" :value="old('image')" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />

        </div>
        {{-- name --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block

            w-full" :value="old('name', $user->name)" required
                autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- username --}}

        <x-input-label for="username" :value="__('Username')" />
        <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required
            autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('username')"></x-input-error>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- bio --}}
        <div class="mt-4">
            <x-input-label for="bio" :value="__('Bio')" />
            <x-input-textarea id="bio" class="block mt-1 w-full" type="text"
                name="bio">{{ old('bio', optional($user)->bio) }}</x-input-textarea>
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
