<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediLearn - E-Learning</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased">
    @include('navbar')

    <div class="max-w-[1200px] mx-auto px-6 pt-[100px] pb-10">

        <div class="mb-10 pt-5">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-2">Modul E-Learning</h1>
            <p class="text-slate-500 text-base">Pilih modul untuk memulai pembelajaran Anda</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
            @foreach($modules as $module)
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm relative flex flex-col h-full hover:shadow-md transition duration-200">

                <div class="flex items-start justify-between mb-4">
                    <div class="w-8 h-8 bg-sky-100 rounded-lg flex items-center justify-center text-sky-700 text-base">
                        📚
                    </div>
                    <span class="text-xs bg-green-100 text-green-800 rounded-full px-3 py-1 font-medium border border-green-200">
                        {{ $module['badge'] }}
                    </span>
                </div>

                <h3 class="text-lg font-bold text-gray-800 mb-2 leading-snug">{{ $module['title'] }}</h3>
                <p class="text-slate-500 text-sm mb-4 leading-relaxed line-clamp-2">{{ $module['desc'] }}</p>

                <div class="flex items-center gap-4 text-slate-500 text-[13px] mb-4">
                    <span class="flex items-center gap-1">⏱️ {{ $module['hours'] }}</span>
                    <span class="flex items-center gap-1">📚 {{ $module['lessons'] }}</span>
                </div>

                <div class="mt-auto">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs text-slate-500 font-medium">Progress</span>
                        <span class="text-xs text-slate-500 font-medium">{{ $module['progress'] }}%</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden mb-4">
                        <div class="h-full bg-green-500 rounded-full transition-all duration-300 ease-out" style="width: {{ $module['progress'] }}%"></div>
                    </div>

                    <div class="mt-4">
                        @if($module['progress'] == 100)
                        <a href="{{ route('course.show', $module['slug']) }}" class="inline-flex items-center justify-center gap-1.5 bg-green-500 text-white border-none rounded-lg px-4 py-2.5 text-sm font-medium cursor-pointer no-underline transition hover:bg-green-600 w-full sm:w-auto shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $module['cta'] }}
                        </a>
                        @else
                        <a href="{{ route('course.show', $module['slug']) }}" class="inline-flex items-center justify-center gap-1.5 bg-blue-600 text-white border-none rounded-lg px-4 py-2.5 text-sm font-medium cursor-pointer no-underline transition hover:bg-blue-700 w-full sm:w-auto shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $module['cta'] }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>