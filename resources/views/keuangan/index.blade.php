@extends('layouts.app')

@section('content')

<div class="keu-wrapper">

    {{-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ --}}
    <div class="keu-header">

        <svg class="keu-cross-bg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="85" y="20" width="30" height="160" rx="4" fill="white" opacity="0.06"/>
            <rect x="30" y="70" width="140" height="30" rx="4" fill="white" opacity="0.06"/>
        </svg>

        <div class="keu-header-inner">
            <div class="keu-header-left">

                <div class="keu-header-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="6" width="20" height="14" rx="2" stroke="#C9A84C" stroke-width="1.8"/>
                        <path d="M2 10h20" stroke="#C9A84C" stroke-width="1.8"/>
                        <circle cx="7" cy="15" r="1.5" fill="#C9A84C"/>
                        <path d="M12 13h5M12 16h3" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M6 6V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2" stroke="#C9A84C" stroke-width="1.8"/>
                    </svg>
                </div>

                <div>
                    <p class="keu-eyebrow">Sistem Informasi Jemaat</p>
                    <h1 class="keu-title">Laporan Keuangan</h1>
                    <p class="keu-sub">Kelola pemasukan & pengeluaran gereja</p>
                </div>

            </div>

            <a href="{{ route('keuangan.export') }}" class="keu-btn-export">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                Export Excel
            </a>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         STATS BAR
    ═══════════════════════════════════════ --}}
    @php
        $totalPemasukan   = $keuangans->where('jenis', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = $keuangans->where('jenis', 'Pengeluaran')->sum('jumlah');
        $saldo            = $totalPemasukan - $totalPengeluaran;
        $totalTransaksi   = $keuangans->total() ?? $keuangans->count();
    @endphp

    <div class="keu-stats">

        <div class="keu-stat">
            <div class="keu-stat-icon" style="background:#EDFAF2; color:#1A6B3C;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                    <line x1="12" y1="19" x2="12" y2="5"/>
                    <polyline points="5 12 12 5 19 12"/>
                </svg>
            </div>
            <div>
                <p class="keu-stat-num keu-num-masuk">Rp {{ number_format($totalPemasukan,0,',','.') }}</p>
                <p class="keu-stat-label">Total Pemasukan</p>
            </div>
        </div>

        <div class="keu-stat-divider"></div>

        <div class="keu-stat">
            <div class="keu-stat-icon" style="background:#FDF2F2; color:#C0392B;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <polyline points="19 12 12 19 5 12"/>
                </svg>
            </div>
            <div>
                <p class="keu-stat-num keu-num-keluar">Rp {{ number_format($totalPengeluaran,0,',','.') }}</p>
                <p class="keu-stat-label">Total Pengeluaran</p>
            </div>
        </div>

        <div class="keu-stat-divider"></div>

        <div class="keu-stat">
            <div class="keu-stat-icon" style="background:#FBF5E6; color:#7A5200;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                    <rect x="2" y="6" width="20" height="14" rx="2"/>
                    <circle cx="12" cy="13" r="3"/>
                    <path d="M2 10h20"/>
                </svg>
            </div>
            <div>
                <p class="keu-stat-num {{ $saldo >= 0 ? 'keu-num-masuk' : 'keu-num-keluar' }}">
                    Rp {{ number_format(abs($saldo),0,',','.') }}
                </p>
                <p class="keu-stat-label">Saldo {{ $saldo >= 0 ? 'Surplus' : 'Defisit' }}</p>
            </div>
        </div>

        <div class="keu-stat-divider"></div>

        <div class="keu-stat">
            <div class="keu-stat-icon" style="background:#EEF3FC; color:#1E3A6E;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                    <line x1="8" y1="6" x2="21" y2="6"/>
                    <line x1="8" y1="12" x2="21" y2="12"/>
                    <line x1="8" y1="18" x2="21" y2="18"/>
                    <line x1="3" y1="6" x2="3.01" y2="6"/>
                    <line x1="3" y1="12" x2="3.01" y2="12"/>
                    <line x1="3" y1="18" x2="3.01" y2="18"/>
                </svg>
            </div>
            <div>
                <p class="keu-stat-num">{{ $totalTransaksi }}</p>
                <p class="keu-stat-label">Total Transaksi</p>
            </div>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         FORM INPUT
    ═══════════════════════════════════════ --}}
    <div class="keu-card keu-form-card">

        <div class="keu-card-head">
            <div class="keu-card-head-icon" style="background:#EDFAF2; color:#1A6B3C;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="16"/>
                    <line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
            </div>
            <h2 class="keu-card-title">Input Transaksi Baru</h2>
        </div>

        <div class="keu-form-body">
            <form action="{{ route('keuangan.store') }}" method="POST" class="keu-form">
                @csrf

                <div class="keu-field">
                    <label class="keu-label">Keterangan</label>
                    <input type="text"
                           name="keterangan"
                           class="keu-input"
                           placeholder="Contoh: Persembahan Minggu..."
                           required>
                </div>

                <div class="keu-field">
                    <label class="keu-label">Kategori</label>
                    <div class="keu-select-wrap">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" class="keu-sel-icon">
                            <path d="M4 6h16M7 12h10M10 18h4"/>
                        </svg>
                        <select name="kategori" class="keu-select" required>
                            <option value="Perpuluhan">Perpuluhan</option>
                            <option value="Mingguan">Mingguan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="keu-field">
                    <label class="keu-label">Jenis</label>
                    <div class="keu-select-wrap">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" class="keu-sel-icon">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                            <polyline points="17 6 23 6 23 12"/>
                        </svg>
                        <select name="jenis" class="keu-select" required>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                </div>

                <div class="keu-field">
                    <label class="keu-label">Jumlah (Rp)</label>
                    <input type="number"
                           name="jumlah"
                           class="keu-input"
                           placeholder="0"
                           min="0"
                           required>
                </div>

                <div class="keu-field">
                    <label class="keu-label">Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="keu-input"
                           value="{{ date('Y-m-d') }}"
                           required>
                </div>

                <div class="keu-field keu-field-btn">
                    <label class="keu-label">&nbsp;</label>
                    <button type="submit" class="keu-btn-simpan">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>
                        Simpan
                    </button>
                </div>

            </form>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         TABLE CARD
    ═══════════════════════════════════════ --}}
    <div class="keu-card">

        <div class="keu-card-head">
            <div class="keu-card-head-icon" style="background:#EEF3FC; color:#1E3A6E;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round">
                    <rect x="2" y="3" width="20" height="18" rx="2"/>
                    <line x1="2" y1="9" x2="22" y2="9"/>
                    <line x1="2" y1="15" x2="22" y2="15"/>
                    <line x1="8" y1="9" x2="8" y2="21"/>
                </svg>
            </div>
            <h2 class="keu-card-title">Riwayat Transaksi</h2>
            <span class="keu-total-badge">{{ $totalTransaksi }} transaksi</span>
        </div>

        <div class="keu-table-wrap">
            <table class="keu-table">

                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th class="keu-th-jumlah">Jumlah</th>
                        <th class="keu-th-aksi">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($keuangans as $k)
                    <tr class="keu-tr {{ strtolower($k->jenis) == 'pemasukan' ? 'keu-tr-masuk' : 'keu-tr-keluar' }}">

                        <td>
                            <div class="keu-meta-row">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($k->tanggal)->locale('id')->isoFormat('D MMM Y') }}
                            </div>
                        </td>

                        <td>
                            <span class="keu-keterangan">{{ $k->keterangan ?? '—' }}</span>
                        </td>

                        <td>
                            <span class="keu-badge keu-badge-kategori">{{ $k->kategori }}</span>
                        </td>

                        <td>
                            @if(strtolower($k->jenis) == 'pemasukan')
                                <span class="keu-badge keu-badge-masuk">
                                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">
                                        <line x1="12" y1="19" x2="12" y2="5"/>
                                        <polyline points="5 12 12 5 19 12"/>
                                    </svg>
                                    Pemasukan
                                </span>
                            @else
                                <span class="keu-badge keu-badge-keluar">
                                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19"/>
                                        <polyline points="19 12 12 19 5 12"/>
                                    </svg>
                                    Pengeluaran
                                </span>
                            @endif
                        </td>

                        <td>
                            <span class="keu-jumlah {{ strtolower($k->jenis) == 'pemasukan' ? 'keu-jumlah-masuk' : 'keu-jumlah-keluar' }}">
                                {{ strtolower($k->jenis) == 'pemasukan' ? '+' : '−' }}
                                Rp {{ number_format($k->jumlah, 0, ',', '.') }}
                            </span>
                        </td>

                        <td>
                            <div class="keu-actions">

                                <a href="{{ route('keuangan.edit', $k->id) }}" class="keu-action-btn keu-action-edit" title="Edit">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('keuangan.destroy', $k->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus data keuangan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="keu-action-btn keu-action-delete" title="Hapus">
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
                            <div class="keu-empty">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" opacity="0.3">
                                    <rect x="2" y="6" width="20" height="14" rx="2"/>
                                    <path d="M2 10h20"/>
                                    <line x1="2" y1="2" x2="22" y2="22"/>
                                </svg>
                                <p>Belum ada data keuangan tersedia</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        @if(method_exists($keuangans, 'hasPages') && $keuangans->hasPages())
        <div class="keu-pagination">
            <p class="keu-page-info">
                Menampilkan {{ $keuangans->firstItem() }}–{{ $keuangans->lastItem() }}
                dari {{ $keuangans->total() }} transaksi
            </p>
            <div class="keu-page-links">
                {{ $keuangans->links('pagination::bootstrap-5') }}
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
    --green:      #1A6B3C;
    --green-bg:   #EDFAF2;
    --red:        #C0392B;
    --red-bg:     #FDF2F2;
    --radius-lg:  16px;
    --radius-md:  10px;
    --radius-sm:  6px;
    --shadow:     0 4px 24px rgba(15,31,61,.09);
    --shadow-md:  0 8px 32px rgba(15,31,61,.14);
}

