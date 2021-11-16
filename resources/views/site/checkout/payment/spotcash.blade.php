@extends('site.layouts.master')
@section('title'){{'Trang chủ'}}@endsection
@section('content')
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
    <div class="review-payment">
        <h2>Cảm ơn bạn đã đặt hàng</h2>
    </div>



@endsection
