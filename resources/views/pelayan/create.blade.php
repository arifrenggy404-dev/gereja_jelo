```php id="v8k2ld"
@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4">

        <div class="card-body text-white p-4"
             style="background: linear-gradient(135deg, #0d6efd, #198754); border-radius: 16px;">

            <div class="d-flex align-items-center">

                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-person-plus-fill fs-2"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">
                        Tambah Data Pelayan
                    </h3>

                    <p class="mb-0 opacity-75">
                        Isi data pelayan gereja dengan lengkap dan benar
                    </p>
                </div>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-person-vcard text-primary me-2"></i>
                        Form Data Pelayan
                    </h5>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('pelayan.store') }}" method="POST">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Nama Pelayan
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input type="text"
                                       name="nama"
                                       value="{{ old('nama') }}"
                                       class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                       placeholder="Masukkan nama pelayan"
                                       required>

                            </div>

                            @error('nama')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                        </div>

                        <!-- Jabatan -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Jabatan
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-briefcase"></i>
                                </span>

                                <select name="jabatan"
                                        class="form-select form-select-lg @error('jabatan') is-invalid @enderror"
                                        required>

                                    <option value="">-- Pilih Jabatan --</option>
                                    <option value="Pendeta" {{ old('jabatan') == 'Pendeta' ? 'selected' : '' }}>Pendeta</option>
                                    <option value="Majelis" {{ old('jabatan') == 'Majelis' ? 'selected' : '' }}>Majelis</option>
                                    <option value="Vikaris" {{ old('jabatan') == 'Vikaris' ? 'selected' : '' }}>Vikaris</option>

                                </select>

                            </div>

                            @error('jabatan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Jenis Kelamin
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-gender-ambiguous"></i>
                                </span>

                                <select name="jenis_kelamin"
                                        class="form-select form-select-lg @error('jenis_kelamin') is-invalid @enderror"
                                        required>

                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>

                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>

                                </select>

                            </div>

                            @error('jenis_kelamin')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                        </div>

                        <!-- Telepon -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Nomor Telepon
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>

                                <input type="text"
                                       name="telepon"
                                       value="{{ old('telepon') }}"
                                       class="form-control form-control-lg"
                                       placeholder="08xxxxxxxxxx">

                            </div>

                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea name="alamat"
                                      rows="4"
                                      class="form-control @error('alamat') is-invalid @enderror"
                                      placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                        </div>

                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('pelayan.index') }}"
                               class="btn btn-outline-secondary">

                               
                                Kembali

                            </a>

                            <button type="submit"
                                    class="btn btn-success">

                              
                                Simpan Data

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
```
