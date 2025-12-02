<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Quiz Questions - Admin</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body{font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; background:#f5f7fb; margin:0; padding:0}
        .container{max-width:1200px;margin:0 auto;padding:0 24px}
        .page-header{margin-bottom:32px;padding-top:40px}
        .page-title{font-size:32px;font-weight:800;color:#1f2937;margin-bottom:8px}
        .btn{display:inline-flex;align-items:center;gap:8px;padding:12px 20px;background:#2563eb;color:#fff;border:none;border-radius:8px;text-decoration:none;font-weight:500;cursor:pointer;transition:background 0.2s}
        .btn:hover{background:#1d4ed8}
        .btn-danger{background:#ef4444}
        .btn-danger:hover{background:#dc2626}
        .btn-secondary{background:#6b7280}
        .btn-secondary:hover{background:#4b5563}
        .card{background:#ffffff;border:1px solid #e5e7eb;border-radius:12px;padding:24px;margin-bottom:16px;box-shadow:0 1px 3px rgba(0,0,0,0.1)}
        .card-title{font-size:18px;font-weight:700;color:#1f2937;margin-bottom:8px}
        .card-options{color:#6b7280;font-size:14px;margin-bottom:8px}
        .card-answer{color:#22c55e;font-size:14px;font-weight:600;margin-bottom:16px}
        .card-meta{color:#6b7280;font-size:13px;margin-bottom:16px}
        .card-actions{display:flex;gap:8px;flex-wrap:wrap}
        .alert{padding:16px;border-radius:8px;margin-bottom:24px}
        .alert-success{background:#dcfce7;color:#166534;border:1px solid #bbf7d0}
        @media (max-width:640px){.container{padding:0 16px}.page-header{flex-direction:column;align-items:flex-start;gap:16px}}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <div class="page-header">
            <div>
                <h1 class="page-title">{{ $quizName }} - {{ $course->title }}</h1>
                <p style="color:#6b7280">Kelola soal-soal untuk quiz ini</p>
            </div>
            <a href="{{ route('admin.quizzes.create', $course) }}?quiz_name={{ urlencode($quizName) }}" class="btn">+ Tambah Soal</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @forelse($quizzes as $quiz)
        <div class="card">
            <div class="card-title">Soal {{ $loop->iteration }}: {{ $quiz->question }}</div>
            <div class="card-options">
                @foreach($quiz->options as $option)
                    <div>• {{ $option }}</div>
                @endforeach
            </div>
            <div class="card-answer">✓ Jawaban: {{ $quiz->answer }}</div>
            <div class="card-meta">Order: {{ $quiz->order }}</div>
            <div class="card-actions">
                <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="btn">Edit</a>
                <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus soal ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @empty
        <div class="card">
            <p style="color:#6b7280;text-align:center;padding:40px">Belum ada soal untuk quiz ini. <a href="{{ route('admin.quizzes.create', $course) }}?quiz_name={{ urlencode($quizName) }}" style="color:#2563eb">Tambah soal pertama</a></p>
        </div>
        @endforelse

        <div style="margin-top:32px">
            <a href="{{ route('admin.quizzes', $course) }}" class="btn btn-secondary">← Kembali ke Quiz Groups</a>
        </div>
    </div>
</body>
</html>

