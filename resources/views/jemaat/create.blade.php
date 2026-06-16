```php id="x8k2ld"
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
                        Tambah Data Jemaat
                    </h3>

                    <p class="mb-0 opacity-75">
                        Isi data jemaat dengan lengkap dan benar
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
                        Form Data Jemaat
                    </h5>
                </div>

                <div class="card-body p-4">

                    {{-- VALIDASI ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('jemaat.store') }}" method="POST">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Nama Lengkap
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input type="text"
                                       name="nama"
                                       value="{{ old('nama') }}"
                                       class="form-control form-control-lg"
                                       placeholder="Masukkan nama lengkap"
                                       required>

                            </div>

                        </div>

                        <!-- Jenis Kelamin & Tanggal Lahir -->
                        <div class="row g-3 mb-4">

                            <!-- Jenis Kelamin -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Jenis Kelamin
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </span>

                                    <select class="form-select form-select-lg"
                                            name="jenis_kelamin"
                                            required>

                                        <option value="">-- Pilih --</option>

                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>

                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Tanggal Lahir
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date"></i>
                                    </span>

                                    <input type="date"
                                           name="tanggal_lahir"
                                           value="{{ old('tanggal_lahir') }}"
                                           class="form-control form-control-lg"
                                           required>

                                </div>

                            </div>

                        </div>

                        <!-- ALAMAT -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea class="form-control"
                                      name="alamat"
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap"
                                      required>{{ old('alamat') }}</textarea>

                        </div>

                        <!-- TELEPON -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                No. Telepon
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>

                                <input type="text"
                                       name="telepon"
                                       value="{{ old('telepon') }}"
                                       class="form-control"
                                       placeholder="08xxxxxxxxxx">

                            </div>

                        </div>

                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('jemaat.index') }}"
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
