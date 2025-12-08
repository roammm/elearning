<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $course['title'] }} - {{ $chapter['title'] }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body {
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial;
            background: #f5f7fb
        }

        .container {
            max-width: 980px;
            margin: 0 auto;
            padding: 24px
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center
        }

        .nav-links a {
            color: #2563eb;
            font-weight: 500;
            text-decoration: none
        }

        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04)
        }

        .progress {
            height: 6px;
            background: #e5e7eb;
            border-radius: 999px;
            overflow: hidden
        }

        .progress .bar {
            height: 100%;
            background: #22c55e
        }

        .btn {
            background: #1d4ed8;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer
        }
    </style>
    @php $next = $index < $total ? $index + 1 : null; @endphp
        </head>

<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <a href="{{ route('course.show', $slug) }}" style="color:#64748b;text-decoration:none">← Kembali ke Daftar Bab</a>

        <div class="card" style="margin-top:12px;padding:16px">
            <div style="color:#64748b;font-size:12px">{{ $course['title'] }} › {{ $chapter['title'] }}</div>
            <div style="margin-top:8px;font-weight:700">Bagian {{ $index }} dari {{ $total }}</div>
            <div class="progress" style="margin-top:6px">
                <div class="bar" style="width: {{ $progressPct }}%"></div>
            </div>
        </div>

        <div class="card" style="margin-top:16px;padding:16px">
            <div style="display:flex;gap:10px;align-items:center;margin-bottom:8px">
                <div style="width:32px;height:32px;border-radius:999px;background:#e0f2fe;color:#0284c7;display:flex;align-items:center;justify-content:center">📘</div>
                <div style="font-weight:800">{{ $chapter['title'] }}</div>
            </div>

            @foreach(($chapter['content'] ?? []) as $p)
            <p style="color:#334155;font-size:14px;line-height:22px">{{ $p }}</p>
            @endforeach

            @if(empty($chapter['content']))
            <p style="color:#334155;font-size:14px;line-height:22px">Konten bab ini sedang disusun.</p>
            @endif
        </div>

        <div class="card" style="margin-top:16px;padding:12px;display:flex;justify-content:space-between;align-items:center">
            <div style="color:#64748b">Lanjutkan ke bagian berikutnya</div>
            @if($next)
            <a class="btn" href="{{ route('course.chapter', ['slug'=>$slug,'index'=>$next]) }}">Selanjutnya →</a>
            @else
            <a class="btn" href="{{ route('course.show', $slug) }}">Kembali ke Daftar Bab</a>
            @endif
        </div>
    </div>
</body>

</html>