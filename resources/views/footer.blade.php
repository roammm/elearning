<footer class="bg-white py-8 w-full mt-auto">
    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col md:flex-row items-start gap-6 md:gap-8 border-t border-gray-300">

        <div class="shrink-0">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/ABATRAINING-new.png') }}" alt="Logo ABA" class="h-14 w-auto block">
            </a>
        </div>

        <div class="text-left text-black">
            <p class="text-lg font-semibold mb-2 text-black">ABA Therapy Indonesia</p>

            <p class="mb-1 leading-normal text-gray-800">
                <span class="font-medium">Address:</span>
                Jl. Binalontar Raya No.41, Jaticempaka, Kec. Pd. Gede, Kota Bks, Jawa Barat 17113
            </p>

            <p class="mb-6 leading-normal text-gray-800">
                <span class="font-medium">Province:</span> West Java
            </p>

            <p class="m-0 text-sm text-gray-500">
                © {{ date('Y') }} ABA Therapy Indonesia. All rights reserved.
            </p>
        </div>

    </div>
</footer>