<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABATI - ABA Training Indonesia</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .bg-blob {
            position: absolute;
            filter: blur(90px);
            opacity: 0.4;
            z-index: -1;
        }
    </style>
</head>

<body class="font-['Inter'] bg-slate-50 m-0 p-0 min-h-screen flex flex-col antialiased overflow-x-hidden relative">

    <div class="bg-blob w-[500px] h-[500px] bg-sky-200 rounded-full top-0 -left-40 mix-blend-multiply"></div>
    <div class="bg-blob w-[500px] h-[500px] bg-indigo-200 rounded-full bottom-0 right-0 mix-blend-multiply"></div>

    @include('navbar')

    <div class="w-full max-w-[1200px] mx-auto px-6 pt-[100px] flex-1 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-[60px] items-center py-10 md:py-20 mb-20">
            <div class="flex flex-col items-center md:items-start text-center md:text-left order-2 md:order-1">
                <div class="bg-gradient-to-r from-sky-100 to-indigo-100 text-sky-700 border border-sky-200 shadow-sm px-4 py-2 rounded-full text-sm font-bold mb-6 inline-block">
                    ABA Training Indonesia • Terakreditasi & Terpercaya
                </div>

                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Mencetak <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-indigo-600">Terapis ABA Profesional</span><br>
                    Siap Praktik & <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-indigo-600">Berstandar Nasional</span>
                </h1>

                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Pelatihan ABA berbasis praktik dengan mentor berpengalaman dan kurikulum berstandar nasional.
                </p>

                <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-bold transition duration-200 bg-gradient-to-r from-sky-500 to-indigo-600 text-white hover:shadow-lg hover:scale-105 shadow-sky-200/50">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                        </svg>
                        Daftar & Mulai Belajar
                    </a>

                    <a href="{{ route('elearning') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold transition duration-200 bg-white text-sky-600 border-2 border-sky-100 hover:border-sky-500 hover:bg-sky-50 shadow-sm">
                        Jelajahi Modul Pelatihan
                    </a>
                </div>
            </div>

            <div class="w-full order-1 md:order-2 h-[250px] md:h-[400px] relative group">
                <div class="absolute inset-0 bg-gradient-to-tr from-sky-400 to-indigo-400 rounded-2xl"></div>
                <img src="/img/hero_section.jpg" alt="Pelatihan Terapis ABA Profesional"
                    class="w-full h-full object-cover rounded-2xl shadow-2xl relative z-10 border-4 border-white">
            </div>
        </div>


        <div class="mb-24">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 text-center mb-4">Mengapa Pilih ABATI?</h2>
            <p class="text-lg text-gray-600 text-center mb-12 max-w-3xl mx-auto leading-relaxed">Pelatihan terapis perilaku dengan standar nasional dan internasional</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-2xl text-center shadow-[0_4px_20px_rgb(0,0,0,0.05)] border-t-4 border-sky-500 flex flex-col items-center hover:-translate-y-2 transition duration-300">
                    <div class="w-20 h-20 flex items-center justify-center mb-4 bg-sky-50 rounded-full">
                        <img src="/img/books.gif" alt="Books" class="w-12 h-12 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-900 mb-3">Kurikulum Evidence-Based</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Materi dan praktik berbasis penelitian ilmiah Applied Behavior Analysis (ABA).</div>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center shadow-[0_4px_20px_rgb(0,0,0,0.05)] border-t-4 border-indigo-500 flex flex-col items-center hover:-translate-y-2 transition duration-300">
                    <div class="w-20 h-20 flex items-center justify-center mb-4 bg-indigo-50 rounded-full">
                        <img src="/img/certificate.gif" alt="Sertifikat" class="w-12 h-12 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-900 mb-3">Sertifikasi Nasional</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Terhubung dengan LSK TPIBK & Dirjen Vokasi Kemendikbudristek.</div>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center shadow-[0_4px_20px_rgb(0,0,0,0.05)] border-t-4 border-teal-500 flex flex-col items-center hover:-translate-y-2 transition duration-300">
                    <div class="w-20 h-20 flex items-center justify-center mb-4 bg-teal-50 rounded-full">
                        <img src="/img/certificate-trainer.gif" alt="Trainer" class="w-12 h-12 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-900 mb-3">Trainer Berlisensi</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Dibimbing oleh psikolog dan behavior analyst berpengalaman.</div>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center shadow-[0_4px_20px_rgb(0,0,0,0.05)] border-t-4 border-amber-500 flex flex-col items-center hover:-translate-y-2 transition duration-300">
                    <div class="w-20 h-20 flex items-center justify-center mb-4 bg-amber-50 rounded-full">
                        <img src="/img/report.gif" alt="Evaluasi" class="w-12 h-12 object-contain">
                    </div>
                    <div class="text-xl font-bold text-gray-900 mb-3">Evaluasi Terukur</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Learning outcome, rubrik penilaian, dan evaluasi kompetensi yang jelas.</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-start mb-24">
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Jenjang Pelatihan ABATI</h2>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">Kami menyediakan berbagai jenjang pelatihan yang disesuaikan dengan kebutuhan Anda</p>

                <ul class="space-y-4 w-full">
                    <li class="flex flex-row items-start gap-4 text-left bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-sky-200 transition">
                        <span class="text-sky-500 font-bold text-xl shrink-0 bg-sky-100 w-8 h-8 flex items-center justify-center rounded-full">✓</span>
                        <div>
                            <div class="font-bold text-gray-900 mb-1 text-lg">Kelas ABA Dasar</div>
                            <div class="text-gray-600 text-sm leading-relaxed">Prinsip dasar ABA, observasi perilaku, data recording, DTT, NET.</div>
                        </div>
                    </li>
                    <li class="flex flex-row items-start gap-4 text-left bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-indigo-200 transition">
                        <span class="text-indigo-500 font-bold text-xl shrink-0 bg-indigo-100 w-8 h-8 flex items-center justify-center rounded-full">✓</span>
                        <div>
                            <div class="font-bold text-gray-900 mb-1 text-lg">Kelas Case Manager ABA</div>
                            <div class="text-gray-600 text-sm leading-relaxed">Analisis data, penyusunan program IEP, supervisi, dan komunikasi tim.</div>
                        </div>
                    </li>
                    <li class="flex flex-row items-start gap-4 text-left bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-teal-200 transition">
                        <span class="text-teal-500 font-bold text-xl shrink-0 bg-teal-100 w-8 h-8 flex items-center justify-center rounded-full">✓</span>
                        <div>
                            <div class="font-bold text-gray-900 mb-1 text-lg">Workshop Tematik ABA</div>
                            <div class="text-gray-600 text-sm leading-relaxed">Workshop intensif: Toilet Training, Manajemen Perilaku, PECS, dll.</div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="w-full">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 text-center md:text-left">Format Pelatihan Fleksibel</h2>
                <div class="space-y-5">
                    <div class="flex items-center gap-5 p-6 bg-gradient-to-r from-sky-500 to-sky-600 rounded-2xl shadow-lg shadow-sky-200/50 text-white hover:scale-[1.02] transition">
                        <div class="w-12 h-12 shrink-0 flex items-center justify-center bg-white/20 rounded-full">
                            <img src="/img/online-study.png" alt="Online" class="w-7 h-7 object-contain brightness-0 invert">
                        </div>
                        <div class="text-left">
                            <div class="text-xl font-bold mb-1">Online Training</div>
                            <div class="text-sky-100 text-sm font-medium">Belajar interaktif via platform digital dengan video case.</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-5 p-6 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-2xl shadow-lg shadow-indigo-200/50 text-white hover:scale-[1.02] transition">
                        <div class="w-12 h-12 shrink-0 flex items-center justify-center bg-white/20 rounded-full">
                            <img src="/img/offline-study.png" alt="Onsite" class="w-7 h-7 object-contain brightness-0 invert">
                        </div>
                        <div class="text-left">
                            <div class="text-xl font-bold mb-1">Full Onsite Training</div>
                            <div class="text-indigo-100 text-sm font-medium">Pelatihan tatap muka di lokasi mitra dengan praktik langsung.</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-5 p-6 bg-gradient-to-r from-teal-500 to-teal-600 rounded-2xl shadow-lg shadow-teal-200/50 text-white hover:scale-[1.02] transition">
                        <div class="w-12 h-12 shrink-0 flex items-center justify-center bg-white/20 rounded-full">
                            <img src="/img/mix-study.png" alt="Mix" class="w-7 h-7 object-contain brightness-0 invert">
                        </div>
                        <div class="text-left">
                            <div class="text-xl font-bold mb-1">Mix Training (Hybrid)</div>
                            <div class="text-teal-100 text-sm font-medium">Kombinasi teori daring dan praktik lapangan.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-sky-50/70 rounded-[40px] p-8 md:p-14 mb-24 text-center border border-sky-100">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Aselerasi Karir Terapis Anda Bersama ABATI</h2>
            <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">Kombinasi kurikulum berstandar nasional dengan ekosistem praktik nyata.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="group bg-white border border-slate-100 border-t-4 border-t-sky-400 rounded-3xl p-8 text-center md:text-left shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-sky-50 rounded-2xl overflow-hidden mb-6">
                        <img src="/img/gambar-1.png" alt="Sertifikasi" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-4">Standar Kompetensi Nasional</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Kurikulum kami disusun mengikuti standar kompetensi nasional (SKKNI).</div>
                </div>
                <div class="group bg-white border border-slate-100 border-t-4 border-t-indigo-400 rounded-3xl p-8 text-center md:text-left shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-indigo-50 rounded-2xl overflow-hidden mb-6">
                        <img src="/img/gambar-2.png" alt="Metode" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-4">Metode Belajar Fleksibel</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Pilih kelas Online interaktif, Onsite tatap muka, atau Hybrid.</div>
                </div>
                <div class="group bg-white border border-slate-100 border-t-4 border-t-teal-400 rounded-3xl p-8 text-center md:text-left shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-teal-50 rounded-2xl overflow-hidden mb-6">
                        <img src="/img/gambar-3.png" alt="Magang" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-4">Magang & Supervisi Terpadu</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Dapatkan pengalaman tangan pertama menangani kasus nyata di klinik mitra.</div>
                </div>
                <div class="group bg-white border border-slate-100 border-t-4 border-t-amber-400 rounded-3xl p-8 text-center md:text-left shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 flex flex-col items-center md:items-start">
                    <div class="w-full aspect-video bg-amber-50 rounded-2xl overflow-hidden mb-6">
                        <img src="/img/gambar-4.png" alt="Alumni" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-4">Akses Jaringan Alumni</div>
                    <div class="text-gray-600 text-sm leading-relaxed">Buka peluang kolaborasi, diskusi kasus, hingga informasi lowongan kerja.</div>
                </div>
            </div>
        </div>

        <section class="max-w-[1200px] mx-auto mb-24 text-center bg-sky-50/70 rounded-[40px] p-10 shadow">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Juga Cocok Untuk</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-12 leading-relaxed">Berbagai profesi dan latar belakang yang ingin berkontribusi</p>

            <div class="flex flex-col md:flex-row gap-10 items-center justify-center">
                <div class="flex-1 w-full min-w-0">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md hover:bg-sky-50 hover:border-sky-200 transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-sky-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-5 h-5 object-contain opacity-70">
                            </div>
                            <div class="text-base font-bold text-gray-800 leading-snug text-left">Calon Terapis Perilaku</div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md hover:bg-sky-50 hover:border-sky-200 transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-sky-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-5 h-5 object-contain opacity-70">
                            </div>
                            <div class="text-base font-bold text-gray-800 leading-snug text-left">Mahasiswa Psikologi & PLB</div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md hover:bg-sky-50 hover:border-sky-200 transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-sky-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-5 h-5 object-contain opacity-70">
                            </div>
                            <div class="text-base font-bold text-gray-800 leading-snug text-left">Guru Inklusi & Shadow Teacher</div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md hover:bg-sky-50 hover:border-sky-200 transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-sky-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-5 h-5 object-contain opacity-70">
                            </div>
                            <div class="text-base font-bold text-gray-800 leading-snug text-left">Orang Tua ABK</div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md hover:bg-sky-50 hover:border-sky-200 transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-sky-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-5 h-5 object-contain opacity-70">
                            </div>
                            <div class="text-base font-bold text-gray-800 leading-snug text-left">Pengelola Klinik</div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md hover:bg-sky-50 hover:border-sky-200 transition duration-200">
                            <div class="w-10 h-10 flex items-center justify-center bg-sky-100 rounded-full shrink-0">
                                <img src="/img/checklist.png" alt="" class="w-5 h-5 object-contain opacity-70">
                            </div>
                            <div class="text-base font-bold text-gray-800 leading-snug text-left">Praktisi Pemula</div>
                        </div>

                    </div>
                </div>

                <div class="flex-1 w-full min-w-0 flex justify-center">
                    <img src="/img/also-ilustrasion.png" alt="Ilustrasi Profesi" loading="lazy" class="w-full max-w-[500px] rounded-[30px] shadow-2xl border-8 border-white bg-sky-50">
                </div>
            </div>
        </section>

        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-4 inline-block shadow-sm">Testimonials</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-4">Apa Kata Mereka?</h2>
                    <p class="text-slate-600">Cerita sukses dari para alumni, orang tua, dan praktisi yang telah bergabung dengan ABATI.</p>
                </div>

                <div class="swiper testimonial-swiper pb-16">
                    <div class="swiper-wrapper items-stretch">

                        <div class="swiper-slide h-auto flex">
                            <div class="bg-white p-8 rounded-[32px] shadow-md border-b-4 border-sky-500 h-full w-full flex flex-col group transition-all duration-300 hover:shadow-xl">
                                <div class="flex gap-1 mb-4 text-amber-400 text-sm">★★★★★</div>
                                <p class="text-gray-600 italic mb-2 leading-relaxed flex-1">"Materi DTT dan NET-nya sangat aplikatif. Saya langsung bisa mempraktikkannya di klinik tempat saya bekerja. Sangat direkomendasikan!"</p>
                                <div class="flex items-center gap-4 pt-6 border-t border-slate-50 mt-auto">
                                    <div class="w-12 h-12 rounded-2xl bg-sky-100 flex items-center justify-center text-sky-600 font-bold shrink-0">AS</div>
                                    <div class="text-left">
                                        <div class="font-bold text-gray-900 text-sm">Anisa Septiani</div>
                                        <div class="text-[11px] text-gray-500 font-bold uppercase tracking-tighter">Alumni Batch 12 • Terapis</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide h-auto flex">
                            <div class="bg-white p-8 rounded-[32px] shadow-md border-b-4 border-indigo-500 h-full w-full flex flex-col group transition-all duration-300 hover:shadow-xl">
                                <div class="flex gap-1 mb-4 text-amber-400 text-sm">★★★★★</div>
                                <p class="text-gray-600 italic mb-8 leading-relaxed flex-1">"Workshop Toilet Training benar-benar membantu saya memahami prosedur yang benar. Sekarang anak saya jauh lebih mandiri."</p>
                                <div class="flex items-center gap-4 pt-6 border-t border-slate-50 mt-auto">
                                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold shrink-0">BP</div>
                                    <div class="text-left">
                                        <div class="font-bold text-gray-900 text-sm">Budi Pratama</div>
                                        <div class="text-[11px] text-gray-500 font-bold uppercase tracking-tighter">Orang Tua • Workshop</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide h-auto flex">
                            <div class="bg-white p-8 rounded-[32px] shadow-md border-b-4 border-teal-500 h-full w-full flex flex-col group transition-all duration-300 hover:shadow-xl">
                                <div class="flex gap-1 mb-4 text-amber-400 text-sm">★★★★★</div>
                                <p class="text-gray-600 italic mb-8 leading-relaxed flex-1">"Sebagai mahasiswa psikologi, ABATI memberikan pemahaman praktis yang tidak saya dapatkan di bangku kuliah. Sangat membantu tugas akhir saya."</p>
                                <div class="flex items-center gap-4 pt-6 border-t border-slate-50 mt-auto">
                                    <div class="w-12 h-12 rounded-2xl bg-teal-100 flex items-center justify-center text-teal-600 font-bold shrink-0">RR</div>
                                    <div class="text-left">
                                        <div class="font-bold text-gray-900 text-sm">Rina Rahmawati</div>
                                        <div class="text-[11px] text-gray-500 font-bold uppercase tracking-tighter">Mahasiswa • Kelas Dasar</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide h-auto flex">
                            <div class="bg-white p-8 rounded-[32px] shadow-md border-b-4 border-rose-500 h-full w-full flex flex-col group transition-all duration-300 hover:shadow-xl">
                                <div class="flex gap-1 mb-4 text-amber-400 text-sm">★★★★★</div>
                                <p class="text-gray-600 italic mb-8 leading-relaxed flex-1">"Manajemen perilaku yang diajarkan sangat membantu saya mengelola kelas inklusi dengan lebih tenang dan terstruktur."</p>
                                <div class="flex items-center gap-4 pt-6 border-t border-slate-50 mt-auto">
                                    <div class="w-12 h-12 rounded-2xl bg-rose-100 flex items-center justify-center text-rose-600 font-bold shrink-0">DM</div>
                                    <div class="text-left">
                                        <div class="font-bold text-gray-900 text-sm">Dina Maria</div>
                                        <div class="text-[11px] text-gray-500 font-bold uppercase tracking-tighter">Guru • Workshop Inklusi</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <div class="bg-gradient-to-r from-sky-600 to-indigo-700 rounded-[40px] p-10 md:p-16 mb-24 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl -mr-16 -mt-16 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-green-400 opacity-20 rounded-full blur-3xl -ml-16 -mb-16 animate-pulse" style="animation-delay: 1s;"></div>
            <div class="relative z-10 text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-12 opacity-90">Telah Dipercaya Mencetak Terapis Berkualitas</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 divide-y md:divide-y-0 md:divide-x divide-white/20" id="counter-section">
                    <div class="p-4">
                        <div class="text-5xl md:text-6xl font-black mb-2 text-green-300 flex justify-center">
                            <span class="count-up" data-from="0" data-to="400" data-duration="2000">0</span>
                            <span>+</span>
                        </div>
                        <div class="text-sm md:text-base font-bold opacity-80 uppercase tracking-widest">Alumni Terapis</div>
                    </div>

                    <div class="p-4">
                        <div class="text-5xl md:text-6xl font-black mb-2 text-sky-300 flex justify-center">
                            <span class="count-up" data-from="0" data-to="50" data-duration="2500">0</span>
                            <span>+</span>
                        </div>
                        <div class="text-sm md:text-base font-bold opacity-80 uppercase tracking-widest">Mitra Klinik & Sekolah</div>
                    </div>

                    <div class="p-4">
                        <div class="text-5xl md:text-6xl font-black mb-2 text-yellow-300 flex justify-center">
                            <span class="count-up" data-from="0" data-to="100" data-duration="1500">0</span>
                            <span>%</span>
                        </div>
                        <div class="text-sm md:text-base font-bold opacity-80 uppercase tracking-widest">Kurikulum Praktis</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-24" id="contact">
            <div class="max-w-4xl mx-auto bg-white rounded-[40px] p-8 md:p-12 shadow-2xl border border-sky-100 relative overflow-hidden text-center">

                <div class="w-24 h-24 bg-gradient-to-br from-sky-400 to-indigo-500 text-white rounded-3xl flex items-center justify-center mb-8 shadow-lg mx-auto transform rotate-6 hover:rotate-0 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 8 9 8z" />
                    </svg>
                </div>

                <h3 class="text-3xl font-bold text-gray-900 mb-4">Pendaftaran & Konsultasi Program</h3>

                <p class="text-gray-600 mb-10 max-w-2xl mx-auto text-lg leading-relaxed">
                    Pastikan Anda memilih jenjang yang tepat. Hubungi admin kami untuk konsultasi dan informasi pendaftaran.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mb-10 text-center">
                    <div class="bg-white p-6 rounded-2xl border-2 border-sky-100 hover:border-sky-300 transition shadow-sm">
                        <div class="text-3xl mb-2">📅</div>
                        <div class="font-bold text-gray-900 mb-1">Jadwal Terkini</div>
                        <div class="text-xs text-gray-500 font-medium">Info batch selanjutnya</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border-2 border-indigo-100 hover:border-indigo-300 transition shadow-sm">
                        <div class="text-3xl mb-2">💰</div>
                        <div class="font-bold text-gray-900 mb-1">Rincian Biaya</div>
                        <div class="text-xs text-gray-500 font-medium">Investasi & pembayaran</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border-2 border-teal-100 hover:border-teal-300 transition shadow-sm">
                        <div class="text-3xl mb-2">📄</div>
                        <div class="font-bold text-gray-900 mb-1">Formulir</div>
                        <div class="text-xs text-gray-500 font-medium">Link pendaftaran resmi</div>
                    </div>
                </div>

                <a href="https://wa.me/6282299385608?text=Halo%20Admin%20ABATI,%20saya%20berminat%20untuk%20mendaftar%20pelatihan,%20mohon%20infonya."
                    target="_blank"
                    class="group inline-flex items-center justify-center gap-3 px-10 py-5 bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold rounded-2xl transition-all duration-300 shadow-xl shadow-green-200/50 hover:shadow-green-300 hover:-translate-y-1 w-full md:w-auto text-lg">
                    <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Chat Admin & Daftar Sekarang
                </a>
                <p class="mt-5 text-sm text-gray-500 font-medium italic">
                    Jam kerja admin: 09.00 - 17.00 WIB
                </p>
            </div>
        </div>

    </div>
    @include('footer')

    <!-- swiper bundle -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // count script
        document.addEventListener("DOMContentLoaded", () => {
            const animateCounter = (el) => {
                const start = parseInt(el.getAttribute("data-from") || 0);
                const end = parseInt(el.getAttribute("data-to"));
                const duration = parseInt(el.getAttribute("data-duration") || 2000);
                let startTimestamp = null;

                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    const currentVal = Math.floor(progress * (end - start) + start);
                    el.textContent = currentVal.toLocaleString("id-ID");
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        el.textContent = end.toLocaleString("id-ID");
                    }
                };
                window.requestAnimationFrame(step);
            };

            const options = {
                root: null,
                threshold: 0.5
            };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, options);

            document.querySelectorAll(".count-up").forEach((counter) => {
                observer.observe(counter);
            });
        });
        // 

        // carousel script
        document.addEventListener("DOMContentLoaded", () => {
            const swiper = new Swiper('.testimonial-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoHeight: false,
                observer: true,
                observeParents: true,
                watchSlidesProgress: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-next',
                    prevEl: '.swiper-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        });
    </script>


</body>

</html>