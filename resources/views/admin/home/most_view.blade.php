<nav>
    <div class="nav nav-pills" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-product-tab" data-toggle="tab" href="#nav-product" role="tab" aria-controls="nav-product" aria-selected="true">Sản phẩm xem nhiều nhất</a>
        <a class="nav-link" id="nav-post-tab" data-toggle="tab" href="#nav-post" role="tab" aria-controls="nav-post" aria-selected="false">Bài viết xem nhiều nhất</a>

    </div>
</nav>
<style>
    .card-body td a {
        color: #0a0e14;
    }
    .card-body td a:hover {
        color: #0c84ff;
        text-decoration: underline;
    }
</style>
<div class="tab-content mb-3" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên bài viết</th>
                        <th><i class="fas fa-eye"></i></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($product_views as $product)
                    <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <a href="{{route('product_detail.show', $product->id)}}">{{$product->name}}</a>
                            </td>
                            <td><span class="badge bg-danger">{{$product->product_views}}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="tab-pane fade" id="nav-post" role="tabpanel" aria-labelledby="nav-post-tab">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên bài viết</th>
                    <th><i class="fas fa-eye"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($post_views as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            <a href="{{route('blog_details.index', $post->category->slug)}}">{{$post->title}}</a>

                        </td>
                        <td><span class="badge bg-danger">{{$post->post_views}}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
