@extends('admin.layouts.master')
@section('title'){{'Edit Customers'}}@endsection
@section('content')
    {{--wrapper--}}
    <div class="wrapper">
    @include('admin.layouts.sideNav')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sửa khách hàng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa khách hàng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
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
        <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card card-primary">
                            <div class="card-header">

                                <h3 class="card-title">Khách hàng</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{route('customer.update', $customers->id)}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Tên khách hàng</label>
                                        <input type="text" value="{{$customers->customer_name}}" id="inputName" class="form-control" name="inputName">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" value="{{$customers->customer_email}}" id="inputEmail" class="form-control" name="inputEmail">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone">Số điện thoại</label>
                                        <input type="text" value="{{$customers->customer_phone}}" id="inputPhone" class="form-control" name="inputPhone">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Mật khẩu</label>
                                        <input type="password" id="inputPassword" class="form-control" name="inputPassword">
                                    </div>
                                </div>


                                <div class="row">
                                    <button class="btn btn-success float-right mb-2  mx-auto">Sửa</button>
                                </div>

                                <!-- /.card-body -->
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    {{--/wrapper--}}
@endsection


