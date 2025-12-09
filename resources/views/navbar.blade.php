<header class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 w-full font-sans">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- Logo Section --}}
        <a href="{{ route('home') }}" class="flex items-center no-underline">
            <img
                src="/img/ABATRAINING-new.png"
                alt="Logo ABATI"
                class="h-[70px] w-auto object-contain border-none bg-none">
        </a>

        @auth
        {{-- Navbar for authenticated users --}}
        <nav class="flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Home</a>
            <a href="{{ route('elearning') }}" class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">E-Learning</a>
            <a href="{{ route('leaderboard') }}" class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Leaderboard</a>
            <a href="{{ route('profile') }}" class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Profile</a>

            @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.index') }}" class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Admin</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold no-underline border-none cursor-pointer transition-colors duration-200 text-base hover:bg-blue-700">Logout</button>
            </form>
        </nav>

        @else
        {{-- Navbar for guest users --}}
        <nav class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Login</a>
            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold no-underline border-none cursor-pointer transition-colors duration-200 text-base hover:bg-blue-700">Register</a>
        </nav>
        @endauth
    </div>
</header>