@extends('backend.master.master')
@section('title', 'Danh sách đặt phòng')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('backend.layouts.page-header',['name'=>"Danh sách đặt phòng"])

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
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Tên phòng</th>
                                            <th>Ngày nhận phòng</th>
                                            <th>Ngày trả phòng</th>
                                            <th>Tổng số phòng</th>
                                            <th>Tổng tiền</th>
                                            <th>Xử lý</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =1;
                                        @endphp
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <td> {{$i++ }} </td>
                                                <td> {{optional($order->customers)->fullname}} </td>
                                                <td>{{optional($order->customers)->phone}}</td>
                                                <td>{{optional($order->products)->name}}</td>
                                                {{-- <td>{{optional($comment->product)->name}}</td> --}}
                                                {{-- <td>{{$order->receive_date->format('m/d/Y')}}</td> --}}
                                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->receive_date)->format('d/m/Y') }}</td>
                                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->pay_date)->format('d/m/Y') }}</td>
                                                
                                                <td>{{$order->total_product}}</td>
                                                <td>{{number_format($order->total_price,0,',','.')}} vnđ</td>
                                                <td>
                                                    @if ($order->status == 0)
                                                        <a href=" {{route('order.update',['id'=>$order->id])}} " class="btn btn-warning">Chờ duyệt
                                                        </a>
                                                    @else
                                                    <span class="btn btn-success">Đã xử lý
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-url="{{route('order.delete',['id'=>$order->id])}}" id="prd_delete" class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                    {{-- {{route('comment.delete',['id'=>$comment->id])}} --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $orders->links() }}
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

