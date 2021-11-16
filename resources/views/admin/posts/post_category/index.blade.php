@extends('admin.layouts.master')
@section('title'){{'Post Category'}}@endsection
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
                            @can('post_categories_create')
                            <a href="{{route('post_category.create')}}" class="btn btn-primary addBtn">Thêm danh mục

                            </a>
                            @endcan
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            @if(!$post_categories->isEmpty())
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
                                <th>
                                    #
                                </th>
                                <th>
                                    Tên danh mục
                                </th>
                                <th>
                                    Slug danh mục
                                </th>
                                <th class="text-right">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post_categories as $key => $post_category)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        {{$post_category->name}}
                                    </td>
                                    <td style="color: blue;">
                                        {{$post_category->slug}}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        @can('post_categories_edit')
                                        <a class="btn btn-info btn-sm" href="{{route('post_category.edit',$post_category->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        @endcan
                                            @can('post_categories_delete')
                                        <a onclick="return confirm('Bạn chắc chắn xóa bài viết này ?')" class="btn btn-danger btn-sm" href="{{route('post_category.delete',$post_category->id)}}">
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
                            {{$post_categories->appends(Request::all())->links()}}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
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

