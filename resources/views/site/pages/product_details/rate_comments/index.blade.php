<div class="single_product_long_desc pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl 12 col-lg-12 col-md-12">
                <div class="categories__tab single_disc_tab">
                    <ul class="nav nav-tabs justify-content-center" id="myerTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab3" data-bs-toggle="tab"
                                    data-bs-target="#Description" type="button" role="tab"
                                    aria-selected="true">Mô tả</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#Additional"
                                    type="button" role="tab"
                                    aria-selected="false">Thông tin sản phẩm</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Reviews"
                                    type="button" role="tab"
                                    aria-selected="false">Nhận xét (1)</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabCffontent">
                        <div class="tab-pane fade show active" id="Description" role="tabpanel" >
                            <div class="single_product_description text-center pt-80">
                                <h2 class="title-5 border-0">YOUR NEW AND IMPROVED​</h2>

                                {!!$product->content !!}

                            </div>
                            <!-- categories area start -->
                            <div class="categories_area pt-50 mb-100">
                                <div class="container-fluid">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="section-wrapper text-center mb-35">
                                            <h2 class="section-title">Sản phẩm liên quan</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="categories__tab">
                                                <div class="tab-content" id="dfmyTabContent">
                                                    <div class="tab-pane fade show active" id="hoeerme" role="tabpanel" >
                                                        <div class="container">
                                                            <div class="product-active swiper-container">
                                                                <div class="swiper-wrapper">
                                                                    @foreach($related as $i => $rela)
                                                                        <div class="product-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay="{{ $i / 5 }}s">
                                                                            <div class="product">
                                                                                <div class="product__thumb">
                                                                                    <a href="{{route('product_detail.show', $rela->id)}}">
                                                                                        <img class="product-primary" src="{{asset('/uploads/').'/'.$rela->avatar}}" alt="product_image">
                                                                                        <img class="product-secondary" src="{{asset('/uploads/').'/'.$rela->avatar}}" alt="product_image">
                                                                                    </a>
                                                                                    <div class="product__update">
                                                                                        <a class="#">new</a>
                                                                                    </div>
                                                                                    <div class="product-info mb-10">
                                                                                        <div class="product_category">
                                                                                            <span>{{$rela->category->name}}</span>
                                                                                        </div>
                                                                                        <div class="product_rating text-end">
                                                                                            <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                            <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                            <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                            <a href="#"><i class="fal fa-star"></i></a>
                                                                                            <a href="#"><i class="fal fa-star"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="product__name">
                                                                                        <h4><a href="{{route('product_detail.show', $rela->id)}}">{{$rela->name}}</a></h4>
                                                                                        <div class="pro-price">
                                                                                            <p class="p-absoulute pr-1"><span>₫ </span>
                                                                                                <span class="discount_price">
                                                                                                    {{number_format($rela->discount_price,0,',','.')}}
                                                                                                </span>

                                                                                                <span>₫ </span>
                                                                                                <span class="base_price text-decoration-line-through">
                                                                                                    {{number_format($rela->base_price,0,',','.')}}
                                                                                                </span>
                                                                                            </p>
                                                                                            <a class="p-absoulute pr-2" href="{{route('cart.add', $rela->id)}}">add to cart</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="product__action">
                                                                                        <div class="inner__action">
                                                                                            <div class="wishlist">
                                                                                                <a href="#"><i class="fal fa-heart"></i></a>
                                                                                            </div>
                                                                                            <div class="view">
                                                                                                <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                            </div>
                                                                                            <div class="layer">
                                                                                                <a href="#"><i
                                                                                                        class="fal fa-layer-group"></i></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="profidfle" role="tabpanel" >
                                                        <div class="container">
                                                            <div class="product-active swiper-container">
                                                                <div class="swiper-wrapper">
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating text-end">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt noise show for</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i
                                                                                                    class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="lightblueclr" href="#">-20%</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat3.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <!-- <div class="product__update">
                                                                                                    <a class="#">new</a>
                                                                                                </div> -->
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="lightblueclr" href="#">-30%</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="contacfdft" role="tabpanel">
                                                        <div class="container">
                                                            <div class="product-active swiper-container">
                                                                <div class="swiper-wrapper">
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating text-end">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i
                                                                                                    class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="lightblueclr" href="#">-20%</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat3.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <!-- <div class="product__update">
                                                                                                    <a class="#">new</a>
                                                                                                </div> -->
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="lightblueclr" href="#">-30%</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="kidfdds" role="tabpanel">
                                                        <div class="container">
                                                            <div class="product-active swiper-container">
                                                                <div class="swiper-wrapper">
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating text-end">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i
                                                                                                    class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="lightblueclr" href="#">-20%</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat3.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <!-- <div class="product__update">
                                                                                                    <a class="#">new</a>
                                                                                                </div> -->
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="lightblueclr" href="#">-30%</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-item swiper-slide">
                                                                        <div class="product">
                                                                            <div class="product__thumb">
                                                                                <a href="single.html">
                                                                                    <img class="product-primary"
                                                                                         src="./assets/img/product/cat1.png" alt="product_image">
                                                                                    <img class="product-secondary"
                                                                                         src="./assets/img/product/cat2.png" alt="product_image">
                                                                                </a>
                                                                                <div class="product__update">
                                                                                    <a class="#">new</a>
                                                                                </div>
                                                                                <div class="product-info mb-10">
                                                                                    <div class="product_category">
                                                                                        <span>Shoes, Clothing</span>
                                                                                    </div>
                                                                                    <div class="product_rating">
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__name">
                                                                                    <h4><a href="single.html">NikeCourt Air Zoom Prestige</a></h4>
                                                                                    <div class="pro-price">
                                                                                        <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                                            <span>$</span>680.00</p>
                                                                                        <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product__action">
                                                                                    <div class="inner__action">
                                                                                        <div class="wishlist">
                                                                                            <a href="#"><i class="fal fa-heart"></i></a>
                                                                                        </div>
                                                                                        <div class="view">
                                                                                            <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="layer">
                                                                                            <a href="#"><i
                                                                                                    class="fal fa-layer-group"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- categories area end -->
                        </div>

                        <div class="tab-pane fade" id="Additional" role="tabpanel" >
                            <div class="additional-information">
                                <ul>
                                    <li class="title">Thông tin</li>
                                    <li>Size</li>
                                    <li>
                                    @foreach($product->sizes as $size)
                                       {{$size->name}},
                                    @endforeach
                                    </li>
                                    <li>Màu sắc</li>
                                    <li>
                                    @foreach($product->colors as $color)
                                        {{$color->name}},
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Reviews" role="tabpanel">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-8 offset-xl-2">
                                        <h4 class="pt-60 mb-25 add_review">Add a review </h4>
                                        <h4 class="mb-25 rating-title">Your Rating</h4>
                                        <span>
                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                </span>
                                        <div class="review_form">
                                            <form action="#">
                                                <div class="review__wrap_1">
                                                    <label>Your Review *</label>
                                                    <textarea name="review"></textarea>
                                                </div>
                                                <div class="review__wrap">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <label>Name <span>*</span></label>
                                                            <input type="text" name="fname">
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="review__wrap">
                                                                <label>Email <span>*</span></label>
                                                                <input type="text" name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review__wrap_2">
                                                    <input type="checkbox" name="email">
                                                    <span class="pt-10 pb-10">Save my name, email, and website in this browser for the next time I comment.</span>
                                                </div>
                                                <div class="review__wrap pt-15">
                                                    <button type="submit">submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="product__reviews_comment pt-150">
                                            <p>1 review for Detail V-Neck Sweater</p>
                                            <div class="user_design">
                                                <div class="user__thumb">
                                                    <img src="./assets/img/desc/team2-60x60.png" alt="">
                                                </div>
                                                <div class="user__content">
                                                    <h4>admin<span> – July 13, 2020: </span></h4>
                                                    <span>
                                                                <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star start-color"></i></a>
                                                            </span>
                                                    <p>Designed by Hans J. Wegner in 1949 as one of the first models created especially for Carl Hansen & Son, and produced since 1950. The last of a series of chairs Wegner designed based on inspiration from antique
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
