<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABATI - ABA Training Indonesia</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* =========================================
           GLOBAL & DESKTOP STYLES
        ========================================= */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: #ffffff;
            margin: 0;
            padding: 0;
            /* Pastikan footer turun ke bawah jika konten sedikit */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* Padding Top untuk navbar fixed */
        .main-content {
            padding-top: 100px;
            flex: 1;
            /* Agar konten mengisi ruang kosong sebelum footer */
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* --- HERO --- */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            padding: 80px 0;
            margin-bottom: 80px;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .hero-content .label {
            background: #e0f2fe;
            color: #0369a1;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 24px;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 24px;
            line-height: 1.2;
            text-align: left;
        }

        .hero-content h1 .highlight {
            color: #0ea5e9;
        }

        .hero-content p {
            font-size: 18px;
            color: #6b7280;
            margin-bottom: 32px;
            line-height: 1.6;
            text-align: left;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
        }

        .hero-image {
            width: 100%;
            height: 400px;
            border-radius: 12px;
            object-fit: cover;
        }

        /* --- BUTTONS --- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            margin-top: 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-primary {
            background: #0ea5e9;
            color: #fff;
            border: 1px solid #0ea5e9;
        }

        .btn-primary:hover {
            background: #0284c7;
        }

        .btn-secondary {
            background: transparent;
            color: #0ea5e9;
            border: 2px solid #0ea5e9;
        }

        .btn-secondary:hover {
            background: #f0f9ff;
        }

        /* --- SECTIONS --- */
        .section {
            margin-bottom: 80px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 800;
            color: #1f2937;
            text-align: center;
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 18px;
            color: #6b7280;
            text-align: center;
            margin: 0 auto 40px auto;
            max-width: 800px;
            line-height: 1.6;
        }

        /* --- FEATURES --- */
        .features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 80px;
        }

        .feature-card {
            background: #fff;
            padding: 32px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #f3f4f6;
        }

        .feature-icon {
            width: 64px;
            height: 64px;
            background: #0ea5e9;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 24px;
            color: #fff;
        }

        .feature-icon.icon-transparent,
        .format-icon.icon-transparent {
            background: none;
        }

        .icon-img-lg {
            width: 64px;
            height: 64px;
            object-fit: contain;
        }

        .icon-img-sm {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .feature-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #1f2937;
        }

        .feature-desc {
            color: #6b7280;
            line-height: 1.6;
            font-size: 14px;
        }

        /* --- TRAINING LEVELS & FORMATS --- */
        .training-levels {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
            margin-bottom: 80px;
        }

        .levels-content h2 {
            font-size: 36px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 16px;
        }

        .levels-list {
            list-style: none;
            padding: 0;
        }

        .levels-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 24px;
            font-size: 16px;
            color: #374151;
        }

        .levels-list li::before {
            content: '✓';
            color: #22c55e;
            font-weight: bold;
            font-size: 18px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .level-title {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
            display: block;
        }

        .format-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
        }

        .format-icon {
            width: 40px;
            height: 40px;
            background: #0ea5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            flex-shrink: 0;
        }

        .format-content .title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 6px;
        }

        /* --- SUITABLE FOR --- */
        .suitable-for {
            background: #f0f9ff;
            border-radius: 16px;
            padding: 60px 20px;
            margin-bottom: 80px;
            text-align: center;
        }

        .suitable-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .suitable-card {
            background: #ffffff;
            border: 1px solid #f3f4f6;
            border-radius: 20px;
            padding: 32px;
            text-align: left;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
            transition: transform .3s ease;
        }

        .suitable-card:hover {
            transform: translateY(-10px);
        }

        .card-image-wrapper {
            width: 100%;
            aspect-ratio: 16/9;
            background: #f9fafb;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .card-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s ease;
        }

        .suitable-card:hover .card-image-wrapper img {
            transform: scale(1.05);
        }

        .suitable-title {
            font-size: 36px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 20px;
        }

        /* --- ALSO SUITABLE --- */
        .also-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            text-align: center;
        }

        .also-title {
            font-size: 36px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 16px;
        }

        .also-subtitle {
            font-size: 18px;
            color: #6b7280;
            max-width: 700px;
            margin: 0 auto 40px auto;
            line-height: 1.6;
        }

        .also-flex-wrapper {
            display: flex;
            gap: 40px;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .also-flex-left {
            flex: 1 1 350px;
            min-width: 320px;
        }

        .also-flex-right {
            flex: 1 1 320px;
            min-width: 280px;
            display: flex;
            justify-content: center;
        }

        .also-flex-right img {
            max-width: 500px;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            background: #f9fafb;
        }

        .also-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .also-card {
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            padding: 16px 18px;
            gap: 14px;
            transition: 0.25s ease;
        }

        .also-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .also-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 22px;
            color: #222;
            background: #f3f4f6;
            flex-shrink: 0;
        }

        .also-card-title {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
            line-height: 1.4;
            text-align: left;
        }

        /* --- CTA & CONTACT --- */
        .cta {
            background: linear-gradient(135deg, #0ea5e9 0%, #22c55e 100%);
            color: #fff;
            padding: 80px 20px;
            text-align: center;
            border-radius: 16px;
            margin-bottom: 40px;
        }

        .cta h2 {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .cta .btn {
            background: #fff;
            color: #0ea5e9;
            border: 1px solid #fff;
        }

        .contact-cards {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 32px;
            width: 100%;
        }

        .contact-card {
            padding: 24px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #f3f4f6;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            color: #fff;
            font-size: 20px;
        }

        .contact-title {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .contact-desc {
            color: #6b7280;
            word-break: break-all;
        }

        /* =========================================
           RESPONSIVE MOBILE STYLES (Max 768px)
        ========================================= */
        @media (max-width: 768px) {

            /* 1. GRID KE 1 KOLOM */
            .hero,
            .features,
            .training-levels,
            .suitable-cards,
            .also-grid,
            .contact-cards {
                grid-template-columns: 1fr !important;
                gap: 32px;
                display: grid;
                width: 100%;
            }

            /* 2. HERO FIX */
            .hero {
                display: flex !important;
                flex-direction: column-reverse;
                align-items: center !important;
                padding: 40px 0;
            }

            .hero-content {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center !important;
                text-align: center !important;
            }

            .hero-content h1 {
                text-align: center !important;
                font-size: 32px;
                line-height: 1.3;
            }

            .hero-content p {
                text-align: center !important;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
                width: 100%;
                gap: 16px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .hero-image {
                height: 250px;
                width: 100%;
            }

            /* 3. SECTION & TYPOGRAPHY */
            .section-title,
            .also-title {
                font-size: 28px;
            }

            .levels-content h2,
            .levels-content p,
            .also-subtitle {
                text-align: center !important;
            }

            /* 4. ALSO SUITABLE FIX */
            .also-flex-wrapper {
                flex-direction: column;
                gap: 32px;
                align-items: center;
            }

            .also-flex-left,
            .also-flex-right {
                width: 100%;
            }

            .also-card {
                flex-direction: column;
                text-align: center !important;
                align-items: center !important;
                padding: 24px;
            }

            .also-card-title {
                text-align: center !important;
            }

            /* 5. CARD & CONTACT FIX */
            .suitable-card,
            .feature-card,
            .contact-card {
                text-align: center !important;
                padding: 24px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .contact-cards {
                gap: 16px;
            }
        }
    </style>
</head>

<body>
    @include('navbar')

    <div class="container main-content">
        <div class="hero">
            <div class="hero-content">
                <div class="label">ABA Training Indonesia</div>
                <h1>Menyiapkan <span class="highlight">Terapis Perilaku Profesional</span> <span class="highlight">Berstandar Nasional</span></h1>
                <p>ABATI adalah lembaga pelatihan profesional yang fokus pada pengembangan kompetensi terapis perilaku berbasis Applied Behavior Analysis (ABA) untuk anak berkebutuhan khusus.</p>
                <div class="hero-buttons">
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                        </svg>
                        Mulai Sekarang
                    </a>
                    <a href="{{ route('elearning') }}" class="btn btn-secondary">Lihat Modul</a>
                </div>
            </div>
            <div class="hero-image-container">
                <img src="/img/hero_section.jpg" alt="Hero Image" class="hero-image">
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Mengapa Pilih ABATI?</h2>
            <p class="section-subtitle">Pelatihan terapis perilaku dengan standar nasional dan internasional</p>
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon icon-transparent"><img src="/img/books.gif" alt="Books" class="icon-img-lg"></div>
                    <div class="feature-title">Kurikulum Evidence-Based</div>
                    <div class="feature-desc">Materi dan praktik berbasis penelitian ilmiah Applied Behavior Analysis (ABA), bukan hanya teori</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-transparent"><img src="/img/certificate.gif" alt="Sertifikat" class="icon-img-lg"></div>
                    <div class="feature-title">Sertifikasi Nasional</div>
                    <div class="feature-desc">Berhubung dengan LSK TPIBK & Dirjen Vokasi Kemendikbudristek untuk sertifikasi terapis profesional</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-transparent"><img src="/img/certificate-trainer.gif" alt="Trainer" class="icon-img-lg"></div>
                    <div class="feature-title">Trainer Berlisensi</div>
                    <div class="feature-desc">Dibimbing oleh psikolog dan behavior analyst dengan pengalaman lebih dari 25 tahun</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-transparent"><img src="/img/report.gif" alt="Evaluasi" class="icon-img-lg"></div>
                    <div class="feature-title">Evaluasi Terukur</div>
                    <div class="feature-desc">Setiap jenjang memiliki learning outcome, rubrik penilaian, dan evaluasi kompetensi yang jelas</div>
                </div>
            </div>
        </div>

        <div class="training-levels">
            <div class="levels-content">
                <h2>Jenjang Pelatihan ABATI</h2>
                <p>Kami menyediakan berbagai jenjang pelatihan yang disesuaikan dengan kebutuhan Anda</p>
                <ul class="levels-list">
                    <li>
                        <div>
                            <div class="level-title">Kelas ABA Dasar</div>
                            <div class="level-desc">Prinsip dasar ABA, observasi perilaku, data recording, DTT, NET, dan Verbal Behavior. Cocok untuk pemula dan mahasiswa.</div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="level-title">Kelas Case Manager ABA</div>
                            <div class="level-desc">Analisis data, penyusunan program IEP, supervisi, dan komunikasi tim. Untuk terapis senior dan koordinator.</div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="level-title">Workshop Tematik ABA</div>
                            <div class="level-desc">Workshop 1-2 hari: Toilet Training ABA, Manajemen Perilaku, Data Collection Tools, PECS/COMPIC, dan lainnya.</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="formats">
                <h2>Format Pelatihan Fleksibel</h2>
                <div class="format-item">
                    <div class="format-icon icon-transparent"><img src="/img/online-study.png" alt="Online" class="icon-img-sm"></div>
                    <div class="format-content">
                        <div class="title">Online Training</div>
                        <div class="desc">Belajar interaktif melalui platform digital dengan video case & diskusi</div>
                    </div>
                </div>
                <div class="format-item">
                    <div class="format-icon icon-transparent"><img src="/img/offline-study.png" alt="Onsite" class="icon-img-sm"></div>
                    <div class="format-content">
                        <div class="title">Full Onsite Training</div>
                        <div class="desc">Pelatihan tatap muka di lokasi mitra dengan praktik langsung</div>
                    </div>
                </div>
                <div class="format-item">
                    <div class="format-icon icon-transparent"><img src="/img/mix-study.png" alt="Mix" class="icon-img-sm"></div>
                    <div class="format-content">
                        <div class="title">Mix Training (Online + Onsite)</div>
                        <div class="desc">Kombinasi teori daring dan praktik lapangan - Fleksibel & Nyata</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="suitable-for">
            <h2 class="suitable-title">Aselerasi Karir Terapis Anda Bersama ABATI</h2>
            <p class="suitable-subtitle">Kami mengombinasikan kurikulum berstandar nasional dengan ekosistem praktik nyata untuk mencetak tenaga profesional yang siap kerja dan kompeten.</p>
            <div class="suitable-cards">
                <div class="suitable-card">
                    <div class="card-image-wrapper"><img src="/img/gambar-1.png" alt="Sertifikasi"></div>
                    <div class="suitable-title">Standar Kompetensi Nasional Terakreditasi</div>
                    <div class="suitable-desc">Kurikulum kami disusun mengikuti standar kompetensi nasional, memastikan Anda mendapatkan kualifikasi resmi yang diakui oleh industri dan lembaga profesional.</div>
                </div>
                <div class="suitable-card">
                    <div class="card-image-wrapper"><img src="/img/gambar-2.png" alt="Metode"></div>
                    <div class="suitable-title">Metode Belajar Fleksibel: Online & Offline</div>
                    <div class="suitable-desc">Sesuaikan cara belajar dengan kesibukan Anda. Pilih kelas Online interaktif, Onsite tatap muka, atau Hybrid tanpa mengurangi kualitas materi yang diterima.</div>
                </div>
                <div class="suitable-card">
                    <div class="card-image-wrapper"><img src="/img/gambar-3.png" alt="Magang"></div>
                    <div class="suitable-title">Magang & Supervisi Klinis Terpadu</div>
                    <div class="suitable-desc">Dapatkan pengalaman tangan pertama menangani kasus nyata. Program magang kami didampingi langsung oleh praktisi ahli di jaringan klinik mitra terpercaya.</div>
                </div>
                <div class="suitable-card">
                    <div class="card-image-wrapper"><img src="/img/gambar-4.png" alt="Alumni"></div>
                    <div class="suitable-title">Akses Jaringan Alumni Profesional</div>
                    <div class="suitable-desc">Bergabunglah dengan ekosistem alumni terbesar se-Indonesia. Buka peluang kolaborasi, diskusi kasus, hingga informasi lowongan kerja eksklusif.</div>
                </div>
            </div>
        </div>

        <section class="also-section">
            <h2 class="also-title">Juga Cocok Untuk</h2>
            <p class="also-subtitle">Berbagai profesi dan latar belakang yang ingin berkontribusi</p>
            <div class="also-flex-wrapper">
                <div class="also-flex-left">
                    <div class="also-grid">
                        <div class="also-card">
                            <div class="also-icon"><img src="/img/checklist.png" alt=""></div>
                            <div class="also-card-title">Calon Terapis Perilaku</div>
                        </div>
                        <div class="also-card">
                            <div class="also-icon"><img src="/img/checklist.png" alt=""></div>
                            <div class="also-card-title">Mahasiswa Psikologi & PLB</div>
                        </div>
                        <div class="also-card">
                            <div class="also-icon"><img src="/img/checklist.png" alt=""></div>
                            <div class="also-card-title">Guru Inklusi & Shadow Teacher</div>
                        </div>
                        <div class="also-card">
                            <div class="also-icon"><img src="/img/checklist.png" alt=""></div>
                            <div class="also-card-title">Orang Tua ABK</div>
                        </div>
                        <div class="also-card">
                            <div class="also-icon"><img src="/img/checklist.png" alt=""></div>
                            <div class="also-card-title">Pengelola Klinik</div>
                        </div>
                        <div class="also-card">
                            <div class="also-icon"><img src="/img/checklist.png" alt=""></div>
                            <div class="also-card-title">Praktisi Pemula</div>
                        </div>
                    </div>
                </div>
                <div class="also-flex-right">
                    <img src="/img/also-ilustrasion.png" alt="Ilustrasi Profesi" loading="lazy">
                </div>
            </div>
        </section>

        <div class="cta">
            <h2>Siap Menjadi Terapis ABA Profesional?</h2>
            <p>Bergabunglah dengan komunitas terapis ABA profesional yang tersertifikasi nasional</p>
            <a href="{{ route('register') }}" class="btn">Daftar Pelatihan Sekarang</a>
        </div>

        <div class="contact">
            <h2 class="section-title">Hubungi Kami</h2>
            <div class="contact-cards">
                <div class="contact-card">
                    <a href="mailto:abatrainingindonesia@gmail.com">
                        <div class="contact-icon email bg-white"><img src="/img/gmail.png" alt="Email" class="icon-img-lg object-contain mx-auto"></div>
                        <div class="contact-title">Email</div>
                        <div class="contact-desc">abatrainingindonesia@gmail.com</div>
                    </a>
                </div>
                <div class="contact-card">
                    <a href="https://wa.me/082299385608">
                        <div class="contact-icon whatsapp bg-white"><img src="/img/whatsapp.png" alt="WhatsApp" class="icon-img-lg object-contain mx-auto"></div>
                        <div class="contact-title">WhatsApp</div>
                        <div class="contact-desc">+62 822-9938-5608</div>
                    </a>
                </div>
                <div class="contact-card">
                    <a href="https://www.instagram.com/abatrainingindonesia">
                        <div class="contact-icon instagram bg-white"><img src="/img/instagram.png" alt="Instagram" class="icon-img-lg object-contain mx-auto"></div>
                        <div class="contact-title">Instagram</div>
                        <div class="contact-desc">@abatrainingindonesia</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('bubble_chat')
    @include('footer')
</body>

</html>