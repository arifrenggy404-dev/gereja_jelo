@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4">

        <div class="card-body text-white p-4"
             style="background: linear-gradient(135deg, #fd7e14, #6f42c1); border-radius: 16px;">

            <div class="d-flex align-items-center">

                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-person-gear fs-2"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">
                        Edit Data Pelayan
                    </h3>
                    <p class="mb-0 opacity-75">
                        Perbarui informasi pelayan gereja
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
                        <i class="bi bi-pencil-square text-warning me-2"></i>
                        Form Edit Pelayan
                    </h5>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('pelayan.update', $pelayan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- NAMA -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Nama Pelayan</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input type="text"
                                       name="nama"
                                       class="form-control form-control-lg"
                                       value="{{ $pelayan->nama }}"
                                       required>
                            </div>

                        </div>

                        <!-- JABATAN -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Jabatan</label>

                            <select name="jabatan" class="form-select form-select-lg" required>

                                <option value="Pendeta"
                                    {{ $pelayan->jabatan == 'Pendeta' ? 'selected' : '' }}>
                                    Pendeta
                                </option>

                                <option value="Majelis"
                                    {{ $pelayan->jabatan == 'Majelis' ? 'selected' : '' }}>
                                    Majelis
                                </option>

                                <option value="Vikaris"
                                    {{ $pelayan->jabatan == 'Vikaris' ? 'selected' : '' }}>
                                    Vikaris
                                </option>

                            </select>

                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Jenis Kelamin</label>

                            <select name="jenis_kelamin" class="form-select form-select-lg" required>

                                <option value="Laki-laki"
                                    {{ $pelayan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="Perempuan"
                                    {{ $pelayan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>

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
                                       value="{{ $pelayan->telepon }}">
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
                                          rows="3"
                                          required>{{ old('alamat', $pelayan->alamat) }}</textarea>
                            </div>

                        </div>

                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('pelayan.index') }}"
                               class="btn btn-outline-secondary">

                               
                                Kembali

                            </a>

                            <button type="submit"
                                    class="btn btn-warning text-white">

                               
                                Update

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection