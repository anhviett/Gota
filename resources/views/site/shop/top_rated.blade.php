<div class="product_list_widget">
    <h3 class="widget-title mb-30 pt-50">Sản phẩm xem nhiều nhất</h3>
    @php

    @endphp
    @foreach($products as $i => $product)
        @if($product->product_views > 350 && $product->product_views < 1000)
            <div class="item-widget">
                <div class="img-left">
                    <a href="{{route('product_detail.show', $product->id)}}"><img src="{{asset('/uploads/').'/'.$product->avatar}}" alt="product-meta"></a>
                </div>
                <div class="product-meta">
                    <a href="{{route('product_detail.show', $product->id)}}"><h4 class="sm-title">{{$product->name}}</h4></a>
                    <span class="discount_price">
                        {{number_format($product->discount_price,0,',','.')}}
                    </span>
                    <span>₫ </span>
                    <span class="base_price text-decoration-line-through">
                        {{number_format($product->base_price,0,',','.')}}
                    </span>
                </div>
            </div>
        @endif
    @endforeach
</div>