/* ── Wrapper ── */
.keu-wrapper {
    padding: 1.75rem 1.5rem;
    background: var(--bg);
    min-height: 100vh;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

/* ── Header ── */
.keu-header {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
    border-radius: var(--radius-lg);
    padding: 2rem 2.25rem;
    margin-bottom: 1.25rem;
    box-shadow: var(--shadow-md);
}

.keu-cross-bg {
    position: absolute;
    right: -20px; top: -20px;
    width: 220px; height: 220px;
    pointer-events: none;
}

.keu-header-inner {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.keu-header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.keu-header-icon {
    width: 52px; height: 52px;
    background: rgba(201,168,76,.15);
    border: 1px solid rgba(201,168,76,.3);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.keu-eyebrow {
    font-size: 11px; font-weight: 600;
    letter-spacing: .08em; text-transform: uppercase;
    color: var(--gold-light); opacity: .8; margin: 0 0 .2rem;
}

.keu-title {
    font-size: 1.55rem; font-weight: 800; color: #fff;
    margin: 0 0 .2rem; line-height: 1.2; letter-spacing: -.02em;
}

.keu-sub { font-size: .83rem; color: rgba(255,255,255,.5); margin: 0; }

.keu-btn-export {
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
.keu-btn-export:hover {
    background: var(--gold-light);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(201,168,76,.5);
    color: var(--navy); text-decoration: none;
}

/* ── Stats ── */
.keu-stats {
    display: flex;
    align-items: stretch;
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    margin-bottom: 1.25rem;
    overflow: hidden;
    flex-wrap: wrap;
}

.keu-stat {
    flex: 1;
    display: flex;
    align-items: center;
    gap: .85rem;
    padding: 1.1rem 1.4rem;
    min-width: 160px;
}

.keu-stat-divider {
    width: 1px;
    background: var(--border);
    flex-shrink: 0;
    margin: .75rem 0;
}

.keu-stat-icon {
    width: 38px; height: 38px;
    border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}

.keu-stat-num {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--navy);
    margin: 0;
    line-height: 1;
    letter-spacing: -.02em;
}

.keu-num-masuk  { color: var(--green); }
.keu-num-keluar { color: var(--red); }

.keu-stat-label {
    font-size: .72rem; color: var(--muted);
    margin: .15rem 0 0; font-weight: 500;
}

/* ── Cards ── */
.keu-card {
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
    margin-bottom: 1.25rem;
}
.keu-card:last-child { margin-bottom: 0; }

.keu-card-head {
    display: flex;
    align-items: center;
    gap: .65rem;
    padding: 1.1rem 1.5rem;
    border-bottom: 1px solid var(--border);
    background: #FAFBFE;
}

.keu-card-head-icon {
    width: 30px; height: 30px;
    border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}

.keu-card-title {
    font-size: .95rem; font-weight: 700;
    color: var(--text); margin: 0; flex: 1;
}

.keu-total-badge {
    background: var(--navy); color: #fff;
    font-size: .7rem; font-weight: 700;
    padding: .15rem .55rem; border-radius: 99px;
}

/* ── Form ── */
.keu-form-body { padding: 1.4rem 1.5rem; }

.keu-form {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: flex-end;
}

.keu-field {
    display: flex;
    flex-direction: column;
    gap: .35rem;
    flex: 1;
    min-width: 150px;
}

.keu-field-btn { flex: 0 0 auto; min-width: 110px; }

.keu-label {
    font-size: .72rem;
    font-weight: 700;
    color: var(--muted);
    letter-spacing: .05em;
    text-transform: uppercase;
}

.keu-input {
    width: 100%;
    background: #F4F6FB;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    padding: .6rem .85rem;
    font-size: .875rem;
    color: var(--text);
    outline: none;
    transition: border .18s, background .18s;
    font-family: inherit;
}
.keu-input:focus {
    border-color: var(--navy-light);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(30,58,110,.08);
}

.keu-select-wrap { position: relative; }

.keu-sel-icon {
    position: absolute;
    left: .8rem; top: 50%;
    transform: translateY(-50%);
    color: var(--muted);
    pointer-events: none;
    z-index: 1;
}

.keu-select {
    width: 100%;
    background: #F4F6FB;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    padding: .6rem .85rem .6rem 2.2rem;
    font-size: .875rem;
    color: var(--text);
    outline: none;
    appearance: none;
    cursor: pointer;
    transition: border .18s;
    font-family: inherit;
}
.keu-select:focus {
    border-color: var(--navy-light);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(30,58,110,.08);
}

.keu-btn-simpan {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .45rem;
    background: var(--navy);
    color: #fff;
    font-weight: 700;
    font-size: .875rem;
    padding: .63rem 1rem;
    border-radius: var(--radius-sm);
    border: none;
    cursor: pointer;
    transition: background .18s, transform .15s;
    white-space: nowrap;
}
.keu-btn-simpan:hover {
    background: var(--navy-light);
    transform: translateY(-1px);
}

/* ── Table ── */
.keu-table-wrap { overflow-x: auto; }

.keu-table {
    width: 100%;
    border-collapse: collapse;
}

.keu-table thead tr {
    background: #F4F6FB;
    border-bottom: 2px solid var(--border);
}

.keu-table th {
    padding: .8rem 1rem;
    font-size: .72rem;
    font-weight: 700;
    color: var(--muted);
    letter-spacing: .06em;
    text-transform: uppercase;
    white-space: nowrap;
    text-align: left;
}

.keu-th-jumlah { text-align: right; }
.keu-th-aksi   { width: 90px; text-align: center; }

.keu-tr {
    border-bottom: 1px solid var(--border);
    transition: background .13s;
}
.keu-tr:last-child { border-bottom: none; }
.keu-tr:hover { background: #F7F9FE; }

.keu-tr-masuk:hover  { background: #F2FBF6; }
.keu-tr-keluar:hover { background: #FDF7F7; }

.keu-table td {
    padding: .85rem 1rem;
    font-size: .84rem;
    color: var(--text);
    vertical-align: middle;
}

.keu-meta-row {
    display: flex;
    align-items: center;
    gap: .4rem;
    color: var(--muted);
    font-size: .82rem;
    white-space: nowrap;
}

.keu-keterangan { font-weight: 600; color: var(--navy); }

/* Badges */
.keu-badge {
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

.keu-badge-kategori {
    background: #EEF3FC;
    color: var(--navy-light);
    border-color: #C8D8F4;
}

.keu-badge-masuk {
    background: var(--green-bg);
    color: var(--green);
    border-color: #A8DFC0;
}

.keu-badge-keluar {
    background: var(--red-bg);
    color: var(--red);
    border-color: #F5C6C6;
}

/* Jumlah */
.keu-jumlah {
    font-weight: 800;
    font-size: .88rem;
    font-variant-numeric: tabular-nums;
    display: block;
    text-align: right;
}
.keu-jumlah-masuk  { color: var(--green); }
.keu-jumlah-keluar { color: var(--red); }

/* Aksi */
.keu-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .4rem;
}

.keu-action-btn {
    width: 32px; height: 32px;
    border-radius: var(--radius-sm);
    border: 1.5px solid transparent;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; transition: all .15s;
    background: none; padding: 0; text-decoration: none; flex-shrink: 0;
}

.keu-action-edit {
    background: #EEF3FC; border-color: #C8D8F4; color: var(--navy-light);
}
.keu-action-edit:hover {
    background: var(--navy); border-color: var(--navy);
    color: #fff; transform: scale(1.1); text-decoration: none;
}

.keu-action-delete {
    background: var(--red-bg); border-color: #F5C6C6; color: var(--red);
}
.keu-action-delete:hover {
    background: var(--red); border-color: var(--red);
    color: #fff; transform: scale(1.1);
}

/* ── Pagination ── */
.keu-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: .75rem;
    padding: .9rem 1.5rem;
    border-top: 1px solid var(--border);
    background: #FAFBFE;
}

.keu-page-info { font-size: .78rem; color: var(--muted); margin: 0; }

.keu-page-links .pagination { margin: 0; gap: .25rem; display: flex; }

.keu-page-links .page-link {
    border-radius: var(--radius-sm) !important;
    border: 1.5px solid var(--border);
    color: var(--navy);
    font-size: .8rem; font-weight: 600;
    padding: .35rem .7rem;
    transition: all .15s;
}
.keu-page-links .page-link:hover {
    background: var(--navy); border-color: var(--navy); color: #fff;
}
.keu-page-links .page-item.active .page-link {
    background: var(--navy); border-color: var(--navy); color: #fff;
}
.keu-page-links .page-item.disabled .page-link { opacity: .4; pointer-events: none; }

/* ── Empty ── */
.keu-empty {
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    gap: .6rem; padding: 3.5rem 1.5rem;
    color: var(--muted); text-align: center;
}
.keu-empty p { margin: 0; font-size: .85rem; }

/* ── Responsive ── */
@media (max-width: 768px) {
    .keu-form { flex-direction: column; }
    .keu-field { min-width: 100%; }
    .keu-stat-divider { display: none; }
    .keu-stat { border-bottom: 1px solid var(--border); }
    .keu-stats { flex-direction: column; }
    .keu-wrapper { padding: 1rem; }
}

</style>

@endsection