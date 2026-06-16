@extends('layouts.app')

@section('content')

<div class="jmt-wrapper">

    {{-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ --}}
    <div class="jmt-header">

        <svg class="jmt-cross-bg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="85" y="20" width="30" height="160" rx="4" fill="white" opacity="0.06"/>
            <rect x="30" y="70" width="140" height="30" rx="4" fill="white" opacity="0.06"/>
        </svg>

        <div class="jmt-header-inner">
            <div class="jmt-header-left">

                <div class="jmt-header-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="#C9A84C" stroke-width="1.8" stroke-linecap="round"/>
                        <circle cx="9" cy="7" r="4" stroke="#C9A84C" stroke-width="1.8"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" stroke="#C9A84C" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" stroke="#C9A84C" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </div>

                <div>
                    <p class="jmt-eyebrow">Sistem Informasi Jemaat</p>
                    <h1 class="jmt-title">Database Jemaat Gereja</h1>
                    <p class="jmt-sub">Kelola seluruh data anggota jemaat gereja</p>
                </div>

            </div>

            <a href="{{ route('jemaat.create') }}" class="jmt-btn-add">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <line x1="19" y1="8" x2="19" y2="14"/>
                    <line x1="22" y1="11" x2="16" y2="11"/>
                </svg>
                Tambah Jemaat
            </a>
        </div>

        {{-- Filter Bar --}}
        <form class="jmt-filter" method="GET">
            <div class="jmt-filter-search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" class="jmt-filter-icon">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama, alamat, atau telepon…">
            </div>

            <div class="jmt-filter-select-wrap">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" class="jmt-select-icon">
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                </svg>
                <select name="jenis_kelamin">
                    <option value="">Semua Gender</option>
                    <option value="Laki-laki" {{ request('jenis_kelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                    <option value="Perempuan" {{ request('jenis_kelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
                </select>
            </div>

            <button type="submit" class="jmt-btn-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                </svg>
                Filter
            </button>

            @if(request('search') || request('jenis_kelamin'))
                <a href="{{ route('jemaat.index') }}" class="jmt-btn-reset">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                    Reset
                </a>
            @endif
        </form>

    </div>

    {{-- ═══════════════════════════════════════
         STATS BAR
    ═══════════════════════════════════════ --}}
    @php
        $totalAll   = $jemaat->total();
        $lakiLaki   = \App\Models\Jemaat::where('jenis_kelamin','Laki-laki')->count();
        $perempuan  = \App\Models\Jemaat::where('jenis_kelamin','Perempuan')->count();
        $halaman    = $jemaat->lastPage();
    @endphp

    <div class="jmt-stats">

        <div class="jmt-stat">
            <div class="jmt-stat-icon" style="background:#EEF3FC; color:#1E3A6E;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <p class="jmt-stat-num">{{ $totalAll }}</p>
                <p class="jmt-stat-label">Total Jemaat</p>
            </div>
        </div>

        <div class="jmt-stat-divider"></div>

        <div class="jmt-stat">
            <div class="jmt-stat-icon" style="background:#E8F5FF; color:#0369A1;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M6 20v-2a6 6 0 0 1 6-6h0a6 6 0 0 1 6 6v2"/>
                </svg>
            </div>
            <div>
                <p class="jmt-stat-num">{{ $lakiLaki }}</p>
                <p class="jmt-stat-label">Laki-laki</p>
            </div>
        </div>

        <div class="jmt-stat-divider"></div>

        <div class="jmt-stat">
            <div class="jmt-stat-icon" style="background:#FBF5E6; color:#7A5200;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M6 20v-2a6 6 0 0 1 6-6h0a6 6 0 0 1 6 6v2"/>
                </svg>
            </div>
            <div>
                <p class="jmt-stat-num">{{ $perempuan }}</p>
                <p class="jmt-stat-label">Perempuan</p>
            </div>
        </div>

        <div class="jmt-stat-divider"></div>

        <div class="jmt-stat">
            <div class="jmt-stat-icon" style="background:#EDFAF2; color:#1A6B3C;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <line x1="3" y1="9" x2="21" y2="9"/>
                    <line x1="9" y1="21" x2="9" y2="9"/>
                </svg>
            </div>
            <div>
                <p class="jmt-stat-num">{{ $halaman }}</p>
                <p class="jmt-stat-label">Halaman Data</p>
            </div>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         TABLE CARD
    ═══════════════════════════════════════ --}}
    <div class="jmt-card">

        <div class="jmt-card-head">
            <div class="jmt-card-head-icon">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round">
                    <line x1="8" y1="6" x2="21" y2="6"/>
                    <line x1="8" y1="12" x2="21" y2="12"/>
                    <line x1="8" y1="18" x2="21" y2="18"/>
                    <line x1="3" y1="6" x2="3.01" y2="6"/>
                    <line x1="3" y1="12" x2="3.01" y2="12"/>
                    <line x1="3" y1="18" x2="3.01" y2="18"/>
                </svg>
            </div>
            <h2 class="jmt-card-title">Daftar Jemaat</h2>

            @if(request('search') || request('jenis_kelamin'))
                <span class="jmt-filter-active">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                    </svg>
                    Filter aktif
                </span>
            @endif

            <span class="jmt-total-badge">{{ $totalAll }} orang</span>
        </div>

        <div class="jmt-table-wrap">
            <table class="jmt-table">

                <thead>
                    <tr>
                        <th class="jmt-th-no">No</th>
                        <th>Nama Jemaat</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th>Telepon</th>
                        <th class="jmt-th-aksi">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($jemaat as $item)
                    <tr class="jmt-tr">

                        <td class="jmt-td-no">
                            {{ $loop->iteration + ($jemaat->currentPage()-1)*$jemaat->perPage() }}
                        </td>

                        <td>
                            <div class="jmt-nama-cell">
                                <div class="jmt-avatar {{ $item->jenis_kelamin == 'Laki-laki' ? 'jmt-avatar-laki' : 'jmt-avatar-perempuan' }}">
                                    {{ strtoupper(substr($item->nama, 0, 1)) }}
                                </div>
                                <span class="jmt-nama">{{ $item->nama }}</span>
                            </div>
                        </td>

                        <td>
                            <div class="jmt-meta-row">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span class="jmt-alamat-text">{{ $item->alamat ?? '—' }}</span>
                            </div>
                        </td>

                        <td>
                            @if($item->jenis_kelamin == 'Laki-laki')
                                <span class="jmt-badge jmt-badge-laki">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <circle cx="10" cy="14" r="5"/>
                                        <line x1="19" y1="5" x2="14.14" y2="9.86"/>
                                        <polyline points="15 5 19 5 19 9"/>
                                    </svg>
                                    Laki-laki
                                </span>
                            @else
                                <span class="jmt-badge jmt-badge-perempuan">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <circle cx="12" cy="8" r="5"/>
                                        <line x1="12" y1="13" x2="12" y2="21"/>
                                        <line x1="9" y1="18" x2="15" y2="18"/>
                                    </svg>
                                    Perempuan
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="jmt-meta-row">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.35 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16z"/>
                                </svg>
                                {{ $item->telepon ?? '—' }}
                            </div>
                        </td>

                        <td>
                            <div class="jmt-actions">

                                <a href="{{ route('jemaat.edit', $item->id) }}" class="jmt-action-btn jmt-action-edit" title="Edit">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('jemaat.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Hapus data jemaat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="jmt-action-btn jmt-action-delete" title="Hapus">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"/>
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                            <path d="M10 11v6M14 11v6"/>
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="jmt-empty">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" opacity="0.3">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                                <p>
                                    @if(request('search') || request('jenis_kelamin'))
                                        Tidak ada data yang cocok dengan filter
                                    @else
                                        Belum ada data jemaat tersedia
                                    @endif
                                </p>
                                @if(request('search') || request('jenis_kelamin'))
                                    <a href="{{ route('jemaat.index') }}" class="jmt-empty-cta">Hapus Filter</a>
                                @else
                                    <a href="{{ route('jemaat.create') }}" class="jmt-empty-cta">Tambah Jemaat Pertama</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        @if($jemaat->hasPages())
        <div class="jmt-pagination">
            <p class="jmt-page-info">
                Menampilkan {{ $jemaat->firstItem() }}–{{ $jemaat->lastItem() }}
                dari {{ $jemaat->total() }} data
            </p>
            <div class="jmt-page-links">
                {{ $jemaat->withQueryString()->links() }}
            </div>
        </div>
        @endif

    </div>

</div>

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
}

/* ── Wrapper ── */
.jmt-wrapper {
    padding: 1.75rem 1.5rem;
    background: var(--bg);
    min-height: 100vh;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

/* ── Header ── */
.jmt-header {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
    border-radius: var(--radius-lg);
    padding: 2rem 2.25rem 1.6rem;
    margin-bottom: 1.25rem;
    box-shadow: var(--shadow-md);
}

.jmt-cross-bg {
    position: absolute;
    right: -20px;
    top: -20px;
    width: 220px;
    height: 220px;
    pointer-events: none;
}

.jmt-header-inner {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.jmt-header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.jmt-header-icon {
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

.jmt-eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--gold-light);
    opacity: .8;
    margin: 0 0 .2rem;
}

.jmt-title {
    font-size: 1.55rem;
    font-weight: 800;
    color: #fff;
    margin: 0 0 .2rem;
    line-height: 1.2;
    letter-spacing: -.02em;
}

.jmt-sub {
    font-size: .83rem;
    color: rgba(255,255,255,.5);
    margin: 0;
}

.jmt-btn-add {
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
.jmt-btn-add:hover {
    background: var(--gold-light);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(201,168,76,.5);
    color: var(--navy);
    text-decoration: none;
}

/* ── Filter ── */
.jmt-filter {
    position: relative;
    display: flex;
    gap: .75rem;
    flex-wrap: wrap;
    align-items: center;
}

.jmt-filter-search {
    position: relative;
    flex: 1;
    min-width: 220px;
}

.jmt-filter-icon {
    position: absolute;
    left: .85rem;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,.45);
    pointer-events: none;
}

.jmt-filter-search input {
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
.jmt-filter-search input::placeholder { color: rgba(255,255,255,.4); }
.jmt-filter-search input:focus {
    background: rgba(255,255,255,.15);
    border-color: var(--gold);
}

.jmt-filter-select-wrap {
    position: relative;
    flex: 0 0 auto;
    min-width: 160px;
}

.jmt-select-icon {
    position: absolute;
    left: .85rem;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,.45);
    pointer-events: none;
    z-index: 1;
}

.jmt-filter-select-wrap select {
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
.jmt-filter-select-wrap select option { background: var(--navy); color: #fff; }
.jmt-filter-select-wrap select:focus {
    background: rgba(255,255,255,.15);
    border-color: var(--gold);
}

.jmt-btn-filter {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
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
.jmt-btn-filter:hover {
    background: var(--gold);
    border-color: var(--gold);
    color: var(--navy);
}

.jmt-btn-reset {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: rgba(192,57,43,.25);
    border: 1px solid rgba(192,57,43,.4);
    color: #FFCDD2;
    font-size: .83rem;
    font-weight: 600;
    padding: .6rem 1rem;
    border-radius: var(--radius-sm);
    text-decoration: none;
    transition: background .18s;
    white-space: nowrap;
}
.jmt-btn-reset:hover {
    background: rgba(192,57,43,.45);
    color: #fff;
    text-decoration: none;
}

/* ── Stats ── */
.jmt-stats {
    display: flex;
    align-items: center;
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    margin-bottom: 1.25rem;
    overflow: hidden;
    flex-wrap: wrap;
}

.jmt-stat {
    flex: 1;
    display: flex;
    align-items: center;
    gap: .85rem;
    padding: 1.1rem 1.4rem;
    min-width: 130px;
}

.jmt-stat-divider {
    width: 1px;
    height: 40px;
    background: var(--border);
    flex-shrink: 0;
}

.jmt-stat-icon {
    width: 38px;
    height: 38px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.jmt-stat-num {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--navy);
    margin: 0;
    line-height: 1;
    letter-spacing: -.03em;
}

.jmt-stat-label {
    font-size: .72rem;
    color: var(--muted);
    margin: .15rem 0 0;
    font-weight: 500;
}

/* ── Table Card ── */
.jmt-card {
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
}

.jmt-card-head {
    display: flex;
    align-items: center;
    gap: .65rem;
    padding: 1.1rem 1.5rem;
    border-bottom: 1px solid var(--border);
    background: #FAFBFE;
}

.jmt-card-head-icon {
    width: 30px;
    height: 30px;
    background: #EEF3FC;
    color: var(--navy-light);
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.jmt-card-title {
    font-size: .95rem;
    font-weight: 700;
    color: var(--text);
    margin: 0;
    flex: 1;
}

.jmt-filter-active {
    display: inline-flex;
    align-items: center;
    gap: .3rem;
    background: #FBF5E6;
    color: #7A5200;
    border: 1px solid #E8D29A;
    font-size: .68rem;
    font-weight: 700;
    padding: .18rem .55rem;
    border-radius: 99px;
    letter-spacing: .04em;
    text-transform: uppercase;
}

.jmt-total-badge {
    background: var(--navy);
    color: #fff;
    font-size: .7rem;
    font-weight: 700;
    padding: .15rem .55rem;
    border-radius: 99px;
}

/* ── Table ── */
.jmt-table-wrap { overflow-x: auto; }

.jmt-table {
    width: 100%;
    border-collapse: collapse;
}

.jmt-table thead tr {
    background: #F4F6FB;
    border-bottom: 2px solid var(--border);
}

.jmt-table th {
    padding: .8rem 1rem;
    font-size: .72rem;
    font-weight: 700;
    color: var(--muted);
    letter-spacing: .06em;
    text-transform: uppercase;
    white-space: nowrap;
    text-align: left;
}

.jmt-th-no   { width: 52px; }
.jmt-th-aksi { width: 90px; text-align: center; }

.jmt-tr {
    border-bottom: 1px solid var(--border);
    transition: background .13s;
}
.jmt-tr:last-child { border-bottom: none; }
.jmt-tr:hover { background: #F7F9FE; }

.jmt-table td {
    padding: .85rem 1rem;
    font-size: .84rem;
    color: var(--text);
    vertical-align: middle;
}

.jmt-td-no {
    font-size: .78rem;
    font-weight: 700;
    color: var(--muted);
    text-align: center;
}

/* Avatar */
.jmt-nama-cell {
    display: flex;
    align-items: center;
    gap: .7rem;
}

.jmt-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .78rem;
    font-weight: 800;
    flex-shrink: 0;
}

.jmt-avatar-laki {
    background: linear-gradient(135deg, #1565C0, #1E88E5);
    color: #BBDEFB;
}

.jmt-avatar-perempuan {
    background: linear-gradient(135deg, #7A5200, #C9A84C);
    color: #FFF8E1;
}

.jmt-nama {
    font-weight: 700;
    color: var(--navy);
}

/* Meta rows */
.jmt-meta-row {
    display: flex;
    align-items: center;
    gap: .4rem;
    color: var(--muted);
    font-size: .82rem;
}
.jmt-meta-row svg { flex-shrink: 0; }

.jmt-alamat-text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 160px;
    display: inline-block;
}

/* Badges */
.jmt-badge {
    display: inline-flex;
    align-items: center;
    gap: .3rem;
    font-size: .7rem;
    font-weight: 700;
    padding: .22rem .65rem;
    border-radius: 99px;
    letter-spacing: .03em;
    white-space: nowrap;
    border: 1px solid transparent;
}

.jmt-badge-laki {
    background: #E8F5FF;
    color: #0369A1;
    border-color: #BAE0F9;
}

.jmt-badge-perempuan {
    background: #FBF5E6;
    color: #7A5200;
    border-color: #E8D29A;
}

/* Aksi */
.jmt-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .4rem;
}

.jmt-action-btn {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-sm);
    border: 1.5px solid transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .15s;
    background: none;
    padding: 0;
    text-decoration: none;
    flex-shrink: 0;
}

.jmt-action-edit {
    background: #EEF3FC;
    border-color: #C8D8F4;
    color: var(--navy-light);
}
.jmt-action-edit:hover {
    background: var(--navy);
    border-color: var(--navy);
    color: #fff;
    transform: scale(1.1);
    text-decoration: none;
}

.jmt-action-delete {
    background: #FDF2F2;
    border-color: #F5C6C6;
    color: var(--danger);
}
.jmt-action-delete:hover {
    background: var(--danger);
    border-color: var(--danger);
    color: #fff;
    transform: scale(1.1);
}

/* ── Pagination ── */
.jmt-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: .75rem;
    padding: .9rem 1.5rem;
    border-top: 1px solid var(--border);
    background: #FAFBFE;
}

.jmt-page-info {
    font-size: .78rem;
    color: var(--muted);
    margin: 0;
}

.jmt-page-links .pagination {
    margin: 0;
    gap: .25rem;
    display: flex;
}

.jmt-page-links .page-link {
    border-radius: var(--radius-sm) !important;
    border: 1.5px solid var(--border);
    color: var(--navy);
    font-size: .8rem;
    font-weight: 600;
    padding: .35rem .7rem;
    transition: all .15s;
}

.jmt-page-links .page-link:hover {
    background: var(--navy);
    border-color: var(--navy);
    color: #fff;
}

.jmt-page-links .page-item.active .page-link {
    background: var(--navy);
    border-color: var(--navy);
    color: #fff;
}

.jmt-page-links .page-item.disabled .page-link {
    opacity: .4;
    pointer-events: none;
}

/* ── Empty ── */
.jmt-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: .6rem;
    padding: 3.5rem 1.5rem;
    color: var(--muted);
    text-align: center;
}
.jmt-empty p { margin: 0; font-size: .85rem; }

.jmt-empty-cta {
    margin-top: .4rem;
    display: inline-flex;
    align-items: center;
    gap: .35rem;
    background: var(--navy);
    color: #fff;
    font-size: .8rem;
    font-weight: 600;
    padding: .5rem 1.1rem;
    border-radius: var(--radius-sm);
    text-decoration: none;
    transition: background .15s;
}
.jmt-empty-cta:hover { background: var(--navy-light); color: #fff; }

/* ── Responsive ── */
@media (max-width: 640px) {
    .jmt-stat-divider { display: none; }
    .jmt-stat { border-bottom: 1px solid var(--border); }
    .jmt-stats { flex-direction: column; }
    .jmt-wrapper { padding: 1rem; }
}

</style>

@endsection