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
</head>

<body class="font-['Inter'] bg-white m-0 p-0 min-h-screen flex flex-col antialiased">
    @include('navbar')

    <div class="w-full max-w-[1200px] mx-auto px-6 pt-[100px] flex-1">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-[60px] items-center py-10 md:py-20 mb-20">
            <div class="flex flex-col items-center md:items-start text-center md:text-left order-2 md:order-1">
                <div class="bg-sky-100 text-sky-700 px-4 py-2 rounded-full text-sm font-medium mb-6 inline-block">
                    ABA Training Indonesia
                </div>
                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mb-6 leading-tight">
                    Menyiapkan <span class="text-sky-500">Terapis Perilaku Profesional</span> <span class="text-sky-500">Berstandar Nasional</span>
                </h1>
                <p class="text-lg text-gray-500 mb-8 leading-relaxed">
                    ABATI adalah lembaga pelatihan profesional yang fokus pada pengembangan kompetensi terapis perilaku berbasis Applied Behavior Analysis (ABA) untuk anak berkebutuhan khusus.
                </p>
                <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold transition duration-200 bg-sky-500 text-white hover:bg-sky-600 border border-sky-500">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                        </svg>
                        Mulai Sekarang
                    </a>
                    <a href="{{ route('elearning') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold transition duration-200 bg-transparent text-sky-500 border-2 border-sky-500 hover:bg-sky-50">
                        Lihat Modul
                    </a>
                </div>
            </div>
            <div class="w-full order-1 md:order-2 h-[250px] md:h-[400px]">
                <img src="/img/hero_section.jpg" alt="Hero Image" class="w-full h-full object-cover rounded-xl shadow-lg">
            </div>
        </div>

        <div class="mb-20">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 text-center mb-4">Mengapa Pilih ABATI?</h2>
            <p class="text-lg text-gray-500 text-center mb-10 max-w-3xl mx-auto leading-relaxed">Pelatihan terapis perilaku dengan standar nasional dan internasional</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-8 rounded-xl text-center shadow-md border border-gray-100 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center mb-4">
                        <img src="/img/books.gif" alt="Books" class="w-16 h-16 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-800 mb-3">Kurikulum Evidence-Based</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Materi dan praktik berbasis penelitian ilmiah Applied Behavior Analysis (ABA), bukan hanya teori</div>
                </div>
                <div class="bg-white p-8 rounded-xl text-center shadow-md border border-gray-100 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center mb-4">
                        <img src="/img/certificate.gif" alt="Sertifikat" class="w-16 h-16 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-800 mb-3">Sertifikasi Nasional</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Berhubung dengan LSK TPIBK & Dirjen Vokasi Kemendikbudristek untuk sertifikasi terapis profesional</div>
                </div>
                <div class="bg-white p-8 rounded-xl text-center shadow-md border border-gray-100 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center mb-4">
                        <img src="/img/certificate-trainer.gif" alt="Trainer" class="w-16 h-16 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-800 mb-3">Trainer Berlisensi</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Dibimbing oleh psikolog dan behavior analyst dengan pengalaman lebih dari 25 tahun</div>
                </div>
                <div class="bg-white p-8 rounded-xl text-center shadow-md border border-gray-100 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center mb-4">
                        <img src="/img/report.gif" alt="Evaluasi" class="w-16 h-16 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-800 mb-3">Evaluasi Terukur</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Setiap jenjang memiliki learning outcome, rubrik penilaian, dan evaluasi kompetensi yang jelas</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-[60px] items-start mb-20">
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4">Jenjang Pelatihan ABATI</h2>
                <p class="text-lg text-gray-500 mb-8 leading-relaxed">Kami menyediakan berbagai jenjang pelatihan yang disesuaikan dengan kebutuhan Anda</p>
                <ul class="space-y-6 w-full">
                    <li class="flex flex-row items-start gap-3 text-left">
                        <span class="text-green-500 font-bold text-lg mt-0.5 shrink-0">✓</span>
                        <div>
                            <div class="font-bold text-gray-800 mb-1">Kelas ABA Dasar</div>
                            <div class="text-gray-600 text-sm leading-relaxed">Prinsip dasar ABA, observasi perilaku, data recording, DTT, NET, dan Verbal Behavior. Cocok untuk pemula dan mahasiswa.</div>
                        </div>
                    </li>
                    <li class="flex flex-row items-start gap-3 text-left">
                        <span class="text-green-500 font-bold text-lg mt-0.5 shrink-0">✓</span>
                        <div>
                            <div class="font-bold text-gray-800 mb-1">Kelas Case Manager ABA</div>
                            <div class="text-gray-600 text-sm leading-relaxed">Analisis data, penyusunan program IEP, supervisi, dan komunikasi tim. Untuk terapis senior dan koordinator.</div>
                        </div>
                    </li>
                    <li class="flex flex-row items-start gap-3 text-left">
                        <span class="text-green-500 font-bold text-lg mt-0.5 shrink-0">✓</span>
                        <div>
                            <div class="font-bold text-gray-800 mb-1">Workshop Tematik ABA</div>
                            <div class="text-gray-600 text-sm leading-relaxed">Workshop 1-2 hari: Toilet Training ABA, Manajemen Perilaku, Data Collection Tools, PECS/COMPIC, dan lainnya.</div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="w-full">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-6 text-center md:text-left">Format Pelatihan Fleksibel</h2>
                <div class="space-y-5">
                    <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-lg shadow-sm">
                        <div class="w-10 h-10 shrink-0 flex items-center justify-center">
                            <img src="/img/online-study.png" alt="Online" class="w-10 h-10 object-contain">
                        </div>
                        <div class="text-left">
                            <div class="text-xl font-bold text-gray-800 mb-1">Online Training</div>
                            <div class="text-gray-600 text-sm">Belajar interaktif melalui platform digital dengan video case & diskusi</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-lg shadow-sm">
                        <div class="w-10 h-10 shrink-0 flex items-center justify-center">
                            <img src="/img/offline-study.png" alt="Onsite" class="w-10 h-10 object-contain">
                        </div>
                        <div class="text-left">
                            <div class="text-xl font-bold text-gray-800 mb-1">Full Onsite Training</div>
                            <div class="text-gray-600 text-sm">Pelatihan tatap muka di lokasi mitra dengan praktik langsung</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-lg shadow-sm">
                        <div class="w-10 h-10 shrink-0 flex items-center justify-center">
                            <img src="/img/mix-study.png" alt="Mix" class="w-10 h-10 object-contain">
                        </div>
                        <div class="text-left">
                            <div class="text-xl font-bold text-gray-800 mb-1">Mix Training (Online + Onsite)</div>
                            <div class="text-gray-600 text-sm">Kombinasi teori daring dan praktik lapangan - Fleksibel & Nyata</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-sky-50 rounded-2xl p-8 md:p-14 mb-20 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4">Aselerasi Karir Terapis Anda Bersama ABATI</h2>
            <p class="text-lg text-gray-500 mb-10 max-w-3xl mx-auto leading-relaxed">Kami mengombinasikan kurikulum berstandar nasional dengan ekosistem praktik nyata untuk mencetak tenaga profesional yang siap kerja dan kompeten.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 text-center md:text-left shadow-lg hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-gray-50 rounded-xl overflow-hidden mb-6">
                        <img src="/img/gambar-1.png" alt="Sertifikasi" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-4">Standar Kompetensi Nasional Terakreditasi</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Kurikulum kami disusun mengikuti standar kompetensi nasional, memastikan Anda mendapatkan kualifikasi resmi yang diakui oleh industri dan lembaga profesional.</div>
                </div>
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 text-center md:text-left shadow-lg hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-gray-50 rounded-xl overflow-hidden mb-6">
                        <img src="/img/gambar-2.png" alt="Metode" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-4">Metode Belajar Fleksibel: Online & Offline</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Sesuaikan cara belajar dengan kesibukan Anda. Pilih kelas Online interaktif, Onsite tatap muka, atau Hybrid tanpa mengurangi kualitas materi yang diterima.</div>
                </div>
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 text-center md:text-left shadow-lg hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-gray-50 rounded-xl overflow-hidden mb-6">
                        <img src="/img/gambar-3.png" alt="Magang" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-4">Magang & Supervisi Klinis Terpadu</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Dapatkan pengalaman tangan pertama menangani kasus nyata. Program magang kami didampingi langsung oleh praktisi ahli di jaringan klinik mitra terpercaya.</div>
                </div>
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 text-center md:text-left shadow-lg hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-gray-50 rounded-xl overflow-hidden mb-6">
                        <img src="/img/gambar-4.png" alt="Alumni" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-4">Akses Jaringan Alumni Profesional</div>
                    <div class="text-gray-500 text-sm leading-relaxed">Bergabunglah dengan ekosistem alumni terbesar se-Indonesia. Buka peluang kolaborasi, diskusi kasus, hingga informasi lowongan kerja eksklusif.</div>
                </div>
            </div>
        </div>

        <section class="max-w-[1200px] mx-auto py-16 px-5 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Juga Cocok Untuk</h2>
            <p class="text-lg text-gray-500 max-w-3xl mx-auto mb-10 leading-relaxed">Berbagai profesi dan latar belakang yang ingin berkontribusi</p>

            <div class="flex flex-col md:flex-row gap-10 items-center justify-center">
                <div class="flex-1 w-full min-w-0">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex flex-col items-center justify-center p-6 bg-white border border-gray-200 rounded-xl shadow-sm gap-3 hover:-translate-y-1 hover:shadow-md transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-6 h-6 object-contain">
                            </div>
                            <div class="text-base font-semibold text-gray-800 leading-snug text-center">Calon Terapis Perilaku</div>
                        </div>
                        <div class="flex flex-col items-center justify-center p-6 bg-white border border-gray-200 rounded-xl shadow-sm gap-3 hover:-translate-y-1 hover:shadow-md transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-6 h-6 object-contain">
                            </div>
                            <div class="text-base font-semibold text-gray-800 leading-snug text-center">Mahasiswa Psikologi & PLB</div>
                        </div>
                        <div class="flex flex-col items-center justify-center p-6 bg-white border border-gray-200 rounded-xl shadow-sm gap-3 hover:-translate-y-1 hover:shadow-md transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-6 h-6 object-contain">
                            </div>
                            <div class="text-base font-semibold text-gray-800 leading-snug text-center">Guru Inklusi & Shadow Teacher</div>
                        </div>
                        <div class="flex flex-col items-center justify-center p-6 bg-white border border-gray-200 rounded-xl shadow-sm gap-3 hover:-translate-y-1 hover:shadow-md transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-6 h-6 object-contain">
                            </div>
                            <div class="text-base font-semibold text-gray-800 leading-snug text-center">Orang Tua ABK</div>
                        </div>
                        <div class="flex flex-col items-center justify-center p-6 bg-white border border-gray-200 rounded-xl shadow-sm gap-3 hover:-translate-y-1 hover:shadow-md transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-6 h-6 object-contain">
                            </div>
                            <div class="text-base font-semibold text-gray-800 leading-snug text-center">Pengelola Klinik</div>
                        </div>
                        <div class="flex flex-col items-center justify-center p-6 bg-white border border-gray-200 rounded-xl shadow-sm gap-3 hover:-translate-y-1 hover:shadow-md transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-6 h-6 object-contain">
                            </div>
                            <div class="text-base font-semibold text-gray-800 leading-snug text-center">Praktisi Pemula</div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 w-full min-w-0 flex justify-center">
                    <img src="/img/also-ilustrasion.png" alt="Ilustrasi Profesi" loading="lazy" class="w-full max-w-[500px] rounded-2xl shadow-lg bg-gray-50">
                </div>
            </div>
        </section>

        <div class="bg-gradient-to-br from-sky-500 to-green-500 text-white p-10 md:p-20 text-center rounded-2xl mb-10 shadow-lg">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Siap Menjadi Terapis ABA Profesional?</h2>
            <p class="text-lg opacity-90 mb-8">Bergabunglah dengan komunitas terapis ABA profesional yang tersertifikasi nasional</p>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-lg font-semibold bg-white text-sky-600 border border-white hover:bg-gray-100 transition duration-200 w-full md:w-auto">
                Daftar Pelatihan Sekarang
            </a>
        </div>

        <div class="mb-20">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 text-center mb-8">Hubungi Kami</h2>
            <div class="flex justify-center gap-6 w-full">
                <div class="p-6 rounded-xl text-center shadow-sm border border-gray-100 bg-white flex flex-col items-center justify-center hover:shadow-md transition duration-200">
                    <a href="mailto:abatrainingindonesia@gmail.com" class="flex flex-col items-center w-full">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3">
                            <img src="/img/gmail.png" alt="Email" class="w-12 h-12 object-contain">
                        </div>
                        <div class="text-gray-800 font-semibold mb-1">Email</div>
                        <div class="text-gray-500 text-sm break-all">abatrainingindonesia@gmail.com</div>
                    </a>
                </div>
                <div class="p-6 rounded-xl text-center shadow-sm border border-gray-100 bg-white flex flex-col items-center justify-center hover:shadow-md transition duration-200">
                    <a href="https://wa.me/082299385608" class="flex flex-col items-center w-full">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3">
                            <img src="/img/whatsapp.png" alt="WhatsApp" class="w-12 h-12 object-contain">
                        </div>
                        <div class="text-gray-800 font-semibold mb-1">WhatsApp</div>
                        <div class="text-gray-500 text-sm">+62 822-9938-5608</div>
                    </a>
                </div>
                <div class="p-6 rounded-xl text-center shadow-sm border border-gray-100 bg-white flex flex-col items-center justify-center hover:shadow-md transition duration-200">
                    <a href="https://www.instagram.com/abatrainingindonesia" class="flex flex-col items-center w-full">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3">
                            <img src="/img/instagram.png" alt="Instagram" class="w-12 h-12 object-contain">
                        </div>
                        <div class="text-gray-800 font-semibold mb-1">Instagram</div>
                        <div class="text-gray-500 text-sm">@abatrainingindonesia</div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    @include('bubble_chat')
    @include('footer')
</body>

</html>