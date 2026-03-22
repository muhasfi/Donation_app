<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IDonation — Bersama Kita Bisa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/idonation.css') }}">
</head>
<body>

    <!-- ── Navbar ── -->
    <nav class="id-nav">
        <a class="nav-brand" href="/">IDonation</a>
        <div class="nav-right">
            <a class="nav-link-item active" href="/donation">Donasi</a>
            <a class="nav-link-item" href="/">Riwayat</a>
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

        <!-- ── Hero ── -->
        <section class="id-hero">
            <div class="anim-1">
                <p class="hero-eyebrow">Platform Donasi</p>
                <h1 class="hero-title">
                    Bersama kita<br>
                    wujudkan <em>harapan</em>
                </h1>
                <p class="hero-sub">
                    Setiap kontribusi, sekecil apapun, membawa perubahan nyata bagi mereka yang membutuhkan.
                    Donasi aman, transparan, dan langsung tepat sasaran.
                </p>
            </div>
        </section>

        <div class="id-divider"><hr></div>

        <!-- ── Form ── -->
        <section class="id-section">
            <div class="id-form-layout">

                <!-- Sidebar -->
                <div class="form-sidebar anim-3">
                    <p class="sidebar-label">Kategori Donasi</p>
                    <h2 class="sidebar-heading">Pilih yang<br>paling berarti</h2>
                    <p class="sidebar-text">
                        Kami menyalurkan donasi ke berbagai kategori yang membutuhkan perhatian dan dukungan nyata dari kita semua.
                    </p>
                    <div class="categories-list">
                        <div class="category-tag"><span class="category-dot"></span>Medis &amp; Kesehatan</div>
                        <div class="category-tag"><span class="category-dot"></span>Kemanusiaan</div>
                        <div class="category-tag"><span class="category-dot"></span>Bencana Alam</div>
                        <div class="category-tag"><span class="category-dot"></span>Rumah Ibadah</div>
                        <div class="category-tag"><span class="category-dot"></span>Beasiswa &amp; Pendidikan</div>
                        <div class="category-tag"><span class="category-dot"></span>Sarana &amp; Infrastruktur</div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="form-card anim-4">
                    <form action="#" id="donation_form">
                        <legend>Form Donasi</legend>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="donor_name">Nama Lengkap</label>
                                <input type="text" name="donor_name" class="form-control" id="donor_name" placeholder="Budi Santoso">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="donor_email">Alamat E-Mail</label>
                                <input type="email" name="donor_mail" class="form-control" id="donor_email" placeholder="budi@email.com">
                            </div>
                        </div>

                        <div class="form-row full">
                            <div class="form-group">
                                <label class="form-label" for="donation_type">Jenis Donasi</label>
                                <select name="donation_type" class="form-control" id="donation_type">
                                    <option value="medis_kesehatan">Medis &amp; Kesehatan</option>
                                    <option value="kemanusiaan">Kemanusiaan</option>
                                    <option value="bencana_alam">Bencana Alam</option>
                                    <option value="rumah_ibadah">Rumah Ibadah</option>
                                    <option value="beasiswa_pendidikan">Beasiswa &amp; Pendidikan</option>
                                    <option value="sarana_infrastruktur">Sarana &amp; Infrastruktur</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row full">
                            <div class="form-group">
                                <label class="form-label" for="amount">
                                    Jumlah Donasi (Rp)
                                </label>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="0">
                                <div class="amount-presets">
                                    <button type="button" class="preset-btn" data-value="25000">25.000</button>
                                    <button type="button" class="preset-btn" data-value="50000">50.000</button>
                                    <button type="button" class="preset-btn" data-value="100000">100.000</button>
                                    <button type="button" class="preset-btn" data-value="250000">250.000</button>
                                    <button type="button" class="preset-btn" data-value="500000">500.000</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-row full">
                            <div class="form-group">
                                <label class="form-label" for="note">
                                    Pesan / Catatan
                                    <span style="opacity:.5;font-size:.9em;margin-left:4px;">(Opsional)</span>
                                </label>
                                <textarea name="note" class="form-control" id="note" rows="3" placeholder="Semoga bermanfaat…"></textarea>
                            </div>
                        </div>

                        <button class="btn-submit" type="submit" id="submitBtn">
                            <span class="btn-text">Kirim Donasi</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </button>

                        <div class="secure-badge">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            Transaksi aman &amp; terenkripsi oleh Midtrans
                        </div>
                    </form>
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