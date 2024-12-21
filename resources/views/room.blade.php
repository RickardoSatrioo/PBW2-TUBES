<x-app-layout>

    <div style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;">
        {{-- Header --}}
        <div style="width: 100%; position: absolute; height: 5rem; background-color: #ffffff; top: 0; left: 0; padding: 1rem 6rem; display: flex; gap: 6rem; justify-content: space-between; align-items: center;">

            {{-- Left Side --}}
            <div>
                <h1 style="margin: 0; font-size: 2.5rem; font-weight: 700;">UniShare</h1>
            </div>

            {{-- Center Side --}}
            <div style="flex-grow: 1; display: flex; padding: 1rem; justify-content: space-between; align-items: center;">
                <div style="background-color: #F7F8FA; border-radius: 5rem; display: flex; gap: 1rem; padding: 0.5rem 1rem;">
                    <span class="ti ti-search" style="font-size: 1.8rem; color: #BBC5D5;"></span>
                    <input type="text" style="width: 15vw; border: none; background-color: transparent; outline: none;" placeholder="Cari gedung atau kelas">
                </div>
                <div style="display: flex; gap: 4rem;">
                    <button style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Beranda
                    </button>
                    <button style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Riwayat
                    </button>
                </div>
            </div>

            {{-- Right Side --}}
            <div style="display: flex; gap: 1rem; align-items: center;">
                <button class="ti ti-user-circle" style="font-size: 2rem; border: none; background-color: transparent;"></button>
                <button class="ti ti-menu-2" style="font-size: 2rem; border: none; background-color: transparent;"></button>
            </div>

        </div>

        <div style="height: 968px; width: 100%; overflow-y: auto; margin-top: 5rem;">

            {{-- Content Body --}}
            <div style="min-height: 846px; height: 92%; width: 1496px; box-sizing: border-box; margin: 0 auto; padding-top: 2rem; display: flex; flex-wrap: nowrap; flex-direction: column; gap: 2rem;">
                <div style="width: 100%; justify-content: space-between; display: flex; height: 100%;">
                    <div style="color: #7F8FA4; align-content: center">
                        <h5 style="margin-bottom: 0 !important;">Telkom University • Gedung • <span style="color: black;">Audiotorium</span></h5>
                    </div>
                    <button style="background-color: #ebeef3b2; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #354052c2; border:none; font-size: 1.2rem; font-weight: 600;">Kembali</button>
                </div>
                <div style="width: 100%; min-height: 100%;">
                    <div style="margin: 1rem auto; background-color: #484848; padding: 0; border-radius: 0.8rem; width: 62%; aspect-ratio: 11/6; overflow: hidden; position: relative;">
                        <img src="{{ asset('assets/img/bg-telu2.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="display: flex; justify-content: space-between; padding-top: 3rem;">
                        <div style="">
                            <h2 style="font-weight: 700">Audiotorium Lt 16 - TULT</h2>
                            <ul style="display: flex; gap: 2rem; padding: 0; margin-left: 1rem;">
                                <li style="font-size: 1.2rem !important;"><span style="color: #f0a012">Tutup</span> Tersedia 06.00 WIB</li>
                                <li style="font-size: 1.2rem !important;">Kapasitas : 100 orang</li>
                            </ul>
                        </div>
                        <div style="display: flex; gap: 2rem; align-items: center;">
                            <button style="background-color: #ebeef3; padding: 1rem 1.5rem; border-radius: 0.5rem; color: #354052; border:none; font-size: 1.25rem; font-weight: 600;">Cek Tanggal</button>
                            <button style="background-color: #550000; padding: 1rem 1.5rem; border-radius: 0.5rem; color: white; border:none; font-size: 1.25rem; font-weight: 600;">Reservasi Sekarang</button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Footer --}}
            <div style="height: 82px; background-color: #550000; width: 100%; display: flex; align-items: center; justify-content: center;">
                <h6 style="margin-top: -0.1rem; text-align: center; color: white;">© 2024 UniShare</h6>
            </div>

        </div>
    </div>

</x-app-layout>
