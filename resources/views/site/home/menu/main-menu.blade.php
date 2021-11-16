<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{route('home.index')}}" class="">Trang chủ</a></li>
            @php
              $childrenMenus = \App\Models\MenuItem::all()->whereNotIn('parent_id', 0);


            @endphp


            <li class="dropdown"><a href="{{route('product.site')}}">Cửa hàng<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">


            </ul>
            </li>
            <li class="dropdown"><a href="">Bài viết<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                @foreach($post_categories as $post)
                    <li><a href="{{URL::to('/site/blog_list').'/'.$post->slug}}">{{$post->name}}</a></li>
                @endforeach
            </ul>
            </li>
            <li><a href="{{route('404.index')}}">404</a></li>
            <li><a href="{{route('contact')}}">Liên hệ</a></li>

    </ul>
</div>
