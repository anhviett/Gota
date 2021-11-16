@extends('site.layouts.master')
@section('title'){{'Trang chủ'}}@endsection
@section('content')
    <!-- breadcrumb area start -->
    <div class="page-layout" data-background="{{asset('site/assets/img/slider/bg_shop.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-area text-center">
                        <h2 class="page-title">Blog</h2>
                        <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="blog-grid.html">Blog</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- blog area start  -->
    <div class="blog__area mb-100 pt-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-6 col-md-6">
                    <div class="bigpost-wrapper">

                            <div class="row">
                                @foreach($posts as $post)
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="grid_blog mb-40 text-center">
                                        <div class="blog-thumb">
                                            <img src="{{asset('uploads/' . '/'. $post->image)}}" style="height: 178px" alt="">
                                            <div class="grid_blog__content">
                                                <h4 class="pt-20">{{$post->category->name}} </h4>
                                                <h2 class="b-title mb-20"><a href="{{route('blog_details.index', $post->category->slug)}}">{{$post->title}}</a></h2>
                                                <p>{!! $post->summary !!}</p>
                                                <div class="post-meta pt-10">
                                                    <p>Post Date: <span> {{$post->days}} </span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>



                        <div class="pagination pt-50 d-none d-md-block mb-50">
                            <ul>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-3 col-md-6">
                    <div class="sidebar__wrapper">
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
                                <form action="#" method="POST">
                                    <input type="text" placeholder="search . . .">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                        </div>

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
                                <a href="blog.html">Basketball</a>
                                <a href="blog.html">Handbag</a>
                                <a href="blog.html">Jackets</a>
                                <a href="blog.html">Kids & Young</a>
                                <a href="blog.html">Training Wear</a>
                                <a href="blog.html">Women’s</a>
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
    </div>
    <!-- blog area end  -->
@endsection
