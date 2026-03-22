<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IDonation — Riwayat Donasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/idonation.css') }}">
</head>
<body>

    <!-- ── Navbar ── -->
    <nav class="id-nav">
        <a class="nav-brand" href="/">IDonation</a>
        <div class="nav-right">
            <a class="nav-link-item" href="/donation">Donasi</a>
            <a class="nav-link-item active" href="/list">Riwayat</a>
            <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
                <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"/>
                    <line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                    <line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                </svg>
                <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>
            </button>
        </div>
    </nav>

    <div class="id-page">

        <!-- ── Page Header ── -->
        <section class="id-hero">
            <div class="anim-1">
                <p class="hero-eyebrow">Riwayat Donasi</p>
                <h1 class="hero-title">
                    Jejak kebaikan<br>
                    yang <em>nyata</em>
                </h1>
                <p class="hero-sub">
                    Pantau status donasi Anda dan selesaikan pembayaran yang masih tertunda.
                    Setiap donasi tercatat dan tersalurkan dengan transparan.
                </p>
            </div>
            <div class="hero-stats anim-2">
                <div class="stat-item">
                    <div class="stat-number">{{ $donations->total() }}</div>
                    <div class="stat-label">Total Transaksi</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">
                        Rp {{ number_format($donations->sum('amount') / 1000000, 1) }}jt
                    </div>
                    <div class="stat-label">Nilai Donasi</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">
                        {{ $donations->where('status', 'pending')->count() }}
                    </div>
                    <div class="stat-label">Menunggu Pembayaran</div>
                </div>
            </div>
        </section>

        <div class="id-divider"><hr></div>

        <!-- ── Table ── -->
        <section class="id-section">
            <div class="anim-3">

                <div class="table-header">
                    <h2 class="table-title">Semua Donasi</h2>
                    <a class="btn-new-donation" href="/donation">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Donasi Baru
                    </a>
                </div>

                <div class="table-card">
                    @if($donations->isEmpty())
                        <div class="empty-state">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                            <p>Belum ada donasi.<br>Jadilah yang pertama berdonasi!</p>
                        </div>
                    @else
                        <table class="id-table" id="list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Donatur</th>
                                    <th>Jumlah</th>
                                    <th>Jenis Donasi</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $donation)
                                <tr>
                                    <td class="td-id">{{ Str::limit($donation->id, 8, '…') }}</td>
                                    <td class="td-name">{{ $donation->donor_name }}</td>
                                    <td class="td-amount">Rp {{ number_format($donation->amount) }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $donation->donation_type)) }}</td>
                                    <td>
                                        <span class="status-badge {{ strtolower($donation->status) }}">
                                            {{ ucfirst($donation->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($donation->status == 'pending')
                                        <button
                                            class="btn-pay"
                                            onclick="snap.pay('{{ $donation->snap_token }}')"
                                        >
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                                                <line x1="1" y1="10" x2="23" y2="10"/>
                                            </svg>
                                            Bayar Sekarang
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- {{ $donations->links('vendor.pagination.idonation') }} --}}
                    @endif
                </div>

            </div>
        </section>

    </div><!-- /id-page -->

    <footer class="id-footer">
        &copy; {{ date('Y') }} IDonation — Platform donasi untuk saudara kita yang membutuhkan.
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
            data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script src="{{ asset('js/idonation.js') }}"></script>
</body>
</html>