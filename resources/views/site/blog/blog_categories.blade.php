<div class="common-widget mb-50">
    <h4 class="mb-40 blog-s-title">Danh mục bài viết</h4>
    <div class="blog-category">
        <ul>
            @foreach($post_categories as $post_category)
            <li><a href="{{route('blog_details.index', $post_category->slug)}}">{{$post_category->name}}
                    <span>
                        @php($i = 0)
                        @foreach($posts as $post_cate)
                            @if($post_cate->category_id == $post_category->id)

                                    @php($i++)


                            @endif
                        @endforeach
                        ({{$i}})
                    </span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
