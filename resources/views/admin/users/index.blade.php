<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Users - Admin</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body{font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; background:#f5f7fb; margin:0; padding:0}
        .container{max-width:1200px;margin:0 auto;padding:0 24px}
        .page-header{margin-bottom:32px;padding-top:40px}
        .page-title{font-size:32px;font-weight:800;color:#1f2937;margin-bottom:8px}
        .card{background:#ffffff;border:1px solid #e5e7eb;border-radius:12px;padding:24px;margin-bottom:16px;box-shadow:0 1px 3px rgba(0,0,0,0.1)}
        .card-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
        .card-title{font-size:18px;font-weight:700;color:#1f2937}
        .card-meta{color:#6b7280;font-size:14px;margin-bottom:16px}
        .card-actions{display:flex;gap:8px;flex-wrap:wrap}
        .btn{display:inline-flex;align-items:center;gap:8px;padding:12px 20px;background:#2563eb;color:#fff;border:none;border-radius:8px;text-decoration:none;font-weight:500;cursor:pointer;transition:background 0.2s}
        .btn:hover{background:#1d4ed8}
        .btn-danger{background:#ef4444}
        .btn-danger:hover{background:#dc2626}
        .btn-secondary{background:#6b7280}
        .btn-secondary:hover{background:#4b5563}
        .form-select{padding:8px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:14px}
        .badge{display:inline-block;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:500}
        .badge-admin{background:#fef3c7;color:#92400e}
        .badge-user{background:#dbeafe;color:#1e40af}
        .alert{padding:16px;border-radius:8px;margin-bottom:24px}
        .alert-success{background:#dcfce7;color:#166534;border:1px solid #bbf7d0}
        @media (max-width:640px){.container{padding:0 16px}.card-header{flex-direction:column;align-items:flex-start;gap:12px}}
    </style>
</head>
<body>
    @include('navbar')

    <div class="container" style="padding-top:100px">
        <div class="page-header">
            <h1 class="page-title">Manage Users</h1>
            <p style="color:#6b7280">Kelola role dan pengguna sistem</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @forelse($users as $user)
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">{{ $user->name }}</div>
                    <div class="card-meta">{{ $user->email }} | {{ $user->phone ?? 'No phone' }}</div>
                </div>
                <span class="badge badge-{{ $user->role }}">{{ strtoupper($user->role) }}</span>
            </div>
            <div class="card-actions">
                <form action="{{ route('admin.users.update-role', $user) }}" method="POST" style="display:inline">
                    @csrf
                    @method('PUT')
                    <select name="role" class="form-select" onchange="this.form.submit()">
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </form>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @empty
        <div class="card">
            <p style="color:#6b7280;text-align:center;padding:40px">Belum ada user.</p>
        </div>
        @endforelse

        <div style="margin-top:32px">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>

