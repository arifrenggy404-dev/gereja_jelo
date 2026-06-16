@extends('layouts.app')

@section('content')

<div class="plv-wrapper">

    {{-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ --}}
    <div class="plv-header">

        <svg class="plv-cross-bg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="85" y="20" width="30" height="160" rx="4" fill="white" opacity="0.06"/>
            <rect x="30" y="70" width="140" height="30" rx="4" fill="white" opacity="0.06"/>
        </svg>

        <div class="plv-header-inner">
            <div class="plv-header-left">

                <div class="plv-header-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="7" r="3" stroke="#C9A84C" stroke-width="1.8"/>
                        <path d="M3 21v-1a6 6 0 0 1 6-6h0" stroke="#C9A84C" stroke-width="1.8" stroke-linecap="round"/>
                        <circle cx="17" cy="9" r="2.5" stroke="#C9A84C" stroke-width="1.8"/>
                        <path d="M13 21v-.5a4 4 0 0 1 4-4h0a4 4 0 0 1 4 4v.5" stroke="#C9A84C" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </div>

                <div>
                    <p class="plv-eyebrow">Sistem Informasi Jemaat</p>
                    <h1 class="plv-title">Data Pelayan Gereja</h1>
                    <p class="plv-sub">Kelola seluruh data pelayan gereja dengan mudah</p>
                </div>

            </div>

            <a href="{{ route('pelayan.create') }}" class="plv-btn-add">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <line x1="19" y1="8" x2="19" y2="14"/>
                    <line x1="22" y1="11" x2="16" y2="11"/>
                </svg>
                Tambah Pelayan
            </a>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         STATS BAR
    ═══════════════════════════════════════ --}}
    @php
        $total   = $pelayans->count();
        $lakiLaki   = $pelayans->where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan  = $pelayans->where('jenis_kelamin', 'Perempuan')->count();
        $jabatans   = $pelayans->unique('jabatan')->count();
    @endphp

    <div class="plv-stats">

        <div class="plv-stat">
            <div class="plv-stat-icon" style="background:#EEF3FC; color:#1E3A6E;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <p class="plv-stat-num">{{ $total }}</p>
                <p class="plv-stat-label">Total Pelayan</p>
            </div>
        </div>

        <div class="plv-stat-divider"></div>

        <div class="plv-stat">
            <div class="plv-stat-icon" style="background:#E8F5FF; color:#0369A1;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M6 20v-2a6 6 0 0 1 6-6h0a6 6 0 0 1 6 6v2"/>
                </svg>
            </div>
            <div>
                <p class="plv-stat-num">{{ $lakiLaki }}</p>
                <p class="plv-stat-label">Laki-laki</p>
            </div>
        </div>

        <div class="plv-stat-divider"></div>

        <div class="plv-stat">
            <div class="plv-stat-icon" style="background:#FBF5E6; color:#7A5200;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M6 20v-2a6 6 0 0 1 6-6h0a6 6 0 0 1 6 6v2"/>
                </svg>
            </div>
            <div>
                <p class="plv-stat-num">{{ $perempuan }}</p>
                <p class="plv-stat-label">Perempuan</p>
            </div>
        </div>

        <div class="plv-stat-divider"></div>

        <div class="plv-stat">
            <div class="plv-stat-icon" style="background:#EDFAF2; color:#1A6B3C;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                    <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                    <line x1="12" y1="12" x2="12" y2="16"/>
                    <line x1="10" y1="14" x2="14" y2="14"/>
                </svg>
            </div>
            <div>
                <p class="plv-stat-num">{{ $jabatans }}</p>
                <p class="plv-stat-label">Jenis Jabatan</p>
            </div>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         TABLE CARD
    ═══════════════════════════════════════ --}}
    <div class="plv-card">

        <div class="plv-card-head">
            <div class="plv-card-head-icon">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round">
                    <line x1="8" y1="6" x2="21" y2="6"/>
                    <line x1="8" y1="12" x2="21" y2="12"/>
                    <line x1="8" y1="18" x2="21" y2="18"/>
                    <line x1="3" y1="6" x2="3.01" y2="6"/>
                    <line x1="3" y1="12" x2="3.01" y2="12"/>
                    <line x1="3" y1="18" x2="3.01" y2="18"/>
                </svg>
            </div>
            <h2 class="plv-card-title">Daftar Pelayan</h2>
            <span class="plv-total-badge">{{ $total }} orang</span>
        </div>

        <div class="plv-table-wrap">
            <table class="plv-table">

                <thead>
                    <tr>
                        <th class="plv-th-no">No</th>
                        <th>Nama Pelayan</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th class="plv-th-aksi">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pelayans as $pelayan)
                    <tr class="plv-tr">

                        <td class="plv-td-no">{{ $loop->iteration }}</td>

                        <td>
                            <div class="plv-nama-cell">
                                <div class="plv-avatar">
                                    {{ strtoupper(substr($pelayan->nama, 0, 1)) }}
                                </div>
                                <span class="plv-nama">{{ $pelayan->nama }}</span>
                            </div>
                        </td>

                        <td>
                            <span class="plv-badge plv-badge-jabatan">
                                {{ $pelayan->jabatan }}
                            </span>
                        </td>

                        <td>
                            @if($pelayan->jenis_kelamin == 'Laki-laki')
                                <span class="plv-badge plv-badge-laki">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <circle cx="10" cy="14" r="5"/>
                                        <line x1="19" y1="5" x2="14.14" y2="9.86"/>
                                        <polyline points="15 5 19 5 19 9"/>
                                    </svg>
                                    Laki-laki
                                </span>
                            @else
                                <span class="plv-badge plv-badge-perempuan">
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
                            <div class="plv-meta-row">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.35 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16z"/>
                                </svg>
                                {{ $pelayan->telepon }}
                            </div>
                        </td>

                        <td>
                            <div class="plv-meta-row plv-alamat">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                {{ $pelayan->alamat }}
                            </div>
                        </td>

                        <td>
                            <div class="plv-actions">

                                <a href="{{ route('pelayan.edit', $pelayan->id) }}" class="plv-action-btn plv-action-edit" title="Edit">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('pelayan.destroy', $pelayan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data pelayan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="plv-action-btn plv-action-delete" title="Hapus">
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
                        <td colspan="7">
                            <div class="plv-empty">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" opacity="0.3">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <line x1="2" y1="2" x2="22" y2="22"/>
                                </svg>
                                <p>Belum ada data pelayan tersedia</p>
                                <a href="{{ route('pelayan.create') }}" class="plv-empty-cta">Tambah Pelayan Pertama</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

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
.plv-wrapper {
    padding: 1.75rem 1.5rem;
    background: var(--bg);
    min-height: 100vh;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

/* ── Header ── */
.plv-header {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
    border-radius: var(--radius-lg);
    padding: 2rem 2.25rem;
    margin-bottom: 1.25rem;
    box-shadow: var(--shadow-md);
}

.plv-cross-bg {
    position: absolute;
    right: -20px;
    top: -20px;
    width: 220px;
    height: 220px;
    pointer-events: none;
}

.plv-header-inner {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.plv-header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.plv-header-icon {
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

.plv-eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--gold-light);
    opacity: .8;
    margin: 0 0 .2rem;
}

.plv-title {
    font-size: 1.55rem;
    font-weight: 800;
    color: #fff;
    margin: 0 0 .2rem;
    line-height: 1.2;
    letter-spacing: -.02em;
}

.plv-sub {
    font-size: .83rem;
    color: rgba(255,255,255,.5);
    margin: 0;
}

.plv-btn-add {
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
.plv-btn-add:hover {
    background: var(--gold-light);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(201,168,76,.5);
    color: var(--navy);
    text-decoration: none;
}

/* ── Stats Bar ── */
.plv-stats {
    display: flex;
    align-items: center;
    gap: 0;
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    margin-bottom: 1.25rem;
    overflow: hidden;
    flex-wrap: wrap;
}

.plv-stat {
    flex: 1;
    display: flex;
    align-items: center;
    gap: .85rem;
    padding: 1.1rem 1.4rem;
    min-width: 130px;
}

.plv-stat-divider {
    width: 1px;
    height: 40px;
    background: var(--border);
    flex-shrink: 0;
}

.plv-stat-icon {
    width: 38px;
    height: 38px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.plv-stat-num {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--navy);
    margin: 0;
    line-height: 1;
    letter-spacing: -.03em;
}

.plv-stat-label {
    font-size: .72rem;
    color: var(--muted);
    margin: .15rem 0 0;
    font-weight: 500;
}

/* ── Table Card ── */
.plv-card {
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
}

.plv-card-head {
    display: flex;
    align-items: center;
    gap: .65rem;
    padding: 1.1rem 1.5rem;
    border-bottom: 1px solid var(--border);
    background: #FAFBFE;
}

.plv-card-head-icon {
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

.plv-card-title {
    font-size: .95rem;
    font-weight: 700;
    color: var(--text);
    margin: 0;
    flex: 1;
}

.plv-total-badge {
    background: var(--navy);
    color: #fff;
    font-size: .7rem;
    font-weight: 700;
    padding: .15rem .55rem;
    border-radius: 99px;
}

/* ── Table ── */
.plv-table-wrap {
    overflow-x: auto;
}

.plv-table {
    width: 100%;
    border-collapse: collapse;
}

.plv-table thead tr {
    background: #F4F6FB;
    border-bottom: 2px solid var(--border);
}

.plv-table th {
    padding: .8rem 1rem;
    font-size: .72rem;
    font-weight: 700;
    color: var(--muted);
    letter-spacing: .06em;
    text-transform: uppercase;
    white-space: nowrap;
    text-align: left;
}

.plv-th-no   { width: 52px; }
.plv-th-aksi { width: 90px; text-align: center; }

.plv-tr {
    border-bottom: 1px solid var(--border);
    transition: background .13s;
}
.plv-tr:last-child { border-bottom: none; }
.plv-tr:hover { background: #F7F9FE; }

.plv-table td {
    padding: .85rem 1rem;
    font-size: .84rem;
    color: var(--text);
    vertical-align: middle;
}

.plv-td-no {
    font-size: .78rem;
    font-weight: 700;
    color: var(--muted);
    text-align: center;
}

/* Avatar + Nama */
.plv-nama-cell {
    display: flex;
    align-items: center;
    gap: .7rem;
}

.plv-avatar {
    width: 34px;
    height: 34px;
    background: linear-gradient(135deg, var(--navy), var(--navy-light));
    color: var(--gold-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .78rem;
    font-weight: 800;
    flex-shrink: 0;
    letter-spacing: 0;
}

.plv-nama {
    font-weight: 700;
    color: var(--navy);
}

/* Badges */
.plv-badge {
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

.plv-badge-jabatan {
    background: #EEF3FC;
    color: var(--navy-light);
    border-color: #C8D8F4;
}

.plv-badge-laki {
    background: #E8F5FF;
    color: #0369A1;
    border-color: #BAE0F9;
}

.plv-badge-perempuan {
    background: #FBF5E6;
    color: #7A5200;
    border-color: #E8D29A;
}

/* Meta rows */
.plv-meta-row {
    display: flex;
    align-items: center;
    gap: .4rem;
    color: var(--muted);
    font-size: .82rem;
}
.plv-meta-row svg { flex-shrink: 0; }

.plv-alamat {
    max-width: 180px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: block;
}
.plv-alamat svg { display: inline; vertical-align: middle; margin-right: .4rem; }

/* Aksi */
.plv-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .4rem;
}

.plv-action-btn {
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

.plv-action-edit {
    background: #EEF3FC;
    border-color: #C8D8F4;
    color: var(--navy-light);
}
.plv-action-edit:hover {
    background: var(--navy);
    border-color: var(--navy);
    color: #fff;
    transform: scale(1.1);
    text-decoration: none;
}

.plv-action-delete {
    background: #FDF2F2;
    border-color: #F5C6C6;
    color: var(--danger);
}
.plv-action-delete:hover {
    background: var(--danger);
    border-color: var(--danger);
    color: #fff;
    transform: scale(1.1);
}

/* ── Empty ── */
.plv-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: .6rem;
    padding: 3.5rem 1.5rem;
    color: var(--muted);
    text-align: center;
}
.plv-empty p { margin: 0; font-size: .85rem; }

.plv-empty-cta {
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
.plv-empty-cta:hover { background: var(--navy-light); color: #fff; }

/* ── Responsive ── */
@media (max-width: 640px) {
    .plv-stat-divider { display: none; }
    .plv-stat { border-bottom: 1px solid var(--border); }
    .plv-stats { flex-direction: column; }
}

</style>

@endsection