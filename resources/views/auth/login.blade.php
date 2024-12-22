{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
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
        <form method="POST" action="{{ route('login') }}" class="content">
            @csrf
            <p style="font-weight: bold; font-size: 40px;">LOGIN/SIGN IN</p>
            <div class="p-2 bg-light d-flex rounded-5">
                <i class="ti ti-user"
                    style="font-size: 20px; background-color: black; border-radius: 100%; padding: 4px"></i>
                <input type="text" placeholder="Username" name="username_or_email"
                    style="background-color: transparent; outline-color: transparent; border-color: transparent;">
            </div>
            @error('username_or_email')
                <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                    {{ $message }}</div>
            @enderror


            <div class="p-2 mt-3 bg-light d-flex justify-content-between rounded-5">
                <input type="password" placeholder="Password" name="password"
                    style="background-color: transparent; outline-color: transparent; border-color: transparent; margin-left: 27px;">
                <i class="ti ti-key" style="font-size: 20px; color: black; padding: 4px"></i>
            </div>
            @error('password')
                <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                    {{ $message }}</div>
            @enderror

            <p class="mt-3" style="font-size: 11px; margin-top: 6px;">DON’T HAVE ACCOUNT? <a href="{{ route('register') }}"
                    class="text-danger">Create New
                    Account!</a></p>

                    <button class="mt-3" style="background-color: #7E2F2F; padding: 10px 15px 10px 15px; border-radius: 10px;">
                        <p style="font-weight: bold; font-size: 20px; color: #fff; margin: 0">Login</p>
                    </button>
        </form>
    </div>
</x-app-layout>
