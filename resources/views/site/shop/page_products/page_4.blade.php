<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="row">
        @if(!$paginateProducts->isEmpty())
            @foreach($paginateProducts as $product)
                <div class="col-xl-3">
                    <div class="product product-3">
                        <div class="product__thumb">
                            <a href="{{route('product_detail.show', $product->id)}}">
                                <img class="product-primary" src="@if($product->avatar)
                                {{asset('/uploads/').'/'.$product->avatar}}
                                @else
                                {{asset('/backend/assets/img/images.gif')}}
                                @endif" alt="product_image">
                                <img class="product-secondary" src="@if($product->avatar)
                                {{asset('/uploads/').'/'.$product->avatar}}
                                @else
                                {{asset('/backend/assets/img/images.gif')}}
                                @endif" alt="product_image">
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
                                        <a href="#"><i
                                                class="fal fa-layer-group"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

            <div class="pagination-area">
                <div class="pagination-number">
                    {{$paginateProducts->appends(Request::all())->links('vendor.pagination.bootstrap-4')}}
                </div>
            </div>
        @else
            <h2 class="text-center">Không có sản phẩm nào</h2>
        @endif

    </div>
</div>
