@push('js')
    <script>
        $(document).ready(function() {
            // Function to load data into the "Approved" table
            function loadApprovedReservations() {
                $('#approvedTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('admin.reservations.get_list') }}',
                        type: 'GET',
                        data: {
                            status: 'approved' // Status set to 'approved'
                        },
                    },
                    columns: [{
                        data: 'reservation_details'
                    }, ]
                });
            }


            loadPendingReservations();
            // $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();

            // Function to load data into the "Pending" table
            let isLoadedPending = false

            function loadPendingReservations() {
                $('#pendingTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('admin.reservations.get_list') }}',
                        type: 'GET',
                        data: {
                            status: 'pending' // Status set to 'pending'
                        },
                    },
                    drawCallback: function(settings) {
                        $('#selesaiButton').attr('disabled', false)
                    },
                    columns: [{
                        data: 'reservation_details'
                    }, ]
                });
            }

            // jQuery click event for the 'Selesai' button
            $('#selesaiButton').click(function() {
                if (isLoadedPending) return;
                isLoadedPending = true
                loadApprovedReservations();
            });
        });
    </script>

    <script>
        $(document).on('click', '.reject-button', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Show SweetAlert with input for rejection reason
            Swal.fire({
                title: 'Konfirmasi Penolakan',
                text: 'Silakan berikan alasan penolakan:',
                input: 'textarea',
                inputPlaceholder: 'Tulis alasan di sini...',
                inputAttributes: {
                    'aria-label': 'Tulis alasan penolakan di sini'
                },
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Kirim',
                cancelButtonText: 'Batal',
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('Alasan penolakan wajib diisi!');
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const reason = result.value; // Get the input value
                    const form = $(this).closest('.reject-form'); // Find the closest form

                    if (form.length) {
                        // Append the reason as a hidden input field to the form
                        $('<input>')
                            .attr({
                                type: 'hidden',
                                name: 'reason',
                                value: reason
                            })
                            .appendTo(form);

                        form.submit(); // Submit the form
                    } else {
                        console.error("Reject form not found");
                    }
                }
            });
        });


        $(document).on('click', '.approve-button', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menyetujui Peminjaman ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Tolak!',
            }).then((result) => {
                // If the user confirms, submit the form
                if (result.isConfirmed) {

                    const form = $(this).closest('.approve-form');
                    console.log(form)
                    form.submit();
                }
            });
        });
    </script>
@endpush

<x-app-layout>

    <div style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;">
        {{-- Header --}}
        <div
            style="width: 100%; position: absolute; height: 4rem; background-color: #ffffff; top: 0; left: 0; padding: 0.4rem 6rem; display: flex; justify-content: space-between;">
            <div>
                <h1>UniShare</h1>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="gap-2 btn btn-light d-flex justify-content-center align-items-center">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ti ti-user-circle" style="font-size: 3rem;"></div>
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>


                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
        {{-- Content Body --}}
        <div style="display: flex; min-height: 100vh; width: 100%; box-sizing: border-box;">
            {{-- Sidebar --}}
            <div
                style="width: 240px; padding: 8rem 1rem; color: #ffffff; background-color: #550000; display: flex; flex-direction: column; gap: 2.25rem;">
                <div style="border-bottom: 2px solid #fff;" class="mb-3">
                    <a href="{{ route('admin.admin.verif-reservation') }}">
                        <p
                        style="font-weight: 600; font-size: 1.25rem; text-align: center; margin-bottom: 0.1rem !important; ">
                        Verifikasi Pesanan</p>
                    </a>
                </div>

                <div style="border-bottom: 2px solid #fff;">
                    <a href="{{ route('admin.room.index') }}">
                        <p
                        style="font-weight: 600; font-size: 1.25rem; text-align: center; margin-bottom: 0.1rem !important; ">
                        Room</p>
                    </a>
                </div>
                {{-- <div style="border-bottom: 2px solid #fff;">
                    <p style="font-weight: 600; font-size: 1.25rem; text-align: center; margin-bottom: 0.1rem !important; ">
                        Other Menu</p>
                </div> --}}
            </div>

            {{-- Main Content --}}
            <div x-data="{ openTab: 1 }" style="flex-grow: 1; padding: 8rem 3rem 0 2rem; background-color: #ffffff;">

                <p style="font-weight: 800; font-size: 2.25rem;">{{ $title }}</p>

                <div class="mb-3 d-flex justify-content-between">
                    <h1>{{ $title }}</h1>
                    <a href="{{ route($routePrefix . 'create') }}" class="btn btn-success">Tambah Ruangan</a>
                </div>

                <table id="room-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Ruangan</th>
                            <th>Nama Gedung</th>
                            <th>Foto</th>
                            <th>Kapasitas</th>
                            <th>Waktu Buka</th>
                            <th>Waktu Tutup</th>
                            <th>Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>
    </div>
</x-app-layout>
