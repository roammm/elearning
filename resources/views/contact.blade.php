<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hubungi Kami - MediLearn</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased">

    @include('navbar')

    <div class="relative min-h-screen flex items-center pt-[80px]">

        <div class="absolute top-20 right-0 -z-10 opacity-30 overflow-hidden pointer-events-none">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-[600px] h-[600px] text-blue-200 fill-current">
                <path d="M44.7,-76.4C58.9,-69.2,71.8,-59.1,81.6,-46.6C91.4,-34.1,98.1,-19.2,95.8,-4.9C93.5,9.3,82.1,22.9,71.3,34.6C60.5,46.3,50.2,56.1,38.2,64.2C26.2,72.3,12.5,78.7,-0.6,79.7C-13.7,80.7,-26.8,76.3,-38.6,68.9C-50.4,61.5,-60.9,51.1,-70.2,38.9C-79.5,26.7,-87.6,12.7,-86.6,-0.6C-85.6,-13.9,-75.5,-26.5,-64.7,-37.2C-53.9,-47.9,-42.4,-56.7,-30.3,-65.2C-18.2,-73.7,-5.5,-81.9,4.9,-90.4L15.3,-98.9" transform="translate(100 100)" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-6 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="order-2 lg:order-1">
                    <div class="inline-block px-3 py-1 mb-4 text-sm font-semibold tracking-wider text-blue-600 uppercase bg-blue-100 rounded-full">
                        Hubungi Kami
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-6">
                        Siap Membantu Perjalanan <span class="text-blue-600">Belajar Anda.</span>
                    </h1>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-lg">
                        Apakah Anda memiliki pertanyaan tentang materi VB-MAPP, kendala teknis, atau ingin berkonsultasi mengenai program ABATI? Tim kami siap menjawab pesan Anda.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/6282299385608?text=Halo%20Admin%20MediLearn,%20saya%20ingin%20bertanya%20tentang..." target="_blank"
                            class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white transition-all duration-200 bg-green-500 rounded-xl hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg shadow-green-500/30 hover:-translate-y-1">
                            <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            Chat via WhatsApp
                        </a>
                    </div>

                    <div class="mt-8 pt-8 border-t border-slate-200 grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Jam Operasional</h3>
                            <p class="text-sm text-slate-500 mt-1">Senin - Jumat: 09.00 - 17.00</p>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                    <img src="img/contact-us.png"
                        alt="Customer Service Team"
                        class="w-full max-w-lg h-auto shadow-lg ">
                </div>
            </div>
        </div>
    </div>

</body>

</html>