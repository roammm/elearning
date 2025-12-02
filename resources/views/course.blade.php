<!DOCTYPE html>
<html lang="id">
@php
    $isPresentation = isset($course['type']) && $course['type'] === 'ppt' && !empty($course['file']);
    $presentationPdf = $isPresentation ? ($course['pdf'] ?? null) : null;
    $quizResult = session('quiz_result');
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $course['title'] }} - MediLearn</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body{font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; background:#f5f7fb}
        .container{max-width:980px;margin:0 auto;padding:24px}
        .navbar{display:flex;align-items:center;justify-content:space-between;padding:16px 24px;background:#ffffff;border-bottom:1px solid #e5e7eb}
        .nav-links{display:flex;gap:20px;align-items:center}
        .nav-links a{color:#2563eb;font-weight:500;text-decoration:none}
        .card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;box-shadow:0 1px 2px rgba(0,0,0,.04)}
        .header{padding:16px}
        .progress{height:8px;background:#e5e7eb;border-radius:999px;overflow:hidden}
        .progress .bar{height:100%;background:#2563eb}
        .list{margin-top:16px}
        .item{display:flex;justify-content:space-between;align-items:center;padding:14px 16px;border-top:1px solid #e5e7eb}
        .item:first-child{border-top:none}
        .left{display:flex;gap:12px;align-items:flex-start}
        .icon{width:36px;height:36px;border-radius:999px;background:#f1f5f9;border:1px solid #cbd5e1;display:flex;align-items:center;justify-content:center;color:#2563eb}
        .time{color:#94a3b8;font-size:12px}
        .badge{font-size:11px;color:#16a34a;background:#dcfce7;border-radius:999px;padding:2px 8px}
        .btn{background:#1d4ed8;color:#fff;border:none;border-radius:8px;padding:8px 12px;cursor:pointer}
        .btn.secondary{background:#0ea5e9}
    </style>
    @if($isPresentation)
        <style>
            .pdf-frame {
                width: 100%;
                min-height: 700px;
                border: none;
                border-radius: 8px;
            }
        </style>
    @endif
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <a href="{{ route('home') }}" style="color:#64748b;text-decoration:none">← Kembali ke Modul</a>
        <div class="card" style="margin-top:12px">
            <div class="header">
                <div style="font-weight:800;font-size:18px">{{ $course['title'] }}</div>
                <div style="color:#64748b;font-size:14px">{{ $course['subtitle'] }}</div>
                @if(($course['type'] ?? 'standard') === 'standard')
                <div style="margin-top:10px">
                    <div style="display:flex;justify-content:space-between;color:#64748b;font-size:12px;margin-bottom:4px">
                        <div>Progress Pembelajaran</div>
                        <div>{{ $doneCount }}/{{ $total }} Bab Selesai</div>
                    </div>
                    <div class="progress"><div class="bar" style="width: {{ $progressPct }}%"></div></div>
                </div>
                @endif
            </div>
        </div>

        @if($quizResult)
            <div class="card" style="margin-top:16px;padding:16px;border:1px solid #bfdbfe;background:#eff6ff">
                <div style="font-weight:700;color:#1d4ed8">Kuis berhasil dikumpulkan</div>
                <div style="margin-top:6px;color:#1e3a8a">
                    Skor Anda: {{ $quizResult['score'] }} / {{ $quizResult['total'] }} ({{ $quizResult['percentage'] }}%)
                </div>
            </div>
        @endif

        @if(!empty($completion))
            <div class="card" style="margin-top:16px;padding:16px;border:1px solid #bbf7d0;background:#ecfdf5">
                <div style="font-weight:700;color:#15803d">Catatan skor terakhir</div>
                <div style="margin-top:6px;color:#065f46">
                    {{ $completion->score }} / {{ $completion->total_questions }} ({{ $completion->percentage }}%)
                </div>
                @if($completion->completed_at)
                    <div style="color:#047857;font-size:12px;margin-top:4px">
                        Diselesaikan pada {{ $completion->completed_at->format('d M Y H:i') }}
                    </div>
                @endif
            </div>
        @endif

        @if ($errors->any())
            <div class="card" style="margin-top:16px;padding:14px;border:1px solid #fecaca;background:#fee2e2;color:#b91c1c">
                Pastikan semua pertanyaan telah dijawab sebelum mengumpulkan kuis.
            </div>
        @endif

        @if($isPresentation)
            <div class="card" style="margin-top:16px;padding:16px">
                <div style="font-weight:600;margin-bottom:12px">Materi Presentasi</div>
                @if($presentationPdf)
                    <iframe src="{{ asset($presentationPdf) }}#toolbar=1&navpanes=0&scrollbar=1" class="pdf-frame"></iframe>
                    <div style="margin-top:12px">
                        <a href="{{ asset($presentationPdf) }}" class="btn" target="_blank">Unduh (PDF)</a>
                        <a href="{{ asset($course['file']) }}" class="btn btn-secondary" target="_blank">Unduh (PowerPoint)</a>
                    </div>
                @else
                    <p>Materi belum tersedia.</p>
                @endif
            </div>

            @if(!empty($course['quiz']) && count($course['quiz']) > 0)
                <div class="card" style="margin-top:16px;padding:16px;display:flex;align-items:center;justify-content:space-between">
                    <div>
                        <div style="font-weight:700">Kuis Akhir Modul</div>
                        <div style="color:#64748b;font-size:12px">Selesaikan kuis untuk mendapatkan sertifikat</div>
                            </div>
                    <a class="btn" href="{{ route('course.quiz.show', $slug) }}">Mulai Kuis</a>
                </div>
            @endif
        @else
            <div class="list">
                @foreach ($course['chapters'] as $chapter)
                    <a class="card item" href="{{ route('course.chapter.part', ['slug'=>$slug,'chapterIndex'=>$loop->iteration,'partIndex'=>1]) }}" style="text-decoration:none;color:inherit">
                        <div class="left">
                            <div class="icon">📘</div>
                            <div>
                                <div style="font-weight:700">{{ $chapter['title'] }}</div>
                                <div style="color:#64748b;font-size:12px">{{ $chapter['desc'] }}</div>
                                @if($chapter['done'])
                                    <span class="badge">Selesai</span>
                                @endif
                            </div>
                        </div>
                        <div class="time">{{ $chapter['duration'] }}</div>
                    </a>
                @endforeach
            </div>

            @if(!empty($course['quiz']) && count($course['quiz']) > 0)
            <div class="card" style="margin-top:16px;padding:14px;display:flex;align-items:center;justify-content:space-between">
                <div>
                    <div style="font-weight:700">Kuis Akhir Modul</div>
                    <div style="color:#64748b;font-size:12px">Selesaikan kuis untuk mendapatkan sertifikat</div>
                </div>
                    <a class="btn" href="{{ route('course.quiz.show', $slug) }}">Mulai Kuis</a>
            </div>
            @endif
        @endif
    </div>
</body>
</html>


