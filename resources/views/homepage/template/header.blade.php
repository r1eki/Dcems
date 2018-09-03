<div class="top-bar top-bar-dark">
    <div class="container">
            <div class="top-bar-contact">
                <div class="contact-item">
                    0813 5769 8072
                </div>

                <div class="contact-item">
                    <a href="#">cs@duskemasancantik.com</a>
                </div>

                <div class="contact-item">
                    <span>Mon. - Fri.</span> 08:00 - 17:00
                </div>
            </div>

            <!---- <div class="follow_us">
                <span>Follow us:</span>
                <div class="socials">

                    <a href="" class="social__item">
                        <img src="svg/circle-facebook.svg" alt="facebook">
                    </a>

                    <a href="" class="social__item">
                        <img src="svg/twitter.svg" alt="twitter">
                    </a>

                    <a href="" class="social__item">
                        <img src="svg/google.svg" alt="google">
                    </a>

                    <a href="" class="social__item">
                        <img src="svg/youtube.svg" alt="youtube">
                    </a>

                </div>
            </div> --->

        <a href="#" class="top-bar-close" id="top-bar-close-js">
            <span></span>
            <span></span>
        </a>

    </div>
</div>

<header class="header" id="site-header">

    <div class="container">

            <div class="header-content-wrapper">

                {{-- <a href="#" id="top-bar-js" class="top-bar-link">DUS KEMASAN</a> --}}

                <div class="logo">
                    <a href="{{ url('/') }}" class="full-block-link"></a>
                    <img src="{{ asset('img/logo-eye.png') }}" alt="Dus Kemasan Cantik">
                    <div class="logo-text">
                        <div class="logo-title">Dus Kemasan</div>
                        {{-- <div class="logo-sub-title">Rajanya Dus Kemasan</div> --}}
                    </div>
                </div>

                <nav id="primary-menu" class="primary-menu">

                    <a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
                        <span class="mob-menu--title">Menu</span>
                        <span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
                            <svg width="1000px" height="1000px">
                                <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                                <path id="pathE" d="M 300 500 L 700 500"></path>
                                <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
                            </svg>
                        </span>
                    </a>

                    <!-- menu-icon-wrapper -->

                    <ul class="primary-menu-menu">
                        <li class="menu-item-has-children">
                            <a href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="">
                            <a href="{{ url('tentang-kami') }}">Tentang Kami</a>
                        </li>

                        <li class="">
                            <a href="{{ url('galeri') }}">Galeri</a>
                        </li>

                        <li class="">
                            <a href="{{ url('client') }}">Client Kami</a>
                        </li>

                        <li class="">
                            <a href="{{ url('kontak-kami') }}">Kontak Kami</a>
                        </li>
                    </ul>
                </nav>

            </div>

    </div>

</header>