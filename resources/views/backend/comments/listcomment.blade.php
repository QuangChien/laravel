@extends('backend.master.master')
@section('title', 'Dach sách bình luận')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('backend.layouts.page-header',['name'=>"Danh sách bình luận"])

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
                                            <th>Người bình luận</th>
                                            <th>Đánh giá sao</th>
                                            <th>Tên phòng</th>
                                            <th width="40%">Nội dung</th>
                                            <th>Thời gian bình luận</th>
                                            <th>Tình trạng</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $key => $comment)
                                            <tr>
                                                <td> {{$comments->firstItem() + $key }} </td>
                                                <td>{{$comment->comment_user}}</td>
                                                <td>{{$comment->star}} / 5</td>
                                                <td>{{optional($comment->product)->name}}</td>
                                                <td>{{$comment->content}}</td>
                                                <td>{{$comment->created_at->format('H:s:i  d/m/Y ')}}</td>
                                                <td>
                                                    @if ($comment->status == 0)
                                                        <a href=" {{route('comment.update',['id'=>$comment->id])}} " class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i>Chờ duyệt
                                                        </a>
                                                    @else
                                                    <span class="btn btn-success">Đã phê duyệt
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-url="{{route('comment.delete',['id'=>$comment->id])}}" id="prd_delete" class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $comments->links() }}
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

