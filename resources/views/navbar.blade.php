<!-- Navbar for all users -->
<header class="fixed inset-x-0 top-0 z-50 bg-white/80 backdrop-blur border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center">
            <img 
                src="/img/logo-ABATi.png" 
                alt="Logo ABATI"
                class="h-16 w-16 object-contain"
                style="border:none;background:none;"
            >
        </a>

        @auth
        <!-- Navbar for authenticated users -->
        <nav class="flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 font-medium">Home</a>
            <a href="{{ route('elearning') }}" class="text-gray-700 hover:text-gray-900 font-medium">E-Learning</a>
            <a href="{{ route('leaderboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">Leaderboard</a>
            <a href="{{ route('profile') }}" class="text-gray-700 hover:text-gray-900 font-medium">Profile</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">Admin</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">Logout</button>
            </form>
        </nav>
        @else
            <!-- Navbar for guest users -->
            <nav class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-medium">Login</a>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">Register</a>
            </nav>
        @endauth
    </div>
</header>
