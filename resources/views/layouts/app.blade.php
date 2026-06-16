<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GKS Cabang Payeti | Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    </head>
    <style>
    :root {
        --primary: #1a2e5a;
        --accent: #c9a84c;
        --surface: #f5f7fc;
        --sidebar-w: 270px;
    }
    body { background: var(--surface); font-family: 'DM Sans', sans-serif; min-height: 100vh; }
    
    /* Sidebar */
    .sidebar { position: fixed; top: 0; left: 0; width: var(--sidebar-w); height: 100vh; background: var(--primary); color: white; z-index: 200; overflow-y: auto; }
    .sidebar-brand { padding: 26px 24px; border-bottom: 1px solid rgba(255,255,255,.1); }
    .brand-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #d4af37, #f5d76e);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
    color: #1a2e5a;
    font-size: 2rem;
    font-weight: bold;
    box-shadow: 0 5px 15px rgba(0,0,0,.25);
}

.sidebar-brand {
    padding: 26px 24px;
    border-bottom: 1px solid rgba(255,255,255,.1);
    text-align: center;
}

.brand-name {
    display: block;
    font-size: 1.15rem;
    font-weight: 700;
    color: #fff;
}

.brand-sub {
    display: block;
    font-size: .85rem;
    color: rgba(255,255,255,.7);
}
    .nav-label { font-size: .7rem; font-weight: 700; text-transform: uppercase; color: rgba(255,255,255,.4); padding: 20px 24px 10px; }
    .nav-link { display: flex; align-items: center; gap: 12px; padding: 12px 24px; color: rgba(255,255,255,.7); text-decoration: none; transition: .3s; }
    .nav-link:hover, .nav-link.active { background: rgba(255,255,255,.1); color: #fff; border-left: 4px solid var(--accent); }
    .sidebar-footer { padding: 20px; border-top: 1px solid rgba(255,255,255,.1); }
    .btn-logout { background: transparent; color: rgba(255,255,255,.5); width: 100%; text-align: left; }
    .btn-logout:hover { color: #ff8080; }

    /* Topbar */
    .topbar { position: fixed; top: 0; left: var(--sidebar-w); right: 0; height: 66px; background: #fff; display: flex; align-items: center; justify-content: space-between; padding: 0 32px; box-shadow: 0 2px 10px rgba(0,0,0,.05); z-index: 100; }
    .user-avatar { width: 35px; height: 35px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; }
    
    /* Main Content */
    .main-wrapper { margin-left: var(--sidebar-w); padding-top: 80px; min-height: 100vh; }
    .content-area { padding: 32px; }
    
    /* Footer */
    footer { text-align: center; padding: 20px; color: #666; font-size: 0.8rem; }
    
    /* Mobile Responsive */
    @media (max-width: 991px) {
        .sidebar { transform: translateX(-100%); transition: .3s; }
        .sidebar.open { transform: translateX(0); }
        .topbar, .main-wrapper { left: 0; margin-left: 0; }
        .topbar-toggle { display: block !important; }
    }
    .topbar-toggle { display: none; background: none; border: none; font-size: 1.5rem; }
</style>
<body>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
    <div class="brand-icon">
        ✝
    </div>

    <span class="brand-name">
        GKS Cabang Payeti
    </span>

    <span class="brand-sub">
        Sistem Informasi Gereja
    </span>
</div>

    <div class="sidebar-nav">
        <div class="nav-label">Navigasi Utama</div>
        <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('jemaat.index') }}" class="nav-link {{ Request::is('jemaat*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i> Data Jemaat
        </a>
        <a href="{{ route('pelayan.index') }}" class="nav-link {{ Request::is('pelayan*') ? 'active' : '' }}">
            <i class="bi bi-person-badge-fill"></i> Pelayan
        </a>

        <div class="nav-label" style="margin-top:8px;">Kegiatan</div>
        <a href="{{ route('jadwal.index') }}" class="nav-link {{ Request::is('jadwal*') ? 'active' : '' }}">
            <i class="bi bi-calendar-event"></i> Jadwal Ibadah
        </a>
        <a href="{{ route('pengumuman.index') }}" class="nav-link {{ Request::is('pengumuman*') ? 'active' : '' }}">
            <i class="bi bi-megaphone-fill"></i> Pengumuman
        </a>

        <div class="nav-label" style="margin-top:8px;">Administrasi</div>
        <a href="{{ route('keuangan.index') }}" class="nav-link {{ Request::is('keuangan*') ? 'active' : '' }}">
            <i class="bi bi-cash-stack"></i> Keuangan
        </a>
    </div>

    <div class="sidebar-footer">
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout border-0">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>
        @endauth
    </div>
</aside>

<div class="topbar">
    <div class="d-flex align-items-center gap-3">
        <button class="topbar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
        <span class="topbar-title">Dashboard Admin</span>
    </div>
    @auth
    <div class="topbar-user">
        <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <span class="user-name">{{ Auth::user()->name }}</span>
    </div>
    @endauth
</div>

<div class="main-wrapper">
    <div class="content-area">
        {{-- Notifikasi yang disederhanakan --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer>
        © {{ date('Y') }} <span>GKS Cabang Payeti</span> · Sistem Informasi Gereja
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebarToggle').addEventListener('click', () => {
        document.getElementById('sidebar').classList.toggle('open');
    });
</script>
</body>
</html>