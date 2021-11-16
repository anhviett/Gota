@extends('admin.layouts.master')
@section('title'){{'Colors'}}@endsection
@section('style.css')
    <style>
        .blue,.gray,.skyblue,.red,.yellow, .black, .green, .orange, .pink {
            display: inline-block;
            height: 35px;
            width: 35px;
            border-radius: 50%;
            background: blue;
            outline: 0;
            border: 1px solid transparent;
        }
        .pink{
            background: pink;
        }
        .orange{
            background: orange;
        }
        .black{
            background: #0c0c0d;
        }
        .green{
            background: green;
        }
        .gray {
            background: #d4d4d4;
        }
        .skyblue{
            background: #1cbbb4;
        }
        .red{
            background: #dd3333;
        }
        .yellow{
            background: #eeee22;
        }
    </style>
@endsection
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
                                @can('colors_create')
                                <a href="{{route('color.create')}}" class="btn btn-primary addBtn">Thêm màu sắc

                                </a>
                                @endcan
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Màu sắc</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                @if(!$colors->isEmpty())
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Màu sắc</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Tên màu sắc
                                    </th>
                                    <th>
                                       Slug
                                    </th>
                                    <th>
                                        Mô tả
                                    </th>
                                    <th class="text-right">
                                        Hành động
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $key => $color)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                            {{$color->name}}
                                    </td>
                                    <td>
                                        {{$color->slug}}
                                    </td>
                                    <td>
                                        <span class="{{$color->slug}}"></span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        @can('colors_edit')
                                        <a class="btn btn-info btn-sm" href="{{route('color.edit',$color->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        @endcan
                                            @can('colors_delete')
                                        <a class="btn btn-danger btn-sm" href="{{route('color.delete',$color->id)}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                        <!-- pagination-area start -->
                        <div class="pagination-area">
                            <div class="pagination-number">
                                {{$colors->appends(Request::all())->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    @else
                        <h2 class="text-center">Không có sản phẩm nào</h2>
                    @endif
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
    </div>

    {{--/wrapper--}}
@endsection
