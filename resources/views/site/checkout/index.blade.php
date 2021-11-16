@extends('site.layouts.master')
@section('title'){{'Trang chủ'}}@endsection
@section('content')
<div class="checkout_area pt-80">
    <div class="container">
        <div class="notification__message">
            <p><i class="fal fa-window-maximize"></i>Bạn muốn phản hồi? hoặc nhấn vào đây để <a href="{{route('login_register')}}">đăng nhập</a></p>

        </div>
        @if(session()->has('error'))
            <div class="alert alert-warning">
                {{ session()->get('error') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="checkout_form mb-100">
                    <form action="{{route('save_checkout')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="checkout__wrap">
                            <label>Họ và tên<span>*</span></label>
                            <input type="text" name="shipping_name" value="{{$customer->customer_name ? : ''}}" required>
                        </div>

                        <div class="checkout__wrap">
                            <label>Tên công ty (nếu có) <span></span></label>
                                <input type="text" name="shipping_cname">
                        </div>
                        <div class="checkout__wrap">
                            <label>Chọn tỉnh / thành phố: <span>*</span></label>
                            <select name="calc_shipping_provinces" required="">
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                        </div>
                        <div class="checkout__wrap">
                            <label>Chọn quận / huyện: <span>*</span></label>
                            <select name="calc_shipping_district" required="">
                                <option value="">Quận / Huyện</option>
                            </select>
                        </div>
                        <input class="billing_address_1" name="" type="hidden" value="">
                        <input class="billing_address_2" name="" type="hidden" value="">
                        <div class="checkout__wrap">
                            <label>Xã / phường: <span></span></label>
                            <input type="text" name="shipping_country">
                        </div>
                        <div class="checkout__wrap">
                            <label>Điện thoại <span>*</span></label>
                            <input type="text" name="shipping_phone" required
                                   value="{{$customer->customer_phone ? : ""}}">
                        </div>
                        <div class="checkout__wrap">
                            <label>Email:  <span>*</span></label>
                            <input type="email" name="shipping_email"
                                   value="{{$customer->email ? : ''}}">
                        </div>

                        <div class="checkout__wrap">
                            <label>Ghi chú (nếu có) <span></span></label>
                            <textarea  name="shipping_notes" placeholder="Lưu ý về đơn đặt hàng hoặc để giao hàng ..."></textarea>
                        </div>
                        <div class="order-button" style="width: 50%;margin: 11px auto;">
                            <button type="submit">Đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12">
                <div class="cart__acount ml-50">
                    <h5>Đơn hàng</h5>
                    <table>
                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                        <tr class="first-child-2">
                            <td>Sản phẩm</td>
                            <td>{{$product->name}} <span>× {{$product->qty}}</span></td>
                        </tr>
                        <tr class="first-child-2">
                            <td>Tạm tính</td>
                            <td class="lightbluee">₫ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                        </tr>
                        <tr class="first-child lastchild">
                            <td>Shipping</td>
                            <td>Free </td>
                        </tr>
                        <tr class="first-child-2">
                            <td>Total</td>
                            <td class="lightbluee">₫ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="checkout__accordion mt-30">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Kiểm tra thanh toán
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Vui lòng nhập các thông tin cần thiết
                                        </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Thanh toán bằng tiền mặt khi giao hàng
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Pay with cash upon delivery.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        PayPal
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Thanh toán khi giao hàng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="terms pt-50 pb-20">
                        <p>Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của bạn và cho các mục đích khác được mô tả trong chính sách bảo mật của chúng tôi</p>
                        <div class="check_term">
                            <input type="checkbox">
                            <p>Tôi đã đọc và đồng ý với các điều khoản và điều kiện <span>*</span></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer_script')
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>
        if (address_2 = localStorage.getItem('address_2_saved')) {
            $('select[name="calc_shipping_district"] option').each(function() {
                if ($(this).text() == address_2) {
                    $(this).attr('selected', '')
                }
            })
            $('input.billing_address_2').attr('value', address_2)
        }
        if (district = localStorage.getItem('district')) {
            $('select[name="calc_shipping_district"]').html(district)
            $('select[name="calc_shipping_district"]').on('change', function() {
                var target = $(this).children('option:selected')
                target.attr('selected', '')
                $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                address_2 = target.text()
                $('input.billing_address_2').attr('value', address_2)
                district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('district', district)
                localStorage.setItem('address_2_saved', address_2)
            })
        }
        $('select[name="calc_shipping_provinces"]').each(function() {
            var $this = $(this),
                stc = ''
            c.forEach(function(i, e) {
                e += +1
                stc += '<option value=' + e + '>' + i + '</option>'
                $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                if (address_1 = localStorage.getItem('address_1_saved')) {
                    $('select[name="calc_shipping_provinces"] option').each(function() {
                        if ($(this).text() == address_1) {
                            $(this).attr('selected', '')
                        }
                    })
                    $('input.billing_address_1').attr('value', address_1)
                }
                $this.on('change', function(i) {
                    i = $this.children('option:selected').index() - 1
                    var str = '',
                        r = $this.val()
                    if (r != '') {
                        arr[i].forEach(function(el) {
                            str += '<option value="' + el + '">' + el + '</option>'
                            $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                        })
                        var address_1 = $this.children('option:selected').text()
                        var district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('address_1_saved', address_1)
                        localStorage.setItem('district', district)
                        $('select[name="calc_shipping_district"]').on('change', function() {
                            var target = $(this).children('option:selected')
                            target.attr('selected', '')
                            $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                            var address_2 = target.text()
                            $('input.billing_address_2').attr('value', address_2)
                            district = $('select[name="calc_shipping_district"]').html()
                            localStorage.setItem('district', district)
                            localStorage.setItem('address_2_saved', address_2)
                        })
                    } else {
                        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
                        district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('district', district)
                        localStorage.removeItem('address_1_saved', address_1)
                    }
                })
            })
        })

    </script>
@endsection
