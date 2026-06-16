@extends('layouts.app')

@section('content')

<div class="jdw-wrapper">

    {{-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ --}}
    <div class="jdw-header">

        {{-- Dekorasi salib background --}}
        <svg class="jdw-cross-bg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="85" y="20" width="30" height="160" rx="4" fill="white" opacity="0.06"/>
            <rect x="30" y="70" width="140" height="30" rx="4" fill="white" opacity="0.06"/>
        </svg>

        <div class="jdw-header-top">
            <div class="jdw-header-left">
                <div class="jdw-header-icon">
                    {{-- Icon gereja --}}
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 22V10L12 3L21 10V22H15V16H9V22H3Z" stroke="#C9A84C" stroke-width="1.8" stroke-linejoin="round"/>
                        <line x1="12" y1="3" x2="12" y2="1" stroke="#C9A84C" stroke-width="1.8" stroke-linecap="round"/>
                        <line x1="10.5" y1="2" x2="13.5" y2="2" stroke="#C9A84C" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </div>
                <div>
                    <p class="jdw-eyebrow">Sistem Informasi Jemaat</p>
                    <h1 class="jdw-title">Jadwal Ibadah Gereja</h1>
                    <p class="jdw-sub">Rumah Tangga &nbsp;·&nbsp; Pemuda &nbsp;·&nbsp; Mingguan</p>
                </div>
            </div>

            <a href="{{ route('jadwal.create') }}" class="jdw-btn-add">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="16"/>
                    <line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
                Tambah Jadwal
            </a>
        </div>

        {{-- Filter --}}
        <form class="jdw-filter" method="GET">
            <div class="jdw-filter-search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" class="jdw-filter-icon">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari kegiatan atau tempat…">
            </div>

            <div class="jdw-filter-select-wrap">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" class="jdw-select-icon">
                    <path d="M4 6h16M7 12h10M10 18h4"/>
                </svg>
                <select name="kategori">
                    <option value="">Semua Ibadah</option>
                    <option value="rumah_tangga" {{ request('kategori')=='rumah_tangga'?'selected':'' }}>Rumah Tangga</option>
                    <option value="pemuda"       {{ request('kategori')=='pemuda'      ?'selected':'' }}>Pemuda</option>
                    <option value="mingguan"     {{ request('kategori')=='mingguan'    ?'selected':'' }}>Mingguan</option>
                </select>
            </div>

            <button type="submit" class="jdw-btn-search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                Cari
            </button>
        </form>

    </div>

    {{-- ═══════════════════════════════════════
         SECTIONS PER KATEGORI
    ═══════════════════════════════════════ --}}
    @php
        $kategoriList = [
            'rumah_tangga' => [
                'label'   => 'Rumah Tangga',
                'color'   => '#1E3A6E',
                'accent'  => '#4A7FCB',
                'bg'      => '#EEF3FC',
                'icon_color' => '#1E3A6E',
            ],
            'pemuda' => [
                'label'   => 'Pemuda',
                'color'   => '#1A6B3C',
                'accent'  => '#27AE60',
                'bg'      => '#EDFAF2',
                'icon_color' => '#1A6B3C',
            ],
            'mingguan' => [
                'label'   => 'Mingguan',
                'color'   => '#7A5200',
                'accent'  => '#C9A84C',
                'bg'      => '#FBF5E6',
                'icon_color' => '#7A5200',
            ],
        ];

        $kategoriIcons = [
            'rumah_tangga' => '<path d="M3 22V10L12 3L21 10V22H15V16H9V22H3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
            'pemuda'       => '<circle cx="9" cy="7" r="3" stroke="currentColor" stroke-width="1.8"/><circle cx="15" cy="7" r="3" stroke="currentColor" stroke-width="1.8"/><path d="M3 21v-1a6 6 0 0 1 6-6h6a6 6 0 0 1 6 6v1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
            'mingguan'     => '<path d="M12 2C12 2 8 5 8 10V14H16V10C16 5 12 2 12 2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M6 14H18L19 17H5L6 14Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M10 17C10 18.1046 10.8954 19 12 19C13.1046 19 14 18.1046 14 17" stroke="currentColor" stroke-width="1.8"/><line x1="12" y1="2" x2="12" y2="0.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><line x1="10.5" y1="1.2" x2="13.5" y2="1.2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        ];
    @endphp

    @foreach($kategoriList as $key => $info)
        @php $data = $jadwal->where('kategori', $key); @endphp

        <div class="jdw-section">

            {{-- Section header --}}
            <div class="jdw-section-head">
                <div class="jdw-section-icon" style="background:{{ $info['bg'] }}; color:{{ $info['icon_color'] }};">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        {!! $kategoriIcons[$key] !!}
                    </svg>
                </div>
                <h2 class="jdw-section-title" style="color:{{ $info['color'] }}">{{ $info['label'] }}</h2>
                <div class="jdw-section-line"></div>
                <span class="jdw-section-badge" style="background:{{ $info['bg'] }}; color:{{ $info['color'] }}; border-color:{{ $info['accent'] }}20;">
                    {{ $data->count() }} jadwal
                </span>
            </div>

            {{-- Grid kartu --}}
            <div class="jdw-cards">

                @forelse($data as $j)
                    <div class="jdw-card" style="--cat-accent:{{ $info['accent'] }}; --cat-bg:{{ $info['bg'] }}; --cat-color:{{ $info['color'] }};">

                        {{-- Top stripe --}}
                        <div class="jdw-card-stripe"></div>

                        <div class="jdw-card-body">

                            <span class="jdw-card-badge">{{ $info['label'] }}</span>

                            <h3 class="jdw-card-title">{{ $j->kegiatan }}</h3>

                            <div class="jdw-card-meta">

                                <div class="jdw-meta-row">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($j->tanggal)->locale('id')->isoFormat('D MMMM Y') }}
                                </div>

                                <div class="jdw-meta-row">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12 6 12 12 16 14"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($j->jam)->format('H:i') }} WITA
                                </div>

                                <div class="jdw-meta-row">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                        <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    {{ $j->tempat }}
                                </div>

                            </div>

                        </div>

                        <div class="jdw-card-footer">

                            <a href="{{ route('jadwal.edit', $j->id) }}" class="jdw-btn-edit">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('jadwal.destroy', $j->id) }}"
                                  onsubmit="return confirm('Hapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="jdw-btn-delete">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                        <path d="M10 11v6M14 11v6"/>
                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                    </svg>
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>

                @empty
                    <div class="jdw-empty">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" opacity="0.3">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                            <line x1="2" y1="2" x2="22" y2="22"/>
                        </svg>
                        <p>Belum ada jadwal {{ str_replace('_', ' ', $key) }}</p>
                    </div>
                @endforelse

            </div>

        </div>

    @endforeach

