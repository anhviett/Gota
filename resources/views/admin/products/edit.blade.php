@extends('admin.layouts.master')
@section('title'){{'Edit Products'}}@endsection
@section('content')
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
                <form action="{{route('product.update', $products->id)}}" method="POST" enctype="multipart/form-data">
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
                            {{asset('/uploads/').'/'.$products->avatar}}"/>
                                    <label class="formLabel" for="file"><i class="fas fa-pen"></i><input
                                            style="display: none" type="file" id="file" class="imageAvatar"
                                            name="inputAvatar"></label>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Tên sản phẩm</label>
                                    <input type="text" id="slug"  class="form-control" name="inputName" value="{{$products->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Mô tả sản phẩm</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="inputDescription">{{$products->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputContent">Nội dung sản phẩm</label>
                                    <textarea id="inputContent" class="form-control" rows="4" name="inputContent">{{$products->content}}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái</label>
                                    <select id="inputStatus" class="form-control custom-select" name="inputStatus">
                                        <option selected disabled value="{{$products->status}}">
                                            @if($products->status == 1)
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
                                <h3 class="card-title">Ngân sách</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputBasePrice">Giá gốc:</label>
                                    <input type="number" name="inputBasePrice"
                                           class="form-control" id="inputBasePrice"
                                           value="{{$products->base_price}}">

                                </div>
                                <div class="form-group">
                                    <label for="inputDiscountPrice">Giá ưu đãi:</label>
                                    <input type="number" name="inputDiscountPrice"
                                           class="form-control" id="inputDiscountPrice"
                                           value="{{$products->discount_price}}">
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
                                    <label for="inputColors">Màu sắc sản phẩm</label>
                                    <select name="inputColors[]" id="inputColors" class="form-control color-select custom-select" multiple>
                                        @foreach($colors as $color)
                                            <option @if($products->colors->contains($color))
                                                    selected
                                                    @endif value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputSizes">Size :</label>
                                    <select name="inputSizes[]" id="inputSizes" class="form-control size-select custom-select" multiple>
                                        @foreach($sizes as $size)
                                            <option @if($products->sizes->contains($size))
                                                    selected
                                                    @endif value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tag:</label>
                                    @foreach ($product_tags as $key => $product_tag)
                                        <label style="display: inline-block; width: 100%;"><input style="margin-right: 5px"  @if($products->tags->contains($product_tag))
                                            checked
                                                                                                  @endif
                                                                                                  name="tags[]" type="checkbox" value="{{$product_tag->id}}">{{$product_tag->name}}
                                        </label>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="inputCategories">Danh mục sản phẩm</label>
                                    <select name="inputCategories" id="inputCategories" class="form-control">
                                        <option value="{{$products->category->name}}">{{$products->category->name}}</option>
                                        {!! $html !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price_product">Album ảnh (tối đa 6 file)</label>
                                    <div class="multi-images">
                                        <input type="hidden" name="delete_img" value="0">
                                        <div class="img-item text-center">
                                            <label class="labelProduct" for="productImages"><i class="fal fa-plus-circle"></i>
                                                <input style="display: none" id="productImages" type='file' class="imgInp imgInp1" multiple name="images[]" />
                                            </label>
                                            <div class="img-list d-flex justify-content-between flex-wrap">
                                                @foreach($products->images as $img)
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
        CKEDITOR.replace('inputDescription');

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
        //--------------******--------------------

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


        // choose multiple options
        $(document).ready(function() {
            $('.color-select').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            $('.size-select').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });
    </script>
@endsection
