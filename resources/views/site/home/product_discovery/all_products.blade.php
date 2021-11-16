<div class="tab-pane fade show active" id="home">
    <div class="container">
        <div class="product-active h-2-product-active swiper-container">
            <div class="swiper-wrapper">
            @foreach($products as $i => $product)
                <div class="product-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay="{{ $i / 5 }}s">
                    <div class="product">
                        <div class="product__thumb">
                            <a href="{{route('product_detail.show', $product->id)}}">
                                <img class="product-primary" src="{{asset('/uploads/').'/'.$product->avatar}}" alt="product_image">
                                <img class="product-secondary" src="{{asset('/uploads/').'/'.$product->avatar}}" alt="product_image">
                            </a>
                            <div class="product__update">
                                <a class="#">new</a>
                            </div>
                            <div class="product-info mb-10">
                                <div class="product_category">
                                    <span>{{$product->category->name}}</span>
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
                                <h4><a href="{{route('product_detail.show', $product->id)}}">{{$product->name}}</a></h4>
                                <div class="pro-price">
                                    <p class="p-absoulute pr-1"><span>₫ </span>
                                        <span class="discount_price">
                                            {{number_format($product->discount_price,0,',','.')}}
                                        </span>

                                        <span>₫ </span>
                                        <span class="base_price text-decoration-line-through">
                                            {{number_format($product->base_price,0,',','.')}}
                                        </span>
                                    </p>
                                    <a class="p-absoulute pr-2" href="{{route('cart.add', $product->id)}}">add to cart</a>
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
                                        <a href="#"><i class="fal fa-layer-group"></i></a>
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
