@extends('admin.layouts.master')
@section('title'){{'Product Categories'}}@endsection
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
                            @can('product_categories_create')
                            <a href="{{route('product_categories.create')}}" class="btn btn-primary addBtn">Thêm danh mục

                            </a>
                            @endcan
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @if(!$product_categories->isEmpty())
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục</h3>

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
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th>Slug</th>
                                <th class="text-right">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_categories as $key => $product_category)
                            <tr>
                                <td>
                                    #
                                </td>

                                <td>
                                    {{$product_category->name}}
                                </td>

                                <td>
                                    {{$product_category->slug}}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    @can('product_categories_edit')
                                    <a class="btn btn-info btn-sm" href="{{route('product_categories.edit', $product_category->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @endcan
                                        @can('product_categories_delete')
                                    <a class="btn btn-danger btn-sm" href="{{route('product_categories.delete', $product_category->id)}}">
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
                    <!-- pagination-area start -->
                    <div class="pagination-area">
                        <div class="pagination-number">
                            {{$product_categories->appends(Request::all())->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>
                </div>
                @else
                        <h2 class="text-center">Không có sản phẩm nào</h2>
                @endif
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

</div>
{{--/wrapper--}}
@endsection

