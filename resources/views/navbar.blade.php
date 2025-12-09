<style>
    /* Reset sederhana untuk box-sizing agar padding tidak merusak lebar elemen */
    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    /* Container utama Navbar */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        background-color: rgba(255, 255, 255, 0.8);
        /* bg-white/80 */
        backdrop-filter: blur(8px);
        /* Efek blur opsional agar mirip modern UI */
        border-bottom: 1px solid #f3f4f6;
        /* border-gray-100 */
        width: 100%;
        font-family: sans-serif;
        /* Pastikan font default ada */
    }

    /* Pembungkus konten agar rata tengah */
    .navbar-container {
        max-width: 80rem;
        /* max-w-7xl (sekitar 1280px) */
        margin-left: auto;
        margin-right: auto;
        padding: 0.8rem 1.5rem;
        /* py-4 px-6 */
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Logo Styling */
    .logo-link {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .navbar-logo {
        height: 70px;
        /* h-16 */
        width: auto;
        /* w-16 */
        object-fit: contain;
        border: none;
        background: none;
    }

    /* Navigasi Menu Wrapper */
    .nav-menu {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        /* gap-6 */
    }

    .nav-menu.guest {
        gap: 1rem;
        /* gap-4 untuk guest */
    }

    /* Link Menu Biasa */
    .nav-link {
        color: #374151;
        /* text-gray-700 */
        font-weight: 500;
        /* font-medium */
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .nav-link:hover {
        color: #111827;
        /* hover:text-gray-900 */
    }

    /* Tombol Biru (Register & Logout) */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        /* px-4 py-2 */
        border-radius: 0.75rem;
        /* rounded-xl */
        background-color: #2563eb;
        /* bg-blue-600 */
        color: white;
        font-weight: 600;
        /* font-semibold */
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease;
        font-size: 1rem;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
        /* hover:bg-blue-700 */
    }
</style>

<!-- Navbar for all users -->
<header class="navbar">
    <div class="navbar-container">
        {{-- Logo Section --}}
        <a href="{{ route('home') }}" class="logo-link">
            <img
                src="/img/ABATRAINING-new.png"
                alt="Logo ABATI"
                class="navbar-logo">
        </a>

        @auth
        {{-- Navbar for authenticated users --}}
        <nav class="nav-menu">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            <a href="{{ route('elearning') }}" class="nav-link">E-Learning</a>
            <a href="{{ route('leaderboard') }}" class="nav-link">Leaderboard</a>
            <a href="{{ route('profile') }}" class="nav-link">Profile</a>

            @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.index') }}" class="nav-link">Admin</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-primary">Logout</button>
            </form>
        </nav>

        @else
        {{-- Navbar for guest users --}}
        <nav class="nav-menu guest">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="btn-primary">Register</a>
        </nav>
        @endauth
    </div>
</header>