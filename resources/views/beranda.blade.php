<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GKS PAYETI CABANG PRAILIU</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      --navy-deep:   #0a1628;
      --navy-mid:    #112240;
      --navy-light:  #1b3a6b;
      --gold:        #c9a84c;
      --gold-light:  #e8c97a;
      --white:       #ffffff;
      --offwhite:    #f4f6fb;
      --text-muted:  #8fa3c0;
      --text-body:   #cdd8ec;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--navy-deep);
      color: var(--white);
      overflow-x: hidden;
    }

    /* ── NAV ── */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 22px 6%;
      background: rgba(10, 22, 40, 0.85);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid rgba(201,168,76,.15);
      transition: padding .3s;
    }

    .nav-logo {
      display: flex; align-items: center; gap: 12px;
      font-family: 'Playfair Display', serif;
      font-size: 20px; font-weight: 700;
      color: var(--white); text-decoration: none;
    }

    .nav-logo .cross {
      width: 36px; height: 36px;
      background: var(--gold);
      clip-path: polygon(
        40% 0%, 60% 0%, 60% 35%, 100% 35%,
        100% 55%, 60% 55%, 60% 100%,
        40% 100%, 40% 55%, 0% 55%,
        0% 35%, 40% 35%
      );
    }

    .nav-links { display: flex; gap: 36px; list-style: none; }
    .nav-links a {
      color: var(--text-body); text-decoration: none;
      font-size: 14px; font-weight: 500; letter-spacing: .4px;
      transition: color .25s;
    }
    .nav-links a:hover { color: var(--gold-light); }

    .nav-cta {
      padding: 10px 24px;
      background: var(--gold);
      color: var(--navy-deep);
      border-radius: 6px;
      font-size: 14px; font-weight: 600;
      text-decoration: none;
      transition: background .25s, transform .2s;
    }
    .nav-cta:hover { background: var(--gold-light); transform: translateY(-1px); }

    /* ── HERO ── */
    .hero {
      min-height: 100vh;
      display: flex; flex-direction: column;
      justify-content: center; align-items: flex-start;
      padding: 0 6%; padding-top: 100px;
      position: relative; overflow: hidden;
    }

    /* stained-glass ambient orbs */
    .hero::before, .hero::after {
      content: ''; position: absolute; border-radius: 50%;
      filter: blur(90px); pointer-events: none;
    }
    .hero::before {
      width: 600px; height: 600px;
      background: radial-gradient(circle, rgba(27,58,107,.7) 0%, transparent 70%);
      top: -100px; right: -100px;
    }
    .hero::after {
      width: 400px; height: 400px;
      background: radial-gradient(circle, rgba(201,168,76,.12) 0%, transparent 70%);
      bottom: 80px; left: 10%;
    }

    .hero-eyebrow {
      font-size: 12px; font-weight: 600; letter-spacing: 3px;
      text-transform: uppercase; color: var(--gold);
      margin-bottom: 24px;
    }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(42px, 6vw, 82px);
      font-weight: 900; line-height: 1.05;
      max-width: 750px;
    }

    .hero h1 em {
      font-style: normal;
      -webkit-text-stroke: 1.5px var(--gold);
      color: transparent;
    }

    .hero-sub {
      margin-top: 28px;
      font-size: 17px; font-weight: 300; line-height: 1.7;
      color: var(--text-body); max-width: 520px;
    }

    .hero-actions {
      margin-top: 44px; display: flex; gap: 16px; flex-wrap: wrap;
    }

    .btn-primary {
      padding: 15px 36px;
      background: var(--gold);
      color: var(--navy-deep);
      font-weight: 700; font-size: 15px;
      border-radius: 8px; text-decoration: none;
      transition: background .25s, transform .2s, box-shadow .25s;
    }
    .btn-primary:hover {
      background: var(--gold-light);
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(201,168,76,.3);
    }

    .btn-outline {
      padding: 15px 36px;
      border: 1.5px solid rgba(201,168,76,.5);
      color: var(--gold-light);
      font-weight: 600; font-size: 15px;
      border-radius: 8px; text-decoration: none;
      transition: border-color .25s, background .25s;
    }
    .btn-outline:hover {
      border-color: var(--gold);
      background: rgba(201,168,76,.08);
    }

    .hero-stats {
      margin-top: 72px;
      display: flex; gap: 52px; flex-wrap: wrap;
    }
    .stat-item { border-left: 2px solid var(--gold); padding-left: 20px; }
    .stat-num {
      font-family: 'Playfair Display', serif;
      font-size: 36px; font-weight: 700; color: var(--white);
      line-height: 1;
    }
    .stat-label {
      font-size: 12px; color: var(--text-muted);
      letter-spacing: 1px; margin-top: 4px;
    }

    /* ── JADWAL ── */
    .section { padding: 100px 6%; }

    .section-label {
      font-size: 11px; font-weight: 600; letter-spacing: 3px;
      text-transform: uppercase; color: var(--gold);
      margin-bottom: 14px;
    }
    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(28px, 3.5vw, 46px);
      font-weight: 700; line-height: 1.15;
      max-width: 540px;
    }
    .section-sub {
      color: var(--text-muted); font-size: 15px; font-weight: 300;
      max-width: 480px; line-height: 1.7; margin-top: 14px;
    }

    .jadwal-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px; margin-top: 56px;
    }

    .jadwal-card {
      background: var(--navy-mid);
      border: 1px solid rgba(201,168,76,.12);
      border-radius: 16px; padding: 32px 28px;
      transition: transform .3s, border-color .3s, box-shadow .3s;
      position: relative; overflow: hidden;
    }
    .jadwal-card::after {
      content: ''; position: absolute;
      top: 0; left: 0; width: 4px; height: 100%;
      background: var(--gold); border-radius: 4px 0 0 4px;
      opacity: 0; transition: opacity .3s;
    }
    .jadwal-card:hover {
      transform: translateY(-6px);
      border-color: rgba(201,168,76,.35);
      box-shadow: 0 24px 48px rgba(0,0,0,.35);
    }
    .jadwal-card:hover::after { opacity: 1; }

    .jadwal-hari {
      font-size: 11px; font-weight: 600; letter-spacing: 2px;
      text-transform: uppercase; color: var(--gold);
    }
    .jadwal-nama {
      font-family: 'Playfair Display', serif;
      font-size: 22px; font-weight: 700; margin: 10px 0 8px;
    }
    .jadwal-waktu {
      font-size: 13px; color: var(--text-muted); display: flex;
      align-items: center; gap: 7px;
    }
    .jadwal-waktu svg { width: 14px; height: 14px; flex-shrink: 0; }
    .jadwal-lokasi {
      font-size: 13px; color: var(--text-muted);
      display: flex; align-items: center; gap: 7px; margin-top: 6px;
    }
    .jadwal-lokasi svg { width: 14px; height: 14px; flex-shrink: 0; }

    /* ── PENGUMUMAN ── */
    .pengumuman-section {
      background: var(--navy-mid);
      border-top: 1px solid rgba(201,168,76,.1);
      border-bottom: 1px solid rgba(201,168,76,.1);
    }

    .pengumuman-header {
      display: flex; justify-content: space-between;
      align-items: flex-end; flex-wrap: wrap; gap: 20px;
      margin-bottom: 48px;
    }

    .pengumuman-list { display: flex; flex-direction: column; gap: 16px; }

    .pengumuman-card {
      background: var(--navy-deep);
      border: 1px solid rgba(27,58,107,.8);
      border-radius: 12px; padding: 24px 28px;
      display: flex; gap: 24px; align-items: flex-start;
      transition: border-color .25s, box-shadow .25s;
    }
    .pengumuman-card:hover {
      border-color: rgba(201,168,76,.3);
      box-shadow: 0 8px 24px rgba(0,0,0,.25);
    }

    .p-date {
      display: flex; flex-direction: column; align-items: center;
      justify-content: center;
      min-width: 60px; height: 60px;
      background: rgba(201,168,76,.12);
      border: 1px solid rgba(201,168,76,.25);
      border-radius: 10px; flex-shrink: 0;
    }
    .p-day {
      font-family: 'Playfair Display', serif;
      font-size: 22px; font-weight: 700; color: var(--gold); line-height: 1;
    }
    .p-month {
      font-size: 10px; font-weight: 600; letter-spacing: 1px;
      text-transform: uppercase; color: var(--text-muted); margin-top: 2px;
    }

    .p-content { flex: 1; }
    .p-badge {
      display: inline-block;
      font-size: 10px; font-weight: 600; letter-spacing: 1.5px;
      text-transform: uppercase; color: var(--gold);
      background: rgba(201,168,76,.1);
      padding: 3px 10px; border-radius: 20px; margin-bottom: 8px;
    }
    .p-title {
      font-family: 'Playfair Display', serif;
      font-size: 18px; font-weight: 700; margin-bottom: 6px;
    }
    .p-desc { font-size: 13px; color: var(--text-muted); line-height: 1.6; }

    /* ── TENTANG ── */
    .tentang-wrapper {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px; align-items: center;
    }

    .tentang-img {
      position: relative;
    }
    .tentang-img-main {
      width: 100%; border-radius: 20px;
      aspect-ratio: 4/5; object-fit: cover;
      background: linear-gradient(135deg, var(--navy-mid) 0%, var(--navy-light) 100%);
      display: flex; align-items: center; justify-content: center;
      font-size: 120px;
    }
    .tentang-img-deco {
      position: absolute; bottom: -24px; right: -24px;
      width: 200px; height: 200px;
      background: var(--navy-light);
      border-radius: 16px;
      border: 2px solid rgba(201,168,76,.25);
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      gap: 4px;
    }
    .deco-num {
      font-family: 'Playfair Display', serif;
      font-size: 48px; font-weight: 900; color: var(--gold); line-height: 1;
    }
    .deco-text {
      font-size: 12px; font-weight: 500; color: var(--text-muted);
      text-align: center; padding: 0 16px;
    }

    .nilai-list { list-style: none; margin-top: 32px; display: flex; flex-direction: column; gap: 16px; }
    .nilai-item {
      display: flex; gap: 16px; align-items: flex-start;
    }
    .nilai-icon {
      width: 40px; height: 40px; flex-shrink: 0;
      background: rgba(201,168,76,.1);
      border: 1px solid rgba(201,168,76,.25);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px;
    }
    .nilai-text h4 {
      font-weight: 600; font-size: 15px; margin-bottom: 3px;
    }
    .nilai-text p {
      font-size: 13px; color: var(--text-muted); line-height: 1.5;
    }

    /* ── CTA BAND ── */
    .cta-band {
      margin: 0 6% 100px;
      background: linear-gradient(135deg, var(--navy-light) 0%, #0d1f45 100%);
      border: 1px solid rgba(201,168,76,.2);
      border-radius: 24px;
      padding: 72px 8%;
      display: flex; align-items: center;
      justify-content: space-between; gap: 40px; flex-wrap: wrap;
      position: relative; overflow: hidden;
    }
    .cta-band::before {
      content: '✝'; position: absolute;
      right: 6%; top: 50%; transform: translateY(-50%);
      font-size: 200px; opacity: .04; color: var(--gold);
      pointer-events: none;
    }
    .cta-band h2 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(24px, 3vw, 38px); font-weight: 700;
      max-width: 420px;
    }
    .cta-band p {
      color: var(--text-muted); font-size: 15px;
      max-width: 400px; line-height: 1.6; margin-top: 10px;
    }

    /* ── FOOTER ── */
    footer {
      background: #060e1c;
      border-top: 1px solid rgba(201,168,76,.1);
      padding: 60px 6% 36px;
    }
    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr;
      gap: 60px; margin-bottom: 48px;
    }
    .footer-brand p {
      color: var(--text-muted); font-size: 14px;
      line-height: 1.7; margin-top: 16px; max-width: 300px;
    }
    .footer-col h4 {
      font-size: 12px; font-weight: 600; letter-spacing: 2px;
      text-transform: uppercase; color: var(--gold); margin-bottom: 20px;
    }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
    .footer-col ul a {
      color: var(--text-muted); font-size: 14px; text-decoration: none;
      transition: color .2s;
    }
    .footer-col ul a:hover { color: var(--white); }
    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,.07);
      padding-top: 28px;
      display: flex; justify-content: space-between;
      align-items: center; flex-wrap: gap;
      font-size: 13px; color: var(--text-muted);
    }

    /* ── SCROLL ANIMATION ── */
    .reveal {
      opacity: 0; transform: translateY(30px);
      transition: opacity .7s ease, transform .7s ease;
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }

    /* ── RESPONSIVE ── */
    @media (max-width: 900px) {
      .tentang-wrapper { grid-template-columns: 1fr; }
      .tentang-img-deco { display: none; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
      .nav-links { display: none; }
    }
    @media (max-width: 600px) {
      .hero-stats { gap: 28px; }
      .footer-grid { grid-template-columns: 1fr; }
      .cta-band { text-align: center; }
      .cta-band .btn-primary { width: 100%; text-align: center; }
    }

    @media (prefers-reduced-motion: reduce) {
      .reveal { opacity: 1; transform: none; transition: none; }
    }
  </style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="#" class="nav-logo">
    <div class="cross"></div>
    GKS PAYETI CABANG PRAILIU
  </a>
  <ul class="nav-links">
    <li><a href="#jadwal">Jadwal Ibadah</a></li>
    <li><a href="#pengumuman">Pengumuman</a></li>
    <li><a href="#tentang">Tentang Kami</a></li>
    <li><a href="#kontak">Kontak</a></li>
  </ul>
  <a href="/login" class="nav-cta">Masuk ke Sistem</a>
</nav>

<!-- HERO -->
<section class="hero">
  <p class="hero-eyebrow">Selamat datang di rumah Tuhan</p>
  <h1>
    Gereja yang<br/>
    <em>Hidup</em> &amp;<br/>
    Melayani
  </h1>
  <p class="hero-sub">
    Bergabunglah bersama ribuan jemaat yang bertumbuh dalam iman,
    kasih, dan pelayanan di GKS PAYETI CABANG PRAILIU setiap minggunya.
  </p>
  <div class="hero-actions">
    <a href="#jadwal" class="btn-primary">Jadwal Ibadah</a>
    <a href="#tentang" class="btn-outline">Kenali Kami</a>
  </div>
  <div class="hero-stats">
    <div class="stat-item">
      <div class="stat-num">2.400+</div>
      <div class="stat-label">Jemaat Aktif</div>
    </div>
    <div class="stat-item">
      <div class="stat-num">18 Thn</div>
      <div class="stat-label">Berdiri Melayani</div>
    </div>
    <div class="stat-item">
      <div class="stat-num">6×</div>
      <div class="stat-label">Kebaktian/Minggu</div>
    </div>
  </div>
</section>

<!-- JADWAL -->
<section class="section" id="jadwal">
  <div class="section-label reveal">Jadwal Kebaktian</div>
  <h2 class="section-title reveal">Hadir dan Bertumbuh Bersama</h2>
  <p class="section-sub reveal">Temukan jadwal ibadah yang sesuai dengan ketersediaan Anda dan keluarga.</p>

  <div class="jadwal-grid">

    <div class="jadwal-card reveal">
      <div class="jadwal-hari">Sabtu</div>
      <div class="jadwal-nama">Ibadah Pemuda</div>
      <div class="jadwal-waktu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        17.00 – 19.00 WIB
      </div>
      <div class="jadwal-lokasi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Aula Utama
      </div>
    </div>

    <div class="jadwal-card reveal">
      <div class="jadwal-hari">Minggu</div>
      <div class="jadwal-nama">Kebaktian Pagi I</div>
      <div class="jadwal-waktu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        07.00 – 09.00 WIB
      </div>
      <div class="jadwal-lokasi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Gedung Gereja
      </div>
    </div>

    <div class="jadwal-card reveal">
      <div class="jadwal-hari">Minggu</div>
      <div class="jadwal-nama">Kebaktian Pagi II</div>
      <div class="jadwal-waktu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        09.30 – 11.30 WIB
      </div>
      <div class="jadwal-lokasi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Gedung Gereja
      </div>
    </div>

    <div class="jadwal-card reveal">
      <div class="jadwal-hari">Minggu</div>
      <div class="jadwal-nama">Kebaktian Sore</div>
      <div class="jadwal-waktu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        17.00 – 19.00 WIB
      </div>
      <div class="jadwal-lokasi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Gedung Gereja
      </div>
    </div>

    <div class="jadwal-card reveal">
      <div class="jadwal-hari">Rabu</div>
      <div class="jadwal-nama">Ibadah Doa &amp; Firman</div>
      <div class="jadwal-waktu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        18.30 – 20.30 WIB
      </div>
      <div class="jadwal-lokasi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Ruang Doa, Lantai 2
      </div>
    </div>

    <div class="jadwal-card reveal">
      <div class="jadwal-hari">Jumat</div>
      <div class="jadwal-nama">Persekutuan Keluarga</div>
      <div class="jadwal-waktu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        19.00 – 21.00 WIB
      </div>
      <div class="jadwal-lokasi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Rumah Jemaat (Zona)
      </div>
    </div>

  </div>
</section>

<!-- PENGUMUMAN -->
<section class="section pengumuman-section" id="pengumuman">
  <div class="pengumuman-header">
    <div>
      <div class="section-label reveal">Pengumuman</div>
      <h2 class="section-title reveal">Informasi Terkini</h2>
    </div>
    <a href="#" class="btn-outline reveal" style="white-space:nowrap;">Lihat Semua</a>
  </div>

  <div class="pengumuman-list">

    <div class="pengumuman-card reveal">
      <div class="p-date">
        <div class="p-day">15</div>
        <div class="p-month">Jun</div>
      </div>
      <div class="p-content">
        <span class="p-badge">Khusus</span>
        <div class="p-title">Kebaktian Kenaikan Isa Almasih &amp; Pendalaman Alkitab</div>
        <div class="p-desc">Hadir dalam perayaan iman bersama. Dimulai pukul 08.00 WIB di gedung utama. Mohon hadir tepat waktu.</div>
      </div>
    </div>

    <div class="pengumuman-card reveal">
      <div class="p-date">
        <div class="p-day">22</div>
        <div class="p-month">Jun</div>
      </div>
     

    <div class="pengumuman-card reveal">
      <div class="p-date">
        <div class="p-day">29</div>
        <div class="p-month">Jun</div>
      </div>
      <div class="p-content">
        <span class="p-badge">Pelayanan</span>
        <div class="p-title">Bakti Sosial dan Pembagian Sembako di Lingkungan Sekitar</div>
        <div class="p-desc">Pendaftaran relawan dibuka melalui sekretariat. Kegiatan berlangsung mulai pukul 07.30 WIB.</div>
      </div>
    </div>

  </div>
</section>

<!-- TENTANG -->
<section class="section" id="tentang">
  <div class="tentang-wrapper">
    <div class="tentang-img reveal">
      <div class="tentang-img-main">⛪</div>
      <div class="tentang-img-deco">
        <div class="deco-num">18</div>
        <div class="deco-text">Tahun Berdiri &amp; Melayani</div>
      </div>
    </div>
    <div>
      <div class="section-label reveal">Tentang Kami</div>
      <h2 class="section-title reveal">Gereja yang Berakar dalam Kasih, Tumbuh dalam Iman</h2>
      <p class="section-sub reveal">
        GKS PAYETI CABANG PRAILIU hadir sebagai rumah bagi setiap jiwa yang mencari kebenaran dan komunitas yang hangat di kota ini.
      </p>
      <ul class="nilai-list">
        <li class="nilai-item reveal">
          <div class="nilai-icon">🙏</div>
          <div class="nilai-text">
            <h4>Berakar dalam Doa</h4>
            <p>Setiap pelayanan dibangun di atas fondasi doa yang setia dan firman yang hidup.</p>
          </div>
        </li>
        <li class="nilai-item reveal">
          <div class="nilai-icon">🤝</div>
          <div class="nilai-text">
            <h4>Komunitas yang Inklusif</h4>
            <p>Kami percaya gereja adalah keluarga — terbuka bagi semua, tanpa terkecuali.</p>
          </div>
        </li>
        <li class="nilai-item reveal">
          <div class="nilai-icon">🌱</div>
          <div class="nilai-text">
            <h4>Pelayanan Nyata</h4>
            <p>Iman tanpa tindakan adalah mati. Kami aktif melayani masyarakat sekitar.</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- CTA BAND -->
<div class="cta-band reveal" id="kontak">
  <div>
    <h2>Bergabunglah Bersama Kami Minggu Ini</h2>
    <p>Anda selalu disambut di sini. Datang seperti apa adanya, pulang dengan penuh harapan.</p>
  </div>
  <a href="#jadwal" class="btn-primary">Lihat Jadwal Ibadah</a>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <a href="#" class="nav-logo" style="display:inline-flex;">
        <div class="cross"></div>
        GKS PAYETI CABANG PRAILIU
      </a>
      <p>Jl. Prailiu<br/>Telp: (021) 555-0123 · info@GKSprailiu</p>
    </div>
    <div class="footer-col">
      <h4>Navigasi</h4>
      <ul>
        <li><a href="#jadwal">Jadwal Ibadah</a></li>
        <li><a href="#pengumuman">Pengumuman</a></li>
        <li><a href="#tentang">Tentang Kami</a></li>
        <li><a href="/login">Login Admin</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Ibadah</h4>
      <ul>
        <li><a href="#">Kebaktian Umum</a></li>
        <li><a href="#">Ibadah Pemuda</a></li>
        <li><a href="#">Persekutuan Doa</a></li>
        <li><a href="#">Sekolah Minggu</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2025 GKS Payeti Cabang Prailiu. Semua hak dilindungi.</span>
    <span style="color:rgba(143,163,192,.4);">Dibuat dengan ❤ untuk pelayanan</span>
  </div>
</footer>

<script>
  // Scroll reveal
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => entry.target.classList.add('visible'), i * 60);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => observer.observe(el));

  // Nav shrink on scroll
  window.addEventListener('scroll', () => {
    document.querySelector('nav').style.padding =
      window.scrollY > 40 ? '14px 6%' : '22px 6%';
  });
</script>
</body>
</html>