@extends('homepage.index')

@section('title')
Dus Kemasan Cantik - Galeri
@stop

@section('content')
<div class="header-spacer"></div>

<div class="content-wrapper">

<!-- Stunning header -->

<div class="stunning-header stunning-header-bg-rose">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Gallery</h1>
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                <a href="{{ url('/') }}">Home</a>
                <i class="seoicon-right-arrow"></i>
            </li>
            <li class="breadcrumbs-item active">
                <span href="#">Gallery</span>
                <i class="seoicon-right-arrow"></i>
            </li>
        </ul>
    </div>
</div>

<!-- End Stunning header -->

<!-- Case Item -->
<div class="container">
    <div class="row medium-padding120">

        <div class="col-lg-12">

            <div class="heading align-center">
                <h4 class="h1 heading-title">Kami Telah Membantu Lebih Dari 60 Perusahaan</h4>
            </div>

            <div class="row sorting-container" data-layout="fitRows">
                <div class="grid-sizer col-lg-4 col-md-4"></div>

                @foreach($gallery as $row)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 sorting-item  b2b smm technology">
                        <div class="case-item align-center mb60">
                            <div class="case-item__thumb mouseover lightbox shadow animation-disabled">
                                <img src="{{ asset($row['project_img']) }}" alt="our case">
                            </div>
                            <h6 class="case-item__title">{!! $row['project_name'] !!}</h6>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <nav class="navigation align-center">

                        {!! $gallery->render() !!}

                    </nav>

                </div>

            </div>

        </div>

    </div>
</div>

<!-- End Case Item -->

</div>
@stop