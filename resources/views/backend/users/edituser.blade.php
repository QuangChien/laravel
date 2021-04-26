@extends('backend.master.master')
@section('title', 'Cập nhật tài khoản')

@section('css')
    <link rel="stylesheet" href=" {{ asset('backend/user/style.css') }} ">
@endsection

@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('backend.layouts.page-header',['name'=>'Cập nhật tài khoản'])
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Cập nhật tài khoản</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="list-style: none; padding: 0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action=" {{ route('user.update', ['id' => $user->id]) }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center" style="margin-bottom:40px">

                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input id="img" type="file" name="avatar" class="form-control hidden"
                                            onchange="changeImg(this)">
                                        <br>
                                        <img id="avatar" class="thumbnail" src=" {{ $user->avatar_path }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Quyền</label>
                                        <select name="role" class="form-control">
                                            @if ($user->role==1)
                                            <option selected value="1">Admin</option>
                                            <option value="0">Member</option>
                                            @else
                                                <option value="1">Admin</option>
                                                <option selected value="0">Member</option>  
                                            @endif
                                            
                                        </select>
                                    </div>
                                    <div class="show-change-pass">
                                        <p>Bạn muốn đổi mật khẩu?</p>
                                    </div>
                                    <div class="change-pass">
                                        <div class="form-group">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu mới</label>
                                            <input type="re-password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="hide-change-pass">
                                        <p>Ẩn đổi mật khẩu!</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 text-right">

                                        <button class="btn btn-success" type="submit">Cập nhật</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--/.row-->
    </div>
    <!--end main-->
@endsection

@section('script')
    @parent
    <script src=" {{ asset('backend/js/change-image.js') }} "></script>
    <script src="{{ asset('backend/user/main.js') }}"></script>
@endsection
