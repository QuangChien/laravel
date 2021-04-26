@extends('backend.master.master')
@section('title', 'Dach sách liên hệ')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('backend.layouts.page-header',['name'=>"Danh sách liên hệ"])

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="margin-top:20px;">

                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Họ và tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th width="40%">Nội dung</th>
                                            <th>Thời gian gửi</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($contacts as $key => $contact)
                                            <tr>
                                                <td>{{$contacts->firstItem() + $key }}</td>
                                                <td>{{$contact->fullname}}</td>
                                                <td>{{$contact->phone}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->content}}</td>
                                                <td>{{$contact->created_at->format('H:s:i  d/m/Y ')}}</td>
                                                <td>
                                                    <a data-url="{{route('contact.delete',['id'=>$contact->id])}}" id="prd_delete" class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $contacts->links() }}
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!--/.row-->


            </div>
        </div>
        <!--end main-->

    @endsection

    @section('script')
        @parent
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('backend/product/list.js') }}"></script>
    @endsection
