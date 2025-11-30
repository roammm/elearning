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
        body{font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji'; background:#ffffff; margin:0; padding:0}
        .container{max-width:1200px;margin:0 auto;padding:0 24px}
        .hero{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;padding:80px 0;margin-bottom:80px}
        .hero-content .label{background:#e0f2fe;color:#0369a1;padding:8px 16px;border-radius:20px;font-size:14px;font-weight:500;display:inline-block;margin-bottom:24px}
        .hero-content h1{font-size:48px;font-weight:800;color:#1f2937;margin-bottom:24px;line-height:1.2}
        .hero-content h1 .highlight{color:#0ea5e9}
        .hero-content p{font-size:18px;color:#6b7280;margin-bottom:32px;line-height:1.6}
        .hero-buttons{display:flex;gap:16px}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:12px 24px;border-radius:8px;font-weight:600;text-decoration:none;transition:all 0.2s}
        .btn-primary{background:#0ea5e9;color:#fff;border:none}
        .btn-primary:hover{background:#0284c7}
        .btn-secondary{background:transparent;color:#0ea5e9;border:2px solid #0ea5e9}
        .btn-secondary:hover{background:#f0f9ff}
        .hero-image{width:100%;height:400px;border-radius:12px;object-fit:cover}
        .section{margin-bottom:80px}
        .section-title{font-size:36px;font-weight:800;color:#1f2937;text-align:center;margin-bottom:16px}
        .section-subtitle{font-size:18px;color:#6b7280;text-align:center;margin-bottom:48px}
        .features{display:grid;grid-template-columns:repeat(2,1fr);gap:24px;margin-bottom:80px}
        .feature-card{background:#fff;padding:32px;border-radius:12px;text-align:center;box-shadow:0 4px 6px rgba(0,0,0,0.1);border:1px solid #f3f4f6}
        .feature-icon{width:64px;height:64px;background:#0ea5e9;border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:24px;color:#fff}
        .feature-title{font-size:20px;font-weight:700;margin-bottom:12px;color:#1f2937}
        .feature-desc{color:#6b7280;line-height:1.6;font-size:14px}
        .training-levels{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:start;margin-bottom:80px}
        .levels-content h2{font-size:36px;font-weight:800;color:#1f2937;margin-bottom:16px;text-align:left}
        .levels-content p{font-size:18px;color:#6b7280;margin-bottom:32px;line-height:1.6;text-align:left}
        .levels-list{list-style:none;padding:0}
        .levels-list li{display:flex;align-items:flex-start;gap:12px;margin-bottom:24px;font-size:16px;color:#374151;text-align:left}
        .levels-list li::before{content:'✓';color:#22c55e;font-weight:bold;font-size:18px;margin-top:2px}
        .level-title{font-weight:700;color:#1f2937;margin-bottom:8px}
        .level-desc{color:#6b7280;font-size:14px;line-height:1.5}
        .formats{text-align:left}
        .formats h3{font-size:24px;font-weight:700;color:#1f2937;margin-bottom:24px}
        .format-item{display:flex;align-items:center;gap:16px;margin-bottom:20px;padding:16px;background:#f8fafc;border-radius:8px}
        .format-icon{width:40px;height:40px;background:#0ea5e9;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px}
        .format-content .title{font-weight:600;color:#1f2937;margin-bottom:4px}
        .format-content .desc{color:#6b7280;font-size:14px;line-height:1.4}
        .suitable-for{background:#f0f9ff;padding:40px;border-radius:16px;margin-bottom:80px}
        .suitable-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-top:32px}
        .suitable-card{background:#fff;padding:24px;border-radius:12px;text-align:center;box-shadow:0 2px 4px rgba(0,0,0,0.1)}
        .suitable-icon{width:48px;height:48px;background:#0ea5e9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;color:#fff;font-size:20px}
        .suitable-title{font-size:16px;font-weight:600;color:#1f2937;line-height:1.3}
        .cta{background:linear-gradient(135deg,#0ea5e9 0%,#22c55e 100%);color:#fff;padding:80px 0;text-align:center;border-radius:16px;margin-bottom:40px}
        .cta h2{font-size:36px;font-weight:800;margin-bottom:16px}
        .cta p{font-size:18px;opacity:0.9;margin-bottom:32px}
        .cta .btn{background:#fff;color:#0ea5e9;padding:16px 32px;font-size:16px;font-weight:600;border:1px solid #e5e7eb}
        .contact{text-align:center;margin-bottom:40px}
        .contact-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;margin-top:32px}
        .contact-card{background:#fff;padding:24px;border-radius:12px;text-align:center;box-shadow:0 2px 4px rgba(0,0,0,0.1);border:1px solid #f3f4f6}
        .contact-icon{width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:20px;color:#fff}
        .contact-icon.email{background:#0ea5e9}
        .contact-icon.whatsapp{background:#22c55e}
        .contact-icon.website{background:#22c55e}
        .contact-icon.instagram{background:#e11d48}
        .contact-title{font-size:16px;font-weight:600;color:#1f2937;margin-bottom:4px}
        .contact-desc{color:#6b7280;font-size:14px}
        .footer{text-align:center;padding:24px 0;color:#9ca3af;font-size:14px}
        @media (max-width:1024px){.hero{grid-template-columns:1fr;gap:40px}.features{grid-template-columns:1fr}.training-levels{grid-template-columns:1fr;gap:40px}.suitable-cards{grid-template-columns:repeat(2,1fr)}.contact-cards{grid-template-columns:repeat(2,1fr)}}
        @media (max-width:768px){.hero h1{font-size:32px}.hero p{font-size:16px}.hero-buttons{flex-direction:column}.section-title{font-size:28px}.cta h2{font-size:28px}.suitable-cards{grid-template-columns:1fr}.contact-cards{grid-template-columns:1fr}}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <!-- Hero Section -->
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
                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Medical professionals learning" class="hero-image">
            </div>
        </div>

        <!-- Why Choose Section -->
        <div class="section">
            <h2 class="section-title">Mengapa Pilih ABATI?</h2>
            <p class="section-subtitle">Pelatihan terapis perilaku dengan standar nasional dan internasional</p>
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <div class="feature-title">Kurikulum Evidence-Based</div>
                    <div class="feature-desc">Materi dan praktik berbasis penelitian ilmiah Applied Behavior Analysis (ABA), bukan hanya teori</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <div class="feature-title">Sertifikasi Nasional</div>
                    <div class="feature-desc">Berhubung dengan LSK TPIBK & Dirjen Vokasi Kemendikbudristek untuk sertifikasi terapis profesional</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">👨‍🏫</div>
                    <div class="feature-title">Trainer Berlisensi</div>
                    <div class="feature-desc">Dibimbing oleh psikolog dan behavior analyst dengan pengalaman lebih dari 25 tahun</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <div class="feature-title">Evaluasi Terukur</div>
                    <div class="feature-desc">Setiap jenjang memiliki learning outcome, rubrik penilaian, dan evaluasi kompetensi yang jelas</div>
                </div>
            </div>
        </div>

        <!-- Training Levels Section -->
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
                <h3>Format Pelatihan Fleksibel</h3>
                <div class="format-item">
                    <div class="format-icon">💻</div>
                    <div class="format-content">
                        <div class="title">Online Training</div>
                        <div class="desc">Belajar interaktif melalui platform digital dengan video case & diskusi</div>
                    </div>
                </div>
                <div class="format-item">
                    <div class="format-icon">🏢</div>
                    <div class="format-content">
                        <div class="title">Full Onsite Training</div>
                        <div class="desc">Pelatihan tatap muka di lokasi mitra dengan praktik langsung</div>
                    </div>
                </div>
                <div class="format-item">
                    <div class="format-icon">🧩</div>
                    <div class="format-content">
                        <div class="title">Mix Training (Online + Onsite)</div>
                        <div class="desc">Kombinasi teori daring dan praktik lapangan - Fleksibel & Nyata</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suitable For Section -->
        <div class="suitable-for">
            <h2 class="section-title">Siapa yang Cocok Mengikuti Pelatihan?</h2>
            <p class="section-subtitle">ABATI terbuka untuk berbagai latar belakang yang ingin menjadi terapis profesional</p>
            <div class="suitable-cards">
                <div class="suitable-card">
                    <div class="suitable-icon">✓</div>
                    <div class="suitable-title">Terhubung dengan standar nasional kompetensi terapis perilaku</div>
                </div>
                <div class="suitable-card">
                    <div class="suitable-icon">✓</div>
                    <div class="suitable-title">Format pelatihan fleksibel: Online, Onsite, atau Mix Training</div>
                </div>
                <div class="suitable-card">
                    <div class="suitable-icon">✓</div>
                    <div class="suitable-title">Kesempatan magang & supervisi langsung di klinik mitra</div>
                </div>
                <div class="suitable-card">
                    <div class="suitable-icon">✓</div>
                    <div class="suitable-title">Jaringan profesional alumni terapis ABA se-Indonesia</div>
                </div>
            </div>
        </div>

        <!-- Also Suitable For Section -->
        <div class="section">
            <h2 class="section-title">Juga Cocok Untuk</h2>
            <p class="section-subtitle">Berbagai profesi dan latar belakang yang ingin berkontribusi</p>
            <div class="suitable-cards">
                <div class="suitable-card">
                    <div class="suitable-icon" style="background:#fbbf24">👤</div>
                    <div class="suitable-title">Calon Terapis Perilaku</div>
                </div>
                <div class="suitable-card">
                    <div class="suitable-icon" style="background:#0ea5e9">🎓</div>
                    <div class="suitable-title">Mahasiswa Psikologi & PLB</div>
                </div>
                <div class="suitable-card">
                    <div class="suitable-icon" style="background:#0ea5e9">🏢</div>
                    <div class="suitable-title">Guru Inklusi & Shadow Teacher</div>
                </div>
                <div class="suitable-card">
                    <div class="suitable-icon" style="background:#0ea5e9">👥</div>
                    <div class="suitable-title">Orang Tua Anak Berkebutuhan Khusus</div>
                </div>
                <div class="suitable-card">
                    <div class="suitable-icon" style="background:#0ea5e9">🏢</div>
                    <div class="suitable-title">Pengelola Klinik & Sekolah Inklusi</div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="cta">
            <h2>Siap Menjadi Terapis ABA Profesional?</h2>
            <p>Bergabunglah dengan komunitas terapis ABA profesional yang tersertifikasi nasional</p>
            <a href="{{ route('register') }}" class="btn">Daftar Pelatihan Sekarang</a>
        </div>

        <!-- Contact Section -->
        <div class="contact">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">Siap memulai perjalanan menjadi terapis ABA profesional? Hubungi kami untuk informasi lebih lanjut</p>
            <div class="contact-cards">
                <div class="contact-card">
                    <div class="contact-icon email">📧</div>
                    <div class="contact-title">Email</div>
                    <div class="contact-desc">info@abati.id</div>
                </div>
                <div class="contact-card">
                    <div class="contact-icon whatsapp">📱</div>
                    <div class="contact-title">WhatsApp</div>
                    <div class="contact-desc">+62 812-3456-7890</div>
                </div>
                <div class="contact-card">
                    <div class="contact-icon website">🌐</div>
                    <div class="contact-title">Website</div>
                    <div class="contact-desc">www.abati.id</div>
                </div>
                <div class="contact-card">
                    <div class="contact-icon instagram">📷</div>
                    <div class="contact-title">Instagram</div>
                    <div class="contact-desc">@abati_indonesia</div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        © 2005 ABATI - ABA Training Indonesia. Menyiapkan Terapis Perilaku Profesional Berstandar Nasional.
    </div>
</body>
</html>