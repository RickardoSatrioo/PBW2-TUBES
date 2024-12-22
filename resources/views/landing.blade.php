<x-app-layout>

    <div style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;">
        {{-- Header --}}
        <div style="z-index: 10; width: 100%; position: absolute; height: 5rem; backdrop-filter: blur(2px); background-color: #ffffff88; top: 0; left: 0; padding: 1rem 6rem; display: flex; gap: 6rem; justify-content: space-between; align-items: center;">

            {{-- Left Side --}}
            <div>
                <h1 style="margin: 0; font-size: 2.5rem; font-weight: 700;">UniShare</h1>
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
                <button class="ti ti-user-circle"
                    style="font-size: 2rem; border: none; background-color: transparent;"></button>
                <button class="ti ti-menu-3"
                    style="font-size: 2rem; border: none; background-color: transparent;"></button>
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
            <!-- Landing Page -->
            <div style="width: 100%; height: 100vh; position: relative; overflow: hidden;">
                <!-- Video Background -->
                <video autoplay muted loop playsinline style="position: absolute; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1; object-fit: cover; background-image: url('{{ asset('assets/img/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <source src="{{ asset('assets/bg-landing.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Overlay for better text readability -->
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 192px; background: rgba(0, 0, 0, 0.5);"></div>

                <!-- Header Text -->
                <div style="position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; width: 90%;">
                    <h1 style="font-size: 2.8rem; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); line-height: 1.2;">Ruangan Ideal untuk Setiap Kegiatan di Telkom University</h1>
                    <p style="font-size: 1.4rem; margin-top: 1.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.5); font-weight: 300;">Wujudkan acara berkualitas di ruang yang tepat</p>
                </div>

                <!-- Search Bar -->
                <div style="position: absolute; top: 42%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 800px;">
                    <div style="background: rgba(255, 255, 255, 0.95); border-radius: 50px; padding: 15px 30px; display: flex; align-items: center; gap: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                        <input type="text" placeholder="Cari ruangan yang Anda butuhkan..." style="width: 100%; padding: 12px; border: none; outline: none; font-size: 1.1rem; background: transparent;">
                        <button class="ti ti-search" style="border: none; padding: 0.8rem; font-size: 1.5rem; border-radius: 50%; background-color: #820000; color: #fff; cursor: pointer; transition: background-color 0.3s ease; min-width: 50px;"></button>
                    </div>
                </div>
            </div>
            {{-- <div style="width: 100%; height: 100vh; background-image: url('{{ asset('assets/img/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative;">
                <!-- Overlay for better text readability -->
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4);"></div>

                <!-- Header Text -->
                <div style="position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; width: 80%;">
                    <h1 style="font-size: 3.5rem; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Find Your Perfect Venue</h1>
                    <p style="font-size: 1.2rem; margin-top: 1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Discover extraordinary spaces for your extraordinary moments</p>
                </div>

                <!-- Search Bar -->
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 600px;">
                    <div style="background: rgba(255, 255, 255, 0.95); border-radius: 50px; padding: 15px 30px; display: flex; align-items: center; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                        <input type="text" placeholder="Search for venues..." style="width: 100%; padding: 10px; border: none; outline: none; font-size: 18px; background: transparent;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="min-width: 24px; cursor: pointer;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                </div>
            </div> --}}

            <!-- Information Page -->
            <div style="padding: 30px 110px; background: #f8f9fa; margin-top: -12rem">
                <h2 style="text-align: center; margin-bottom: 40px; color: #333; font-size: 2.5rem;">Our Venues</h2>
                <div style="display: flex; overflow-x: auto; gap: 20px; padding: 10px 0;">


                    <!-- Venue Card 1 -->
                    @for ($i = 0; $i < 10; $i++)
                    <div style="min-width: 300px; background: white; border-radius: 0.4rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                        <img src="{{ asset('assets/img/background.png') }}" alt="Venue 1" style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.4rem 0.4rem 0 0;">
                        <div style="padding: 20px;">
                            <h3 style="margin: 0 0 10px 0; color: #333; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">Grand Ballroom Grand Ballroom Grand Ballroom</h3>
                            <p style="margin: 0; color: #666;">Capacity: 500 people</p>
                        </div>
                    </div>
                    @endfor

                </div>
            </div>

            <!-- About Us -->
            <div style="padding: 30px 20px; background: white;">
                <h2 style="text-align: center; margin-bottom: 40px; color: #333; font-size: 2.5rem;">About Us</h2>
                <!-- Card 1 -->
                <div style="display: flex; margin-bottom: 40px; padding: 0 10rem; overflow: hidden; justify-content: center; align-items: center;">
                    <img src="{{ asset('assets/img/landing1.png') }}" alt="About 1" style="width: 400px; height: 300px; object-fit: cover;">
                    <div style="padding: 40px; width: 35rem;">
                        <h2 style="margin: 0 0 20px 0; color: #333;">Pemilihan Ruangan</h2>
                        <p style="margin: 0; line-height: 1.6; color: #666;">Menyediakan daftar ruangan lengkap dengan deskripsi, kapasitas, dan fasilitas yang tersedia, serta fitur pencarian dan filter untuk menemukan ruangan yang sesuai dengan kebutuhan Anda.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div style="display: flex; margin-bottom: 40px; padding: 0 10rem; overflow: hidden; justify-content: center; align-items: center;">
                    <div style="padding: 40px; width: 35rem;">
                        <h2 style="margin: 0 0 20px 0; color: #333;">Pemilihan Tanggal dan Waktu</h2>
                        <p style="margin: 0; line-height: 1.6; color: #666;">Kalender interaktif yang memungkinkan Anda memilih tanggal dan waktu penggunaan ruangan dengan mudah, serta indikator ketersediaan untuk memastikan ruangan tidak bentrok dengan pemakaian lain.</p>
                    </div>
                    <img src="{{ asset('assets/img/landing2.png') }}" alt="About 2" style="width: 400px; height: 300px; object-fit: cover;">
                </div>

                <!-- Card 3 -->
                <div style="display: flex; margin-bottom: 40px; padding: 0 10rem; overflow: hidden; justify-content: center; align-items: center;">
                    <img src="{{ asset('assets/img/landing3.png') }}" alt="About 3" style="width: 400px; height: 300px; object-fit: cover;">
                    <div style="padding: 40px; width: 35rem;">
                        <h2 style="margin: 0 0 20px 0; color: #333;">User-Friendly Interface</h2>
                        <p style="margin: 0; line-height: 1.6; color: #666;">Desain antarmuka yang intuitif dan mudah digunakan, memastikan pengalaman pengguna yang nyaman dan efisien.</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer style="background-color: #820000; color: white; text-align: center; padding: 20px 0; width: 100%;">
                <p style="margin: 0;">© UniShare c. 2024. All rights reserved.</p>
            </footer>
        </div>

        {{-- <div style="height: 100vh; width: 100%; overflow-x: hidden; font-family: Arial, sans-serif;">
            <!-- Landing Page -->
            <div style="width: 100%; height: 100vh; background-image: url('/api/placeholder/1920/1080'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 600px;">
                    <div style="background: rgba(255, 255, 255, 0.95); border-radius: 50px; padding: 15px 30px; display: flex; align-items: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <input type="text" placeholder="Search for venues..." style="width: 100%; padding: 10px; border: none; outline: none; font-size: 18px; background: transparent;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="min-width: 24px;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                </div>
            </div>

            <!-- Information Page -->
            <div style="padding: 40px 20px; background: #f8f9fa;">
                <div style="display: flex; overflow-x: auto; gap: 20px; padding: 10px 0;">
                    <!-- Venue Card 1 -->
                    <div style="min-width: 300px; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <img src="/api/placeholder/300/200" alt="Venue 1" style="width: 100%; height: 200px; object-fit: cover; border-radius: 15px 15px 0 0;">
                        <div style="padding: 20px;">
                            <h3 style="margin: 0 0 10px 0;">Grand Ballroom</h3>
                            <p style="margin: 0; color: #666;">Capacity: 500 people</p>
                        </div>
                    </div>
                    <!-- Venue Card 2 -->
                    <div style="min-width: 300px; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <img src="/api/placeholder/300/200" alt="Venue 2" style="width: 100%; height: 200px; object-fit: cover; border-radius: 15px 15px 0 0;">
                        <div style="padding: 20px;">
                            <h3 style="margin: 0 0 10px 0;">Conference Hall</h3>
                            <p style="margin: 0; color: #666;">Capacity: 300 people</p>
                        </div>
                    </div>
                    <!-- Venue Card 3 -->
                    <div style="min-width: 300px; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <img src="/api/placeholder/300/200" alt="Venue 3" style="width: 100%; height: 200px; object-fit: cover; border-radius: 15px 15px 0 0;">
                        <div style="padding: 20px;">
                            <h3 style="margin: 0 0 10px 0;">Meeting Room</h3>
                            <p style="margin: 0; color: #666;">Capacity: 100 people</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Us -->
            <div style="padding: 40px 20px; background: white;">
                <!-- Card 1 -->
                <div style="display: flex; margin-bottom: 40px; background: #f8f9fa; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <img src="/api/placeholder/400/300" alt="About 1" style="width: 400px; height: 300px; object-fit: cover;">
                    <div style="padding: 40px;">
                        <h2 style="margin: 0 0 20px 0;">Our Vision</h2>
                        <p style="margin: 0; line-height: 1.6; color: #666;">We strive to provide the most exceptional venue experiences for all your special events. Our carefully curated spaces are designed to make every moment memorable.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div style="display: flex; margin-bottom: 40px; background: #f8f9fa; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div style="padding: 40px;">
                        <h2 style="margin: 0 0 20px 0;">Our Mission</h2>
                        <p style="margin: 0; line-height: 1.6; color: #666;">To create perfect environments for celebrations, meetings, and gatherings of all kinds. We believe in making every event special through attention to detail and exceptional service.</p>
                    </div>
                    <img src="/api/placeholder/400/300" alt="About 2" style="width: 400px; height: 300px; object-fit: cover;">
                </div>
                <!-- Card 3 -->
                <div style="display: flex; background: #f8f9fa; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <img src="/api/placeholder/400/300" alt="About 3" style="width: 400px; height: 300px; object-fit: cover;">
                    <div style="padding: 40px;">
                        <h2 style="margin: 0 0 20px 0;">Our Values</h2>
                        <p style="margin: 0; line-height: 1.6; color: #666;">Excellence, innovation, and customer satisfaction are at the heart of everything we do. We're committed to providing spaces that inspire and facilitate successful events.</p>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

</x-app-layout>
