<x-app-layout>

    <div style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;" class="mx-4">
        {{-- Header --}}
        <div
            style="z-index: 10; width: 100%; position: absolute; height: 5rem; backdrop-filter: blur(2px); background-color: #ffffff88; top: 0; left: 0; padding: 1rem 6rem; display: flex; gap: 6rem; justify-content: space-between; align-items: center;">

            {{-- Left Side --}}
            <div>
                <a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;">
                    <h1 style="margin: 0; font-size: 2.5rem; font-weight: 700;">UniShare</h1>
                </a>
            </div>

            {{-- Center Side --}}
            {{-- <div
                style="flex-grow: 1; display: flex; padding: 1rem; justify-content: space-between; align-items: center;">
                <div
                    style="background-color: #F7F8FA; border-radius: 5rem; display: flex; gap: 1rem; padding: 0.5rem 1rem;">
                    <span class="ti ti-search" style="font-size: 1.8rem; color: #BBC5D5;"></span>
                    <input type="text" style="width: 15vw; border: none; background-color: transparent; outline: none;"
                        placeholder="Cari gedung atau kelas">
                </div>
                <div style="display: flex; gap: 4rem;">
                    <button
                        style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Beranda
                    </button>
                    <button
                        style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Riwayat
                    </button>
                </div>
            </div> --}}

            {{-- Right Side --}}
            <div style="display: flex; gap: 1rem; align-items: center;">
                {{-- <a href="{{ route('profile.edit') }}">
                    <button class="ti ti-user-circle"
                    style="font-size: 2rem; border: none; background-color: transparent;"></button>
                </a> --}}
                <a href="{{ route('landing') }}">
                    <button
                        style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Beranda
                    </button>
                </a>
                <a href="{{ route('user.history_reservation') }}">
                    <button
                        style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Riwayat
                    </button>
                </a>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                             <button class="ti ti-logout"
                             style="font-size: 2rem; border: none; background-color: transparent;"></button>
                        </x-dropdown-link>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}">
                        <button class="ti ti-login"
                            style="font-size: 2rem; border: none; background-color: transparent;"></button>
                    </a>
                @endguest
            </div>

        </div>

        {{-- Content --}}
        {{-- <div style="height: 968px; width: 100%; overflow-y: auto; margin-top: 5rem;">
            <!-- Landing Page -->
            <div style="width: 100%; height: 100%; background-image: url('{{ asset('assets/img/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div style="background-color: #484848; padding: 1rem; margin: auto;"></div>
            </div>
            <!-- Information Page -->
            <div>

            </div>
            <!-- Abbout Us -->
            <div>

            </div>
        </div> --}}

        <div style="height: 93vh; width: 100%; overflow-x: hidden; font-family: Arial, sans-serif; margin-top: 5rem;">
            <div class="py-12">
                <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                    <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>

            <footer style="background-color: #820000; color: white; text-align: center; padding: 20px 0; width: 100%;">
                <p style="margin: 0;">© UniShare c. 2024. All rights reserved.</p>
            </footer>
        </div>
    </div>

</x-app-layout>

