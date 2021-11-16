<h3 class="widget-title mb-30">Danh mục sản phẩm</h3>
<ul class="product-categories">
    @foreach($product_categories as $prod)
        <li><a href="{{route('shop.show_category', $prod->slug)}}">{{$prod->name}}
                <span>
                     @php($i = 0)
                    @foreach($products as $product_category)
                        @if($product_category->category_id == $prod->id)
                            @if(isset($category))
                                @php($i++)
                            @endif

                        @endif
                    @endforeach

                       ({{$i}})
                </span>

            </a>
        </li>
    @endforeach
</ul>
