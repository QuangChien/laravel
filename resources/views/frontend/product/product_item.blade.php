@extends('frontend.master.master')
@section('title', 'Phòng khách sạn')

@section('css')
<link rel="stylesheet" href=" {{ asset('frontend/css/khach_san.css') }} ">
<script src="{{ asset('frontend/js/price-fommat.js') }}"></script>
@endsection

@section('content')
<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="prd-title">
                    <h2>
                        <span> {{ $product->name }} </span>
                    </h2>
                </div>

                <div class="row prd-detail mt-3">
                    <div class="col-md-7">
                        <div id="image-overlay" class="image-overlay"></div>
                        <div id="img-product-detail" class="img-product-detail">
                            <img id="img-product-zoom" src="" alt="">
                        </div>
                        <div>
                            <img class="" id="featured" src=" {{ $product->img_path }} ">
                        </div>
                        <div id="slide-wrapper">

                            <div id="slider">
                                <div class="thumbnail">
                                    <img class="active-img" src=" {{ $product->img_path }} ">
                                </div>
                                @foreach ($product->images as $productImg)
                                <div class="thumbnail">
                                    <img src=" {{ $productImg->prd_img_path }} ">
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="col-md-5">
                        <div>
                            {!! $product->description !!}
                        </div>
                        <p class="prd_price">{{ number_format($product->price, 0, ',', '.') }} VND</p>
                        <button type="button" class="btn btn-primary buy" data-toggle="modal"
                        data-target="#exampleModal">
                        <svg class="buy-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                Đặt phòng</button>
                <br>
                @if (session('success'))
                <div style="color: #fff;" id="alert-success" class="alert bg-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="list-style: none">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center w-100" id="exampleModalLabel">Đặt
                            phòng</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form class="mt-3" action=" {{route('product.order',['id'=>$product->id])}} " method="POST" role="form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                    placeholder="Họ và tên*">
                                    <span id="error_fullname" class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Số điện thoại*">
                                    <span id="error_phone" class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email*">
                                    <span id="error_email" class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <input type="text" onfocus="(this.type='date')" class="form-control"
                                    id="ngay_nhan" name="receive_date" placeholder="Ngày nhận phòng*">
                                    <span id="error_receive" class="form-message"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" onfocus="(this.type='date')" class="form-control"
                                    id="ngay_tra" name="pay_date" placeholder="Ngày trả phòng*">
                                    <span id="error_pay" class="form-message"></span>
                                </div>


                                <div class="form-group">
                                    <input name="total_product" type="number" min="1" id="total_room"
                                    class="form-control" placeholder="Số phòng muốn đặt" value="1"></input>
                                </div>
                                <div class="info_price mt-3" id="info_price">

                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <p class="total_price_title">Tổng tiền: </p>
                                    <p><span id="total_price"
                                        class="total_price">{{ number_format($product->price, 0, ',', '.') }}
                                    </span><span class="total_price"> VND</span> </p>
                                    <input id="post_price" type="hidden" name="total_price">
                                </div>

                                <button id="submit" type="submit" class="btn btn-primary float-right">Đặt
                                phòng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="row mt-4 mb-4">
        <div class="col-md-12 prd-info">
            <div class="prd-info-heading">
                <h4 class="text-left prd-info-title">Thông tin chi tiết</h4>
            </div>

        </div>
        <div class="col-md-12">
            <div class="prd-info-detail mt-4">
                {!! $product->detail !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 prd-info">
            <div class="prd-info-heading mb-4">
                <h4 class="text-left prd-info-title">Bình luận</h4>
            </div>

            @if ($comments->count() == 0)
            <div class="no-comment">
                <p>Chưa có bình luận nào!</p>
            </div>
            @else
            @foreach ($comments as $comment)
            <div class="prd-content-wrap">
                <div class="prd-comment">
                    <div class="prd-comment-avt">
                        <img src=" {{ asset('frontend/images/avatar_comment.png') }} " alt="">
                    </div>
                    <div>

                        <p class="user-name"> {{ $comment->comment_user }} </p>
                        <p id="comment-date" class="comment-date">
                            {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
                        </p>
                        <div class="stars-no-color">
                            <span class="star-5-active" href="#">5</span>

                            @if ($comment->star == 1)
                            <span class="star-1">1</span>
                            @elseif( $comment->star == 2)
                            <span class="star-2">2</span>
                            @elseif( $comment->star == 3)
                            <span class="star-3">3</span>
                            @elseif( $comment->star == 4)
                            <span class="star-4">4</span>
                            @elseif( $comment->star == 5)
                            <span class="star-5">5</span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="prd-comment-content">
                    {{ $comment->content }}
                </div>
            </div>
            @endforeach
            @endif


            <div class="form-comment">
                <form action="" method="POST">
                    @csrf
                    <h5 class="mb-3">Đánh giá của bạn về phòng: PHÒNG TRIPLE CÓ BAN CÔNG tại MORRIS
                    HOTEL PHÚ QUỐC</h5>

                    <p class="stars">Đánh giá của bạn: <br>
                        <a class="star-1" href="#">1</a>
                        <a class="star-2" href="#">2</a>
                        <a class="star-3" href="#">3</a>
                        <a class="star-4" href="#">4</a>
                        <a class="star-5" href="#">5</a>
                    </p>

                    <input type="hidden" id="star" name="star" value="">

                    <div class="form-group">
                        <label for="">Họ và tên*: </label>
                        <input type="text" class="form-control" id="" name="comment_user">
                    </div>


                    <div class="form-group">
                        <label for="">Nội dung*: </label>
                        <textarea name="content" id="content" class="form-control" rows="4"></textarea>
                    </div>


                    <a href="" id="btn" data-url={{ route('product.item.store', ['id' => $product->id]) }}
                        type="submit" class="btn btn-primary">Gửi đánh giá</a>

                    </form>
                </div>
            </div>
        </div>

                    {{-- <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="prd-title">
                                <h2>
                                    <span>Sản phẩm cùng mục</span>
                                </h2>
                            </div>

                            <div class="prd-list mt-2">
                                <div class="row">
                                    @foreach ($productAll as $productItem)
                                        <div class="col-md-6 col-lg-4 mb-30px">
                                            <a href="{{ route('product.item', ['id' => $productItem->id]) }}">
                                                <div class="prd-item text-center">
                                                    <div class="prd-img">
                                                        <img src=" {{ $productItem->img_path }} " alt="">
                                                    </div>
                                                    <h2 class="mt-4 mb-2">{{ $productItem->name }}</h2>
                                                    <span>{{ number_format($productItem->price, 0, ',', '.') }} VND</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                @include('frontend.layouts.slidebar')
            </div>
        </div>
    </section>
    @endsection

    @section('script')
    @parent
    <script src=" {{ asset('frontend/js/buy-product.js') }} "></script>
    <script src="{{ asset('frontend/js/star-active.js') }}"></script>
    <script src="{{ asset('frontend/js/image-zoom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('frontend/js/comment.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/validate.js') }}"></script> --}}

    @endsection
