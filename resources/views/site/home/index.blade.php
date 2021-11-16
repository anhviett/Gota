@extends('site.layouts.master')
@section('title'){{'Trang chủ'}}@endsection
@section('content')
<!-- slider start -->
@include('site.home.sliders.index')
<!-- slider end -->
<!-- banar area start -->
@include('site.home.banners.index')
<!-- banar area end -->

<!-- categories area start -->
@include('site.home.product_discovery.index')
<!-- categories area end -->

@include('site.home.special_product.index')

<!-- categories area start -->
@include('site.home.product_mostviews.index')
<!-- categories area end -->

<!-- gallary images area start -->
<div class="gallary-2">
    <div class="container-fluid padding-remove">
        <div class="row g-0">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="gallary-image-2 h-100">
                    <a href="{{route('shop.index')}}"><img class="h-100 cover-img" src="./assets/img/gallary/banner-footer-home2-1.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 d-md-none d-xl-block">
                <div class="email-form" data-background="./assets/img/gallary/banner-footer-home2-3.jpg">
                    <div class="company__info info2">
                        <h3 class="f-title">get in touch</h3>
                        <p>Sign up for all the news about our latest arrivals and<br>
                            get an exclusive early access shopping. Join <br>
                            <span>60.000+ Subscribers</span> and get a new discount coupon<br> on every Saturday.
                        </p>
                        <div class="subscribe  subscribe-2 pt-20">
                            <form action="#">
                                <input class="mb-10"  type="email" placeholder="Subscribe to our newsletter..."/>
                                <button>Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="gallary-image-2 h-100">
                    <a href="shop.html"><img class="h-100 cover-img" src="./assets/img/gallary/banner-footer-home2-2.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- gallary images area end -->

@include('site.home.popup.index')


@endsection


