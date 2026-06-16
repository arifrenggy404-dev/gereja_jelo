@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4">

        <div class="card-body text-white p-4"
             style="background: linear-gradient(135deg, #198754, #0d6efd); border-radius: 16px;">

            <div class="d-flex align-items-center">

                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-pencil-square fs-2"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">
                        Edit Transaksi Keuangan
                    </h3>
                    <p class="mb-0 opacity-75">
                        Perbarui data pemasukan atau pengeluaran gereja
                    </p>
                </div>

            </div>

        </div>

    </div>

    <!-- ALERT WARNING -->
    <div id="warningBox" class="alert alert-danger d-none shadow-sm">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        Pengeluaran lebih besar dari pemasukan! Periksa kembali data keuangan.
    </div>

    <!-- FORM -->
    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-cash-coin text-success me-2"></i>
                        Form Edit Transaksi
                    </h5>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- KETERANGAN -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Keterangan</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-chat-text"></i>
                                </span>

                                <input type="text"
                                       name="keterangan"
                                       class="form-control form-control-lg"
                                       value="{{ old('keterangan', $keuangan->keterangan) }}"
                                       required>
                            </div>

                        </div>

                        <!-- JENIS -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Jenis Transaksi</label>

                            <select id="jenis"
                                    name="jenis"
                                    class="form-select form-select-lg"
                                    required>

                                <option value="pemasukan"
                                    {{ $keuangan->jenis == 'pemasukan' ? 'selected' : '' }}>
                                    Pemasukan
                                </option>

                                <option value="pengeluaran"
                                    {{ $keuangan->jenis == 'pengeluaran' ? 'selected' : '' }}>
                                    Pengeluaran
                                </option>

                            </select>

                        </div>

                        <!-- JUMLAH -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Jumlah (Rp)</label>

                            <div class="input-group">
                                <span class="input-group-text">Rp</span>

                                <input type="number"
                                       id="jumlah"
                                       name="jumlah"
                                       class="form-control form-control-lg"
                                       value="{{ old('jumlah', $keuangan->jumlah) }}"
                                       required>
                            </div>

                            <!-- BEFORE vs AFTER -->
                            <div class="mt-2">

                                <small class="text-muted">Perubahan nominal:</small>

                                <div class="d-flex gap-2 mt-1">

                                    <span class="badge bg-secondary">
                                        Before: Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}
                                    </span>

                                    <span id="afterBadge" class="badge bg-success">
                                        After: Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- TANGGAL -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">Tanggal</label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control form-control-lg"
                                   value="{{ old('tanggal', $keuangan->tanggal) }}"
                                   required>

                        </div>

                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('keuangan.index') }}"
                               class="btn btn-outline-secondary">

                             
                                Batal

                            </a>

                            <button type="submit"
                                    class="btn btn-success">

                                
                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    let jumlah = document.getElementById("jumlah");
    let jenis = document.getElementById("jenis");
    let afterBadge = document.getElementById("afterBadge");
    let warningBox = document.getElementById("warningBox");

    let beforeValue = parseInt(jumlah.value) || 0;

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    function checkWarning() {

        let value = parseInt(jumlah.value) || 0;
        let type = jenis.value;

        // update after badge
        afterBadge.innerHTML = "After: Rp " + formatRupiah(value);

        // highlight perubahan
        if (value !== beforeValue) {
            afterBadge.classList.remove("bg-success");
            afterBadge.classList.add("bg-warning", "text-dark");
        } else {
            afterBadge.classList.remove("bg-warning", "text-dark");
            afterBadge.classList.add("bg-success");
        }

        // 🔥 WARNING LOGIC
        if (type === "pengeluaran" && value > 1000000) {
            warningBox.classList.remove("d-none");
        } else {
            warningBox.classList.add("d-none");
        }

    }

    jumlah.addEventListener("input", checkWarning);
    jenis.addEventListener("change", checkWarning);

});
</script>

@endsection