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
    <style>
        body{font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji'; background:#f5f7fb; margin:0; padding:0}
        .container{max-width:1200px;margin:0 auto;padding:0 24px}
        .page-header{margin-bottom:40px;padding-top:40px}
        .page-title{font-size:32px;font-weight:800;color:#1f2937;margin-bottom:8px}
        .page-subtitle{font-size:16px;color:#6b7280}
        .grid{display:grid;grid-template-columns:repeat(2,1fr);gap:24px;margin-bottom:40px}
        .card{background:#ffffff;border:1px solid #e5e7eb;border-radius:12px;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,0.1);position:relative}
        .card-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:16px}
        .card-icon{width:32px;height:32px;background:#e0f2fe;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#0369a1;font-size:16px}
        .badge{font-size:12px;background:#dcfce7;color:#166534;border-radius:20px;padding:4px 12px;font-weight:500}
        .card-title{font-size:18px;font-weight:700;color:#1f2937;margin-bottom:8px;line-height:1.3}
        .card-desc{color:#6b7280;font-size:14px;margin-bottom:16px;line-height:1.5}
        .card-meta{display:flex;align-items:center;gap:16px;color:#6b7280;font-size:13px;margin-bottom:16px}
        .card-meta span{display:flex;align-items:center;gap:4px}
        .progress-section{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}
        .progress-label{font-size:12px;color:#6b7280;font-weight:500}
        .progress-bar{width:100%;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden;margin-bottom:4px}
        .progress-fill{height:100%;background:#22c55e;transition:width 0.3s ease}
        .progress-text{font-size:12px;color:#6b7280;text-align:right}
        .card-actions{margin-top:16px}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;background:#2563eb;color:#fff;border:none;border-radius:8px;padding:10px 16px;cursor:pointer;text-decoration:none;font-weight:500;font-size:14px;transition:background 0.2s}
        .btn:hover{background:#1d4ed8}
        .btn-success{background:#22c55e}
        .btn-success:hover{background:#16a34a}
        .btn-icon{width:16px;height:16px}
        @media (max-width:1024px){.grid{grid-template-columns:1fr}}
        @media (max-width:640px){.container{padding:0 16px}.page-title{font-size:24px}.card{padding:20px}}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Modul E-Learning</h1>
            <p class="page-subtitle">Pilih modul untuk memulai pembelajaran Anda</p>
        </div>

        <!-- Modules Grid -->
        <div class="grid">
            @foreach($modules as $module)
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">📚</div>
                    <span class="badge">{{ $module['badge'] }}</span>
                </div>
                
                <h3 class="card-title">{{ $module['title'] }}</h3>
                <p class="card-desc">{{ $module['desc'] }}</p>
                
                <div class="card-meta">
                    <span>⏱️ {{ $module['hours'] }}</span>
                    <span>📚 {{ $module['lessons'] }}</span>
                </div>
                
                <div class="progress-section">
                    <span class="progress-label">Progress</span>
                    <span class="progress-text">{{ $module['progress'] }}%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ $module['progress'] }}%"></div>
                </div>
                
                <div class="card-actions">
                    @if($module['progress'] == 100)
                        <a href="{{ route('course.show', $module['slug']) }}" class="btn btn-success">
                            <svg class="btn-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $module['cta'] }}
                        </a>
                    @else
                        <a href="{{ route('course.show', $module['slug']) }}" class="btn">
                            <svg class="btn-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $module['cta'] }}
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>


