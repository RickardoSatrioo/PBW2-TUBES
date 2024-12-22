<x-app-layout>

    <div style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;">
        {{-- Header --}}
        <div style="z-index: 10; width: 100%; position: absolute; height: 5rem; backdrop-filter: blur(2px); background-color: #ffffff88; top: 0; left: 0; padding: 1rem 6rem; display: flex; gap: 6rem; justify-content: space-between; align-items: center;">

            {{-- Left Side --}}
            <div>
                <h1 style="margin: 0; font-size: 2.5rem; font-weight: 700;">UniShare</h1>
            </div>

            {{-- Center Side --}}
            <div style="flex-grow: 1; display: flex; padding: 1rem; width: 100% align-items: center;">
                <div style="width: 100%; background: #f8f9fa; border-radius: 50px; padding: 5px 10px; display: flex; align-items: center; gap: 15px; box-shadow: 6px 9px 8px rgba(0,0,0,0.1);">
                    <input type="text" placeholder="Temukan Ruangan mu di sini" style="width: 100%; padding: 12px; border: none; outline: none; font-size: 1.1rem; background: transparent;">
                    <button class="ti ti-search" style="border: none; padding: 0.8rem; font-size: 1rem; border-radius: 50%; background-color: #820000; color: #fff; cursor: pointer; transition: background-color 0.3s ease;"></button>
                </div>
            </div>

            {{-- Right Side --}}
            <div style="display: flex; gap: 1rem; align-items: center;">
                <button class="ti ti-user-circle"
                    style="font-size: 2rem; border: none; background-color: transparent;"></button>
                <button class="ti ti-arrow-narrow-left-dashed"
                    style="font-size: 2.7rem; border: none; background-color: transparent;"></button>
            </div>

        </div>

        {{-- Content --}}
        <div style="min-height: 100vh; width: 100%; font-family: Arial, sans-serif; padding-top: 5rem; background: #f8f9fa;">
            <!-- Room Cards Grid -->
            <div style="padding: 0 110px;">
                <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 1.5rem; padding: 10px; max-height: 55.6rem; overflow-y: auto;">
                    @for ($i = 0; $i < 15; $i++)
                    <div style="background: white; border-radius: 0.4rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 100%;">
                        <img src="{{ asset('assets/img/background.png') }}" alt="Room {{ $i + 1 }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.4rem 0.4rem 0 0;">
                        <div style="padding: 1.25rem;">
                            <h3 style="margin: 0 0 0.75rem 0; color: #333; font-size: 1.1rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; line-height: 1.4;">Grand Ballroom Grand Ballroom Grand Ballroom</h3>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: #666;">
                                <span class="ti ti-users" style="font-size: 1rem;"></span>
                                <p style="margin: 0;">Kapasitas: 500 orang</p>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- Footer -->
            <footer style="background-color: #820000; color: white; text-align: center; padding: 20px 0; width: 100%;">
                <p style="margin: 0;">© UniShare c. 2024. All rights reserved.</p>
            </footer>
        </div>

    </div>

</x-app-layout>
