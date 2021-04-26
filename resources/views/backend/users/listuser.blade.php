@extends('backend.master.master')
@section('title', 'Danh sách tài khoản')

@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('backend.layouts.page-header',['name'=> 'Danh sách tài khoản'])
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                @if (session('success'))
                                    <div id="alert-success" class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>
                                        {{ session('success') }} <a href="#" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                @can('role')
                                    <a href=" {{ route('user.create') }} " class="btn btn-primary">Thêm tài khoản</a>
                                @endcan
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Quyền</th>
                                            @can('role')
                                                <th width='18%'>Tùy chọn</th>
                                            @endcan
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td> {{$users->firstItem() + $key }} </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td width="22%">
                                                    <img src=" {{ $user->avatar_path }} " alt="" width="100%">
                                                </td>
                                                <td>
                                                    @if ($user->role == 1)
                                                        <span class="btn btn-success">Admin</span>
                                                    @else
                                                        <span class="btn btn-danger">Member</span>
                                                    @endif
                                                </td>
                                                
                                                @can('role')
                                                <td>
                                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}"
                                                        class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</a>
                                                    <a data-url={{ route('user.delete', ['id' => $user->id]) }}
                                                        id="prd_delete"
                                                        href="{{ route('user.delete', ['id' => $user->id]) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </div>
    <!--end main-->
@endsection
@section('script')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/user/delete_user.js') }}">
    </script>
@endsection
