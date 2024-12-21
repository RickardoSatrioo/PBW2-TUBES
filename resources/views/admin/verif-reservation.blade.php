<x-app-layout>

    <div style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;">
        {{-- Header --}}
        <div
            style="width: 100%; position: absolute; height: 4rem; background-color: #ffffff; top: 0; left: 0; padding: 0.4rem 6rem; display: flex; justify-content: space-between;">
            <div>
                <h1>UniShare</h1>
            </div>
            <div class="ti ti-user-circle" style="font-size: 3rem;"></div>
        </div>
        {{-- Content Body --}}
        <div style="display: flex; min-height: 100vh; width: 100%; box-sizing: border-box;">
            {{-- Sidebar --}}
            <div style="width: 240px; padding: 8rem 1rem; color: #ffffff; background-color: #550000; display: flex; flex-direction: column; gap: 2.25rem;">
                <div style="border-bottom: 2px solid #fff;">
                    <p style="font-weight: 600; font-size: 1.25rem; text-align: center; margin-bottom: 0.1rem !important; ">
                        Verifikasi Pesanan</p>
                </div>
                {{-- <div style="border-bottom: 2px solid #fff;">
                    <p style="font-weight: 600; font-size: 1.25rem; text-align: center; margin-bottom: 0.1rem !important; ">
                        Other Menu</p>
                </div> --}}
            </div>

            {{-- Main Content --}}
            <div x-data="{ openTab: 1 }" style="flex-grow: 1; padding: 8rem 3rem 0 2rem; background-color: #ffffff;">

                <p style="font-weight: 800; font-size: 2.25rem;">Verifikasi Pemesanan Ruangan</p>
                <!-- Tab buttons -->
                <div style="display: flex; border-bottom: 2px solid #E8EAEC;">
                    <button @click="openTab = 1"
                        :style="openTab === 1 ? 'border: none; border-bottom: 2px solid #484848; color: #484848;' : 'border: none; border-bottom: 2px solid #ccc; color: #333;'"
                        style="padding: 10px 20px; cursor: pointer; transition: all 0.3s ease;">
                        <p style="font-weight: 600; font-size: 1.25rem; margin: 10px 20px; color: #484848;">Belum disetujui</p>
                    </button>
                    <button @click="openTab = 2"
                        :style="openTab === 2 ? 'border: none; border-bottom: 2px solid #484848; color: #484848;' : 'border: none; border-bottom: 2px solid #ccc; color: #333;'"
                        style="padding: 10px 20px; cursor: pointer; transition: all 0.3s ease;">
                        <p style="font-weight: 600; font-size: 1.25rem;  margin: 10px 20px;">Selesai</p>
                    </button>
                </div>

                <!-- Tab content -->
                <div x-show="openTab === 1" style="margin: 20px 0; padding-right: 1rem; display: none; height: 74vh; overflow-y: auto; overflow-x: hidden;" x-cloak>
                    @for ($i = 1; $i <= 5; $i++)
                    <div style="display: flex; justify-items: center; justify-content: space-between; margin-bottom: 1rem;">
                        <div style="display: flex; gap: 0.75rem;">
                            <div style="width: 10rem; height: 10rem; background-color: #484848; border-radius: 0.8rem; overflow: hidden;">
                                <img src="{{ asset('assets/img/bg-telu2.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding-top: 0.7rem;">
                                <h4 style="margin-bottom: 1rem;"><b>Lorem, ipsum</b></h4>
                                <h6><b>Tanggal :</b> 21 Desember 2025</h6>
                                <h6><b>Durasi :</b> 3 Jam</h6>
                                <h6><b>Kapasitas :</b> 100 Orang</h6>
                                <h6><b>Alasan  :</b> Untuk mabar Genshin Impact</h6>
                            </div>
                        </div>
                        <div style="padding-top: 0.7rem;">
                            <h5 style="margin-bottom: 1rem; color: #5D6065; text-align: center;"><b>Proposal</b></h5>
                            <a href="#" style="margin-bottom: 1rem; color: #73C2FF; text-align: center; text-decoration: none;">proposal.pdf</a>
                        </div>
                        <div style="padding-top: 0.7rem;">
                            <h5 style="margin-bottom: 1rem; color: #5D6065; text-align: center;"><b>Oleh</b></h5>
                            <h5 style="color: #000; text-align: center;">Della Hazakure</h5>
                            <h6 style="color: #5D6065; text-align: center;">(+62 52 4848 9985)</h6>
                        </div>
                        <div style="padding-top: 0.7rem;">
                            <h5 style="margin-bottom: 1rem; color: #5D6065; text-align: center;"><b>Status</b></h5>
                            <h5 style="padding: 0.4rem 0.6rem; border-radius: 1.4rem; display: flex; align-items: center; gap: 0.5rem; color: #fff; text-align: center; background-color: #D37800;">
                                <span class="ti ti-clock-filled" style="font-size: 1.8rem;"></span><span>Sedang di proses</span>
                            </h5>
                        </div>
                        <div style="padding-top: 2.8rem;">
                            <div style="display: flex; gap: 1rem;">
                                <button class="ti ti-check" style=" border: none; padding: 0.6rem; font-size: 2rem; border-radius: 5rem; background-color: #820000; color: #fff;"></button>
                                <button class="ti ti-x" style=" border: none; padding: 0.6rem; font-size: 2rem; border-radius: 5rem; background-color: #820000; color: #fff;"></button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                <div x-show="openTab === 2" style="margin: 20px 0; padding-right: 1rem; display: none; height: 74vh; overflow-y: auto; overflow-x: hidden;" x-cloak>
                    @for ($i = 1; $i <= 5; $i++)
                    <div style="display: flex; justify-items: center; justify-content: space-between; margin-bottom: 1rem;">
                        <div style="display: flex; gap: 0.75rem;">
                            <div style="width: 10rem; height: 10rem; background-color: #484848; border-radius: 0.8rem; overflow: hidden;">
                                <img src="{{ asset('assets/img/bg-telu2.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding-top: 0.7rem;">
                                <h4 style="margin-bottom: 1rem;"><b>Lorem, ipsum</b></h4>
                                <h6><b>Tanggal :</b> 21 Desember 2025</h6>
                                <h6><b>Durasi :</b> 3 Jam</h6>
                                <h6><b>Kapasitas :</b> 100 Orang</h6>
                                <h6><b>Alasan  :</b> Untuk mabar Genshin Impact</h6>
                            </div>
                        </div>
                        <div style="padding-top: 0.7rem;">
                            <h5 style="margin-bottom: 1rem; color: #5D6065; text-align: center;"><b>Proposal</b></h5>
                            <a href="#" style="margin-bottom: 1rem; color: #73C2FF; text-align: center; text-decoration: none;">proposal.pdf</a>
                        </div>
                        <div style="padding-top: 0.7rem;">
                            <h5 style="margin-bottom: 1rem; color: #5D6065; text-align: center;"><b>Oleh</b></h5>
                            <h5 style="color: #000; text-align: center;">Della Hazakure</h5>
                            <h6 style="color: #5D6065; text-align: center;">(+62 52 4848 9985)</h6>
                        </div>
                        <div style="padding-top: 0.7rem;">
                            <h5 style="margin-bottom: 1rem; color: #5D6065; text-align: center;"><b>Status</b></h5>
                            <h5 style="padding: 0.4rem 0.6rem; border-radius: 1.4rem; display: flex; align-items: center; gap: 0.5rem; color: #fff; text-align: center; background-color: #4AD300;">
                                <span class="ti ti-circle-check-filled" style="font-size: 1.8rem;"></span><span>Verifikasi Disetujui</span>
                            </h5>
                        </div>
                    </div>
                    @endfor
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