</div>

{{-- ═══════════════════════════════════════
     STYLES
═══════════════════════════════════════ --}}
<style>

/* ── Tokens ── */
:root {
    --navy:       #0F1F3D;
    --navy-mid:   #162847;
    --navy-light: #1E3A6E;
    --gold:       #C9A84C;
    --gold-light: #F0D98A;
    --bg:         #F0F3F9;
    --surface:    #FFFFFF;
    --border:     #DDE3EF;
    --text:       #1A2640;
    --muted:      #6B7A99;
    --danger:     #C0392B;
    --radius-lg:  16px;
    --radius-md:  10px;
    --radius-sm:  6px;
    --shadow:     0 4px 24px rgba(15,31,61,.09);
    --shadow-md:  0 8px 32px rgba(15,31,61,.14);
    --shadow-hover: 0 16px 40px rgba(15,31,61,.16);
}

/* ── Wrapper ── */
.jdw-wrapper {
    padding: 1.75rem 1.5rem;
    background: var(--bg);
    min-height: 100vh;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

/* ── Header ── */
.jdw-header {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
    border-radius: var(--radius-lg);
    padding: 2rem 2.25rem 1.6rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-md);
}

.jdw-cross-bg {
    position: absolute;
    right: -20px;
    top: -20px;
    width: 220px;
    height: 220px;
    pointer-events: none;
}

.jdw-header-top {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.jdw-header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.jdw-header-icon {
    width: 52px;
    height: 52px;
    background: rgba(201,168,76,.15);
    border: 1px solid rgba(201,168,76,.3);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.jdw-eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--gold-light);
    opacity: .8;
    margin: 0 0 .2rem;
}

.jdw-title {
    font-size: 1.55rem;
    font-weight: 800;
    color: #fff;
    margin: 0 0 .2rem;
    line-height: 1.2;
    letter-spacing: -.02em;
}

.jdw-sub {
    font-size: .83rem;
    color: rgba(255,255,255,.5);
    margin: 0;
}

.jdw-btn-add {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    background: var(--gold);
    color: var(--navy);
    font-weight: 700;
    font-size: .875rem;
    padding: .65rem 1.4rem;
    border-radius: var(--radius-md);
    text-decoration: none;
    transition: background .18s, transform .15s, box-shadow .18s;
    box-shadow: 0 4px 14px rgba(201,168,76,.4);
    white-space: nowrap;
}
.jdw-btn-add:hover {
    background: var(--gold-light);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(201,168,76,.5);
    color: var(--navy);
    text-decoration: none;
}

/* ── Filter ── */
.jdw-filter {
    position: relative;
    display: flex;
    gap: .75rem;
    flex-wrap: wrap;
}

.jdw-filter-search {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.jdw-filter-icon {
    position: absolute;
    left: .85rem;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,.45);
    pointer-events: none;
}

