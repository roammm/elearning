<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Quiz - Admin</title>
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
        .form-textarea{width:100%;padding:12px 16px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;min-height:100px;resize:vertical}
        .form-textarea:focus{outline:none;border-color:#2563eb}
        .option-input{display:flex;align-items:center;margin-bottom:8px;gap:8px}
        .option-input .form-input{flex:1}
        .btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;background:#2563eb;color:#fff;border:none;border-radius:8px;text-decoration:none;font-weight:500;cursor:pointer;transition:background 0.2s}
        .btn:hover{background:#1d4ed8}
        .btn-secondary{background:#6b7280}
        .btn-secondary:hover{background:#4b5563}
        .btn-sm{padding:8px 16px;font-size:13px}
        .error{color:#ef4444;font-size:12px;margin-top:4px}
        @media (max-width:640px){.container{padding:0 16px}.card{padding:24px}}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <div class="page-header">
            <h1 class="page-title">Tambah Quiz - {{ $course->title }}</h1>
        </div>

        <div class="card">
            <form action="{{ route('admin.quizzes.store', $course) }}" method="POST" id="quiz-form">
                @csrf

                <div class="form-group">
                    <label class="form-label">Quiz Name *</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name', request('quiz_name', 'Quiz Akhir')) }}" required placeholder="Contoh: Quiz 1, Quiz 2, Quiz Akhir">
                    @error('name')<div class="error">{{ $message }}</div>@enderror
                    <p style="color:#6b7280;font-size:12px;margin-top:4px">Nama untuk mengelompokkan soal-soal quiz</p>
                </div>

                <div class="form-group">
                    <label class="form-label">Question *</label>
                    <textarea name="question" class="form-textarea" required>{{ old('question') }}</textarea>
                    @error('question')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Options * (Minimal 2)</label>
                    <div id="options-container">
                        <div class="option-input">
                            <input type="text" name="options[]" class="form-input" placeholder="Option 1" required>
                            <button type="button" onclick="removeOption(this)" class="btn btn-sm" style="background:#ef4444;margin-left:8px" disabled>Hapus</button>
                        </div>
                        <div class="option-input">
                            <input type="text" name="options[]" class="form-input" placeholder="Option 2" required>
                            <button type="button" onclick="removeOption(this)" class="btn btn-sm" style="background:#ef4444;margin-left:8px" disabled>Hapus</button>
                        </div>
                    </div>
                    <button type="button" onclick="addOption()" class="btn btn-sm" style="margin-top:8px">+ Tambah Option</button>
                    @error('options')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Correct Answer *</label>
                    <input type="text" name="answer" class="form-input" value="{{ old('answer') }}" required placeholder="Harus sama persis dengan salah satu option">
                    @error('answer')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Order *</label>
                    <input type="number" name="order" class="form-input" value="{{ old('order', 0) }}" min="0" required>
                    @error('order')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div style="display:flex;gap:12px;margin-top:32px">
                    <button type="submit" class="btn">Simpan</button>
                    <a href="{{ route('admin.quizzes', $course) }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addOption() {
            const container = document.getElementById('options-container');
            const div = document.createElement('div');
            div.className = 'option-input';
            div.innerHTML = '<input type="text" name="options[]" class="form-input" placeholder="Option ' + (container.children.length + 1) + '" required>' +
                          '<button type="button" onclick="removeOption(this)" class="btn btn-sm" style="background:#ef4444;margin-left:8px">Hapus</button>';
            container.appendChild(div);
            updateRemoveButtons();
        }
        
        function removeOption(button) {
            const container = document.getElementById('options-container');
            if (container.children.length > 2) {
                button.parentElement.remove();
                updateRemoveButtons();
            }
        }
        
        function updateRemoveButtons() {
            const container = document.getElementById('options-container');
            const buttons = container.querySelectorAll('button[onclick="removeOption(this)"]');
            buttons.forEach(btn => {
                btn.disabled = container.children.length <= 2;
            });
        }
    </script>
</body>
</html>

