@push('js')
<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.user.get_list') }}',
                type: 'GET',
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'nophone', name: 'nophone' },
                { data: 'faculty', name: 'faculty' },
                { data: 'major', name: 'major' },
                // { data: 'avatar', name: 'avatar', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            order: [[1, 'asc']],
            drawCallback: function() {
                $('.delete-button').on('click', function(e) {
                    e.preventDefault();
                    let form = $(this).closest('form');
                    Swal.fire({
                        title: 'Hapus User?',
                        text: 'Data ini akan dihapus permanen.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            }
        });
    });
</script>
@endpush

<x-app-layout>
    <div style="max-width: 1920px; max-height: 1200px; margin: 0 auto; overflow-y:auto ; position: relative;">
        {{-- Header --}}
        <div style="width: 100%; position: absolute; height: 4rem; background-color: #ffffff; top: 0; left: 0; padding: 0.4rem 6rem; display: flex; justify-content: space-between;">
            <div>
                <h1>UniShare</h1>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="gap-2 btn btn-light d-flex justify-content-center align-items-center">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ti ti-user-circle" style="font-size: 3rem;"></div>
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
            <div style="width: 240px; padding: 8rem 1rem; color: #ffffff; background-color: #550000; display: flex; flex-direction: column; gap: 2.25rem;">
                <div style="border-bottom: 2px solid #fff;">
                    <p style="font-weight: 600; font-size: 1.25rem; text-align: center; margin-bottom: 0.1rem !important;">Verifikasi Pesanan</p>
                </div>
            </div>

            {{-- Main Content --}}
            <div x-data="{ openTab: 1 }" style="flex-grow: 1; padding: 8rem 3rem 0 2rem; background-color: #ffffff;" class="mb-5">
                <div class="mb-3 d-flex justify-content-between align-content-center">
                    <h1>{{ $title }}</h1>
                    <a href="{{ route($routePrefix . 'create') }}" class="btn btn-success d-block justify-content-center align-content-center">Tambah User</a>
                </div>

                <table id="user-table" class="table p-0 m-0 table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            {{-- <th>Avatar</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
