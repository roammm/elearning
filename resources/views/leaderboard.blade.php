<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediLearn - Leaderboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased my-10">
    @include('navbar')

    <div class="max-w-[980px] mx-auto px-6 pt-[100px] pb-6">
        <h1 class="text-3xl font-extrabold text-center text-slate-900 mb-2">Leaderboard</h1>
        <div class="text-center text-slate-500 mb-8">Peringkat peserta berdasarkan total skor dan modul yang diselesaikan</div>

        @php
        $podiumSlots = [
        ['color' => 'border-slate-300 shadow-slate-200', 'ring' => 'ring-slate-300', 'bg_initial' => 'bg-slate-50', 'entry' => $leaders->get(1)], // Silver
        ['color' => 'border-yellow-400 shadow-yellow-100', 'ring' => 'ring-yellow-400', 'bg_initial' => 'bg-yellow-50', 'entry' => $leaders->get(0)], // Gold
        ['color' => 'border-orange-400 shadow-orange-100', 'ring' => 'ring-orange-400', 'bg_initial' => 'bg-orange-50', 'entry' => $leaders->get(2)], // Bronze
        ];
        @endphp

        <div class="grid grid-cols-3 gap-4 mb-8 items-end">
            @foreach ($podiumSlots as $index => $slot)
            <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col items-center {{ $slot['color'] }} {{ $index == 1 ? 'order-2 h-full py-8' : ($index == 0 ? 'order-1 mt-8' : 'order-3 mt-12') }}">
                @if($slot['entry'])
                <div class="w-12 h-12 rounded-full border-2 {{ $slot['ring'] }} flex items-center justify-center font-bold text-slate-700 mb-3 {{ $slot['bg_initial'] }}">
                    {{ $slot['entry']->initials }}
                </div>
                <div class="font-semibold text-center text-slate-900 text-sm mb-1 line-clamp-1">{{ $slot['entry']->name }}</div>
                <div class="font-extrabold text-slate-900 text-xl mb-1">{{ number_format($slot['entry']->total_score) }}</div>
                <div class="text-center text-slate-400 text-xs">
                    {{ $slot['entry']->completions }} modul • {{ $slot['entry']->percentage }}%
                </div>
                @else
                <div class="w-12 h-12 rounded-full border-2 border-slate-200 bg-slate-50 flex items-center justify-center font-bold text-slate-300 mb-3">—</div>
                <div class="font-semibold text-center text-slate-400 text-sm mb-1">Peserta</div>
                <div class="font-extrabold text-slate-300 text-xl mb-1">0</div>
                <div class="text-center text-slate-300 text-xs">Belum ada data</div>
                @endif
            </div>
            @endforeach
        </div>

        @if($leaders->isEmpty())
        <div class="bg-white border border-dashed border-slate-300 rounded-xl p-4 text-slate-500 text-center text-sm">
            Belum ada skor yang tercatat. Selesaikan kuis akhir modul pertama Anda untuk muncul di leaderboard.
        </div>
        @else

        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
            @foreach ($leaders as $index => $leader)
            @continue($index < 3) <div class="grid grid-cols-[40px_1fr_90px] items-center px-4 py-3 border-t border-slate-100 first:border-t-0 hover:bg-slate-50 transition">
                <div class="text-slate-500 font-medium text-center">{{ $index + 1 }}</div>
                <div>
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-xs font-semibold text-slate-600 shrink-0">
                            {{ $leader->initials }}
                        </div>
                        <div class="font-semibold text-slate-800 text-sm truncate">{{ $leader->name }}</div>
                    </div>
                    <div class="text-slate-400 text-xs mt-0.5 ml-10">
                        {{ $leader->completions }} modul • {{ $leader->percentage }}%
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-bold text-blue-700">{{ number_format($leader->total_score) }}</div>
                    <span class="text-slate-400 text-xs font-medium">pts</span>
                </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6 bg-white border border-dashed border-slate-300 rounded-xl p-4 text-slate-600 text-sm shadow-sm">
        @if($currentUserEntry)
        <div class="flex items-center gap-2">
            <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs font-bold">ANDA</span>
            <span>Posisi Anda: <strong class="text-slate-900">#{!! $currentUserPosition !!}</strong></span>
        </div>
        <div class="mt-1 text-slate-500">
            Total skor {{ number_format($currentUserEntry->total_score) }} dari {{ $currentUserEntry->completions }} modul.
        </div>
        @else
        Anda belum memiliki skor. Selesaikan kuis akhir modul VB-MAPP untuk mulai bersaing di leaderboard!
        @endif
    </div>
    @endif
    </div>
</body>

</html>