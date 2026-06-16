@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4">

        <div class="card-body p-4 text-white"
             style="background: linear-gradient(135deg, #0d6efd, #198754); border-radius: 16px;">

            <div class="d-flex align-items-center">

                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-calendar-plus fs-2"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">
                        Tambah Jadwal Ibadah
                    </h3>

                    <p class="mb-0 opacity-75">
                        Rumah Tangga • Pemuda • Mingguan
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
                        Form Jadwal
                    </h5>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('jadwal.store') }}" method="POST">
                        @csrf

                        <!-- KATEGORI IBADAH -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Kategori Ibadah
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-grid-3x3-gap"></i>
                                </span>

                                <select name="kategori" class="form-select" required>
    <option value="">Pilih Kategori</option>
    <option value="rumah_tangga">🏠 Ibadah Rumah Tangga</option>
    <option value="pemuda">👥 Ibadah Pemuda</option>
    <option value="mingguan">⛪ Ibadah Mingguan</option>
</select>

                            </div>

                        </div>

                        <!-- KEGIATAN -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Kegiatan</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-event"></i>
                                </span>

                                <input type="text"
                                       name="kegiatan"
                                       class="form-control"
                                       placeholder="Contoh: Ibadah Minggu"
                                       required>
                            </div>

                        </div>

                        <!-- TANGGAL -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Tanggal</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-date"></i>
                                </span>

                                <input type="date"
                                       name="tanggal"
                                       class="form-control"
                                       required>
                            </div>

                        </div>

                        <!-- JAM -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Jam</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-clock"></i>
                                </span>

                                <input type="time"
                                       name="jam"
                                       class="form-control"
                                       required>
                            </div>

                        </div>

                        <!-- TEMPAT -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Tempat</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt"></i>
                                </span>

                                <input type="text"
                                       name="tempat"
                                       class="form-control"
                                       placeholder="Contoh: Gereja GKS Payeti"
                                       required>
                            </div>

                        </div>

                        <!-- CATATAN (BARU) -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Catatan (Opsional)
                            </label>

                            <textarea name="catatan"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Tambahkan informasi tambahan..."></textarea>

                        </div>

                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('jadwal.index') }}"
                               class="btn btn-outline-secondary">
                                Kembali
                            </a>

                            <button type="submit"
                                    class="btn btn-success">
                                Simpan Jadwal
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection