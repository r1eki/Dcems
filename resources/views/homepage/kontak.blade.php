@extends('homepage.index')

@section('title')
Dus Kemasan Cantik - Kontak Kami
@stop

@section('content')
<div class="header-spacer"></div>

<div class="content-wrapper">

<!-- Stunning header -->

<div class="stunning-header stunning-header-bg-blue">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Kontak Kami</h1>
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                <a href="{{ url('/') }}">Home</a>
                <i class="seoicon-right-arrow"></i>
            </li>
            <li class="breadcrumbs-item active">
                <span href="#">Kontak Kami</span>
                <i class="seoicon-right-arrow"></i>
            </li>
        </ul>
    </div>
</div>

<!-- End Stunning header -->


<div class="container">
    <div class="row pt120 pb80">
        <div class="col-lg-12">
            <div class="heading">
                <h4 class="h1 heading-title">Get In Touch</h4>
                <div class="heading-line">
                    <span class="short-line"></span>
                    <span class="long-line"></span>
                </div>
                <p class="heading-text">
                    Mari Diskusikan Project Anda Dengan Kami, Ratusan Client Sudah Kami Kerjakan. Silahkan Isi Form Dibawah atau Kontak Sesuai Info Dibawah Ini
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Contacts -->


<div class="container-fluid">
    <div class="row medium-padding80 bg-border-color contacts-shadow">
        <div class="container">
            <div class="row">
                <div class="contacts">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="contacts-item">
                            <img src="img/contact7.png" alt="phone">
                            <div class="content">
                                <a href="#" class="title">Surabaya, Indonesia</a>
                                <p class="sub-title">Jl. Wiyung 1 No.8 RT 1 RW 2</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="contacts-item">
                            <img src="img/contact8.png" alt="phone">
                            <div class="content">
                                <a href="#" class="title">cs@duskemasancantik.com</a>
                                <p class="sub-title">online support</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="contacts-item">
                            <img src="img/contact9.png" alt="phone">
                            <div class="content">
                                <a href="#" class="title">+62 8135 7698 072</a>
                                <p class="sub-title">Mon-Fri 8am-17pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Contacts -->

<!-- Google map -->


<div class="section">
    <div id="map"></div>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.3115559, lng: 112.6940157},
                zoom: 12,
                scrollwheel: false//set to true to enable mouse scrolling while inside the map area
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBESxStZOWN9aMvTdR3Nov66v6TXxpRZMM&callback=initMap"
            async defer></script>

</div>

<!-- End Google map -->

<!-- Contact form -->


<div class="container">
    <div class="contact-form medium-padding120">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="heading">
                    <h4 class="heading-title">Punya Pertanyaan?</h4>
                    <div class="heading-line">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                    </div>
                    <p class="heading-text">Harap hubungi kami menggunakan formulir dan kami akan menghubungi Anda sesegera mungkin.</p>
                </div>
            </div>
        </div>

        <form class="contact-form" method="post" action="send_mail.php">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input name="name" class="email input-standard-grey" placeholder="Your Name" type="text" required>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input name="email" class="email input-standard-grey" placeholder="Email Address" type="email" required>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input name="phone" class="email input-standard-grey" placeholder="Phone" type="text">
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="message" class="email input-standard-grey" placeholder="Details"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="submit-block table">
                    <div class="col-lg-3 table-cell">
                        <button class="btn btn-small btn--primary">
                            <span class="text">Submit</span>
                        </button>
                    </div>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

<!-- End Contact form -->

</div>

@stop