<header class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 w-full font-sans">
    <div class="max-w-7xl mx-auto px-6 py-3">
        <div class="flex items-center justify-between">

            {{-- Logo Section --}}
            <a href="{{ route('home') }}" class="flex items-center no-underline">
                <img src="/img/ABATRAINING-new.png" alt="Logo ABATI"
                    class="h-[50px] md:h-[70px] w-auto object-contain border-none bg-none">
            </a>

            {{-- Desktop Navbar (Hidden on Mobile) --}}
            <div class="hidden md:flex items-center gap-6">
                @auth
                {{-- Authenticated Desktop Menu --}}
                <nav class="flex items-center gap-6">
                    <a href="{{ route('home') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Home</a>
                    <a href="{{ route('elearning') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">E-Learning</a>
                    <a href="{{ route('leaderboard') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Leaderboard</a>
                    <a href="{{ route('profile') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Profile</a>

                    @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.index') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Admin</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold no-underline border-none cursor-pointer transition-colors duration-200 text-base hover:bg-blue-700">Logout</button>
                    </form>
                </nav>
                @else
                {{-- Guest Desktop Menu --}}
                <nav class="flex items-center gap-6">
                    <a href="{{ url('/') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Home</a>
                    <a href="{{ route('about') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Tentang
                        Kami</a>
                    <a href="{{ route('contact') }}"
                        class="text-gray-700 font-medium no-underline hover:text-gray-900 transition-colors duration-200">Kontak</a>

                    <a href="{{ route('login') }}"
                        class="inline-flex items-center px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold no-underline border-none cursor-pointer transition-colors duration-200 text-base hover:bg-blue-700 ml-2">MEMBER
                        AREA</a>
                </nav>
                @endauth
            </div>

            {{-- Mobile Hamburger Button (Visible on Mobile Only) --}}
            <div class="flex md:hidden items-center">
                <button id="mobile-menu-button" type="button"
                    class="text-gray-700 hover:text-blue-600 focus:outline-none p-2">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>

        {{-- Mobile Menu Container (Hidden by default) --}}
        <div id="mobile-menu" class="hidden md:hidden mt-4 border-t border-gray-100 pt-4 pb-2 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col space-y-3 px-2">
                @auth
                {{-- Authenticated Mobile Menu --}}
                <a href="{{ route('home') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Home</a>
                <a href="{{ route('elearning') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">E-Learning</a>
                <a href="{{ route('leaderboard') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Leaderboard</a>
                <a href="{{ route('profile') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Profile</a>

                @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.index') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Admin</a>
                @endif

                <div class="pt-2 border-t border-gray-100">
                    <form method="POST" action="{{ route('logout') }}" class="m-0 w-full">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">Logout</button>
                    </form>
                </div>
                @else
                {{-- Guest Mobile Menu --}}
                <a href="{{ url('/') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Home</a>
                <a href="{{ route('about') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Tentang
                    Kami</a>
                <a href="{{ route('contact') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Kontak</a>

                <div class="pt-2">
                    <a href="{{ route('login') }}"
                        class="block w-full text-center px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">MEMBER
                        AREA</a>
                </div>
                @endauth
            </div>
        </div>

    </div>
</header>

{{-- Script untuk Toggle Menu Mobile --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    });
</script>