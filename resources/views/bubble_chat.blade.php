@php
$phoneNumber = '6281234567890';
$message = "Halo, saya ingin bertanya info lebih lanjut.";
$whatsappUrl = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);
@endphp

<a href="{{ $whatsappUrl }}"
    target="_blank"
    class="fixed bottom-5 right-5 z-[1000] inline-block transition-transform duration-300 ease-in-out hover:scale-110">

    <img src="{{ asset('img/whatsapp-bubble.png') }}"
        alt="WhatsApp"
        class="w-[60px] h-auto drop-shadow-lg">
</a>