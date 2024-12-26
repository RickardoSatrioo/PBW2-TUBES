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
                <div style="border-bottom: 2px solid #fff;">
                    <p
                        style="font-weight: 600; font-size: 1.25rem; text-align: center; margin-bottom: 0.1rem !important; ">
                        Pengaturan Pengguna</p>
                </div>
            </div>

            {{-- Main Content --}}
            <div x-data="{ openTab: 1 }" style="flex-grow: 1; padding: 8rem 3rem 0 2rem; background-color: #ffffff;height: 100vh;overflow-y:scroll">

                <div class="mb-3 d-flex justify-content-between">
                    <h1>{{ $title }}</h1>
                </div>

                <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($method === 'PUT')
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pengguna</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $model->name ?? '') }}" required>
                        @error('name')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $model->email ?? '') }}" required>
                        @error('email')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nophone" class="form-label">Nomor Telepon</label>
                        <input type="text" id="nophone" name="nophone" class="form-control" value="{{ old('nophone', $model->nophone ?? '') }}">
                        @error('nophone')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            {{ $method === 'POST' ? 'required' : '' }}>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-grou">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                            {{ $method === 'POST' ? 'required' : '' }}>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control">
                            @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                <option value="{{ $role->name }}" {{ old('role', $model->roles->first()->name ?? '') === $role->name ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="about" class="form-label">Tentang Pengguna</label>
                        <textarea id="about" name="about" class="form-control" rows="3">{{ old('about', $model->about ?? '') }}</textarea>
                        @error('about')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="faculty" class="form-label">Fakultas</label>
                        <input type="text" id="faculty" name="faculty" class="form-control" value="{{ old('faculty', $model->faculty ?? '') }}">
                        @error('faculty')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="major" class="form-label">Jurusan</label>
                        <input type="text" id="major" name="major" class="form-control" value="{{ old('major', $model->major ?? '') }}">
                        @error('major')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="mb-3">
                        <label for="avatar" class="form-label">Foto Profil</label>
                        <input type="file" id="avatar" name="avatar" class="form-control">
                        @if(isset($model) && $model->avatar)
                            <img src="{{ asset('storage/' . $model->avatar) }}" alt="Foto Profil" width="100" class="mt-2">
                        @endif
                        @error('avatar')
                        <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}

                    <div class="mb-3">
                        <label for="birthDate" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="birthDate" name="birthDate" class="form-control" value="{{ old('birthDate', $model->birthDate ?? '') }}">
                        @error('birthDate')
                            <div class="rounded invalid-feedback d-block ps-2" style="background: white; text-align: left">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ $button }}</button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
