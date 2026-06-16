@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div class="card border-0 shadow-lg mb-4">

            <div class="card-body text-white p-4"
                style="background: linear-gradient(135deg, #0d6efd, #20c997); border-radius: 16px;">

                <div class="d-flex align-items-center">

                    <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                        <i class="bi bi-megaphone fs-2"></i>
                    </div>

                    <div>
                        <h3 class="fw-bold mb-1">
                            Edit Pengumuman
                        </h3>
                        <p class="mb-0 opacity-75">
                            Perbarui informasi pengumuman jemaat
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
                            Form Edit Pengumuman
                        </h5>
                    </div>

                    <div class="card-body p-4">

                        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- JUDUL -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">Judul Pengumuman</label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-card-heading"></i>
                                    </span>

                                    <input type="text" name="judul"
                                        class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                        value="{{ old('judul', $pengumuman->judul) }}" required>

                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <!-- ISI -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">Isi Pengumuman</label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-chat-text"></i>
                                    </span>

                                    <textarea name="isi" rows="6" class="form-control form-control-lg @error('isi') is-invalid @enderror"
                                        required>{{ old('isi', $pengumuman->isi) }}</textarea>

                                    @error('isi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <!-- TANGGAL -->
                            <!-- Hapus blok input waktu yang di luar form, lalu update bagian tanggal di dalam form -->

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tanggal & Waktu Pengumuman</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar-date"></i>
                                    </span>
                                    {{-- Format untuk datetime-local harus Y-m-d\TH:i --}}
                                    <input type="datetime-local" name="tanggal"
                                        class="form-control form-control-lg @error('tanggal') is-invalid @enderror"
                                        value="{{ old('tanggal', \Carbon\Carbon::parse($pengumuman->tanggal)->format('Y-m-d\TH:i')) }}"
                                        required>

                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <!-- BUTTON -->
                            <div class="d-flex justify-content-end gap-2">

                                <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-secondary">


                                    Batal

                                </a>

                                <button type="submit" class="btn btn-success">


                                    Perbarui Pengumuman

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
