<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - MediLearn</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] text-slate-800 m-0 p-0 antialiased bg-white">

    @include('navbar')

    <div class="pt-[120px] pb-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="mb-24">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">
                        Tentang Kami
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        ABATI adalah platform pelatihan profesional yang dirancang untuk memudahkan Anda mempelajari metode <strong>Applied Behavior Analysis (ABA)</strong>. Kami menyediakan kurikulum terstandarisasi untuk mencetak terapis yang kompeten dan berdedikasi.
                    </p>
                </div>

                <div class="relative w-full max-w-5xl mx-auto">
                    <div class="grid grid-cols-2 md:grid-cols-12 gap-4 md:gap-6 items-center relative z-10">
                        <div class="col-span-1 md:col-span-3 flex flex-col items-center md:items-end gap-6 mt-0 md:mt-12">
                            <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden shadow-xl border-4 border-white transform hover:scale-105 transition duration-500">
                                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                    alt="Terapis Wanita" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="col-span-2 md:col-span-6 flex flex-col items-center gap-6">
                            <div class="w-full aspect-video rounded-3xl overflow-hidden shadow-2xl border-4 border-white transform hover:-translate-y-2 transition duration-500">
                                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                    alt="Tim ABATI" class="w-full h-full object-cover">
                            </div>
                            <div class="bg-white px-6 py-3 rounded-xl shadow-lg border border-slate-100 flex items-center gap-3 transform rotate-2 hover:rotate-0 transition duration-300">
                                <img src="/img/ABATRAINING-new.png" alt="Logo Small" class="h-6 w-auto">
                                <div class="text-xs font-bold text-slate-800 tracking-wide">ABATI INDONESIA</div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-3 flex flex-col items-center md:items-start gap-6 mt-0 md:mt-16">
                            <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden shadow-xl border-4 border-white transform hover:scale-105 transition duration-500">
                                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                    alt="Kegiatan Belajar" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-24 pt-20 border-t border-slate-100">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                        Meet The Founder
                    </h1>
                </div>
                <div class="flex flex-col md:flex-row items-start md:items-center gap-10 md:gap-16 mt-16">
                    <div class="w-full md:w-5/12 shrink-0 relative group">
                        <div class="absolute inset-0 bg-blue-600 rounded-2xl rotate-6 opacity-10 group-hover:rotate-3 transition-transform duration-500"></div>
                        <div class="absolute inset-0 bg-slate-200 rounded-2xl -rotate-3 opacity-50 group-hover:-rotate-1 transition-transform duration-500"></div>

                        <div class="relative rounded-2xl overflow-hidden shadow-xl aspect-[3/4] border-4 border-white">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Ayuna Eprilisanti, M.Psi.,Psikolog"
                                class="w-full h-full object-cover object-top transition duration-700 group-hover:scale-105">
                        </div>
                    </div>

                    <div class="w-full md:w-7/12 text-center md:text-left">

                        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-1">
                            Ayuna Eprilisanti, M.Psi., Psikolog
                        </h2>
                        <div class="text-slate-500 font-medium text-sm mb-6 pb-6 border-b border-slate-100">
                            Founder UniqKids Center & Psikolog
                        </div>

                        <div class="prose prose-slate text-slate-600 leading-relaxed space-y-4 text-justify md:text-left">
                            <p>
                                <strong class="text-slate-900">Ayuna Eprilisanti, M.Psi., Psikolog</strong> adalah pendiri UniqKids Center & Homevisit serta psikolog yang memulai karir sebagai terapis perilaku sejak tahun 2001.
                            </p>
                            <p>
                                Beliau berpengalaman di lembaga terapi metode ABA di bawah supervisi psikolog senior dari Perth, Australia, <strong>Jura Tender</strong>, dan mendapatkan pelatihan sebagai <em>Case Manager</em> di tahun 2009 di Perth. Saat ini, beliau sedang melanjutkan pendidikan untuk meraih gelar <em>Board Certified Behavior Analyst</em> (BCBA) di Filipina di bawah naungan BACB USA.
                            </p>
                            <p>
                                Sampai saat ini, beliau sudah mengantongi lebih dari <span class="font-bold text-blue-600">40.000 jam mengajar</span> anak-anak penyandang autisme dengan berbagai kemampuan dan usia.
                            </p>
                        </div>

                        <div class="mt-8 flex flex-col md:flex-row items-center md:items-start gap-3">
                            <div class="text-sm font-bold text-slate-800">
                                Founder ABATI
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('footer')
</body>

</html>