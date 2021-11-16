@extends('admin.layouts.master')
@section('title'){{'Permissions'}}@endsection
@section('style.css')

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
                            <a href="{{route('permission.create')}}" class="btn btn-primary addBtn">Thêm vai trò

                            </a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quyền</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            @if(!$permissions->isEmpty())
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
                                        Tên
                                    </th>
                                    <th>
                                        Code
                                    </th>
                                    <th class="text-right">
                                        Hành động
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $key => $permission)
                                    <tr>
                                        <td>
                                            #
                                        </td>
                                        <td>
                                            {{$permission->display_name}}
                                        </td>
                                        <td>
                                            {{$permission->description}}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="{{route('permission.delete',$permission->id)}}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>

                        <!-- /.card-body -->
                        <div class="pagination-area">
                            <div class="pagination-number">
                                {{$permissions->appends(Request::all())->links('vendor.pagination.bootstrap-4')}}
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
        <style>
            .w-5{
                display: none;
            }
        </style>
    </div>
    {{--/wrapper--}}
@endsection
