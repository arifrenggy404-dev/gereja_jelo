@extends('layouts.app')

@section('content')

<style>
/* BACKGROUND PREMIUM */
.dashboard-wrapper{
    min-height: 100vh;
    padding: 25px;
    background: linear-gradient(135deg, #eef2f7, #f8fafc);
}

/* HEADER GLASS */
.header-glass{
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
    color: white;
    padding: 20px 22px;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(13,110,253,0.25);
}

/* MODERN CARD */
.modern-card{
    border: none;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    transition: all 0.25s ease;
}

.modern-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

/* STAT BOX */
.stat-box{
    border-radius: 18px;
    padding: 20px;
    color: white;
    position: relative;
    overflow: hidden;
    transition: 0.3s ease;
}

.stat-box:hover{
    transform: scale(1.03);
}

.stat-box::after{
    content:'';
    position:absolute;
    width:140px;
    height:140px;
    background:rgba(255,255,255,0.12);
    border-radius:50%;
    top:-40px;
    right:-40px;
}

/* QUICK ACTION */
.action-card{
    text-decoration:none;
    border-radius: 16px;
    padding: 18px;
    display:flex;
    align-items:center;
    gap:14px;
    transition:0.25s;
    background:#fff;
    border:1px solid #eef1f6;
    box-shadow: 0 6px 18px rgba(0,0,0,0.04);
}

.action-card:hover{
    transform: translateY(-6px);
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
    color:white;
    border-color: transparent;
}

/* MODAL */
.modal-content{
    border-radius: 20px;
    overflow: hidden;
}
</style>

<div class="dashboard-wrapper">

    <!-- POPUP MODAL -->
    <div class="modal fade" id="dashboardPopup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">

                <div class="modal-header text-white"
                     style="background: linear-gradient(135deg, #0d6efd, #198754);">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-stars me-2"></i> Selamat Datang
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center p-4">
                    <i class="bi bi-house-heart text-primary" style="font-size:60px"></i>
                    <h5 class="mt-3 fw-bold">Dashboard GKS Payeti</h5>

                    <p class="text-muted">
                        Halo {{ auth()->user()->name ?? 'User' }}, kelola data gereja dengan lebih cepat 🚀
                    </p>
                </div>

                <div class="modal-footer border-0 justify-content-center">
                    <button class="btn btn-primary px-4" data-bs-dismiss="modal">Mulai</button>
                </div>

            </div>
        </div>
    </div>

    <!-- HEADER -->
    <div class="header-glass d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0 fw-bold">Dashboard Gereja</h4>
            <small>Selamat datang, {{ auth()->user()->name ?? '-' }}</small>
        </div>

        <div class="bg-white text-dark px-3 py-2 rounded-pill shadow-sm">
            <i class="bi bi-calendar-event me-1"></i>
            {{ now()->format('d M Y') }}
        </div>
    </div>

    <!-- GREETING CARD -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card modern-card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold" id="greetingText"></h5>
                        <small class="text-muted">Sistem Gereja berjalan dengan baik 🚀</small>
                    </div>
                    <span class="badge bg-primary px-3 py-2">Online System</span>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="row g-3 mb-4">

        @php
            $stats = [
                ['title'=>'Jemaat','value'=>$jumlahJemaat,'icon'=>'bi-people','color'=>'#0d6efd'],
                ['title'=>'Pelayan','value'=>$jumlahPelayan,'icon'=>'bi-person-badge','color'=>'#198754'],
                ['title'=>'Jadwal','value'=>$jumlahJadwal,'icon'=>'bi-calendar','color'=>'#ffc107'],
                ['title'=>'Pengumuman','value'=>$jumlahPengumuman,'icon'=>'bi-megaphone','color'=>'#dc3545'],
            ];
        @endphp

        @foreach($stats as $s)
        <div class="col-md-3">
            <div class="stat-box" style="background: {{ $s['color'] }}">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="opacity-75">{{ $s['title'] }}</div>
                        <h3 class="fw-bold mb-0">{{ $s['value'] }}</h3>
                    </div>
                    <i class="bi {{ $s['icon'] }} fs-1"></i>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- QUICK ACTION -->
    <div class="card modern-card mb-4">
        <div class="card-body">
            <h6 class="fw-bold mb-3">⚡ Aksi Cepat</h6>

            <div class="row g-3">

                <div class="col-md-3">
                    <a href="{{ route('jemaat.create') }}" class="action-card">
                        <i class="bi bi-person-plus fs-4"></i>
                        <div>
                            <div class="fw-bold">Jemaat</div>
                            <small>Tambah data</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('pelayan.create') }}" class="action-card">
                        <i class="bi bi-person-vcard fs-4"></i>
                        <div>
                            <div class="fw-bold">Pelayan</div>
                            <small>Tambah data</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('jadwal.create') }}" class="action-card">
                        <i class="bi bi-calendar-plus fs-4"></i>
                        <div>
                            <div class="fw-bold">Jadwal</div>
                            <small>Atur kegiatan</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('pengumuman.create') }}" class="action-card">
                        <i class="bi bi-megaphone fs-4"></i>
                        <div>
                            <div class="fw-bold">Pengumuman</div>
                            <small>Publikasi info</small>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- CHART + JADWAL -->
    <div class="row g-4">

        <div class="col-lg-7">
            <div class="card modern-card">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Statistik Gereja</h6>
                    <canvas id="dashboardChart" style="height:300px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card modern-card">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">📅 Jadwal Mendatang</h6>

                    @forelse($jadwal as $item)
                        <div class="border-bottom py-2">
                            <div class="fw-bold text-primary">
                                {{ $item->kegiatan ?? '-' }}
                            </div>
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </small>
                        </div>
                    @empty
                        <div class="text-center py-4 text-muted">
                            <i class="bi bi-calendar-x" style="font-size:40px"></i>
                            <div class="mt-2">Belum ada jadwal kegiatan</div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

    </div>

</div>

<!-- CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('dashboardChart'), {
    type: 'bar',
    data: {
        labels: ['Jemaat','Pelayan','Jadwal','Pengumuman'],
        datasets: [{
            data: [{{ $jumlahJemaat }},{{ $jumlahPelayan }},{{ $jumlahJadwal }},{{ $jumlahPengumuman }}],
            backgroundColor: ['#0d6efd','#198754','#ffc107','#dc3545'],
            borderRadius: 8
        }]
    },
    options: {
        plugins: { legend: { display:false }},
        responsive: true
    }
});
</script>

<script>
function getGreeting() {
    const hour = new Date().getHours();
    if (hour < 12) return "Selamat Pagi ☀️";
    if (hour < 18) return "Selamat Siang 🌤️";
    return "Selamat Malam 🌙";
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("greetingText").innerText =
        getGreeting() + ", {{ auth()->user()->name ?? 'User' }}";

    new bootstrap.Modal(document.getElementById('dashboardPopup')).show();
});
</script>

@endsection