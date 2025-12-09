<style>
    /* STYLE FOOTER ADA DI SINI */
    .site-footer {
        background-color: #ffffff;
        padding: 32px 0;
        width: 100%;
        margin-top: auto;
    }

    .footer-container {
        max-width: 1152px;
        margin: 0 auto;
        padding: 24px 16px;
        display: flex;
        flex-direction: column;
        /* Mobile: ke bawah */
        align-items: flex-start;
        gap: 24px;
        border-top: 1px solid #d1d5db;

    }

    .footer-logo {
        flex-shrink: 0;
    }

    .footer-logo img {
        height: 56px;
        width: auto;
        display: block;
    }

    .footer-info {
        text-align: left;
        color: #000000;
    }

    .footer-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 8px 0;
        color: #000;
    }

    .footer-text {
        margin: 0 0 4px 0;
        line-height: 1.5;
        color: #1f2937;
    }

    .footer-text.mb-large {
        margin-bottom: 24px;
    }

    .font-medium {
        font-weight: 500;
    }

    .footer-copyright {
        margin: 0;
        font-size: 14px;
        color: #6b7280;
    }

    /* Desktop Footer */
    @media (min-width: 768px) {
        .footer-container {
            flex-direction: row;
            gap: 32px;
        }
    }
</style>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/ABATRAINING-new.png') }}" alt="Logo ABA">
            </a>
        </div>
        <div class="footer-info">
            <p class="footer-title">ABA Therapy Indonesia</p>
            <p class="footer-text">
                <span class="font-medium">Address:</span>
                Jl. Binalontar Raya No.41, Jaticempaka, Kec. Pd. Gede, Kota Bks, Jawa Barat 17113
            </p>
            <p class="footer-text mb-large">
                <span class="font-medium">Province:</span> West Java
            </p>
            <p class="footer-copyright">
                © {{ date('Y') }} ABA Therapy Indonesia. All rights reserved.
            </p>
        </div>
    </div>
</footer>