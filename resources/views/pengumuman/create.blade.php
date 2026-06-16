@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-4 text-white" style="background: linear-gradient(135deg, #0d6efd, #198754);">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                            <i class="bi bi-megaphone-fill fs-2"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-1">Tambah Pengumuman</h2>
                            <p class="mb-0 opacity-75">Buat pengumuman baru untuk jemaat gereja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-pencil-square text-primary me-2"></i>
                        Form Pengumuman
                    </h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('pengumuman.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Judul Pengumuman</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-card-heading"></i></span>
                                <input type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan judul pengumuman">
                            </div>
                            @error('judul') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Isi Pengumuman</label>
                            <textarea name="isi" rows="6" class="form-control @error('isi') is-invalid @enderror" placeholder="Tuliskan isi pengumuman secara lengkap...">{{ old('isi') }}</textarea>
                            @error('isi') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Pengumuman</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror">
                            </div>
                            @error('tanggal') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Waktu Pengumuman</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                <input type="time" name="waktu" value="{{ old('waktu') }}" class="form-control @error('waktu') is-invalid @enderror">
                            </div>
                            @error('waktu') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <hr>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Pengumuman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection