<div class="search_area">
    <div class="search_close">
        <span><i class="fal fa-times"></i></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="search-wrapper text-center">
                    <h2>Tìm kiếm</h2>
                    <div class="search-filtering pt-30">
                        <div class="search_tab">
                            <ul class="nav nav-tabs justify-content-center mb-55" id="fff" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab2" data-bs-toggle="tab"
                                            data-bs-target="#home2" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Tất cả</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab2" data-bs-toggle="tab"
                                            data-bs-target="#profile2" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Basketball</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#contact2" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Handbag</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="sportswear-tab" data-bs-toggle="tab"
                                            data-bs-target="#sportswear" type="button" role="tab" aria-controls="sportswear"
                                            aria-selected="false">Sportswear</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact3-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact3" type="button" role="tab" aria-controls="contact2"
                                            aria-selected="false">Youth</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home2" role="tabpanel"
                                >

                                </div>
                                <div class="tab-pane fade" id="profile2" role="tabpanel"
                                >

                                </div>
                                <div class="tab-pane fade" id="contact2" role="tabpanel">

                                </div>
                                <div class="tab-pane fade" id="sportswear" role="tabpanel"
                                >

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main_search">
                        <form action="{{route('search.index')}}" method="POST" autocomplete="off">
                            @csrf
                            <input type="text" name="search" id="search" placeholder="Tìm kiếm sản phẩm">
                            <button class="m-search"><i class="fal fa-search d-sm-none d-md-block"></i></button>
                            <div id="search-ajax"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('footer_script')
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>
        $('#search').keyup(function () {
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    type: 'POST',
                    url: "{{route('autocomplete')}}",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search-ajax').fadeIn();
                        $('#search-ajax').html(data);
                    }

                });
            }else{
                $('#search-ajax').fadeOut();
            }
        });

        $(document).on('click', '.li_search_ajax', function(){
            $('#seach').val($(this).text());

            $('#search-ajax').fadeOut();
        });
    </script>
@endsection
