@extends('site.layouts.master')
@section('title'){{'Login Checkout'}}@endsection
@section('content')
    @include('site.search.index')
    <!-- breadcrumb area start -->
    <div class="page-layout about" data-background="assets/img/slider/shop.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-area text-center">
                        <h2 class="page-title">Tài khoản</h2>
                        <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('login_register')}}">Tài khoản</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
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
    <div class="login_register_area">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 offset-xl-1">
                    <h3 class="title-7">Đăng nhập</h3>
                    <div class="login_wrapper">
                        <form action="{{route('login_customer')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="input_wrap">
                                <label>Email <span>*</span></label>
                                <input name="email" type="email" placeholder="Email" required/>

                            </div>
                            <div class="input_wrap">
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password" placeholder="Mật khẩu">
                                <span class="show-pass"><i class="far fa-eye-slash"></i></span>

                            </div>
                            <div class="input_wrapp-2">
                                <input type="checkbox" name="remember">
                                <span>Ghi nhớ </span>
                            </div>
                            <div class="input_wrap">
                                <button type="submit">Đăng nhập</button>
                            </div>
                            <div class="input_wrap">
                                <a href="#">Quên mật khẩu </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                    <h3 class="title-7">Đăng ký</h3>
                    <div class="login_wrapper login_wrapper_2">
                        <form action="{{route('register_customer')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="input_wrap">
                                <label>Tên người dùng<span>*</span></label>
                                <input type="text" name="CustomerName" placeholder="Tên người dùng"
                                value="{{old('CustomerName')}}"
                                >
                                <span class="text-danger">@error('CustomerName') {{$message}} @enderror</span>
                            </div>

                            <div class="input_wrap">
                                <label>Email address<span>*</span></label>
                                <input type="email" name="CustomerEmail" placeholder="Email" required
                                       value="{{old('CustomerEmail')}}"
                                >
                                <span class="text-danger">@error('CustomerEmail') {{$message}} @enderror</span>
                            </div>

                            <div class="input_wrap">
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="CustomerPassword" placeholder="Mật khẩu"
                                       value="{{old('CustomerPassword')}}"
                                >
                                <span class="text-danger">@error('CustomerPassword') {{$message}} @enderror</span>

                            </div>

                            <div class="input_wrap">
                                <label>Nhập lại mật khẩu<span>*</span></label>
                                <input type="password" name="CustomerConfirmPassword" placeholder="Mật khẩu"
                                       value="{{old('CustomerConfirmPassword')}}"
                                >
                                <span class="text-danger">@error('CustomerConfirmPassword') {{$message}} @enderror</span>
                            </div>

                            <div class="input_wrap">
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="CustomerPhone" placeholder="Số điện thoại" required>
                            </div>
                            <div class="input_wrap input_wrap_3">
                                <button type="submit">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
