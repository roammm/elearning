<!-- style for bubble chat -->
<style>
    .wa-float-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        /* Supaya selalu di atas */
        transition: transform 0.3s ease;
        display: inline-block;
    }

    .wa-float-btn:hover {
        transform: scale(1.1);
        /* Efek membesar saat cursor diarahkan */
    }

    .wa-float-img {
        width: 60px;
        /* Sesuaikan ukuran gambar */
        height: auto;
        filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.3));
        /* Efek bayangan */
    }
</style>

@php
$phoneNumber = '6281234567890';
$message = "Halo, saya ingin bertanya info lebih lanjut.";
$whatsappUrl = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);
@endphp

<a href="{{ $whatsappUrl }}" target="_blank" class="wa-float-btn">
    <img src="{{ asset('img/whatsapp-bubble.png') }}" alt="WhatsApp" class="wa-float-img">
</a>