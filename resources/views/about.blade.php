<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - ABATI Indonesia</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .bg-blob {
            position: absolute;
            filter: blur(100px);
            opacity: 0.5;
            z-index: -1;
        }
    </style>
</head>

<body class="font-['Inter'] text-slate-800 m-0 p-0 antialiased bg-slate-50 relative overflow-x-hidden">

    <div class="bg-blob w-[600px] h-[600px] bg-sky-100 rounded-full -top-20 -left-40"></div>
    <div class="bg-blob w-[500px] h-[500px] bg-indigo-100 rounded-full top-1/2 -right-20"></div>

    @include('navbar')

    <div class="pt-[140px] pb-20 px-6 relative z-10">
        <div class="max-w-7xl mx-auto">

            <div class="mb-24">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="bg-sky-100 text-sky-700 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-4 inline-block shadow-sm">Pionir Pelatihan ABA</span>
                    <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 mb-6 leading-tight">
                        Tentang Kami
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed italic">
                        "Mencetak terapis berkualitas untuk masa depan anak-anak istimewa Indonesia."
                    </p>
                    <div class="mt-8 text-lg text-slate-600 leading-relaxed text-justify md:text-center">
                        ABATI adalah platform pelatihan profesional yang dirancang untuk memudahkan Anda mempelajari metode <strong>Applied Behavior Analysis (ABA)</strong>. Kami menyediakan kurikulum terstandarisasi untuk mencetak terapis yang kompeten, beretika, dan berdedikasi tinggi.
                    </div>
                </div>

                <div class="relative w-full max-w-5xl mx-auto">
                    <div class="grid grid-cols-2 md:grid-cols-12 gap-4 md:gap-6 items-center">
                        <div class="col-span-1 md:col-span-3 flex flex-col items-center md:items-end gap-6 mt-0 md:mt-12">
                            <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden shadow-xl border-4 border-white transform hover:scale-105 transition duration-500 hover:rotate-2">
                                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80" alt="Terapis" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="col-span-2 md:col-span-6 flex flex-col items-center gap-6">
                            <div class="w-full aspect-video rounded-3xl overflow-hidden shadow-2xl border-4 border-white transform hover:-translate-y-2 transition duration-500">
                                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1000&q=80" alt="Tim ABATI" class="w-full h-full object-cover">
                            </div>
                            <div class="bg-white px-6 py-4 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-4 transform rotate-2 hover:rotate-0 transition duration-300">
                                <img src="/img/ABATRAINING-new.png" alt="Logo ABATI" class="h-8 w-auto">
                                <div class="text-sm font-black text-slate-800 tracking-wider uppercase">ABATI Indonesia</div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-3 flex flex-col items-center md:items-start gap-6 mt-0 md:mt-16">
                            <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden shadow-xl border-4 border-white transform hover:scale-105 transition duration-500 hover:-rotate-2">
                                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=600&q=80" alt="Kegiatan Belajar" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-32 pt-20 border-t border-slate-200 relative">
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <span class="bg-sky-100 text-sky-700 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-4 inline-block shadow-sm">The Visionary</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                        Meet The Founder
                    </h2>
                </div>

                <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20">
                    <div class="w-full md:w-5/12 shrink-0 relative group">
                        <div class="absolute inset-0 bg-gradient-to-tr from-sky-500 to-indigo-600 rounded-[40px] rotate-6 opacity-20 group-hover:rotate-3 transition-transform duration-500"></div>
                        <div class="absolute inset-0 bg-slate-200 rounded-[40px] -rotate-3 opacity-50 group-hover:-rotate-1 transition-transform duration-500"></div>

                        <div class="relative rounded-[40px] overflow-hidden shadow-2xl aspect-[3/4] border-4 border-white z-10">
                            <img src="/img/founder.jpg" alt="Ayuna Eprilisanti, M.Psi., Psikolog, SAP-K" class="w-full h-full object-cover object-top transition duration-700 group-hover:scale-110">

                            <div class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-5 rounded-3xl shadow-lg z-20 border border-white">
                                <div class="text-sky-600 font-black text-3xl leading-none">24+ Years</div>
                                <div class="text-slate-500 text-xs font-bold uppercase tracking-widest mt-1">Professional Experience</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-7/12">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2 leading-tight">
                            Ayuna Eprilisanti, <span class="text-sky-600 text-2xl md:text-3xl font-bold block md:inline">M.Psi., Psikolog, SAP-K</span>
                        </h2>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="bg-slate-200 text-slate-700 px-3 py-1 rounded-lg text-xs font-bold uppercase">Founder ABATI & UniqKids</span>
                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg text-xs font-bold uppercase">Behavior Analyst</span>
                        </div>

                        <div class="prose prose-slate text-slate-600 leading-relaxed space-y-5 text-justify md:text-left text-lg">
                            <p>
                                Beliau adalah pendiri <strong>UniqKids Center & Homevisit</strong> serta psikolog yang memulai karir sebagai terapis perilaku sejak tahun 2001. Pengalamannya ditempa di lembaga terapi metode ABA di bawah supervisi psikolog senior dari Perth, Australia, <strong>Jura Tender</strong>.
                            </p>
                            <p>
                                Saat ini, beliau sedang menempuh pendidikan untuk meraih gelar <em>Board Certified Behavior Analyst</em> (BCBA) di bawah naungan BACB USA. Dengan dedikasi lebih dari <span class="text-blue-600 font-black">40.000 jam mengajar</span>, beliau menjadi salah satu pilar utama dalam pengembangan standar terapi perilaku di Indonesia.
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-12">
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-sky-300 transition group">
                                <div class="text-sky-500 font-black text-2xl mb-1 group-hover:scale-110 transition duration-300">40.000+</div>
                                <div class="text-slate-500 text-xs font-bold uppercase tracking-tight leading-tight">Jam Mengajar Praktis</div>
                            </div>
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-indigo-300 transition group">
                                <div class="text-indigo-500 font-black text-2xl mb-1 group-hover:scale-110 transition duration-300">300+</div>
                                <div class="text-slate-500 text-xs font-bold uppercase tracking-tight leading-tight">Alumni Terapis Terlatih</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-32 pt-20 border-t border-slate-200">
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-4 inline-block shadow-sm">Our Experts</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-6">
                        Meet The Trainers
                    </h2>
                    <p class="text-lg text-slate-600">
                        Belajar langsung dari praktisi pilihan yang berdedikasi tinggi dalam dunia Applied Behavior Analysis.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                    <div class="group bg-white rounded-[32px] overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 hover:border-sky-200 transition-all duration-300">
                        <div class="relative h-80 overflow-hidden">
                            <img src="https://i.pravatar.cc/400?img=47" alt="Trainer 1" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-sky-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <span class="text-white text-xs font-bold uppercase tracking-widest">View Profile</span>
                            </div>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-sky-600 transition">Sarah Wijaya, S.Psi</h3>
                            <p class="text-xs text-sky-600 font-bold uppercase tracking-widest mb-4">Senior Behavior Therapist</p>
                            <div class="h-1 w-12 bg-sky-100 mx-auto rounded-full group-hover:w-20 transition-all duration-300"></div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-[32px] overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 hover:border-indigo-200 transition-all duration-300">
                        <div class="relative h-80 overflow-hidden">
                            <img src="https://i.pravatar.cc/400?img=3" alt="Trainer 2" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <span class="text-white text-xs font-bold uppercase tracking-widest">View Profile</span>
                            </div>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-indigo-600 transition">Budi Santoso, M.Pd</h3>
                            <p class="text-xs text-indigo-600 font-bold uppercase tracking-widest mb-4">Educational Specialist</p>
                            <div class="h-1 w-12 bg-indigo-100 mx-auto rounded-full group-hover:w-20 transition-all duration-300"></div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-[32px] overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 hover:border-teal-200 transition-all duration-300">
                        <div class="relative h-80 overflow-hidden">
                            <img src="https://i.pravatar.cc/400?img=24" alt="Trainer 3" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-teal-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <span class="text-white text-xs font-bold uppercase tracking-widest">View Profile</span>
                            </div>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-teal-600 transition">Dr. Maya Putri</h3>
                            <p class="text-xs text-teal-600 font-bold uppercase tracking-widest mb-4">Clinical Psychologist</p>
                            <div class="h-1 w-12 bg-teal-100 mx-auto rounded-full group-hover:w-20 transition-all duration-300"></div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-[32px] overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 hover:border-amber-200 transition-all duration-300">
                        <div class="relative h-80 overflow-hidden">
                            <img src="https://i.pravatar.cc/400?img=12" alt="Trainer 4" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-amber-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <span class="text-white text-xs font-bold uppercase tracking-widest">View Profile</span>
                            </div>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-amber-600 transition">Rizky Pratama, S.Psi</h3>
                            <p class="text-xs text-amber-600 font-bold uppercase tracking-widest mb-4">Field Supervisor</p>
                            <div class="h-1 w-12 bg-amber-100 mx-auto rounded-full group-hover:w-20 transition-all duration-300"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>

</html>