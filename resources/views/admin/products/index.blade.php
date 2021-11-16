@extends('admin.layouts.master')
@section('title'){{'Products'}}@endsection
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
                            @can('products_create')
                            <a href="{{route('product.create')}}" class="btn btn-primary addBtn">Thêm sản phẩm

                            </a>
                            @endcan
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thương hiệu</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            @if(!$products->isEmpty())
                <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sản phẩm</h3>

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
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu sắc</th>
                                    <th>Size</th>
                                    <th>Danh mục</th>
                                    <th>Giá cơ bản</th>
                                    <th>Giá sau cùng</th>
                                    <th>Tag</th>
                                    <th class="text-center">Trạng thái</th>

                                    <th class="text-right">Hành động</th>
                                </tr>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>
                                            #
                                        </td>
                                        <td class="text-center"><img src="
                                            @if($product->avatar)
                                            {{asset('/uploads/').'/'.$product->avatar}}
                                            @else
                                            {{asset('/backend/assets/img/images.gif')}}
                                            @endif"
                                                                     alt="" width="100" height="100">
                                        </td>
                                        <td>
                                            {{$product->name}}
                                        </td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                {{$color->name}},
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->sizes as $size)
                                                {{$size->name}},
                                            @endforeach
                                        </td>
                                        <td>
                                            {{$product->category->name}}
                                        </td>
                                        <td>
                                            {{number_format($product->base_price,0,',','.')}}
                                        </td>
                                        <td>
                                            {{number_format($product->discount_price,0,',','.')}}
                                        </td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                {{$tag->name}},
                                            @endforeach
                                        </td>
                                        <td class="project-state">

                                            <input data-id="{{$product->id}}" class="toggle-class" type="checkbox"
                                                   data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Kích hoạt" data-off="Chưa"
                                                {{ $product->status ? 'checked' : '' }}>
                                        </td>

                                        <td class="project-actions text-right">
                                            @can('product_view')
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>
                                            @endcan
                                                @can('products_edit')
                                                <a class="btn btn-info btn-sm" href="{{route('product.edit',$product->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                @endcan
                                                @can('products_delete')
                                                <a class="btn btn-danger btn-sm" href="{{route('product.delete',$product->id)}}">
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
                    <div class="pagination">
                        {{$products->appends(Request::all())->links('vendor.pagination.bootstrap-4')}}
                    </div>
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
@section('footer_script')
    <!--bootstrap-toggle-->
    <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $('.toggle-class').on('change', function() {
            var status = $(this).prop('checked') == true ? 0 : 1;
            var product_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('productChangeStatus') }}',
                data: {
                    'status': status,
                    'product_id': product_id
                },
                success:function(data) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Status Updated Successfully');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            });
        });
    </script>

@endsection
