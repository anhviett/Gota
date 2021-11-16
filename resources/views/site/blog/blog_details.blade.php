@extends('site.layouts.master')
@section('title'){{'Trang chủ'}}@endsection
@section('content')
    <!-- start blog details area -->
    <section class="blog-aread pt-20">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    @foreach($paginatePost as $post)
                    <div class="blogitem blogitem2">
                        <div class="blogitem__thumb">
                            <img src="{{asset('uploads/' . '/'. $post->image)}}" alt="blogthumb"/>
                        </div>
                        <div class="blogitem__content">
                            <h2 class="blog-title-2">{{$post->title}} </h2>
                            <div class="blogitem__content--meta">
                                <ul>
                                    <li>BY: <span>{{$post->author}}</span></li>
                                    <li>{{$post->days}} - {{$post->hours}}</li>
                                    <li><span>02 COMMENTS</span></li>
                                </ul>
                            </div>
                            <p>
                                {!!$post->content !!}
                            </p>
                            <div class="blogitem__quote">
                                <h5>“{{$post->title}}”</h5>
                            </div>

                        </div>
                    </div>
                        @endforeach
                    <div class="blog-right bg-white mb-50">
                        <div class="columndivide pl-30">
                            <div class="columndivide__tags">
                                <ul>
                                    <li><a href="blog.html">html</a></li>
                                    <li><a href="blog.html">CSS</a></li>
                                    <li><a href="blog.html">WordPress</a></li>
                                    <li><a href="blog.html">php</a></li>
                                </ul>
                            </div>
                            <div class="columndivide__icon d-none d-md-block">
                                <ul>
                                    <li>Share :</li>
                                    <li><a href="https://fb.com/anhviet.2107"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-comments">
                            <div class="post-comment-title mb-30 mt-60 pl-30">
                                <h3 class="comments-title">Comments</h3>
                            </div>
                            <div class="latest-comments">
                                <ul>
                                    <li>
                                        <div class="comments-box pl-15">
                                            <div class="comments-avatar">
                                                <img src="./assets/img/blog/commenter1.jpg" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>David Angel Makel</h5>
                                                    <span class="post-meta">October 26, 2020</span>
                                                    <div class="commentstime d-none d-sm-block">
                                                        <span>10 minutes ago</span>
                                                    </div>
                                                </div>
                                                <p>Potenti fusce himenaeos hac aenea quis donec vivamus aliquet, wprdpress inge fpr inceptos curae sollicitudin in class sociosqu netus.</p>
                                                <a href="#" class="comment-reply"> <i class="arrow_back"></i> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="children ml-100">
                                        <div class="comments-box">
                                            <div class="comments-avatar">
                                                <img src="./assets/img/blog/commenter2.jpg" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>Zahid hasan</h5>
                                                    <span class="post-meta">October 27, 2020</span>
                                                    <div class="commentstime d-none d-sm-block">
                                                        <span>10 minutes ago</span>
                                                    </div>
                                                </div>
                                                <p>Potenti fusce himenaeos hac aenea quis donec vivamus aliquet, wprdpress inge fpr inceptos curae sollicitudin in class sociosqu netus.</p>
                                                <a href="#" class="comment-reply"> <i class="arrow_back"></i> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="children">
                                        <div class="comments-box pl-15">
                                            <div class="comments-avatar">
                                                <img src="./assets/img/blog/commenter3.jpg" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>Alen Caster</h5>
                                                    <span class="post-meta">October 28, 2020</span>
                                                    <div class="commentstime d-none d-sm-block">
                                                        <span>10 minutes ago</span>
                                                    </div>
                                                </div>
                                                <p>Potenti fusce himenaeos hac aenea quis donec vivamus aliquet, wprdpress inge fpr inceptos curae sollicitudin in class sociosqu netus.</p>
                                                <a href="#" class="comment-reply"> <i class="arrow_back"></i> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-comment-form mb-130">
                            <h4 class="post_comments comments-title">Leave your comments</h4>
                            <form class="pt-20" action="#">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="post-input">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="post-input">
                                            <input type="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="post-input bg-form-color">
                                            <textarea placeholder="MESSAGE"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="post-check mb-10 pt-10">
                                            <button type="submit" class="btn btn-comment">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-6">
                    <div class="sidebar__wrapper mb-100">
                        <div class="mainBlog text-center mb-50">
                            <div class="blog__widget">
                                <div class="mainBlog__thumb">
                                    <img src="./assets/img/blog/widget-blog.png" alt="">
                                </div>
                                <div class="mainBlog__content pt-10">
                                    <p>There are many variations of passages of<br> lorem ipsum available, but the majority have<br> suffered alteration in some form, by injected<br> humour or randomised words which don’t <br>look even slightly believable.</p>
                                </div>
                            </div>
                        </div>
                        <div class="search__widget mb-35">
                            <h4 class="mb-40 blog-s-title">Search</h4>
                            <div class="custom-form">
                                <form action="{{route('search_post.index')}}" method="POST">
                                    @csrf
                                    <input type="text" name="query" placeholder="Tìm kiếm bài viết . . .">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        @include('site.blog.blog_related')
                        @include('site.blog.blog_categories')
                        <div class="common-widget newsletter mb-50">
                            <h4 class="mb-20 blog-s-title">Join Our List</h4>
                            <p>Subscribe to our newsletter and stay updated<br> to our best offers and deals!</p>
                            <div class="newsletter">
                                <form action="#">
                                    <input type="email" placeholder="subscribe our newsletter">
                                    <input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>
                        <div class="common-widget padding-remove mb-50">
                            <h4 class="mb-20 blog-s-title">Tag</h4>
                            <div class="tags">
                                <a href="#">Basketball</a>
                                <a href="#">Handbag</a>
                                <a href="#">Jackets</a>
                                <a href="#">Kids & Young</a>
                                <a href="#">Training Wear</a>
                                <a href="#">Women’s</a>
                            </div>
                        </div>
                        <div class="common-widget instagram">
                            <h4 class="mb-20 blog-s-title">Instagram</h4>
                            <div class="instagram-images pt-20 text-center">
                                <a class="popup-image" href="./assets/img/blog/s1.jpg"><img src="./assets/img/blog/s1.jpg" alt=""></a>
                                <a class="popup-image" href="./assets/img/blog/s2.jpg"><img src="./assets/img/blog/s2.jpg" alt=""></a>
                                <a class="popup-image" href="./assets/img/blog/s3.jpg"><img src="./assets/img/blog/s3.jpg" alt=""></a>
                                <a class="popup-image" href="./assets/img/blog/s4.jpg"><img src="./assets/img/blog/s4.jpg" alt=""></a>
                                <a class="popup-image" href="./assets/img/blog/s5.jpg"><img src="./assets/img/blog/s5.jpg" alt=""></a>
                                <a class="popup-image" href="./assets/img/blog/s6.jpg"> <img src="./assets/img/blog/s6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- start blog details end -->
@endsection
