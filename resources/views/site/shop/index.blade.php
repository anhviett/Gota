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
                        <form method="GET" action="" class="filter-product_widget">
                            <input type="hidden" name="sort" value="">
                            <div class="product-widget pt-50">
                                <h3 class="widget-title mb-30">Size</h3>
                                <div class="layer-size">
                                    @foreach($sizes as $size)
                                        <label style="cursor: pointer;">
                                            <span>{{$size->name}}</span>
                                            <input type="checkbox" value="{{ $size->id }}"
                                                   {{ ((isset($_GET['sizes']) && !empty($_GET['sizes']) && in_array($size->id, $_GET['sizes'])) ? 'checked' : '') }} name="sizes[]"
                                                   style=" width: 20px;">

                                            @php($i = 0)
                                            @foreach($products as $product)
                                                @if($product->sizes->contains($size))
                                                    @php($i++)
                                                @endif
                                            @endforeach

                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-widget pt-50">
                                <h3 class="widget-title mb-30">Màu sắc</h3>
                                <div class="colors-layer">
                                    @foreach($colors as $color)
                                        <label style="cursor: pointer;">
                                            <span class="{{$color->slug}}"></span>
                                            <input type="checkbox" value="{{ $color->id }}" class="d-none"
                                                   {{ ((isset($_GET['colors']) && !empty($_GET['colors']) && in_array($color->id, $_GET['colors'])) ? 'checked' : '') }} name="colors[]"
                                                   style="    width: 20px;">

                                            @php($i = 0)
                                            @foreach($products as $product)
                                                @if($product->colors->contains($color))
                                                    @php($i++)
                                                @endif
                                            @endforeach

                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <script>
                                $('.filter-product_widget input[type=checkbox]').change(function () {
                                    var form_data = $('form.filter-product_widget').serialize();
                                    console.log(form_data);
                                    window.location.href = "{{URL::to('/site/shop_category/'. $category->slug)}}?" + form_data;
                                });
                                $('.sorter-options').change(function () {
                                    $('input[name=sort]').val($(this).val());
                                    $('.filter-product_widget').submit();
                                });
                            </script>
                        </form>
                        @include('site.shop.top_rated')
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Product tags</h3>
                            <div class="tags mb-50">
                                @foreach($tags as $tag)
                                    <a href="{{route('shop.show_tag', $tag->slug) }}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="shop-top-bar position-relative">
                        <div class="showing-result">
                            <p> Có tất cả {{\App\Models\Product::count()}} sản phẩm</p>
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
                        @section('style.css')
                            <style>
                                .layer-size label span {
                                    display: inline-flex;
                                    line-height: 1;
                                    width: 35px;
                                    height: 35px;
                                    border-radius: 50%;
                                    border: 1px solid #f1f1f1;
                                    align-items: center;
                                    justify-content: center;
                                    color: #666;
                                    background-color: #f1f1f1;
                                    font-size: 13px;
                                }
                                .layer-size label span:hover{
                                    background: #2bb9a9;
                                    color: #ffffff;
                                    -webkit-transition: all 0.3s ease-out 0s;
                                    -moz-transition: all 0.3s ease-out 0s;
                                    -ms-transition: all 0.3s ease-out 0s;
                                    -o-transition: all 0.3s ease-out 0s;
                                    transition: all 0.3s ease-out 0s;
                                }
                                .tags.mb-50 label span{
                                    font-size: 13px;
                                    padding: 3px 10px;
                                    border-radius: 30px;
                                    display: inline-block;
                                    margin: 4px;
                                    background: #f5f5f5;
                                    text-transform: capitalize;
                                    -webkit-transition: all 0.3s ease-out 0s;
                                    -moz-transition: all 0.3s ease-out 0s;
                                    -ms-transition: all 0.3s ease-out 0s;
                                    -o-transition: all 0.3s ease-out 0s;
                                    transition: all 0.3s ease-out 0s;
                                }
                            </style>
                        @endsection
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
