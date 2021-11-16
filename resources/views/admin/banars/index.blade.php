@extends('admin.layouts.master')
@section('title'){{'Banner'}}@endsection
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
                            @can('banner_create')
                            <a href="{{route('banar.create')}}" class="btn btn-primary addBtn">Thêm banner
                            </a>
                            @endcan
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Banner</li>
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
                        <h3 class="card-title">Banner</h3>

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
                                    Ảnh banner
                                </th>
                                <th>
                                    Mở đầu
                                </th>
                                <th>
                                    Tiêu đề
                                </th>
                                <th>
                                    Mô tả
                                </th>
                                <th>
                                    Phần đáy
                                </th>

                                <th class="text-right">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banars as $key => $banar)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td class="text-center"><img src="
                                        @if($banar->images)
                                        {{asset('/uploads/').'/'.$banar->images}}
                                        @else
                                        {{asset('/backend/assets/img/images.gif')}}
                                        @endif" alt="" width="100" height="100">
                                    </td>
                                    <td>
                                        {{$banar->header}}
                                    </td>
                                    <td>
                                        {{$banar->title}}
                                    </td>
                                    <td>
                                        {{$banar->description}}
                                    </td>
                                    <td>
                                        {{$banar->bottom}}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        @can('banner_edit')
                                        <a class="btn btn-info btn-sm" href="{{route('banar.edit',$banar->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        @endcan
                                        @can('banner_delete')
                                        <a class="btn btn-danger btn-sm" href="{{route('banar.delete',$banar->id)}}">
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

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    {{--/wrapper--}}
@endsection

