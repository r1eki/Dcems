@extends('homepage.index')

@section('title')
Dus Kemasan Cantik - Rajanya Cetak Packaging
@stop

@section('content')
<div class="content-wrapper">
    <div class="header-spacer"></div>

    <!-- Main Slider -->
    <div class="container-full-width">
            <div class="swiper-container main-slider" data-effect="fade" data-autoplay="4000">

                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide bg-border-color">

                        <div class="container">
                            <div class="row table-cell">
                                <div class="col-lg-12">
                                    <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">
                                        <img src="img/slider1.png" alt="slider">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide bg-primary-color main-slider-bg-dark thumb-left">

                        <div class="container table full-height">
                            <div class="row table-cell">

                                <div class="col-lg-7 table-cell">
                                    <div class="slider-thumb" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
                                        <img src="img/slider2.png" alt="slider">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-secondary-color main-slider-bg-dark">

                        <div class="container table full-height">
                            <div class="row table-cell">
                                
                                <div class="col-lg-6 table-cell">
                                    <div class="slider-thumb" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
                                        <img src="img/slider3.png" alt="slider">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-orange-color main-slider-bg-dark">
                        <div class="container table full-height">
                            <div class="row table-cell">

                                <div class="col-lg-12">
                                    <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">
                                        <img src="img/slider4.png" alt="slider">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-green-color main-slider-bg-dark">

                        <div class="container table full-height">
                            <div class="row table-cell">

                                <div class="col-lg-6 table-cell">
                                    <div class="slider-thumb" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
                                        <img src="img/slider5.png" alt="slider">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--Prev next buttons-->

                <svg class="btn-next btn-next-black">
                    <use xlink:href="#arrow-right"></use>
                </svg>

                <svg class="btn-prev btn-prev-black">
                    <use xlink:href="#arrow-left"></use>
                </svg>

                <!--Pagination tabs-->

                <div class="slider-slides">
                    <a href="#" class="slides-item bg-border-color main-slider-bg-light">
                        <div class="content">
                            <div class="text-wrap">
                                <h4 class="slides-title">Digital Design</h4>
                            </div>
                            <div class="slides-number">01</div>
                        </div>
                    </a>

                    <a href="#" class="slides-item bg-primary-color">
                        <div class="content">
                            <div class="text-wrap">
                                <h4 class="slides-title">Dus Packaging</h4>
                            </div>
                            <div class="slides-number">02</div>
                        </div>
                    </a>

                    <a href="#" class="slides-item bg-secondary-color">
                        <div class="content">
                            <div class="text-wrap">
                                <h4 class="slides-title">Souvenir</h4>
                            </div>
                            <div class="slides-number">03</div>
                        </div>
                    </a>

                    <a href="#" class="slides-item bg-orange-color">
                        <div class="content">
                            <div class="text-wrap">
                                <h4 class="slides-title">Email Marketing</h4>
                            </div>
                            <div class="slides-number">04</div>
                        </div>
                    </a>

                    <a href="#" class="slides-item bg-green-color">
                        <div class="content">
                            <div class="text-wrap">
                                <h4 class="slides-title">Sosial Media Marketing</h4>
                            </div>
                            <div class="slides-number">05</div>
                        </div>
                    </a>
                </div>
            </div>
    </div>
    <!-- ... End Main Slider -->


<!-- Info-Box -->
<div class="container">
    <div class="row medium-padding120">
        <div class="recent-case align-center">

            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                        <div class="heading align-center">
                            <h4 class="h1 heading-title">Visi Dan Misi Perusahaan</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="case-item-wrap">
                    @foreach($project as $row)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{ asset($row['project_img']) }}" alt="our case">
                                </div>
                                <h6 class="case-item__title"><a href="#">{!! $row['project_name'] !!}</a></h6>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

                <a href="{{ url('galeri') }}" class="btn btn-medium btn--dark">
                    <span class="text">Selengkapnya</span>
                    <span class="semicircle"></span>
                </a>
            </div>

        </div>
    </div>
</div>



<!-- ... End Info-Box -->

<!-- Recent-case -->

<div class="container">
    <div class="row medium-padding120">
        <div class="recent-case align-center">

            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                        <div class="heading align-center">
                            <h4 class="h1 heading-title">Portfolio Kami</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="case-item-wrap">
                    @foreach($project as $row)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{ asset($row['project_img']) }}" alt="our case">
                                </div>
                                <h6 class="case-item__title"><a href="#">{!! $row['project_name'] !!}</a></h6>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

                <a href="{{ url('galeri') }}" class="btn btn-medium btn--dark">
                    <span class="text">Semua Portfolio</span>
                    <span class="semicircle"></span>
                </a>
            </div>

        </div>
    </div>
</div>

<!-- End Recent-case -->


