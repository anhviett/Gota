@extends('admin.layouts.master')
@section('title'){{'Tags'}}@endsection
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
                                @can('product_tags_create')
                                <a href="{{route('product_tag.create')}}" class="btn btn-primary addBtn">Thêm tag

                                </a>
                                @endcan
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Tag</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                @if(!$product_tags->isEmpty())
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tag</h3>

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
                                        Tag
                                    </th>
                                    <th>
                                       Slug
                                    </th>
                                    <th class="text-right">
                                        Hành động
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_tags as $key => $product_tag)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                            {{$product_tag->name}}
                                    </td>
                                    <td>
                                        {{$product_tag->slug}}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        @can('product_tags_edit')
                                        <a class="btn btn-info btn-sm" href="{{route('product_tag.edit',$product_tag->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        @endcan
                                            @can('product_tags_delete')
                                        <a class="btn btn-danger btn-sm" href="{{route('product_tag.delete',$product_tag->id)}}">
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
                                {{$product_tags->appends(Request::all())->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    @else
                        <h2 class="text-center">Không có tag sản phẩm nào</h2>
                    @endif
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
    </div>

    {{--/wrapper--}}
@endsection
