<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediLearn - Edit Profile</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased">

    @include('navbar')

    <div class="max-w-[980px] mx-auto px-6 pt-[100px] pb-12 mt-5">

        <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Profile</h1>
                <p class="text-slate-500 text-sm mt-1">Perbarui informasi pribadi dan pengaturan akun Anda.</p>
            </div>
            <a href="{{ route('profile') }}" class="text-sm font-medium text-slate-500 hover:text-slate-800 transition flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5" />
                    <path d="M12 19l-7-7 7-7" />
                </svg>
                Kembali ke Profile
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">
                    <h2 class="font-bold text-slate-900 text-lg mb-1">Informasi Dasar</h2>
                    <p class="text-slate-500 text-sm mb-6 pb-4 border-b border-slate-100">Foto profil dan detail kontak Anda.</p>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('success'))
                        <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="flex items-center gap-5 mb-6">
                            <div class="w-20 h-20 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-700 text-2xl shrink-0 overflow-hidden border-2 border-slate-100 relative">
                                @php
                                    $hasAvatar = $user->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->avatar);
                                @endphp
                                @if($hasAvatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-full h-full object-cover" id="avatar-preview">
                                @else
                                    <span id="avatar-initial">{{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}</span>
                                    <img src="" alt="Avatar" class="w-full h-full object-cover hidden" id="avatar-preview">
                                @endif
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-slate-700 mb-1">Ganti Foto</label>
                                <input type="file" name="avatar" id="avatar-input" accept="image/jpeg,image/jpg,image/png,image/gif" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-xs file:font-semibold
                                    file:bg-sky-50 file:text-sky-700
                                    hover:file:bg-sky-100
                                    cursor-pointer transition
                                " />
                                <p class="text-xs text-slate-400 mt-1">JPG, GIF atau PNG. Maks 1MB.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ $user->name ?? '' }}"
                                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm px-3 py-2 border text-slate-800 placeholder-slate-400">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Alamat Email</label>
                                <input type="email" name="email" id="email" value="{{ $user->email ?? '' }}"
                                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm px-3 py-2 border text-slate-800 placeholder-slate-400">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="bg-sky-500 text-white border-none rounded-lg px-5 py-2.5 text-sm font-medium cursor-pointer hover:bg-sky-600 transition shadow-sm">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">
                    <h2 class="font-bold text-slate-900 text-lg mb-1">Ganti Password</h2>
                    <p class="text-slate-500 text-sm mb-6 pb-4 border-b border-slate-100">Perbarui kata sandi untuk keamanan akun Anda.</p>

                    <form action="{{ route('profile.update-password') }}" method="POST">
                        @csrf
                        @if(session('success-password'))
                        <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                            {{ session('success-password') }}
                        </div>
                        @endif
                        @if($errors->has('current_password') || $errors->has('password'))
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                            <ul class="list-disc list-inside">
                                @if($errors->has('current_password'))
                                <li>{{ $errors->first('current_password') }}</li>
                                @endif
                                @if($errors->has('password'))
                                <li>{{ $errors->first('password') }}</li>
                                @endif
                            </ul>
                        </div>
                        @endif

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-slate-700 mb-1">Password Saat Ini</label>
                                <input type="password" name="current_password" id="current_password" required
                                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm px-3 py-2 border text-slate-800 placeholder-slate-400">
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password Baru</label>
                                <input type="password" name="password" id="password" required
                                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm px-3 py-2 border text-slate-800 placeholder-slate-400">
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm px-3 py-2 border text-slate-800 placeholder-slate-400">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="bg-sky-500 text-white border-none rounded-lg px-5 py-2.5 text-sm font-medium cursor-pointer hover:bg-sky-600 transition shadow-sm">
                                Ubah Password
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="lg:col-span-1">
                <div class="bg-blue-50 border border-blue-100 rounded-xl p-5 mb-6">
                    <h3 class="font-bold text-blue-900 text-sm mb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="16" x2="12" y2="12" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                        </svg>
                        Tips Profil
                    </h3>
                    <ul class="text-xs text-blue-800 space-y-2 list-disc pl-4 leading-relaxed">
                        <li>Nama yang Anda masukkan akan tercetak di <strong>Sertifikat</strong> kelulusan.</li>
                        <li>Pastikan email aktif untuk menerima materi pembelajaran.</li>
                    </ul>
                </div>

                <div class="border-t border-slate-200 pt-6">
                    <h3 class="font-bold text-slate-900 text-sm mb-2">Hapus Akun</h3>
                    <p class="text-xs text-slate-500 mb-3">Menghapus akun akan menghilangkan semua progres belajar dan sertifikat secara permanen.</p>
                    <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan dan akan menghapus semua progres belajar serta sertifikat Anda secara permanen.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full border border-red-200 bg-white text-red-600 hover:bg-red-50 hover:border-red-300 text-sm font-medium py-2 px-4 rounded-lg transition duration-200">
                            Hapus Akun Saya
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Preview avatar when file is selected
        document.getElementById('avatar-input')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('avatar-preview');
                    const initial = document.getElementById('avatar-initial');
                    if (preview) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                    if (initial) {
                        initial.classList.add('hidden');
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>