<!-- Testimonial-slider -->

<div class="container-fluid">
    <div class="row">
        <div class="testimonial-slider scrollme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="heading">
                            <h4 class="h1 heading-title">Testimoni</h4>
                            <div class="heading-line">
                                <span class="short-line bg-yellow-color"></span>
                                <span class="long-line bg-yellow-color"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-lg-offset-1 col-md-8 col-sm-12 col-xs-12">

                        <div class="testimonial-item">
                            <!-- Slider main container -->
                            <div class="swiper-container testimonial__thumb overflow-visible" data-effect="fade" data-loop="false">

                                <div class="swiper-wrapper">
                                @foreach($testimoni as $row)
                                    <div class="testimonial-slider-item swiper-slide">
                                        <div class="testimonial-content">
                                            <p class="text" data-swiper-parallax="-200">{{ $row['testimoni'] }}
                                            </p>
                                            <a href="#" class="author" data-swiper-parallax="-150">{{ $row['testi_name'] }}</a>
                                            <a href="#" class="company" data-swiper-parallax="-150">{{ $row['office'] }}</a>

                                        </div>
                                        <div class="avatar" data-swiper-parallax="-50">
                                            <img src="img/avatar.png" alt="avatar">
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                                <div class="quote">
                                    <i class="seoicon-quotes"></i>
                                </div>
                            </div>

                            <div class="testimonial__thumb-img">
                                <img src="{{ asset('img/testimonial1.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-img">
                <img src="{{ asset('img/testimonial2.png') }}" alt="image">
            </div>
        </div>
    </div>
</div>

<!-- End Testimonial-slider -->


<!-- Post-slider -->

<div class="container">

    <div class="recent-post-slider medium-padding120">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="heading">
                    <h4 class="h1 heading-title">Kilas Berita</h4>
                    <a href="14_blog.html" class="read-more">Read Our Blog
                        <i class="seoicon-right-arrow"></i>
                    </a>
                    <div class="heading-line">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                    </div>
                </div>
            </div>

        </div>

        <div class="theme-module news-slider-module">
            <div class="swiper-container top-pagination" data-show-items="3" data-scroll-items="3">

                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
                @foreach($news as $row)
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <article class="hentry post">

                                <time class="post__date published " datetime="2016-01-30 12:00:00">
                                    {!! date('F', $row['news_date']) !!} {!! date('d', $row['news_date']) !!}, {!! date('Y', $row['news_date']) !!}
                                </time>

                                <div class="post__content">
                                    <h2 class="post__title entry-title">
                                        <a href="15_blog_details.html">{!! $row['news_title'] !!}</a>
                                    </h2>

                                    <p class="post__text">{!! read_more($row['nes_desc']) !!}</p>

                                </div>

                                <div class="post__author author vcard">
                                    <div class="post-avatar">
                                        <img src="{{ asset('img/post-author1.png') }}" alt="author">
                                    </div>
                                    <span class="post__author-name fn"> Posted by <a href="#" class="post__author-link">{!! $row['user']['user_name'] !!}</a></span>
                                </div>

                            </article>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<!-- End Post-slider -->


<!-- Clients -->

<div class="section">
    <div class="client-carousel medium-padding120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                    <div class="heading align-center">
                        <h4 class="h1 heading-title">Client Kami</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="theme-module clients-slider-module">

                <div class="swiper-container pagination-bottom" data-show-items="4">

                    <div class="swiper-wrapper">
                    @foreach($client as $row)
                        <div class="swiper-slide client-item">
                            <a href="09_our_clients.html" class="client-image">
                                <img src="{{ asset($row['client_logo']) }}" alt="{!! $row['client_name'] !!}" class="hover">
                            </a>
                        </div>
                    @endforeach
                    </div>

                    <!--Prev Next Arrows-->
                    <svg class="btn-next">
                        <use xlink:href="#arrow-right"></use>
                    </svg>

                    <svg class="btn-prev">
                        <use xlink:href="#arrow-left"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Clients -->


<!-- Subscribe Form -->

<div class="container-fluid bg-green-color">
    <div class="row">
        <div class="container">

            <div class="row">

                <div class="subscribe scrollme">

                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                        <h4 class="subscribe-title">Yuk Berlangganan!</h4>
                        <form class="subscribe-form" method="post" action="import.php">
                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                            <button class="subscr-btn">Langganan
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Berlanggan untuk mendapatkan info seputar update, survey, promosi.</div>

                    </div>

                    <div class="images-block">
                        <img src="img/subscr-gear.png" alt="gear" class="gear">
                        <img src="img/subscr1.png" alt="mail" class="mail">
                        <img src="img/subscr-mailopen.png" alt="mail" class="mail-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Subscribe Form -->
</div>
@stop