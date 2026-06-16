@extends('layouts.app')

@section('content')

<div class="gpd-wrapper">

    {{-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ --}}
    <div class="gpd-header">

        {{-- Salib dekoratif background --}}
        <svg class="gpd-cross-bg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="85" y="20" width="30" height="160" rx="4" fill="white" opacity="0.06"/>
            <rect x="30" y="70" width="140" height="30" rx="4" fill="white" opacity="0.06"/>
        </svg>

        <div class="gpd-header-inner">
            <div class="gpd-header-left">
                <div class="gpd-header-icon">
                    {{-- Icon gereja / lonceng --}}
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C12 2 8 5 8 10V14H16V10C16 5 12 2 12 2Z" stroke="#C9A84C" stroke-width="1.8" stroke-linejoin="round"/>
                        <path d="M6 14H18L19 17H5L6 14Z" fill="#C9A84C" opacity="0.3" stroke="#C9A84C" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M10 17C10 18.1046 10.8954 19 12 19C13.1046 19 14 18.1046 14 17" stroke="#C9A84C" stroke-width="1.8"/>
                        <line x1="12" y1="2" x2="12" y2="0.5" stroke="#C9A84C" stroke-width="1.8" stroke-linecap="round"/>
                        <line x1="10.5" y1="1.2" x2="13.5" y2="1.2" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <div>
                    <p class="gpd-header-eyebrow">Sistem Informasi Jemaat</p>
                    <h1 class="gpd-header-title">Papan Pengumuman</h1>
                    <p class="gpd-header-sub">Kelola pengumuman & agenda kegiatan jemaat</p>
                </div>
            </div>

            <a href="{{ route('pengumuman.create') }}" class="gpd-btn-add">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="16"/>
                    <line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
                Tambah Pengumuman
            </a>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         CONTENT GRID
    ═══════════════════════════════════════ --}}
    <div class="gpd-grid">

        {{-- ── PENGUMUMAN (kiri, lebar) ── --}}
        <div class="gpd-col-main">
            <div class="gpd-card">

                <div class="gpd-card-head">
                    <div class="gpd-card-head-icon gpd-icon-blue">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                        </svg>
                    </div>
                    <h2 class="gpd-card-title">Pengumuman Terkini</h2>
                    <span class="gpd-badge-count">{{ $pengumuman->count() }}</span>
                </div>

                <div class="gpd-list">
                    @forelse($pengumuman as $p)

                        <div class="gpd-item">
                            <div class="gpd-item-accent"></div>

                            <div class="gpd-item-body">
                                <div class="gpd-item-date">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($p->tanggal)->locale('id')->isoFormat('D MMMM Y') }}
                                </div>
                                <h3 class="gpd-item-title">{{ $p->judul }}</h3>
                                <p class="gpd-item-text">{{ $p->isi }}</p>
                            </div>

                            <div class="gpd-item-actions">

                                {{-- Tombol Edit --}}
                                <a href="{{ route('pengumuman.edit', $p->id) }}" class="gpd-action-btn gpd-action-edit" title="Edit pengumuman">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('pengumuman.destroy', $p->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="gpd-action-btn gpd-action-delete" title="Hapus pengumuman">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"/>
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                            <path d="M10 11v6M14 11v6"/>
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </div>

                    @empty
                        <div class="gpd-empty">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" opacity="0.35">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                                <line x1="2" y1="2" x2="22" y2="22"/>
                            </svg>
                            <p>Belum ada pengumuman tersedia</p>
                            <a href="{{ route('pengumuman.create') }}" class="gpd-empty-cta">Buat Pengumuman Pertama</a>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

        {{-- ── AGENDA (kanan, sempit) ── --}}
        <div class="gpd-col-side">
            <div class="gpd-card">

                <div class="gpd-card-head">
                    <div class="gpd-card-head-icon gpd-icon-gold">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <h2 class="gpd-card-title">Agenda Mendatang</h2>
                </div>

                <div class="gpd-timeline">
                    @forelse($jadwals as $j)

                        <div class="gpd-tl-item">
                            <div class="gpd-tl-dot"></div>
                            <div class="gpd-tl-line"></div>

                            <div class="gpd-tl-content">

                                <span class="gpd-tl-date">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($j->tanggal)->locale('id')->isoFormat('D MMM Y') }}
                                    @if(isset($j->jam))
                                        &nbsp;·&nbsp;{{ \Carbon\Carbon::parse($j->jam)->format('H:i') }}
                                    @endif
                                </span>

                                <h4 class="gpd-tl-title">{{ $j->kegiatan }}</h4>

                                <span class="gpd-tl-place">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    {{ $j->tempat }}
                                </span>

                                @if(isset($j->kategori))
                                    <span class="gpd-tl-tag">{{ ucfirst(str_replace('_', ' ', $j->kategori)) }}</span>
                                @endif

                            </div>
                        </div>

                    @empty
                        <div class="gpd-empty gpd-empty-sm">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" opacity="0.3">
                                <rect x="3" y="4" width="18" height="18" rx="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <p>Tidak ada agenda mendatang</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

    </div>

