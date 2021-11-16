@include('site.search.index')

<div class="fix">
    <div class="side-info">
        <button class="side-info-close"><i class="fal fa-times"></i></button>
        <div class="side-info-content">
            <div class="mobile-menu"></div>
            <div class="contact-infos mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>123/A, Miranda City Likaoli
                        Prikano, Dope</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p>+0989 7876 9865 9</p>
                    <p>+(090) 8765 86543 85</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>info@example.com</p>
                    <p>example.mail@hum.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>

<!-- cart area start  -->
<div class="cart__sidebar">
    <div class="container">
        <div class="cart__content">

            <div class="cart-text">
                <h3 class="mb-40">Giỏ hàng của bạn</h3>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                <div class="add_cart_product">
                    <div class="add_cart_product__thumb">
                        <img src="
                        @foreach($products as $prod)
                            @if($prod->id == $product->id)
                            {{asset('/uploads/').'/'.$prod->avatar}}
                            @endif
                        @endforeach" alt="">
                    </div>
                    <div class="add_cart_product__content">
                        <h5><a href="{{URL::to('/site/shop')}}">{{$product->name}}</a></h5>
                        <p>{{$product->qty}} × ₫ {{number_format($product->price,0,',','.')}}</p>
                        <a class="cart_close" href="{{route('cart.delete', $product->id)}}"><i class="fal fa-times"></i></a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="cart-icon">
                <i class="fal fa-times"></i>
            </div>
            <div class="cart-bottom">
                <div class="cart-bottom__text">
                    <span>Tổng :</span>
                    <span class="end">₫ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0,',','.')}}</span>
                    <a href="{{route('cart.index', session()->get('id'))}}">Xem giỏ hàng</a>
                    <a href="{{route('checkout.index', session()->get('id'))}}">Thanh toán</a>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="cart-offcanvas-overlay"></div>
<!-- cart area end  -->

<!-- header area start -->
<header class="header-area">
    <div class="gota_top bg-soft d-none d-sm-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="gota_lang">
                        <ul>
                            <li><a href="#">usd<i class="fal fa-chevron-down"></i></a>
                                <ul class="additional_dropdown">
                                    <li><a href="#">euro</a></li>
                                </ul>
                            </li>
                            <li><a href="#">english<i class="fal fa-chevron-down"></i></a>
                                <ul class="additional_dropdown">
                                    <li><a href="#">frences</a></li>
                                    <li><a href="#">japanes</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 offset-xl-5 col-lg-6 col-md-6 col-sm-6 text-end">
                    <div class="gota_right">
                        <ul>
                            @php
                                $customer = \Illuminate\Support\Facades\Session::get('customer_id');
                                $shipping = \Illuminate\Support\Facades\Session::get('id');
                                var_dump($customer);
                                var_dump($shipping);
                            @endphp
                            <li><a href="cart.html">Yêu thích</a></li>
                            @if($customer != null && $shipping == null)
                                <li><a href="{{route('checkout.index')}}">Thanh toán</a></li>
                            @elseif($customer != null && $shipping != null)
                                <li><a href="{{route('payment')}}">Thanh toán</a></li>
                            @else
                            <li><a href="{{route('login_register')}}">Thanh toán</a></li>
                            @endif
                            @if($customer != null)
                            <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                            @else
                                <li><a href="{{route('login_register')}}">Đăng nhập</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('site.home.menu.menu')
</header>
<!-- header area end -->
