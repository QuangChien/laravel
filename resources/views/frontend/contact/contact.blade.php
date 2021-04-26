@extends('frontend.master.master')
@section('title','Liên hệ')
    
@section('css')
<link rel="stylesheet" href=" {{asset('frontend/css/lien_he.css')}} ">
@endsection

@section('content')
<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="prd-title">
                    <h2>
                        <span>Liên hệ</span>
                    </h2>
                </div>
                @if (session('success'))
                    <div id="alert-success" style="color: #fff;" class="alert bg-success" role="alert">
                        {{ session('success') }} <a href="#" class="pull-right"><span
                                class="glyphicon glyphicon-remove"></span></a>
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
                
                <form class="mt-3" action=" {{route('contact.store')}} " method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Họ và tên*: </label>
                        <input type="text" class="form-control" id="" name="fullname" value="{{ Request::old('fullname') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại*: </label>
                        <input type="text" class="form-control" id="" name="phone" value="{{ Request::old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Email*: </label>
                        <input type="text" class="form-control" id="" name="email" value="{{ Request::old('email') }}">
                    </div>


                    <div class="form-group">
                        <label for="">Nội dung*: </label>
                        <textarea name="content" id="" class="form-control" rows="4">{{ Request::old('content') }}</textarea>
                    </div>
                
                    
                
                    <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
                </form>
                

            </div>
            @include('frontend.layouts.slidebar')
        </div>
    </div>
</section>
@endsection

        