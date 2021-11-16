@section('style.css')
    <style>
        .layer-size label span {
            display: inline-flex;
            line-height: 1;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 1px solid #f1f1f1;
            align-items: center;
            justify-content: center;
            color: #666;
            background-color: #f1f1f1;
            font-size: 13px;
        }
        .layer-size label span:hover{
            background: #2bb9a9;
            color: #ffffff;
            -webkit-transition: all 0.3s ease-out 0s;
            -moz-transition: all 0.3s ease-out 0s;
            -ms-transition: all 0.3s ease-out 0s;
            -o-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
        }
        .tags.mb-50 label span{
            font-size: 13px;
            padding: 3px 10px;
            border-radius: 30px;
            display: inline-block;
            margin: 4px;
            background: #f5f5f5;
            text-transform: capitalize;
            -webkit-transition: all 0.3s ease-out 0s;
            -moz-transition: all 0.3s ease-out 0s;
            -ms-transition: all 0.3s ease-out 0s;
            -o-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
        }
    </style>
@endsection
<div class="shop-filtaring">
    <div class="filter-select">
        <select class="order-by sorter-options" data-role="sorter">
            <option selected="selected" value="selected">Sắp xếp theo: mặc định</option>
            <option value="latest_product">Sản phẩm mới nhất</option>
            <option value="name asc" {{ @$_GET['sort'] == 'name asc' ? 'selected' : '' }}>Sắp xếp theo tên (A - Z)</option>
            <option value="name desc" {{ @$_GET['sort'] == 'name desc' ? 'selected' : '' }}>Sắp xếp theo tên (Z - A)</option>
            <option value="base_price asc" {{ @$_GET['sort'] == 'base_price asc' ? 'selected' : '' }}>Giá tăng dần</option>
            <option value="base_price desc" {{ @$_GET['sort'] == 'base_price desc' ? 'selected' : '' }}>Giá giảm dần</option>

        </select>
        <button class="open-filter"><i class="fal fa-plus"></i>filter</button>
        <form method="GET" action="" class="filter-products">
            <input type="hidden" name="sort" value="">
            <div class="filter-content">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Màu sắc</h3>
                            <div class="colors-layer">
                                @foreach($colors as $color)
                                    <label style="cursor: pointer;">
                                        <span class="{{$color->slug}}"></span>
                                        <input type="checkbox" value="{{ $color->id }}" class="d-none"
                                               {{ ((isset($_GET['colors']) && !empty($_GET['colors']) && in_array($color->id, $_GET['colors'])) ? 'checked' : '') }} name="colors[]"
                                               style="    width: 20px;">

                                        @php($i = 0)
                                        @foreach($products as $product)
                                            @if($product->colors->contains($color))
                                                @php($i++)
                                            @endif
                                        @endforeach

                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Size</h3>
                            <div class="layer-size">
                                @foreach($sizes as $size)
                                    <label style="cursor: pointer;">
                                        <span>{{$size->name}}</span>
                                        <input type="checkbox" value="{{ $size->id }}" class="d-none"
                                               {{ ((isset($_GET['sizes']) && !empty($_GET['sizes']) && in_array($size->id, $_GET['sizes'])) ? 'checked' : '') }} name="sizes[]"
                                               style=" width: 20px;">

                                        @php($i = 0)
                                        @foreach($products as $product)
                                            @if($product->sizes->contains($size))
                                                @php($i++)
                                            @endif
                                        @endforeach

                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Filter By Price</h3>
                            <form action="#">
                                <div class="price-filter">
                                    <div id="slider-range-2" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 46.4%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 7.2%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 48.8%;"></span>
                                        <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div>
                                        <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 7.2%; width: 41.6%;"></div></div>
                                    <div class="filter-form-submit mt-35">
                                        <button type="submit">Tìm kiếm</button>
                                        <div class="filter-price d-inline-block pl-20">Price: <input type="button" id="amount-2" value="$36 - $244"></div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="product-widget pt-50">
                            <h3 class="widget-title mb-30">Product tags</h3>
                            <div class="tags mb-50">
                                @foreach($tags as $tag)
                                    <a href="{{route('shop.show_tag', $tag->slug) }}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('.filter-products input[type=checkbox]').change(function () {
                    var form_data = $('form.filter-products').serialize();
                    console.log(form_data);
                    window.location.href = "{{URL::to('/site/shop_tag/'. $category->slug)}}?" + form_data;
                });
                $('.sorter-options').change(function () {
                    $('input[name=sort]').val($(this).val());
                    $('.filter-products').submit();
                });
            </script>
        </form>

    </div>
</div>

