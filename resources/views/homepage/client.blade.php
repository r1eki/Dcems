@extends('homepage.index')

@section('title')
Dus Kemasan Cantik - Client
@stop

@section('content')
<div class="header-spacer"></div>

<div class="content-wrapper">

<!-- Stunning-header -->
<div class="stunning-header stunning-header-bg-olive">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Client Kami</h1>
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                <a href="{{ url('/') }}">Home</a>
                <i class="seoicon-right-arrow"></i>
            </li>
            <li class="breadcrumbs-item active">
                <span href="#">Client Kami</span>
                <i class="seoicon-right-arrow"></i>
            </li>
        </ul>
    </div>
</div>
<!-- End Stunning-header -->

<!-- Client items style-2 -->
<div class="container">
    <div class="row medium-padding120">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="heading align-center">
                <h4 class="h1 heading-title">Kami Membantu 650+ Pelanggan di Seluruh Dunia</h4>
                <div class="heading-line">
                    <span class="short-line"></span>
                    <span class="long-line"></span>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="clients-grid">

                <div class="row sorting-container" id="clients-grid" data-layout="masonry">
                	@foreach($client as $row)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 sorting-item ecommerce smm">
                        <div class="client-item-style2 col-3 bg-border-color mb30">

                            <div class="client-image">
                                <img src="{!! $row['client_logo'] !!}" alt="{!! $row['client_name'] !!}">
                            </div>

                            <h5 class="clients-item-title">{!! $row['client_name'] !!}</h5>

                            <div class="btn btn-medium btn-border c-primary">
                                <span class="text">Visit Site</span>
                                <span class="semicircle"></span>
                                <i class="seoicon-right-arrow"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@stop