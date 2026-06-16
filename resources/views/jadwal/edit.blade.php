@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4">

        <div class="card-body text-white p-4"
             style="background: linear-gradient(135deg, #0d6efd, #198754); border-radius: 16px;">

            <div class="d-flex align-items-center">

                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-calendar-event fs-2"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">
                        Edit Jadwal Kegiatan
                    </h3>
                    <p class="mb-0 opacity-75">
                        Perbarui jadwal kegiatan gereja
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
                        Form Edit Jadwal
                    </h5>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- KEGIATAN -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Kegiatan
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-broadcast"></i>
                                </span>

                                <input type="text"
                                       name="kegiatan"
                                       class="form-control form-control-lg"
                                       value="{{ $jadwal->kegiatan }}"
                                       required>

                            </div>

                        </div>

                        <!-- TANGGAL & JAM -->
                        <div class="row g-3 mb-4">

                            <!-- TANGGAL -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Tanggal
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date"></i>
                                    </span>

                                    <input type="date"
                                           name="tanggal"
                                           class="form-control form-control-lg"
                                           value="{{ $jadwal->tanggal }}"
                                           required>

                                </div>

                            </div>

                            <!-- JAM -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Jam
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-clock"></i>
                                    </span>

                                    <input type="time"
                                           name="jam"
                                           class="form-control form-control-lg"
                                           value="{{ $jadwal->jam }}"
                                           required>

                                </div>

                            </div>

                        </div>

                        <!-- TEMPAT -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Tempat
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt"></i>
                                </span>

                                <input type="text"
                                       name="tempat"
                                       class="form-control form-control-lg"
                                       value="{{ $jadwal->tempat }}"
                                       required>

                            </div>

                        </div>

                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('jadwal.index') }}"
                               class="btn btn-outline-secondary">

                               
                                Batal

                            </a>

                            <button type="submit"
                                    class="btn btn-success">

                               
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