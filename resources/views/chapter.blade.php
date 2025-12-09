<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $course['title'] }} - {{ $chapter['title'] }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    @php $next = $index < $total ? $index + 1 : null; @endphp
        </head>

<body class="bg-slate-50 font-sans antialiased text-slate-800">

    @include('navbar')

    <div class="mx-auto max-w-[980px] p-6 pt-[100px]">

        <a href="{{ route('course.show', $slug) }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium no-underline transition-colors">
            ← Kembali ke Daftar Bab
        </a>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm mt-3 p-4">
            <div class="text-slate-500 text-xs">
                {{ $course['title'] }} › {{ $chapter['title'] }}
            </div>
            <div class="mt-2 font-bold text-gray-900">
                Bagian {{ $index }} dari {{ $total }}
            </div>
            <div class="h-1.5 w-full bg-gray-200 rounded-full mt-1.5 overflow-hidden">
                <div class="h-full bg-green-500 transition-all duration-500 ease-out" style="width: {{ $progressPct }}%"></div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm mt-4 p-4">
            <div class="flex items-center gap-2.5 mb-4">
                <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center shrink-0">
                    📘
                </div>
                <div class="font-extrabold text-gray-900 text-lg">
                    {{ $chapter['title'] }}
                </div>
            </div>

            <div class="space-y-4">
                @foreach(($chapter['content'] ?? []) as $p)
                <p class="text-slate-700 text-sm leading-relaxed">
                    {{ $p }}
                </p>
                @endforeach

                @if(empty($chapter['content']))
                <p class="text-slate-700 text-sm leading-relaxed italic">
                    Konten bab ini sedang disusun.
                </p>
                @endif
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm mt-4 p-3 flex justify-between items-center">
            <div class="text-slate-500 text-sm">
                Lanjutkan ke bagian berikutnya
            </div>

            @if($next)
            <a class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium rounded-lg px-3 py-2 transition-colors duration-200"
                href="{{ route('course.chapter', ['slug'=>$slug,'index'=>$next]) }}">
                Selanjutnya →
            </a>
            @else
            <a class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium rounded-lg px-3 py-2 transition-colors duration-200"
                href="{{ route('course.show', $slug) }}">
                Kembali ke Daftar Bab
            </a>
            @endif
        </div>
    </div>
</body>

</html>