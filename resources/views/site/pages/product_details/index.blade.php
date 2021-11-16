@extends('site.layouts.master')
@section('title'){{'Product Details'}}@endsection
@section('content')
<!-- single_breadcrumb_area start -->
<div class="single_breadcrumb pt-25">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
        @php
            $customer = \Illuminate\Support\Facades\Session::get('customer_id');
            var_dump($customer);
        @endphp
        <form action="@if($customer == null)
        {{route('login_register')}}
        @else
        {{route('cart.add', $product->id)}}
        @endif
            ">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="single_product_tab">
                            <div class="single_prodct">
                                <ul class="nav nav-tabs justify-content-center mb-55" id="dfde" role="tablist">
                                    @foreach($product->images as $count => $img)
                                        <li class="nav-item" role="presentation">
                                            <button @if($count == 0) class="nav-link active"
                                                    @else() class="nav-link"
                                                    @endif
                                                    id="{{$product->category->slug}}-{{$img->id}}-tab" data-bs-toggle="tab"
                                                    data-bs-target="#{{$product->category->slug}}-{{$img->id}}" type="button" role="tab"
                                                    aria-selected="{{$img['id'] == $product->id ? 'true' : 'false'}}"><img src="{{asset('uploads/' . $img->path)}}" alt=""></button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="single_preview_product">
                            <div class="single-popup-view">
                                <a class="popup-image" href="{{asset('/uploads/').'/'.$product->avatar}}"><i class="fal fa-search"></i></a>
                            </div>
                            <div class="tab-content" id="myTabefContent">
                                @foreach($product->images as $count => $img)
                                    <div @if($count == 0) class="tab-pane fade show active" @else class="tab-pane fade" @endif
                                        id="{{$product->category->slug}}-{{$img->id}}" role="tabpanel" >
                                        <div class="full-view">
                                            <img src="{{asset('uploads/' . $img->path)}}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="single_preview_content pl-30">
                    <h2 class="title-5 edit-title border-bottom-0">{{$product->name}}</h2>
                    <div class="s-product-review">
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star"></i></span>
                        <span class="pl-left">(1 customer review)</span>
                    </div>
                    <div class="s-price pt-30 mb-30">
                        <span>₫ {{number_format($product->discount_price,0,',','.')}}</span>
                    </div>
                    <div class="s-des">
                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="viewcontent__action single_action pt-30">
                        <span><input type="number" placeholder="1"></span>
                        <span><a href="{{route('cart.add', $product->id)}}">+ add to cart</a></span>
                        <span><i class="fal fa-heart"></i></span>
                        <span><i class="fas fa-compress"></i></span>
                    </div>
                    <div class="viewcontent__footer border-top-0 border-bottom pb-30">
                        <ul>
                            <li>Danh mục:</li>
                            <li>Mã hàng:</li>
                        </ul>
                        <ul>
                            <li>{{$product->category->name}}</li>
                            <li>{{ '0' .$product->id}}</li>
                        </ul>
                    </div>
                    <div class="social__media f-social-media mb-30 pt-15">
                        <h3 class="f-title edit-f-title">FOLLOW US ON</h3>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- single_breadcrumb_area end -->

@include('site.pages.product_details.rate_comments.index')



<!-- popup area start -->
<div class="overlay"></div>
<div class="product-popup">
    <div class="view-background">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="quickview">
                    <div class="quickview__thumb">
                        <img src="./assets/img/quick_view/25.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="viewcontent">
                    <div class="viewcontent__header">
                        <h2>Brown Leather Bags</h2>
                        <a class="view_close product-p-close" href="javascript:void(0)"><i
                                class="fal fa-times-circle"></i></a>
                    </div>
                    <div class="viewcontent__rating">
                        <i class="fal fa-star ratingcolor"></i>
                        <i class="fal fa-star ratingcolor"></i>
                        <i class="fal fa-star ratingcolor"></i>
                        <i class="fal fa-star"></i>
                    </div>
                    <div class="viewcontent__price">
                        <h4><span>$</span>99.00</h4>
                    </div>
                    <div class="viewcontent__stock">
                        <h4>Available :<span> In stock</span></h4>
                    </div>
                    <div class="viewcontent__details">
                        <p>Anlor sit amet, consectetur adipiscing elit. Fusce condimentum est lacus, non pretium
                            risus lacinia vel. Fusce eget turpis orci.</p>
                    </div>
                    <div class="viewcontent__action">
                        <span>Qty</span>
                        <span><input type="number" placeholder="1"></span>
                        <span><a href="#">add to cart</a></span>
                        <span><i class="fal fa-heart"></i></span>
                        <span><i class="fal fa-info-circle"></i></span>
                    </div>
                    <div class="viewcontent__footer">
                        <ul>
                            <li>Category:</li>
                            <li>SKU:</li>
                            <li>Brand:</li>
                        </ul>
                        <ul>
                            <li>Watches</li>
                            <li>2584-MK63</li>
                            <li>Brenda</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popup area end -->
@endsection
