<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuis - {{ $course['title'] }} - MediLearn</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body{font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; background:#f5f7fb; margin:0; padding:0}
        .container{max-width:900px;margin:0 auto;padding:24px}
        .card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;box-shadow:0 1px 3px rgba(0,0,0,0.1);padding:32px;margin-bottom:20px}
        .quiz-header{margin-bottom:32px;padding-bottom:24px;border-bottom:2px solid #e5e7eb}
        .quiz-title{font-size:28px;font-weight:800;color:#1f2937;margin-bottom:8px}
        .quiz-subtitle{color:#6b7280;font-size:16px}
        .question-card{background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;padding:24px;margin-bottom:24px}
        .question-number{font-size:14px;font-weight:600;color:#2563eb;margin-bottom:8px}
        .question-text{font-size:18px;font-weight:600;color:#1f2937;margin-bottom:16px;line-height:1.5}
        .option-label{display:flex;align-items:center;padding:12px 16px;margin-bottom:8px;background:#fff;border:2px solid #e5e7eb;border-radius:8px;cursor:pointer;transition:all 0.2s}
        .option-label:hover{border-color:#2563eb;background:#eff6ff}
        .option-label input[type="radio"]{margin-right:12px;width:20px;height:20px;cursor:pointer}
        .option-label input[type="radio"]:checked + span{font-weight:600;color:#2563eb}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:14px 28px;background:#2563eb;color:#fff;border:none;border-radius:8px;font-weight:600;font-size:16px;cursor:pointer;text-decoration:none;transition:background 0.2s}
        .btn:hover{background:#1d4ed8}
        .btn-secondary{background:#6b7280}
        .btn-secondary:hover{background:#4b5563}
        .error{color:#ef4444;font-size:14px;margin-top:8px}
        @media (max-width:640px){.container{padding:16px}.card{padding:24px}.quiz-title{font-size:24px}}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <a href="{{ route('course.show', $slug) }}" style="color:#64748b;text-decoration:none;display:inline-flex;align-items:center;gap:8px;margin-bottom:24px">
            ← Kembali ke Course
        </a>

        <div class="card">
            <div class="quiz-header">
                <h1 class="quiz-title">Kuis Akhir Modul</h1>
                <p class="quiz-subtitle">{{ $course['title'] }}</p>
                <p class="quiz-subtitle" style="font-size:14px;margin-top:8px">Silakan jawab semua pertanyaan dengan benar</p>
            </div>

            @if ($errors->any())
                <div style="padding:16px;background:#fee2e2;border:1px solid #fecaca;border-radius:8px;color:#b91c1c;margin-bottom:24px">
                    <strong>Error:</strong> Pastikan semua pertanyaan telah dijawab sebelum mengumpulkan kuis.
                </div>
            @endif

            <form id="quiz-form" method="POST" action="{{ route('course.quiz.submit', $slug) }}">
                @csrf
                @foreach($quizzes as $index => $quiz)
                    <div class="question-card">
                        <div class="question-number">Pertanyaan {{ $index + 1 }} dari {{ count($quizzes) }}</div>
                        <div class="question-text">{{ $quiz['question'] }}</div>
                        @foreach($quiz['options'] as $option)
                            <label class="option-label">
                                <input type="radio"
                                       name="question{{ $index }}"
                                       value="{{ $option }}"
                                       @checked(old("question{$index}") === $option)
                                       required>
                                <span>{{ $option }}</span>
                            </label>
                        @endforeach
                        @error("question{$index}")
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <div style="display:flex;gap:12px;margin-top:32px;padding-top:24px;border-top:2px solid #e5e7eb">
                    <button type="submit" class="btn">Kumpulkan Jawaban</button>
                    <a href="{{ route('course.show', $slug) }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

