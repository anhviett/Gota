<div class="common-widget mb-50">
    <h4 class="mb-40 blog-s-title">Bài viết nhiều lượt xem</h4>
    @foreach($posts as $i => $post)
        @if($post->post_views > 150)
            <div class="b_single pt-30 mb-20">
                <div class="b_single__thumb">
                    <img src="{{asset('uploads/' . $post->image)}}" alt="">
                </div>
                <div class="b_single__content">
                    <a href="{{route('blog_details.index', $post->category->slug)}}">{{$post->title}}</a>
                    <span>{{$post->days}}</span>
                </div>
            </div>
        @endif
    @endforeach
</div>
