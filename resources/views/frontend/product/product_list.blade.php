@extends('frontend.master.master')
@section('title','Các loại phòng khách sạn')
    
@section('css')
<link rel="stylesheet" href=" {{asset('frontend/css/loai_khach_san.css')}} ">
@endsection

@section('content')
<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="prd-title">
                    <h2>
                        <span>Loại phòng</span>
                    </h2>
                </div>
                <br>
                <div class="prd-list">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-6 col-lg-4 mb-30px">
                                <a href=" {{route('product.item',['id'=>$product->id])}} ">
                                    <div class="prd-item text-center">
                                        <div class="prd-img">
                                            <img src=" {{$product->img_path}} " alt="">
                                        </div>
                                        <h2 class="mt-4 mb-2">{{$product->name}}</h2>
                                        <span>{{ number_format($product->price, 0, ',', '.') }} VND</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        {{-- <div class="col-md-6 col-lg-4 mb-30px">
                            <a href="khach_san.html">
                                <div class="prd-item text-center">
                                    <div class="prd-img">
                                        <img src="{{asset('frontend/images/triple.jpg')}}" alt="">
                                    </div>
                                    <h2 class="mt-4 mb-2">Phòng Family có ban công</h2>
                                    <span>3.000.000đ</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-30px">
                            <a href="khach_san.html">
                                <div class="prd-item text-center">
                                    <div class="prd-img">
                                        <img src="{{asset('frontend/images/deluxe.png')}}" alt="">
                                    </div>
                                    <h2 class="mt-4 mb-2">Phòng Family có ban công</h2>
                                    <span>2.000.000đ</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-30px">
                            <a href="khach_san.html">
                                <div class="prd-item text-center">
                                    <div class="prd-img">
                                        <img src="{{asset('frontend/images/superior.jpg')}}" alt="">
                                    </div>
                                    <h2 class="mt-4 mb-2">Phòng Family có ban công</h2>
                                    <span>2.550.000đ</span>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            @include('frontend.layouts.slidebar')
        </div>
    </div>
</section>  
@endsection
        


