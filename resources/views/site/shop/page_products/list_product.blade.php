<div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-contact-tab">
    @if(!$paginateProducts->isEmpty())
        @foreach($paginateProducts as $product)
            <div class="border-top">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="list-product">
                            <div class="list__thumb">
                                <a href="{{route('product_detail.show', $product->id)}}"><img src="@if($product->avatar)
                                    {{asset('/uploads/').'/'.$product->avatar}}
                                    @else
                                    {{asset('/backend/assets/img/images.gif')}}
                                    @endif" alt="product_image">
                                    <img class="product-secondary" src="@if($product->avatar)
                                    {{asset('/uploads/').'/'.$product->avatar}}
                                    @else
                                    {{asset('/backend/assets/img/images.gif')}}
                                    @endif" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="list__content">
                            <div class="viewcontent">
                                <div class="viewcontent__header">
                                    <a href="{{route('product_detail.show', $product->id)}}"><h2 class="mb-10">especially for Carl Hansen</h2></a>
                                </div>
                                <div class="viewcontent__rating">
                                    <i class="fal fa-star ratingcolor"></i>
                                    <i class="fal fa-star ratingcolor"></i>
                                    <i class="fal fa-star ratingcolor"></i>
                                    <i class="fal fa-star"></i>
                                </div>
                                <div class="viewcontent__price">
                                    <h4><span>$</span> 55.00</h4>
                                </div>
                                <div class="view__para">
                                    <p>Designed by Hans J. Wegner in 1949 as one of the first models created especially for Carl Hansen & Son, and produced since 1950. The last of a series of chairs Wegner designed based on inspiration from antique Chinese armchairs. The gently rounded top together with the back and seat offers a</p>
                                </div>
                                <div class="list-actions pt-20">
                                    <div class="viewcontent__action">
                                        <span><a  href="{{route('cart.add', $product->id)}}">add to cart</a></span>
                                        <a  href="#"><i class="fal fa-heart"></i></a>
                                        <a class="ml-5" href="#"><i class="fal fa-layer-group"></i></a>
                                    </div>
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
