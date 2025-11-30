<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediLearn - Leaderboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body{font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; background:#f5f7fb}
        .container{max-width:980px;margin:0 auto;padding:24px}
        .navbar{display:flex;align-items:center;justify-content:space-between;padding:16px 24px;background:#ffffff;border-bottom:1px solid #e5e7eb}
        .nav-links{display:flex;gap:20px;align-items:center}
        .nav-links a{color:#2563eb;font-weight:500;text-decoration:none}
        .title{font-size:28px;font-weight:800;text-align:center;margin:18px 0 6px}
        .subtitle{text-align:center;color:#64748b;margin-bottom:18px}
        .grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:18px}
        .podium{background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:16px;box-shadow:0 1px 2px rgba(0,0,0,.04)}
        .podium.gold{outline:2px solid #facc15}
        .podium.silver{outline:2px solid #cbd5e1}
        .podium.bronze{outline:2px solid #f59e0b}
        .podium .initial{width:48px;height:48px;border-radius:999px;border:2px solid #cbd5e1;display:flex;align-items:center;justify-content:center;margin:0 auto 6px;background:#f8fafc;font-weight:700}
        .podium.gold .initial{border-color:#facc15}
        .podium.bronze .initial{border-color:#f59e0b}
        .podium .name{text-align:center;font-weight:600}
        .podium .score{text-align:center;color:#0f172a;font-weight:800}
        .list{background:#fff;border:1px solid #e5e7eb;border-radius:12px;overflow:hidden}
        .row{display:grid;grid-template-columns:40px 1fr 90px;align-items:center;padding:10px 12px;border-top:1px solid #e5e7eb}
        .row:first-child{border-top:none}
        .rank{display:flex;align-items:center;justify-content:center;color:#64748b}
        .name{font-weight:600}
        .pts{text-align:right;color:#1d4ed8;font-weight:700}
        .note{margin-top:14px;background:#fff;border:1px dashed #cbd5e1;border-radius:12px;padding:12px;color:#64748b}
    </style>
</head>
<body>
    @include('navbar')
    <div class="container" style="padding-top:100px">
        <div class="title">Leaderboard</div>
        <div class="subtitle">Peringkat peserta berdasarkan total skor dan modul yang diselesaikan</div>

        @php
            $podiumSlots = [
                ['class' => 'silver', 'entry' => $leaders->get(1)],
                ['class' => 'gold', 'entry' => $leaders->get(0)],
                ['class' => 'bronze', 'entry' => $leaders->get(2)],
            ];
        @endphp

        <div class="grid3">
            @foreach ($podiumSlots as $slot)
                <div class="podium {{ $slot['class'] }}">
                    @if($slot['entry'])
                        <div class="initial">{{ $slot['entry']->initials }}</div>
                        <div class="name">{{ $slot['entry']->name }}</div>
                        <div class="score">{{ number_format($slot['entry']->total_score) }}</div>
                        <div style="text-align:center;color:#64748b;font-size:12px">
                            {{ $slot['entry']->completions }} modul • {{ $slot['entry']->percentage }}%
                        </div>
                    @else
                        <div class="initial">—</div>
                        <div class="name">Peserta</div>
                        <div class="score">0</div>
                        <div style="text-align:center;color:#64748b;font-size:12px">Belum ada data</div>
                    @endif
                </div>
            @endforeach
        </div>

        @if($leaders->isEmpty())
            <div class="note">Belum ada skor yang tercatat. Selesaikan kuis akhir modul pertama Anda untuk muncul di leaderboard.</div>
        @else
            <div class="list">
                @foreach ($leaders as $index => $leader)
                    @continue($index < 3)
                    <div class="row">
                        <div class="rank">{{ $index + 1 }}</div>
                        <div>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:26px;height:26px;border-radius:999px;background:#f1f5f9;border:1px solid #cbd5e1;display:flex;align-items:center;justify-content:center;font-size:12px">
                                    {{ $leader->initials }}
                                </div>
                                <div class="name">{{ $leader->name }}</div>
                            </div>
                            <div style="color:#94a3b8;font-size:12px;margin-left:36px">
                                {{ $leader->completions }} modul • {{ $leader->percentage }}%
                            </div>
                        </div>
                        <div class="pts">
                            {{ number_format($leader->total_score) }}
                            <span style="color:#94a3b8;font-size:12px;font-weight:500"> pts</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="note">
                @if($currentUserEntry)
                    Posisi Anda: <strong>#{!! $currentUserPosition !!}</strong><br>
                    Total skor {{ number_format($currentUserEntry->total_score) }} dari {{ $currentUserEntry->completions }} modul.
                @else
                    Anda belum memiliki skor. Selesaikan kuis akhir modul VB-MAPP untuk mulai bersaing di leaderboard!
                @endif
            </div>
        @endif
    </div>
</body>
</html>


