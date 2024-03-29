@extends('admin.layouts.master')
@section('title'){{'Create Banars'}}@endsection
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
                            <h1>Banner</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                                <li class="breadcrumb-item active">Thêm Banner</li>
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

                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{route('banar.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group position-relative text-center">
                                        <div style="position: absolute;  left: 0;">Ảnh :</div>
                                        <img class="imagesForm" width="100" height="100" src="
                            {{asset('backend/assets/img/avatar_pro.jpg')}}"/>
                                        <label class="formLabel" for="file-1"><i class="fas fa-pen">
                                            </i><input style="" type="file" id="file-1" class="imagesAvatar d-none"
                                                       name="images"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputHeader">Mở đầu</label>
                                        <input type="text" id="inputHeader" class="form-control" name="inputHeader">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Tiêu đề</label>
                                        <textarea type="text" id="inputTitle" class="form-control" name="inputTitle"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Mô tả</label>
                                        <input type="text" id="inputDescription" class="form-control" name="inputDescription">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputBottom">Phần đáy</label>
                                        <textarea type="text" cols="3" id="inputBottom" class="form-control" name="inputBottom">
                                        </textarea>
                                            </div>


                                </div>
                                <div class="row">
                                    <button class="btn btn-success float-right mb-2  mx-auto">Thêm mới</button>
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
@section('footer_script')
    <script>
        //Ckeditor
        CKEDITOR.replace('inputTitle');
        CKEDITOR.replace('inputBottom');
        function read(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.imagesForm').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imagesAvatar").change(function() {
            read(this);
        });
        /*------------------------*********-----------------------*/
        function read1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.imageForm').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imageAvatar").change(function() {
            read1(this);
        });

    </script>
@endsection

