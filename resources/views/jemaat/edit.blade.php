@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4">

        <div class="card-body text-white p-4"
             style="background: linear-gradient(135deg, #0d6efd, #6f42c1); border-radius: 16px;">

            <div class="d-flex align-items-center">

                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-person-gear fs-2"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">
                        Edit Data Jemaat
                    </h3>
                    <p class="mb-0 opacity-75">
                        Perbarui informasi jemaat terdaftar
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
                        <i class="bi bi-pencil-square text-primary me-2"></i>
                        Form Edit Jemaat
                    </h5>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('jemaat.update', $jemaat->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- NAMA -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Nama Lengkap</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input type="text"
                                       name="nama"
                                       class="form-control form-control-lg"
                                       value="{{ old('nama', $jemaat->nama) }}"
                                       required>
                            </div>

                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Jenis Kelamin</label>

                            <select name="jenis_kelamin" class="form-select form-select-lg" required>

                                <option value="Laki-laki"
                                    {{ $jemaat->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="Perempuan"
                                    {{ $jemaat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>

                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Tanggal Lahir</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-date"></i>
                                </span>

                                <input type="date"
                                       name="tanggal_lahir"
                                       class="form-control form-control-lg"
                                       value="{{ old('tanggal_lahir', $jemaat->tanggal_lahir) }}"
                                       required>
                            </div>

                        </div>

                        <!-- ALAMAT -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Alamat</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt"></i>
                                </span>

                                <textarea name="alamat"
                                          class="form-control form-control-lg"
                                          rows="3">{{ old('alamat', $jemaat->alamat) }}</textarea>
                            </div>

                        </div>

                        <!-- TELEPON -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Telepon</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>

                                <input type="text"
                                       name="telepon"
                                       class="form-control form-control-lg"
                                       value="{{ old('telepon', $jemaat->telepon) }}">
                            </div>

                        </div>

                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('jemaat.index') }}"
                               class="btn btn-outline-secondary">

                              
                                Batal

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                              
                                Update Data

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection