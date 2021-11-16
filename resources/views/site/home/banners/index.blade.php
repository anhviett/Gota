@section('style.css')
    <style>
        h2.banar-title p{
            font-size : 36px
        }
    </style>
@endsection
<div class="banar_area">
    <div class="container-fluid padding-remove">
        <div class="row g-0">
            @foreach($banars as $key => $banar)
                @if($key == 0)
                    <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="banar wow fadeIn" data-wow-duration=".5s" data-wow-delay=".3s">

                    <div class="banar__left">
                        <a href="shop.html"><img src=" {{asset('/uploads/').'/'.$banar->images}}" alt=""></a>
                        <div class="banar__content">
                            <p class="d-none d-sm-block">{{$banar->description}}</p>
                        </div>
                    </div>

                </div>
            </div>
                @endif
            @endforeach
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="row g-0">
                        @foreach($banars as $key => $banar)
                            @if($key == 1)
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                @if($key == 1)
                                    <div class="banarright wow fadeIn" data-wow-duration=".8s" data-wow-delay=".6s">
                                        <a href="shop.html"><img src="{{asset('/uploads/').'/'.$banar->images}}" alt=""></a>
                                        <div class="banarright__content">
                                            <span>{{$banar->header}}</span>
                                            <h2 class="banar-title mb-80 pt-100">{!! $banar->title !!}</h2>
                                            <h4 class="d-none d-sm-block">{{$banar->description}}</h4>
                                            <p class="d-none d-sm-block"><span>{!! $banar->bottom !!}</span> cho mọi sản phẩm</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endif
                            @if($key == 2)
                                <div class="col-xl-12 col-lg-12 col-md-12">
                            @if($key == 2)
                                <div class="banar_right_down wow fadeIn" data-wow-duration=".9s" data-wow-delay=".8s">
                                    <a href="shop.html"><img src="{{asset('/uploads/').'/'.$banar->images}}" alt=""></a>
                                    <div class="banarright__content position-change">
                                        <span class="d-none d-sm-block">{{$banar->header}}</span>
                                        <h2 class="banar-title mb-60 pt-80">{!! $banar->title !!}</h2>
                                        <h4 class="d-none d-sm-block">{{$banar->description}}</h4>
                                        <p class="d-none d-sm-block"><span>{!! $banar->bottom !!}</span> cho mọi sản phẩm</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>


        </div>
    </div>
</div>
