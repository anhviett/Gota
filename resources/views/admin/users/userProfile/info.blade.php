@extends('admin.layouts.master')
@section('title'){{'Profile'}}@endsection
@section('content')
    {{--wrapper--}}
    <div class="wrapper">
    @include('admin.layouts.sideNav')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thông tin người dùng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Thông tin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-warning">
                        {{ session()->get('error') }}
                    </div>
                @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" style="width: 60px; height: 60px"
                                         src="
                                        @if(auth()->user()->avatar)
                                         {{asset('/uploads/').'/'.auth()->user()->avatar}}
                                         @else
                                         {{asset('backend/assets/img/avatar_pro.jpg')}}
                                         @endif
"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</h3>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Họ</b> <a class="float-right">{{auth()->user()->firstname}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tên</b> <a class="float-right">{{auth()->user()->lastname}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{auth()->user()->email}}</a>
                                    </li>
                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">


                                <strong><i class="fas fa-book mr-1"></i> Học vấn</strong>

                                <p class="text-muted">
                                    {{auth()->user()->education}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                                <p class="text-muted">{{auth()->user()->location}}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Kỹ năng</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">{{auth()->user()->skills}}</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Ghi chú</strong>

                                <p class="text-muted">{{auth()->user()->notes}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="settings">
                                        <form action="{{route('userProfile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group text-center position-relative">
                                                <img class="imagesForm" width="100" height="80" src="
                                                @if($user->avatar)
                                                    {{asset('uploads').'/'.$user->avatar}}
                                                @else
                                                    {{asset('backend/assets/img/avatar_pro.jpg')}}
                                                @endif"/>
                                                <label class="formLabel" for="userProfileAvatarEdit"><i class="fas fa-pen"></i>
                                                    <input style="display: none" type="file" id="userProfileAvatarEdit" class="imagesAvatar"
                                                           name="userProfileAvatarEdit"></label>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Họ</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                           value="{{auth()->user()->firstname}}"
                                                           name="inputFirstname" class="form-control" id="inputName" placeholder="Họ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputLastname" class="col-sm-2 col-form-label">Tên</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="inputLastname" class="form-control" id="inputLastname" placeholder="Tên"
                                                    value="{{auth()->user()->lastname}}"
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email"
                                                           value="{{auth()->user()->email}}"
                                                           name="inputEmail" class="form-control" id="inputEmail" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password"
                                                           value="{{auth()->user()->password}}"
                                                           name="inputPassword" class="form-control" id="inputPassword" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEducation" class="col-sm-2 col-form-label">Học vấn</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="inputEducation" id="inputEducation" placeholder="Học vấn"
                                                    value="{{$user->education}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputLocation" class="col-sm-2 col-form-label">Địa chỉ</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="inputLocation" id="inputLocation" placeholder="Địa chỉ"
                                                           value="{{$user->location}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Kỹ năng</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="inputSkills" id="inputSkills" placeholder="Skills"
                                                           value="{{$user->skills}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputNote" class="col-sm-2 col-form-label">Khác</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="inputNote" id="inputNote" placeholder="Khác"
                                                           value="{{$user->notes}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Tôi đồng ý <a href="#"> các điều khoản và điều kiện</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    </div>
    {{--/wrapper--}}
@endsection
@section('footer_script')
    <script>
        function read(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.imagesForm').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imagesAvatar").change(function() {
            read(this);
        });

    </script>
@endsection
