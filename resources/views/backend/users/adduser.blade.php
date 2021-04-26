@extends('backend.master.master')
@section('title','Thêm tài khoản')
@section('css')
    <link rel="stylesheet" href=" {{ asset('backend/user/style.css') }} ">
@endsection

@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('backend.layouts.page-header',['name'=>'Thêm tài khoản'])
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
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
                        <form action=" {{route('user.store')}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center" style="margin-bottom:40px">

                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" name="name" class="form-control" value="{{ Request::old('name') }}">
                                    </div>
    
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ Request::old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" value="{{ Request::old('password') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" name="re-password" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input type="file" id="img" name="avatar" class="form-control hidden"
                                        onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="30%" height="260px"
                                        src=" {{ asset('backend/img/import-img.png') }} ">
                                    </div>
                                  
                                    <div class="form-group">
                                        <label>Quyền</label>
                                        <select name="role" class="form-control">
                                            <option value="1">Admin</option>
                                            <option selected value="0">Member</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 text-right">
                                      
                                        <button class="btn btn-success"  type="submit">Thêm tài khoản</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
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
 @endsection
