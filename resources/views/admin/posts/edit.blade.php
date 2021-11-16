@extends('admin.layouts.master')
@section('title'){{'Edit Posts'}}@endsection
@section('style.css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
            margin-left: 12px;
            color: #000000d6;
        }
        .select2-container--default .select2-dropdown .select2-search__field:focus, .select2-container--default .select2-search--inline .select2-search__field:focus{
            border: none;
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
                        <h1>Project Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Edit</li>
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
            <form action="{{route('post.update', $posts->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group position-relative text-center">
                                    <img class="imagesForm mx-auto" width="100" height="100" src="
                                            {{asset('/uploads/').'/'.$posts->image}}"
                                    />
                                    <label class="formLabel" for="file"><i class="fas fa-pen"></i><input
                                            style="display: none" type="file" id="file" class="imagesAvatar"
                                            name="inputAvatar"></label>
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle">Tên bài đăng</label>
                                    <input type="text" class="form-control" id="slug" name="inputTitle"
                                    value="{{$posts->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Tên người đăng</label>
                                    <input type="text" id="inputName" class="form-control" name="inputName"
                                    value="{{$posts->author}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputSummary">Tóm tắt</label>
                                    <textarea id="inputSummary" rows="8" style="resize: none" class="form-control" name="inputSummary">
                                        {{$posts->summary}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputContent">Nội dung bài viết</label>
                                    <textarea rows="8" style="resize: none" id="inputContent" class="form-control" name="inputContent">
                                        {{$posts->content}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái</label>
                                    <select id="inputStatus" class="form-control custom-select" name="inputStatus">
                                        <option selected disabled value="{{$posts->status}}">
                                            @if($posts->status == 1)
                                                Active
                                            @else
                                                InActive
                                            @endif
                                        </option>
                                        <option value="0">InActive</option>
                                        <option value="1">Active</option>

                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Seo</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputMetaKeywords">Meta từ khóa</label>
                                    <textarea rows="8" style="resize: none" id="inputMetaKeywords" class="form-control" name="inputMetaKeywords">
                                        {{$posts->meta_keywords}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputMetaDesc">Meta nội dung</label>
                                    <textarea rows="8" style="resize: none" id="inputMetaDesc" class="form-control" name="inputMetaDesc">
                                        {{$posts->meta_desc}}
                                    </textarea>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Category</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputPosts">Danh mục bài viết</label>
                                    <select name="inputPosts" id="inputPosts" class="form-control">
                                        {!! $html !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price_post">Album ảnh (tối đa 6 file)</label>
                                    <div class="multi-images">
                                        <input type="hidden" name="delete_img" value="0">
                                        <div class="img-item text-center">
                                            <label class="labelpost" for="postImages"><i class="fal fa-plus-circle"></i>
                                                <input style="display: none" id="postImages" type='file' class="imgInp imgInp1" multiple name="images[]" />
                                            </label>
                                            <div class="img-list d-flex justify-content-between flex-wrap">

                                                @foreach($posts->images as $key => $img)
                                                        <img src="{{ asset('uploads/' . $img->path) }}"/>
                                                @endforeach


                                            </div>
                                            <p class="delete-img">Xóa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-success float-right mb-2  mx-auto">Lưu lại</button>
                </div>
            </form>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
{{--/wrapper--}}
@endsection
@section('footer_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        //Ckeditor
        CKEDITOR.replace('inputContent');
        CKEDITOR.replace('inputSummary');
        CKEDITOR.replace('inputMetaKeywords');
        CKEDITOR.replace('inputMetaDesc');
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

        /*Product Images*/
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
