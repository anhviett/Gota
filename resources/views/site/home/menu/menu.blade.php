<div class="gota_bottom position-relative">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 d-none d-sm-block">
                <div class="gota_search">
                    <form class="search_form">
                        <button class="search_action"><i
                                class="fal fa-search d-sm-none d-md-block"></i></button>
                        <input type="text" placeholder="search" />
                    </form>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-4 col-sm-4">
                <div class="sidemenu sidemenu-1 d-lg-none d-md-block">
                    <a class="open" href="#"><i class="fal fa-bars"></i></a>
                </div>
                <div class="main-menu">
                    <nav id="mobile-menu">
                        <ul>
                            <li><a href="{{route('home.index')}}">Trang chủ</a>
                            </li>
                            <li class="position-static menu-item-has-children"><a href="{{route('shop.index')}}">Shop</a>
                                <ul class="mega_menu" data-background="{{asset('site/assets/img/mega-menu/bkg-megamenu.jpg')}}" style="height: 300px">
                                    <li>
                                        <h4 class="mega_title">Phụ kiện</h4>
                                        <ul class="mega_item">
                                            @foreach($product_categories as $key => $product_category)
                                                @if($key == 1 || $key == 0)
                                                    <li><a href="{{route('shop.show_category', $product_category->slug)}}">{{$product_category->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="mega_title">Các loại giày</h4>
                                        <ul class="mega_item">
                                            @foreach($product_categories as $key => $product_category)
                                                @if($key !== 1 && $key !== 0)
                                                    <li><a href="{{route('shop.show_category', $product_category->slug)}}">{{$product_category->name}}</a></li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="mega_title">Chi tiết sản phẩm</h4>
                                        <ul class="mega_item">
                                            <li><a href="{{route('product_detail.index', 1)}}"> Xem chi tiết</a></li>

                                        </ul>
                                    </li>
                                    <li>

                                    </li>
                                </ul>
                            </li>
                            @php
                                $soccer = \App\Models\Taggable::where('tag_id', 1)->pluck('taggable_id')->take(7)->toArray();
                                $gym = \App\Models\Taggable::where('tag_id', 4)->pluck('taggable_id')->take(7)->toArray();
                                $basketball = \App\Models\Taggable::where('tag_id', 2)->pluck('taggable_id')->take(7)->toArray();
                                $product_soccer = \App\Models\Product::whereIn('id', $soccer)->get();
                                $product_gym =  \App\Models\Product::whereIn('id', $gym)->get();
                                $product_basketball =  \App\Models\Product::whereIn('id', $basketball)->get();


                            @endphp
                            <li class="position-static menu-item-has-children"><a href="#">Thể loại</a>
                                <ul class="mega_menu_2">
                                    <li data-background="{{asset('site/assets/img/mega-menu/product2.jpg')}}">
                                        <h4 class="mega_title_2">Bóng đá</h4>
                                        <ul class="mega_item_2">
                                                @foreach($product_soccer as $product)
                                                    <li><a href="{{URL::to('/site/shop/'.Str::slug($product->name))}}">{{$product->name}}</a></li>
                                                @endforeach

                                        </ul>
                                    </li>
                                    <li data-background="./assets/img/mega-menu/product3.jpg">
                                        <h4 class="mega_title_2">Tập gym</h4>
                                        <ul class="mega_item_2">
                                            @foreach($product_gym as $product)
                                                <li><a href="{{URL::to('/site/shop/'.Str::slug($product->name))}}">{{$product->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li data-background="{{asset('site/assets/img/mega-menu/product2.jpg')}}">
                                        <h4 class="mega_title_2">Bóng rổ</h4>
                                        <ul class="mega_item_2">
                                            @foreach($product_basketball as $product)
                                                <li><a href="{{URL::to('/site/shop')}}">{{$product->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="d-none d-xl-block" href="{{route('home.index')}}">
                                    <img class="pl-50 pr-50" src="{{asset('site/assets/img/logo/logo-1.png')}}" alt="">
                                </a></li>
                            <li class="menu-item-has-children"><a href="">Blog</a>
                                <ul class="sub-menu">
                                    @foreach($post_categories as $post)
                                        <li><a href="{{route('blog_list.index', $post->slug)}}">{{$post->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">pages</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('about.index')}}">about us</a></li>
                                    <li><a href="{{route('cart.index')}}">Giỏ hàng</a></li>
                                    <li><a href="{{route('404.index')}}">page 404</a></li>
                                    <li><a href="{{route('question.index')}}">Câu hỏi thường gặp</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('service.index')}}">Dịch vụ</a></li>
                            <li><a href="{{route('contact.index')}}">Liên hệ </a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                <div class="gota_cart gotat_cart_1 text-end">
                    <a href="javascript:void(0)"><i class="fal fa-shopping-cart"></i>Giỏ hàng
                        <span class="counter"> ({{\Gloudemans\Shoppingcart\Facades\Cart::count()}})</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
