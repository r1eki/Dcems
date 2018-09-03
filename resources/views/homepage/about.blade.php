@extends('homepage.index')

@section('title')
Dus Kemasan Cantik - Tentang Kami
@stop

@section('content')
<div class="header-spacer"></div>

<div class="content-wrapper">

    <!-- Stunning header -->

    <div class="stunning-header stunning-header-bg-lightblue">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tentang Dus Kemasan Cantik</h1>
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="seoicon-right-arrow"></i>
                </li>
                <li class="breadcrumbs-item active">
                    <span>Tentang Kami</span>
                    <i class="seoicon-right-arrow"></i>
                </li>
            </ul>
        </div>
    </div>

    <!-- End Stunning header -->

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-12">
                <div class="heading mb30">
                    <h4 class="h1 heading-title">Cerita Pendek Tentang Dus Kemasan Cantik</h4>
                    <div class="heading-line">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                    </div>

                    <h5 class="heading-subtitle">
                        Kami adalah perusahaan yang bergerak di bidang packaging. Kami percaya bahwa packaging yang bagus akan meningkatkan nilai jual produk anda. Karena itu kami memberikan solusi desain kemasan yang inovativ dan menarik bagi konsumen. Untuk itu kami di "Dus Kemasan Cantik" selalu berusaha menawarkan solusi yang terbaik dan kompetitif untuk anda. Silahkan menghubungi kami untuk mendapatkan info lebih lanjut.
                    </h5>
                </div>
            </div>

        </div>
    </div>

</div>
@stop