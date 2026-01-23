<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediLearn - Profile</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased my-10">
    @include('navbar')

    <div class="max-w-[980px] mx-auto px-6 pt-[100px] pb-6">

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm mb-6">
            <div class="flex items-center gap-4 p-5 border-b border-slate-100">
                <div class="w-14 h-14 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-900 text-xl shrink-0">
                    {{ strtoupper(substr($user->name ?? 'U',0,1)) }}
                </div>
                <div>
                    <div class="font-extrabold text-lg text-slate-900">{{ $user->name }}</div>
                    <div class="text-slate-500 text-sm">{{ $user->email }}</div>
                </div>
                <div class="ml-auto">
                    <a href="{{ route('profile.edit') }}" class="bg-sky-500 text-white border-none rounded-lg px-4 py-2 text-sm font-medium hover:bg-sky-600 transition inline-block">
                        Edit Profile
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-5">
                @foreach ($metrics as $metric)
                <div class="p-3">
                    <div class="text-slate-500 text-xs mb-1.5 font-medium uppercase tracking-wide">{{ $metric['label'] }}</div>
                    <div class="font-extrabold text-slate-900 text-2xl mb-2">{{ $metric['value'] }}</div>
                    <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full" style="width: {{ $metric['progress'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 h-full">
                <div class="font-bold text-slate-900 mb-4 text-base">Aktivitas Terkini</div>
                @forelse ($recentActivities as $activity)
                <div class="flex justify-between items-center py-3 border-t border-slate-100 first:border-t-0">
                    <div>
                        <div class="font-medium text-slate-800 text-sm">{{ $activity['title'] }}</div>
                        <div class="text-slate-400 text-xs mt-0.5">{{ $activity['time'] }}</div>
                    </div>
                    <div class="text-blue-600 font-semibold text-sm">{{ $activity['percentage'] }}%</div>
                </div>
                @empty
                <div class="py-3 text-slate-400 text-sm italic text-center">Belum ada aktivitas. Selesaikan kuis pertama Anda untuk memulai riwayat.</div>
                @endforelse
            </div>

            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 h-full">
                <div class="font-bold text-slate-900 mb-4 text-base">Pencapaian</div>
                <div class="grid grid-cols-2 gap-3">
                    @foreach ($achievements as $achievement)
                    <div class="bg-slate-50 border border-slate-100 rounded-lg p-3 {{ $achievement['achieved'] ? 'opacity-100 ring-1 ring-green-100' : 'opacity-50 grayscale' }}">
                        <div class="font-bold text-slate-800 text-sm mb-1">{{ $achievement['title'] }}</div>
                        <div class="text-slate-500 text-xs leading-snug">{{ $achievement['desc'] }}</div>
                        @if($achievement['achieved'])
                        <div class="text-green-600 text-xs font-semibold mt-2 flex items-center gap-1">
                            <span>✓</span> Tercapai
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 mb-6">
            <div class="font-bold text-slate-900 mb-4 text-base">Progress Pembelajaran</div>
            @forelse ($progressList as $progress)
            <div class="flex flex-col items-start w-full py-3 border-t border-slate-100 first:border-t-0 gap-2">
                <div class="flex justify-between w-full">
                    <span class="font-medium text-slate-800 text-sm">{{ $progress['title'] }}</span>
                    <span class="text-slate-400 text-xs font-medium">{{ $progress['status'] }}</span>
                </div>
                <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-green-500 rounded-full" style="width: {{ $progress['percentage'] }}%"></div>
                </div>
            </div>
            @empty
            <div class="py-3 text-slate-400 text-sm italic text-center">Belum ada modul dalam katalog.</div>
            @endforelse
        </div>

        @if($currentUserPosition)
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 text-slate-800">
            <div class="font-bold text-slate-900 mb-2 text-base">Status Leaderboard</div>
            <div class="text-sm mb-1">Posisi saat ini: <strong class="text-blue-600 font-bold text-lg">#{{ $currentUserPosition }}</strong></div>
            <div class="text-slate-500 text-sm">Tambah poin dari kuis untuk naik peringkat.</div>
        </div>
        @endif

    </div>
</body>

</html>