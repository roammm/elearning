<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediLearn - Profile</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body{font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; background:#f5f7fb}
        .container{max-width:980px;margin:0 auto;padding:24px}
        .navbar{display:flex;align-items:center;justify-content:space-between;padding:16px 24px;background:#ffffff;border-bottom:1px solid #e5e7eb}
        .nav-links{display:flex;gap:20px;align-items:center}
        .nav-links a{color:#2563eb;font-weight:500;text-decoration:none}
        .card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;box-shadow:0 1px 2px rgba(0,0,0,.04)}
        .header{display:flex;gap:16px;padding:18px}
        .avatar{width:56px;height:56px;border-radius:999px;background:#e2e8f0;display:flex;align-items:center;justify-content:center;font-weight:700;color:#0f172a}
        .metrics{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:14px}
        .metric{padding:14px}
        .metric .label{color:#64748b;font-size:13px;margin-bottom:6px}
        .metric .value{font-weight:800;color:#0f172a}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:16px}
        .section{padding:14px}
        .section-title{font-weight:700;margin-bottom:8px}
        .item{display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-top:1px solid #e5e7eb}
        .item:first-child{border-top:none}
        .bar{height:8px;background:#e5e7eb;border-radius:999px;overflow:hidden}
        .bar .fill{height:100%;background:#22c55e}
        .btn{background:#0ea5e9;color:#fff;border:none;border-radius:8px;padding:8px 12px;cursor:pointer}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <div class="card">
            <div class="header">
                <div class="avatar">{{ strtoupper(substr($user->name ?? 'U',0,1)) }}</div>
                <div>
                    <div style="font-weight:800">{{ $user->name }}</div>
                    <div style="color:#64748b;font-size:14px">{{ $user->email }}</div>
                </div>
                <div style="margin-left:auto">
                    <button class="btn">Edit Profile</button>
                </div>
            </div>
            <div class="metrics">
                @foreach ($metrics as $metric)
                    <div class="metric">
                        <div class="label">{{ $metric['label'] }}</div>
                        <div class="value">{{ $metric['value'] }}</div>
                        <div class="bar"><div class="fill" style="width: {{ $metric['progress'] }}%"></div></div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid">
            <div class="card section">
                <div class="section-title">Aktivitas Terkini</div>
                @forelse ($recentActivities as $activity)
                    <div class="item">
                        <div>
                            <div>{{ $activity['title'] }}</div>
                            <div style="color:#94a3b8;font-size:12px">{{ $activity['time'] }}</div>
                        </div>
                        <div style="color:#2563eb">{{ $activity['percentage'] }}%</div>
                    </div>
                @empty
                    <div class="item" style="color:#94a3b8">Belum ada aktivitas. Selesaikan kuis pertama Anda untuk memulai riwayat.</div>
                @endforelse
            </div>
            <div class="card section">
                <div class="section-title">Pencapaian</div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
                    @foreach ($achievements as $achievement)
                        <div class="card section" style="padding:10px;{{ $achievement['achieved'] ? '' : 'opacity:.5' }}">
                            <div style="font-weight:700">{{ $achievement['title'] }}</div>
                            <div style="color:#64748b;font-size:12px">{{ $achievement['desc'] }}</div>
                            @if($achievement['achieved'])
                                <div style="color:#16a34a;font-size:12px;margin-top:4px">Tercapai</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card section" style="margin-top:16px">
            <div class="section-title">Progress Pembelajaran</div>
            @forelse ($progressList as $progress)
                <div class="item" style="flex-direction:column;align-items:flex-start">
                    <div style="display:flex;justify-content:space-between;width:100%">
                        <span>{{ $progress['title'] }}</span>
                        <span style="color:#94a3b8;font-size:12px">{{ $progress['status'] }}</span>
                    </div>
                    <div class="bar" style="width:100%"><div class="fill" style="width: {{ $progress['percentage'] }}%"></div></div>
                </div>
            @empty
                <div class="item" style="color:#94a3b8">Belum ada modul dalam katalog.</div>
            @endforelse
        </div>

        @if($currentUserPosition)
            <div class="card section" style="margin-top:16px;color:#0f172a">
                <div class="section-title">Status Leaderboard</div>
                <div>Posisi saat ini: <strong>#{{ $currentUserPosition }}</strong></div>
                <div style="color:#64748b;font-size:14px">Tambah poin dari kuis untuk naik peringkat.</div>
            </div>
        @endif
    </div>
</body>
</html>


