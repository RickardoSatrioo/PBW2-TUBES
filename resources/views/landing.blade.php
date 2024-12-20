<x-app-layout>
    <style>
        .bg-full {
            min-height: 100vh;
            max-height: 100vh;
            background-image: url('{{ asset('assets/img/bg-telu2.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
        }

        .content {
            color: white;
            text-align: center;
            padding: 20px;
            overflow-y: auto;
        }

        .navbar {
            background-color: transparent !important;
            padding: 1rem 2rem;
        }

        .navbar-brand {
            color: white !important;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-link {
            color: white !important;
        }

        .login-btn {
            background-color: #0066cc;
            color: white;
            border-radius: 20px;
            padding:0 5px 0 5px;
        }

        .hero-content {
            color: white;
            text-align: center;
            padding-top: 15vh;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 2rem;
        }

        .search-section {
            background-color: white;
            border-radius: 50px;
            padding: 1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .category-buttons {
            margin-bottom: 2rem;
        }

        .category-buttons button {
            color: white;
            border: none;
            background: transparent;
            padding: 0.5rem 1.5rem;
            margin: 0 0.5rem;
            transition: all 0.3s;
        }

        .category-buttons button:active {
            text-decoration: underline;
        }

        .category-buttons button:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
        }

        .tag-buttons {
            /* margin-top: 2rem; */
        }

        .tag-buttons button {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
            margin: 0.5rem;
        }
    </style>
    </style>

    <div class="bg-full">
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid gap-2 me-sm-4">
                <section class="navbar-brand" href="#">UniShare</section>
                <div class="ms-auto d-flex align-items-center border border-2 rounded-5 p-2">
                    <span class="text-white me-3">Selamat Datang !</span>
                    <button class="btn login-btn">Masuk</button>
                </div>
                <button class="bg-transparent border-0">
                    <i class="ti ti-user-circle" style="font-size: 28px; color: white;"></i>
                </button>
                <button class="bg-transparent border-0">
                    <i class="ti ti-menu-deep" style="font-size: 28px; color: white;"></i>
                </button>
            </div>
        </nav>

        <div class="content">
            <!-- Hero Content -->
            <div class="container hero-content">
                <h1>Ingin Reservasi Ruangan di Telkom Univ ?</h1>

                <div class="category-buttons">
                    <button>Buy</button>
                    <button>Rent</button>
                    <button>PG/Co-living</button>
                    <button>Commercial</button>
                </div>

                <!-- Search Section -->
                <div class="search-section">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0" placeholder="Nama Gedung">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Ruangan</option>
                                <!-- Add your options here -->
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select border-0">
                                <option selected>Tujuan</option>
                                <!-- Add your options here -->
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-danger rounded-circle">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="d-flex gap-2 mt-3 justify-content-center align-items-center">
                    <p class="m-0">Pencarian Terbaru -</p>
                    <div class="tag-buttons">
                        <button>TULT</button>
                        <button>BANGKIT</button>
                        <button>MANTERAWU</button>
                        <button>FIT</button>
                        <button>FEB</button>
                    </div>
                </div>
            </div>
            <div style="height: 270px"></div>
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <p style="font-weight: 500; font-size: 24px; color: black;">Reservasi Terbaru</p>
                    <a href="#" style="font-weight: 500; font-size: 20px;">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
