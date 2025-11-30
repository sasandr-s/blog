<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Register</h1>
        <p class="text-gray-600 mt-2">Join Mac Andre Blogs community</p>
    </div>
    
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
            <x-text-input id="name" class="block mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
            <x-text-input id="email" class="block mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />

            <x-text-input id="password" class="block mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