.jdw-filter-search input {
    width: 100%;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: var(--radius-sm);
    color: #fff;
    padding: .6rem .85rem .6rem 2.4rem;
    font-size: .875rem;
    outline: none;
    transition: border .18s, background .18s;
}
.jdw-filter-search input::placeholder { color: rgba(255,255,255,.4); }
.jdw-filter-search input:focus {
    background: rgba(255,255,255,.15);
    border-color: var(--gold);
}

.jdw-filter-select-wrap {
    position: relative;
    flex: 0 0 auto;
    min-width: 180px;
}

.jdw-select-icon {
    position: absolute;
    left: .85rem;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,.45);
    pointer-events: none;
    z-index: 1;
}

.jdw-filter-select-wrap select {
    width: 100%;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: var(--radius-sm);
    color: #fff;
    padding: .6rem .85rem .6rem 2.4rem;
    font-size: .875rem;
    outline: none;
    appearance: none;
    cursor: pointer;
    transition: border .18s, background .18s;
}
.jdw-filter-select-wrap select option { background: var(--navy); color: #fff; }
.jdw-filter-select-wrap select:focus {
    background: rgba(255,255,255,.15);
    border-color: var(--gold);
}

.jdw-btn-search {
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.25);
    color: #fff;
    font-size: .875rem;
    font-weight: 600;
    padding: .6rem 1.2rem;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: background .18s, border .18s;
    white-space: nowrap;
}
.jdw-btn-search:hover {
    background: var(--gold);
    border-color: var(--gold);
    color: var(--navy);
}

/* ── Section ── */
.jdw-section { margin-bottom: 2.25rem; }

.jdw-section-head {
    display: flex;
    align-items: center;
    gap: .75rem;
    margin-bottom: 1.1rem;
}

.jdw-section-icon {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.jdw-section-title {
    font-size: 1rem;
    font-weight: 800;
    margin: 0;
    letter-spacing: -.01em;
    white-space: nowrap;
}

.jdw-section-line {
    flex: 1;
    height: 1px;
    background: var(--border);
}

.jdw-section-badge {
    font-size: .7rem;
    font-weight: 700;
    padding: .2rem .65rem;
    border-radius: 99px;
    border: 1px solid transparent;
    white-space: nowrap;
    letter-spacing: .04em;
    text-transform: uppercase;
}

/* ── Cards Grid ── */
.jdw-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.1rem;
}

/* ── Kartu ── */
.jdw-card {
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transition: transform .2s, box-shadow .2s;
}
.jdw-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.jdw-card-stripe {
    height: 4px;
    background: var(--cat-accent);
    flex-shrink: 0;
}

.jdw-card-body {
    flex: 1;
    padding: 1.15rem 1.2rem .9rem;
}

.jdw-card-badge {
    display: inline-block;
    background: var(--cat-bg);
    color: var(--cat-color);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .05em;
    text-transform: uppercase;
    padding: .18rem .6rem;
    border-radius: 99px;
    border: 1px solid color-mix(in srgb, var(--cat-accent) 25%, transparent);
    margin-bottom: .65rem;
}

.jdw-card-title {
    font-size: .95rem;
    font-weight: 800;
    color: var(--navy);
    margin: 0 0 .8rem;
    line-height: 1.35;
    letter-spacing: -.01em;
}

.jdw-card-meta {
    display: flex;
    flex-direction: column;
    gap: .38rem;
}

.jdw-meta-row {
    display: flex;
    align-items: center;
    gap: .45rem;
    font-size: .8rem;
    color: var(--muted);
    line-height: 1;
}
.jdw-meta-row svg { flex-shrink: 0; color: var(--muted); }

/* ── Card Footer ── */
.jdw-card-footer {
    display: flex;
    gap: .5rem;
    padding: .8rem 1.2rem;
    border-top: 1px solid var(--border);
    background: #FAFBFE;
}

.jdw-btn-edit,
.jdw-btn-delete {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .4rem;
    font-size: .8rem;
    font-weight: 700;
    padding: .5rem .75rem;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all .15s;
    text-decoration: none;
    border: 1.5px solid transparent;
}

.jdw-btn-edit {
    background: #EEF3FC;
    color: var(--navy-light);
    border-color: #C8D8F4;
}
.jdw-btn-edit:hover {
    background: var(--navy);
    color: #fff;
    border-color: var(--navy);
    text-decoration: none;
}

.jdw-btn-delete {
    background: #FDF2F2;
    color: var(--danger);
    border-color: #F5C6C6;
}
.jdw-btn-delete:hover {
    background: var(--danger);
    color: #fff;
    border-color: var(--danger);
}

/* ── Empty ── */
.jdw-empty {
    grid-column: 1 / -1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: .5rem;
    padding: 2.5rem 1.5rem;
    background: var(--surface);
    border-radius: var(--radius-lg);
    border: 1.5px dashed var(--border);
    color: var(--muted);
    text-align: center;
}
.jdw-empty p { margin: 0; font-size: .83rem; }

</style>

@endsection