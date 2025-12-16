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
                    ABA Training Indonesia • Terakreditasi & Terpercaya
                </div>

                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mb-6 leading-tight">
                    Mencetak <span class="text-sky-500">Terapis ABA Profesional</span><br>
                    Siap Praktik & <span class="text-sky-500">Berstandar Nasional</span>
                </h1>

                <p class="text-lg text-gray-500 mb-8 leading-relaxed">
                    Pelatihan ABA berbasis praktik dengan mentor berpengalaman dan kurikulum berstandar nasional.
                </p>

                <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold transition duration-200 bg-sky-500 text-white hover:bg-sky-600 border border-sky-500">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                        </svg>
                        Daftar & Mulai Belajar
                    </a>

                    <a href="{{ route('elearning') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold transition duration-200 bg-transparent text-sky-500 border-2 border-sky-500 hover:bg-sky-50">
                        Jelajahi Modul Pelatihan
                    </a>
                </div>
            </div>

            <div class="w-full order-1 md:order-2 h-[250px] md:h-[400px]">
                <img src="/img/hero_section.jpg" alt="Pelatihan Terapis ABA Profesional"
                    class="w-full h-full object-cover rounded-xl shadow-lg">
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

        <div class="bg-gradient-to-r from-sky-600 to-indigo-700 rounded-3xl p-10 md:p-16 mb-20 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-green-400 opacity-20 rounded-full blur-3xl -ml-16 -mb-16"></div>

            <div class="relative z-10 text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-10 opacity-90">Telah Dipercaya Mencetak Terapis Berkualitas</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 divide-y md:divide-y-0 md:divide-x divide-white/20" id="counter-section">
                    <div class="p-4">
                        <div class="text-4xl md:text-5xl font-extrabold mb-2 text-green-300 flex justify-center">
                            <span class="count-up" data-from="0" data-to="200" data-duration="2000">0</span>
                            <span>+</span>
                        </div>
                        <div class="text-sm md:text-base font-medium opacity-80 uppercase tracking-wide">Alumni Terapis</div>
                    </div>

                    <div class="p-4">
                        <div class="text-4xl md:text-5xl font-extrabold mb-2 text-sky-300 flex justify-center">
                            <span class="count-up" data-from="0" data-to="50" data-duration="2500">0</span>
                            <span>+</span>
                        </div>
                        <div class="text-sm md:text-base font-medium opacity-80 uppercase tracking-wide">Mitra Klinik & Sekolah</div>
                    </div>

                    <div class="p-4">
                        <div class="text-4xl md:text-5xl font-extrabold mb-2 text-yellow-300 flex justify-center">
                            <span class="count-up" data-from="0" data-to="100" data-duration="1500">0</span>
                            <span>%</span>
                        </div>
                        <div class="text-sm md:text-base font-medium opacity-80 uppercase tracking-wide">Kurikulum Praktis</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-20" id="contact">
            <div class="text-center mb-10">
                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide mb-2 inline-block">Langkah Selanjutnya</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800">Pendaftaran & Konsultasi Program</h2>
            </div>

            <div class="max-w-4xl mx-auto bg-white rounded-2xl p-8 md:p-12 shadow-xl border border-gray-100 relative overflow-hidden">

                <div class="relative z-10 flex flex-col items-center justify-center text-center">

                    <div class="w-20 h-20 bg-gradient-to-br from-sky-100 to-sky-50 text-sky-600 rounded-2xl flex items-center justify-center mb-6 shadow-sm transform -rotate-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Cara Mendaftar Pelatihan</h3>

                    <p class="text-gray-500 mb-8 max-w-2xl text-lg leading-relaxed">
                        Saat ini pendaftaran dilakukan secara manual untuk memastikan Anda memilih jenjang pelatihan yang tepat. Silakan hubungi admin kami untuk mendapatkan:
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full mb-8 text-left md:text-center">
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <div class="font-bold text-gray-800 mb-1">📅 Jadwal Terkini</div>
                            <div class="text-xs text-gray-500">Info tanggal batch selanjutnya</div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <div class="font-bold text-gray-800 mb-1">💰 Rincian Biaya</div>
                            <div class="text-xs text-gray-500">Investasi & metode pembayaran</div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <div class="font-bold text-gray-800 mb-1">📄 Formulir</div>
                            <div class="text-xs text-gray-500">Link form pendaftaran resmi</div>
                        </div>
                    </div>

                    <a href="https://wa.me/6282299385608?text=Halo%20Admin%20ABATI,%20saya%20berminat%20untuk%20mendaftar%20pelatihan,%20mohon%20infonya."
                        target="_blank"
                        class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-green-100 hover:shadow-green-200 hover:-translate-y-1 w-full md:w-auto">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Chat Admin & Daftar Sekarang
                    </a>

                    <p class="mt-4 text-xs text-gray-400">
                        Admin kami akan membalas pesan Anda pada jam kerja (09.00 - 17.00 WIB)
                    </p>
                </div>
            </div>
        </div>

    </div>
    @include('footer')

    <!-- counting script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const animateCounter = (el) => {
                const start = parseInt(el.getAttribute("data-from") || 0);
                const end = parseInt(el.getAttribute("data-to"));
                const duration = parseInt(el.getAttribute("data-duration") || 2000);
                let startTimestamp = null;

                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;

                    const progress = Math.min(
                        (timestamp - startTimestamp) / duration,
                        1,
                    );

                    // Menghitung nilai saat ini berdasarkan progres
                    // Menggunakan Math.floor agar angkanya bulat
                    const currentVal = Math.floor(progress * (end - start) + start);

                    // Update teks di HTML (gunakan toLocaleString agar ada pemisah ribuan jika angka besar)
                    el.textContent = currentVal.toLocaleString("id-ID");

                    // Jika belum selesai, lanjutkan animasi di frame berikutnya
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        // Pastikan angka akhir tepat sesuai target (untuk menghindari koma desimal di akhir)
                        el.textContent = end.toLocaleString("id-ID");
                    }
                };

                // Mulai animasi
                window.requestAnimationFrame(step);
            };

            // --- Setup Intersection Observer ---
            // Ini agar animasi baru jalan saat elemen terlihat di layar

            const options = {
                root: null, // viewport browser
                threshold: 0.5, // Animasi mulai saat 50% elemen terlihat
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    // Jika elemen masuk ke viewport
                    if (entry.isIntersecting) {
                        const counterEl = entry.target;
                        animateCounter(counterEl);
                        // Stop mengamati elemen ini setelah animasi berjalan sekali
                        observer.unobserve(counterEl);
                    }
                });
            }, options);

            // Cari semua elemen dengan class 'count-up' dan mulai diamati
            const counters = document.querySelectorAll(".count-up");
            counters.forEach((counter) => {
                observer.observe(counter);
            });
        });
    </script>


</body>

</html>