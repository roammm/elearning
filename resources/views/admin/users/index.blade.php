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
        body {
            font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial;
            background: #f5f7fb;
            margin: 0;
            padding: 0
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px
        }

        .page-header {
            margin-bottom: 32px;
            padding-top: 40px
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 8px
        }

        .card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1)
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937
        }

        .card-meta {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 16px
        }

        .card-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s
        }

        .btn:hover {
            background: #1d4ed8
        }

        .btn-danger {
            background: #ef4444
        }

        .btn-danger:hover {
            background: #dc2626
        }

        .btn-secondary {
            background: #6b7280
        }

        .btn-secondary:hover {
            background: #4b5563
        }

        .form-select {
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500
        }

        .badge-admin {
            background: #fef3c7;
            color: #92400e
        }

        .badge-user {
            background: #dbeafe;
            color: #1e40af
        }

        .alert {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0
        }

        @media (max-width:640px) {
            .container {
                padding: 0 16px
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px
            }
        }
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

        <!-- Form untuk menambahkan role baru -->
        <div class="card" style="margin-bottom: 24px; background: #f0f9ff; border-color: #0ea5e9;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <h3 style="font-size: 16px; font-weight: 700; color: #1f2937; margin: 0;">Tambah Role Baru</h3>
                <span style="font-size: 12px; color: #6b7280;">Total: {{ count($roles ?? []) }} role</span>
            </div>
            <form action="{{ route('admin.roles.store') }}" method="POST" style="display: flex; gap: 8px; align-items: flex-end; flex-wrap: wrap;">
                @csrf
                <div style="flex: 1; min-width: 200px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 4px;">Nama Role</label>
                    <input type="text" name="name" required placeholder="Contoh: vbmapp" 
                        style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px;"
                        pattern="[a-zA-Z0-9_-]+" title="Hanya huruf, angka, underscore, dan dash">
                    <small style="color: #6b7280; font-size: 11px; display: block; margin-top: 4px;">Nama role akan otomatis diubah menjadi slug (huruf kecil, tanpa spasi)</small>
                </div>
                <button type="submit" class="btn" style="padding: 8px 16px; white-space: nowrap;">+ Tambah Role</button>
            </form>
            
            <!-- Daftar role yang ada -->
            @if(count($roles ?? []) > 0)
            <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid #e0f2fe;">
                <div style="font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 8px;">Role yang Tersedia:</div>
                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    @foreach($roles as $role)
                    <div style="display: flex; align-items: center; gap: 6px; background: #fff; border: 1px solid #cbd5e1; padding: 4px 10px; border-radius: 999px;">
                        <span style="font-size: 11px; color: #111827; font-weight: 600;">{{ $role->name }}</span>
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline; margin: 0;" onsubmit="return confirm('Yakin ingin menghapus role ini? User yang memiliki role ini akan kehilangan akses ke course terkait.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 14px; padding: 0; margin: 0; line-height: 1;" title="Hapus role">×</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

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
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Member</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </form>

                <form action="{{ route('admin.users.update-roles', $user) }}" method="POST" style="display:inline; width: 100%; margin-top: 12px;">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom: 8px;">
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px;">Akses Course (Pilih role yang dimiliki user ini):</label>
                        <div style="display:flex;flex-wrap:wrap;gap:8px;align-items:center">
                            @forelse(($roles ?? []) as $role)
                            <label style="display:flex;align-items:center;gap:6px;border:1px solid #e5e7eb;padding:6px 12px;border-radius:999px;background:#fff;cursor:pointer;transition:all 0.2s" 
                                onmouseover="this.style.borderColor='#2563eb';this.style.background='#eff6ff'" 
                                onmouseout="this.style.borderColor='#e5e7eb';this.style.background='#fff'">
                                <input type="checkbox" name="role_ids[]" value="{{ $role->id }}" {{ $user->roles->contains('id', $role->id) ? 'checked' : '' }}
                                    style="cursor:pointer;margin:0">
                                <span style="font-size:12px;color:#111827;font-weight:600;cursor:pointer">{{ $role->name }}</span>
                            </label>
                            @empty
                            <span style="color:#6b7280;font-size:12px;padding:6px 12px">Belum ada role. Tambahkan role baru di atas.</span>
                            @endforelse
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary" style="padding:10px 16px;margin-top:8px">Simpan Akses</button>
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