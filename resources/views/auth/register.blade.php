{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
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
            <p style="font-weight: bold; font-size: 40px;">SIGN IN</p>
            <div class="bg-light d-flex p-2 rounded-5">
                <i class="ti ti-user"
                    style="font-size: 20px; background-color: black; border-radius: 100%; padding: 4px"></i>
                <input type="text" placeholder="Username"
                    style="background-color: transparent; outline-color: transparent; border-color: transparent;">
            </div>
            <div class="bg-light d-flex p-2 rounded-5 mt-3">
                <i class="ti ti-user"
                    style="font-size: 20px; background-color: black; border-radius: 100%; padding: 4px"></i>
                <input type="text" placeholder="Telp Number"
                    style="background-color: transparent; outline-color: transparent; border-color: transparent;">
            </div>
            <div class="bg-light d-flex justify-content-between p-2 rounded-5 mt-3">
                <div>
                    <i class="ti ti-key"
                        style="font-size: 20px; color: black; padding: 4px"></i>
                    <input type="password" placeholder="New Password"
                        style="background-color: transparent; outline-color: transparent; border-color: transparent;">
                </div>
                <i class="ti ti-eye-off" style="font-size: 20px; color: black; padding: 4px;"></i>
            </div>
            <div class="bg-light d-flex justify-content-between p-2 rounded-5 mt-3">
                <div>
                    <input type="password" placeholder="Confirm Password"
                        style="background-color: transparent; outline-color: transparent; border-color: transparent; margin-left: 27px;">
                </div>
                <i class="ti ti-eye" style="font-size: 20px; color: black; padding: 4px;"></i>
            </div>
        </div>
    </div>
</x-app-layout>
