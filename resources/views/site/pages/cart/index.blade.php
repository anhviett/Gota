@extends('site.layouts.master')
@section('title'){{'Trang chủ'}}@endsection
@section('content')
    <!-- breadcrumb area start -->
    <div class="page-layout" data-background="{{asset('site/assets/img/slider/bg_shop.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-area text-center">
                        <h2 class="page-title">Cart</h2>
                        <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('cart.index')}}">cart</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-warning">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="f_cart_area pt-110 mb-100">
        <div class="container">
            <div class="row">
                @php
                    $coupon = \Illuminate\Support\Facades\Session::get('Coupon');
                    $total = \Gloudemans\Shoppingcart\Facades\Cart::total(0,',','.');
                @endphp
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="cart_table">
                        <table>
                            <tr>
                                <td>Hình ảnh</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>
                                <td>Số lượng</td>
                                <td>Tổng tiền</td>
                                <td>Xóa</td>
                            </tr>

                            <tbody>
                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                                        <form action="{{route('cart.update', $product->id)}}" method="POST">
                                            @csrf
                                                @if(\Illuminate\Support\Facades\Session::get('cart') == true)
                                                    <tr class="max-width-set">
                                                        <td>
                                                            <img src="@foreach($products as $prod)
                                                            @if($prod->id == $product->id)
                                                            {{asset('/uploads/').'/'.$prod->avatar}}
                                                            @endif
                                                            @endforeach" alt="">
                                                        </td>
                                                        <td>{{$product->name}}</td>
                                                        <td>₫ {{number_format($product->price,0,',','.')}}
                                                        </td>
                                                        <td><div class="viewcontent__action single_action pt-30">
                                                                <span>
                                                                    <input type="number" name="qty" id="qty" value="{{$product->qty}}" min=""
                                                                             onchange="updateCart(this.value, '{{$product->rowId}}')">
                                                                </span>
                                                                <span id="output" aria-live="polite" aria-atomic="true"></span>
                                                            </div></td>
                                                        <td>
                                                            ₫ {{number_format($product->price * $product->qty,0,',','.')}}
                                                        </td>
                                                        <td class="width-set">
                                                            <a href="{{route('cart.delete', $product->id)}}"><i
                                                                    class="fal fa-times-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                        </form>
                                    @endforeach
                            </tbody>
                            <tfoot>

                            <tr class="design-footer">

                                @if(\Illuminate\Support\Facades\Session::get('cart'))
                                    @php
                                        if ($total ==0){
                                            \Illuminate\Support\Facades\Session::forget('Coupon');
                                        }
                                    @endphp
                                    <form action="{{route('check.coupon')}}" method="post">
                                        @csrf

                                        <td>
                                            <input type="text"  name="Coupon" placeholder="Mã giảm giá"
                                                   value="{{isset($coupon['coupon_code']) ? $coupon['coupon_code'] : ""}}"
                                            >
                                        </td>
                                        <td><button type="submit">Nhập mã giảm giá</button></td>
                                        <td colspan="1">

                                    @if(\Illuminate\Support\Facades\Session::get('Coupon'))
                                        <a class="btn btn-default" href="{{route('unset.coupon')}}">Xóa mã khuyến mãi</a>
                                    @endif
                                        </td>

                                    </form>
                                    @endif


                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="cart__acount">
                        <h5>Tổng giá tiền (₫)</h5>
                        <table>
                            <tr class="first-child">
                                <td>Tiền </td>
                                <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0,',','.')}}</td>
                            </tr>
                            <tr class="first-child lastchild">
                                <td>Phí ship</td>
                                <td>Nhập địa chỉ giao hàng để biết giá tiền</td>
                            </tr>
                            <tr class="first-child">
                                <td>Tổng</td>
                                <td>{{\Gloudemans\Shoppingcart\Facades\Cart::total(0,',','.')}}</td>
                            </tr>
                            @if($coupon)
                                <tr class="first-child">
                                    @if($coupon['coupon_condition'] == 1)
                                        <td>Mã giảm</td>
                                        <td>{{$coupon['coupon_number']}} %</td>
                                </tr>
                                @php
                                    $total_coupon = floatval($total) * floatval($coupon['coupon_number'])/100;
                                @endphp
                                <tr class="first-child">
                                    <td>Còn lại</td>
                                    <td>{{(floatval($total) - $total_coupon) * 1000000}}</td>
                                </tr>
                                @elseif($coupon['coupon_condition'] == 2)
                                <tr class="first-child">
                                    <td> Mã giảm   </td>
                                    <td>{{number_format($coupon['coupon_number'], 0,',','.')}}</td>
                                </tr>
                                <tr class="first-child">
                                    <td>Tổng đã giảm</td>
                                    <td>{{number_format((floatval($total) * 1000000 - $coupon['coupon_number']),0,',','.')}}</td>
                                </tr>

                                @endif
                            @endif
                            <tr>
                                <td colspan="2">
                                    <a href="{{route('checkout.index', session()->get('id'))}}"><input type="submit" value="procced to checkout"></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('footer_script')
    <script>
        function updateCart(qty, rowId) {
            $.ajax({
                type:'GET',
                url: '{{route('cart.update')}}',
                data:{
                    qty:qty,
                    rowId:rowId
                },
                success: function(data){
                    location.reload();
                }
            })
        }
    </script>
@endsection
