<footer class="bg-whitepy-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-start gap-6 border-t border-gray-300 shadow-xl">

        <!-- Logo -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo-ABATi.png') }}" alt="Logo ABA" class="h-14">
            </a>
        </div>

        <!-- Info -->
        <div class="text-left text-black">
            <p class="font-semibold text-lg mb-2">ABA Therapy Indonesia</p>

            <p class="mb-1"><span class="font-medium">Address:</span> Jl. Binalontar Raya No.41, Jaticempaka,  
                Kec. Pd. Gede, Kota Bks, Jawa Barat 17113</p>
            <p class="mb-6"><span class="font-medium">Province:</span> West Java</p>
            <p class="mb-1 text-gray-500"> © {{ date('Y') }} ABA Therapy Indonesia. All rights reserved.</p>
        </div>

    </div>
</footer>
