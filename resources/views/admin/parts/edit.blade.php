<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Part - Admin</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body{font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; background:#f5f7fb; margin:0; padding:0}
        .container{max-width:800px;margin:0 auto;padding:0 24px}
        .page-header{margin-bottom:32px;padding-top:40px}
        .page-title{font-size:32px;font-weight:800;color:#1f2937;margin-bottom:8px}
        .card{background:#ffffff;border:1px solid #e5e7eb;border-radius:12px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.1)}
        .form-group{margin-bottom:24px}
        .form-label{display:block;font-weight:600;color:#1f2937;margin-bottom:8px;font-size:14px}
        .form-input{width:100%;padding:12px 16px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;transition:border-color 0.2s}
        .form-input:focus{outline:none;border-color:#2563eb}
        .form-textarea{width:100%;padding:12px 16px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;min-height:200px;resize:vertical;font-family:monospace}
        .form-textarea:focus{outline:none;border-color:#2563eb}
        .form-help{color:#6b7280;font-size:12px;margin-top:4px}
        .btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;background:#2563eb;color:#fff;border:none;border-radius:8px;text-decoration:none;font-weight:500;cursor:pointer;transition:background 0.2s}
        .btn:hover{background:#1d4ed8}
        .btn-secondary{background:#6b7280}
        .btn-secondary:hover{background:#4b5563}
        .error{color:#ef4444;font-size:12px;margin-top:4px}
        @media (max-width:640px){.container{padding:0 16px}.card{padding:24px}}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <div class="page-header">
            <h1 class="page-title">Edit Part</h1>
        </div>

        <div class="card">
            <form action="{{ route('admin.parts.update', $part) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $part->title) }}" required>
                    @error('title')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Content (JSON Array)</label>
                    <textarea name="content" class="form-textarea">@if($part->content){{ json_encode($part->content, JSON_PRETTY_PRINT) }}@endif</textarea>
                    <div class="form-help">Masukkan array JSON untuk konten. Contoh: ["Paragraf 1", "Paragraf 2"]</div>
                    @error('content')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Order *</label>
                    <input type="number" name="order" class="form-input" value="{{ old('order', $part->order) }}" min="0" required>
                    @error('order')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div style="display:flex;gap:12px;margin-top:32px">
                    <button type="submit" class="btn">Update</button>
                    <a href="{{ route('admin.parts', $part->chapter) }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

