@extends('admin.layouts.master')
@section('title'){{'Roles'}}@endsection
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
                            <a href="{{route('role.create')}}" class="btn btn-primary addBtn">Thêm quyền

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

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đơn hàng</h3>

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
                            <tr>
                                <th>#</th>
                                <th>Tên quyền</th>
                                <th>Vai trò quyền</th>
                                <th>Mô tả</th>
                                <th class="text-right">Hành động</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $key => $role)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                     <td>
                                        {{$role->name}}
                                    </td>
                                    <td>{{$role->display_name}}</td>
                                    <td>{{$role->description}}</td>
                                    <td class="project-actions text-right">
                                        @can('role_view')
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        @endcan
{{--                                            @can('role_edit')--}}
                                        <a class="btn btn-info btn-sm" href="{{route('role.edit',$role->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
{{--                                            @endcan--}}
{{--                                            @can('role_delete')--}}
                                        <a class="btn btn-danger btn-sm" href="{{route('role.delete',$role->id)}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
{{--                                            @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    {{--/wrapper--}}
@endsection
