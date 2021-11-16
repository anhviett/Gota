@extends('site.layouts.master')
@section('title'){{'Cửa hàng'}}@endsection
@section('content')
    <!-- breadcrumb area start -->
    <div class="page-layout" data-background="{{asset('site/assets/img/slider/bg_shop.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-area text-center">
                        <h2 class="page-title">shop</h2>
                        <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>

                                    <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Shop</a></li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- shop page start -->
    <div class="shop-page pt-85">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="sidebar">
                        <div class="product-widget">
                            @include('site.shop.product_category')
                        </div>
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Filter By Price</h3>
                            <form action="#">
                                <div class="price-filter">
                                    <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 46.4%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 7.2%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 48.8%;"></span>
                                        <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div>
                                        <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 7.2%; width: 41.6%;"></div></div>
                                    <div class="filter-form-submit mt-35">
                                        <button type="submit">Filter</button>
                                        <div class="filter-price d-inline-block pl-20">Price: <input type="button" id="amount" value="$36 - $244"></div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Size</h3>
                            <div class="layer-size">
                                <span>3XL</span>
                                <span>L</span>
                                <span>M</span>
                            </div>
                        </div>
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Color Options</h3>
                            <div class="colors-layer">
                                <a href="shop.html"><span class="blue"></span></a>
                                <a href="shop.html"><span class="gray"></span></a>
                                <a href="shop.html"><span class="skyblue"></span></a>
                                <a href="shop.html"><span class="red"></span></a>
                                <a href="shop.html"><span class="yellow"></span></a>
                            </div>
                        </div>
                        <div class="product_list_widget">
                            <h3 class="widget-title mb-30 pt-50">Top rated</h3>
                            <div class="item-widget">
                                <div class="img-left">
                                    <a href="single.html"><img src="./assets/img/product/10.jpg" alt="product-meta"></a>
                                </div>
                                <div class="product-meta">
                                    <a href="single.html"><h4 class="sm-title">Arsenal Home Jersey</h4></a>
                                    <span>$55.00</span>
                                </div>
                            </div>
                            <div class="item-widget">
                                <div class="img-left">
                                    <a href="single.html"><img src="./assets/img/product/11.jpg" alt="product-meta"></a>
                                </div>
                                <div class="product-meta">
                                    <a href="single.html"><h4 class="sm-title">Lorem Ipsum simply</h4></a>
                                    <span>$55.00</span>
                                </div>
                            </div>
                            <div class="item-widget">
                                <div class="img-left">
                                    <a href="single.html"><img src="./assets/img/product/12.jpg" alt="product-meta"></a>
                                </div>
                                <div class="product-meta">
                                    <a href="single.html"><h4 class="sm-title">dummy text of the</h4></a>
                                    <span>$55.00</span>
                                </div>
                            </div>
                            <div class="item-widget">
                                <div class="img-left">
                                    <a href="single.html"><img src="./assets/img/product/13.jpg" alt="product-meta"></a>
                                </div>
                                <div class="product-meta">
                                    <a href="single.html"><h4 class="sm-title">printing and typesetting</h4></a>
                                    <span>$55.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Product tags</h3>
                            <div class="tags mb-50">
                                <a href="shop.html">Basketball</a>
                                <a href="shop.html">Handbag</a>
                                <a href="shop.html">Jackets</a>
                                <a href="shop.html">Kids & Young</a>
                                <a href="shop.html">Training Wear</a>
                                <a href="shop.html">Women’s</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="shop-top-bar position-relative">
                        <div class="showing-result" style="position: absolute;top: -50px;left: 20%;">
                            <p> Kết quả tìm kiếm của: {{request()->input('search')}}</p>
                        </div>
                        <div class="shop-tab">
                            <nav>
                                <div class="nav nav-tabs shop-tabs" id="nav-tab" role="tablist">
                                    <button>
                                        <span>Chế độ xem</span>
                                    </button>
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                        <img src="{{asset('site/assets/img/essential/i2.svg')}}" alt="">
                                    </button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                        <img src="{{asset('site/assets/img/essential/i3.svg')}}" alt="">
                                    </button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                        <img src="{{asset('site/assets/img/essential/i4.svg')}}" alt="">
                                    </button>
                                    <button class="nav-link" id="nav-contact-tab2" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                        <img src="{{asset('site/assets/img/essential/list.svg')}}" alt="">
                                    </button>
                                </div>
                            </nav>
                        </div>
                        @include('site.shop.filter_product_category')
                    </div>
                    <div class="shop-page-product pt-50 pb-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="tab-content" id="nav-tabContent">
                                    @include('site.shop.page_products.page_2')
                                    @include('site.shop.page_products.page_3')
                                    @include('site.shop.page_products.page_4')
                                    @include('site.shop.page_products.list_product')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop page end -->

    @include('site.search.index')
    @include('site.home.popup.index')


@endsection
