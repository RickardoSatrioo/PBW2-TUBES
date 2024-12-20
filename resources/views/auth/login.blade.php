{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-app-layout>
    <style>
        .bg-full {
            min-height: 100vh;
            background-image: url('{{ asset('assets/img/background.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content {
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>

    <div class="bg-full">
        <div class="content">
            <p style="font-weight: bold; font-size: 40px;">LOGIN/SIGN IN</p>
            <div class="bg-light d-flex p-2 rounded-5">
                <i class="ti ti-user"
                    style="font-size: 20px; background-color: black; border-radius: 100%; padding: 4px"></i>
                <input type="text" placeholder="Username"
                    style="background-color: transparent; outline-color: transparent; border-color: transparent;">
            </div>
            <div class="bg-light d-flex justify-content-between p-2 rounded-5 mt-3">
                <input type="password" placeholder="Password"
                    style="background-color: transparent; outline-color: transparent; border-color: transparent; margin-left: 27px;">
                <i class="ti ti-key"
                    style="font-size: 20px; color: black; padding: 4px"></i>
            </div>
            <p style="font-size: 11px; margin-top: 6px">DON’T HAVE ACCOUNT? <span class="text-danger">Create New Account!</span></p>
        </div>
    </div>
</x-app-layout>
