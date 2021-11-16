@extends('admin.layouts.master')
@section('title'){{'Create Posts'}}@endsection
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
                            <h1>Thêm bài đăng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm bài đăng</li>
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

                            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group position-relative text-center">
                                        <img class="imagesForm mx-auto" width="100" height="100" src="
                                            {{asset('/backend/assets/img/images.gif')}}"
                                        />
                                        <label class="formLabel" for="file"><i class="fas fa-pen"></i><input
                                                style="display: none" type="file" id="file" class="imagesAvatar"
                                                name="inputAvatar"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Tên bài đăng</label>
                                        <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" name="inputTitle">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName">Tên người đăng</label>
                                        <input type="text" id="inputName" class="form-control" name="inputName">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSummary">Tóm tắt</label>
                                        <textarea id="inputSummary" rows="8" style="resize: none" class="form-control" name="inputSummary"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputContent">Nội dung bài viết</label>
                                        <textarea rows="8" style="resize: none" id="inputContent" class="form-control" name="inputContent"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMetaKeywords">Meta từ khóa</label>
                                        <textarea rows="8" style="resize: none" id="inputMetaKeywords" class="form-control" name="inputMetaKeywords"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMetaDesc">Meta nội dung</label>
                                        <textarea rows="8" style="resize: none" id="inputMetaDesc" class="form-control" name="inputMetaDesc"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPosts">Danh mục bài viết</label>
                                        <select name="inputPosts" id="inputPosts" class="form-control">
                                            {!! $html !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_images">Album ảnh (tối đa 6 file)</label>
                                        <div class="multi-images">
                                            <input type="hidden" name="delete_img" value="0">
                                            <div class="img-item text-center">
                                                <label class="labelProduct" for="postImages"><i class="fal fa-plus-circle"></i>
                                                    <input style="display: none" id="postImages" type='file' class="imgInp imgInp1" multiple name="images[]" />
                                                </label>
                                                <div class="img-list d-flex justify-content-between flex-wrap">
                                                </div>
                                                <p class="delete-img">Xóa</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Trạng thái</label>
                                        <select id="inputStatus" class="form-control custom-select" name="inputStatus">
                                            <option selected disabled>Select one</option>
                                            <option value="0">InActive</option>
                                            <option value="1">Active</option>
                                        </select>
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
        CKEDITOR.replace('inputContent');
        CKEDITOR.replace('inputSummary');
        /*Post Images*/
        function readURL(input, object) {
            if (input.files.length > 6) {
                alert('Tối đa upload 6 file');
                object.parents('.img-item').find('input[type=file]').val('');
                return  false;
            }
            if (input.files && input.files[0]) {
                for (i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        object.parents('.img-item').find('.img-list').append('<img src="'+e.target.result+'" />');
                    }

                    reader.readAsDataURL(input.files[i]); // convert to base64 string
                }
            }
        }

        $(".imgInp").change(function() {
            $(this).parents('.img-item').find('.img-list').html('');
            readURL(this, $(this));
        });

        $('.delete-img').click(function () {
            $('input[name=delete_img]').val('1');
            $(this).parents('.img-item').find('.img-list').html('');
            $(this).parents('.img-item').find('input[type=file]').val('');
        });

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

    </script>
@endsection