</div>

{{-- ═══════════════════════════════════════
     STYLES
═══════════════════════════════════════ --}}
<style>

/* ── Tokens ── */
:root {
    --navy:        #0F1F3D;
    --navy-mid:    #162847;
    --navy-light:  #1E3A6E;
    --gold:        #C9A84C;
    --gold-light:  #F0D98A;
    --bg:          #F0F3F9;
    --surface:     #FFFFFF;
    --border:      #DDE3EF;
    --text:        #1A2640;
    --muted:       #6B7A99;
    --danger:      #C0392B;
    --danger-bg:   #FDF2F2;
    --edit-bg:     #F0F6FF;
    --edit-color:  #1E4D9B;
    --radius-lg:   16px;
    --radius-md:   10px;
    --radius-sm:   6px;
    --shadow:      0 4px 24px rgba(15,31,61,.10);
    --shadow-md:   0 8px 32px rgba(15,31,61,.14);
}

/* ── Wrapper ── */
.gpd-wrapper {
    padding: 1.75rem 1.5rem;
    background: var(--bg);
    min-height: 100vh;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

/* ── Header ── */
.gpd-header {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
    border-radius: var(--radius-lg);
    padding: 2rem 2.25rem;
    margin-bottom: 1.75rem;
    box-shadow: var(--shadow-md);
}

.gpd-cross-bg {
    position: absolute;
    right: -20px;
    top: -20px;
    width: 220px;
    height: 220px;
    pointer-events: none;
}

.gpd-header-inner {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.gpd-header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.gpd-header-icon {
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

.gpd-header-eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--gold-light);
    opacity: .8;
    margin: 0 0 .2rem;
}

.gpd-header-title {
    font-size: 1.55rem;
    font-weight: 800;
    color: #fff;
    margin: 0 0 .2rem;
    line-height: 1.2;
    letter-spacing: -.02em;
}

.gpd-header-sub {
    font-size: .83rem;
    color: rgba(255,255,255,.55);
    margin: 0;
}

.gpd-btn-add {
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
.gpd-btn-add:hover {
    background: var(--gold-light);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(201,168,76,.5);
    color: var(--navy);
    text-decoration: none;
}

/* ── Grid ── */
.gpd-grid {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 1.5rem;
    align-items: start;
}
@media (max-width: 960px) {
    .gpd-grid { grid-template-columns: 1fr; }
}

/* ── Card ── */
.gpd-card {
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    overflow: hidden;
    border: 1px solid var(--border);
}

.gpd-card-head {
    display: flex;
    align-items: center;
    gap: .65rem;
    padding: 1.1rem 1.5rem;
    border-bottom: 1px solid var(--border);
    background: #FAFBFE;
}

.gpd-card-head-icon {
    width: 30px;
    height: 30px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.gpd-icon-blue { background: #E8EFF9; color: var(--navy-light); }
.gpd-icon-gold { background: #FBF5E6; color: #9A7020; }

.gpd-card-title {
    font-size: .95rem;
    font-weight: 700;
    color: var(--text);
    margin: 0;
    flex: 1;
    letter-spacing: -.01em;
}

.gpd-badge-count {
    background: var(--navy);
    color: #fff;
    font-size: .7rem;
    font-weight: 700;
    padding: .15rem .5rem;
    border-radius: 99px;
    letter-spacing: .03em;
}

/* ── Pengumuman List ── */
.gpd-list { }

.gpd-item {
    display: flex;
    align-items: stretch;
    gap: 0;
    border-bottom: 1px solid var(--border);
    transition: background .15s;
    position: relative;
}
.gpd-item:last-child { border-bottom: none; }
.gpd-item:hover { background: #F7F9FE; }

.gpd-item-accent {
    width: 4px;
    background: var(--gold);
    flex-shrink: 0;
    border-radius: 0;
}

.gpd-item-body {
    flex: 1;
    padding: 1.1rem 1.2rem;
    min-width: 0;
}

.gpd-item-date {
    display: inline-flex;
    align-items: center;
    gap: .3rem;
    font-size: .72rem;
    font-weight: 600;
    color: var(--muted);
    letter-spacing: .03em;
    text-transform: uppercase;
    margin-bottom: .35rem;
}

.gpd-item-title {
    font-size: .95rem;
    font-weight: 700;
    color: var(--navy);
    margin: 0 0 .4rem;
    line-height: 1.35;
    letter-spacing: -.01em;
}

.gpd-item-text {
    font-size: .83rem;
    color: var(--muted);
    margin: 0;
    line-height: 1.55;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gpd-item-actions {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: .4rem;
    padding: .8rem 1rem;
    flex-shrink: 0;
}

.gpd-action-btn {
    width: 34px;
    height: 34px;
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
}

.gpd-action-edit {
    background: var(--edit-bg);
    border-color: #C8D8F4;
    color: var(--edit-color);
}
.gpd-action-edit:hover {
    background: var(--navy);
    border-color: var(--navy);
    color: #fff;
    transform: scale(1.08);
}

.gpd-action-delete {
    background: var(--danger-bg);
    border-color: #F5C6C6;
    color: var(--danger);
}
.gpd-action-delete:hover {
    background: var(--danger);
    border-color: var(--danger);
    color: #fff;
    transform: scale(1.08);
}

/* ── Empty state ── */
.gpd-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: .6rem;
    padding: 3.5rem 1.5rem;
    color: var(--muted);
    text-align: center;
}
.gpd-empty p { margin: 0; font-size: .85rem; }
.gpd-empty-sm { padding: 2.5rem 1rem; }

.gpd-empty-cta {
    display: inline-flex;
    align-items: center;
    gap: .35rem;
    margin-top: .4rem;
    background: var(--navy);
    color: #fff;
    font-size: .8rem;
    font-weight: 600;
    padding: .5rem 1.1rem;
    border-radius: var(--radius-sm);
    text-decoration: none;
    transition: background .15s;
}
.gpd-empty-cta:hover { background: var(--navy-light); color: #fff; }

/* ── Timeline Agenda ── */
.gpd-timeline {
    padding: .5rem 0;
}

.gpd-tl-item {
    position: relative;
    display: flex;
    gap: 0;
    padding: .9rem 1.4rem .9rem 2.8rem;
}

.gpd-tl-dot {
    position: absolute;
    left: 1.25rem;
    top: 1.2rem;
    width: 10px;
    height: 10px;
    background: var(--gold);
    border-radius: 50%;
    border: 2px solid var(--surface);
    box-shadow: 0 0 0 2px var(--gold);
    z-index: 1;
    flex-shrink: 0;
}

.gpd-tl-line {
    position: absolute;
    left: calc(1.25rem + 4px);
    top: calc(1.2rem + 10px);
    bottom: -0.9rem;
    width: 2px;
    background: var(--border);
}
.gpd-tl-item:last-child .gpd-tl-line { display: none; }

.gpd-tl-content {
    flex: 1;
    min-width: 0;
}

.gpd-tl-date {
    display: inline-flex;
    align-items: center;
    gap: .3rem;
    font-size: .7rem;
    font-weight: 600;
    color: var(--muted);
    letter-spacing: .04em;
    text-transform: uppercase;
    margin-bottom: .25rem;
}

.gpd-tl-title {
    font-size: .88rem;
    font-weight: 700;
    color: var(--navy);
    margin: 0 0 .3rem;
    line-height: 1.35;
}

.gpd-tl-place {
    display: inline-flex;
    align-items: center;
    gap: .25rem;
    font-size: .75rem;
    color: var(--muted);
    margin-bottom: .35rem;
}

.gpd-tl-tag {
    display: inline-block;
    background: #EEF3FC;
    color: var(--navy-light);
    font-size: .67rem;
    font-weight: 700;
    letter-spacing: .05em;
    text-transform: uppercase;
    padding: .15rem .55rem;
    border-radius: 99px;
    border: 1px solid #C8D8F4;
}

</style>

@endsection