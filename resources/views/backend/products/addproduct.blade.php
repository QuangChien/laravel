@extends('backend.master.master')
@yield('title',"Thêm phòng khách sạn")

@section('css')
    <link rel="stylesheet" href=" {{ asset('backend/product/style.css') }} ">
@endsection

@section('content')
    <!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    @include('backend.layouts.page-header',["name"=>"Thêm phòng khách sạn"])
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Thêm phòng khách sạn</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action=" {{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tên phòng khách sạn</label>
                                    <input type="text" name="name" class="form-control"
                                    value="{{ Request::old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="price" class="form-control"
                                    value="{{ Request::old('price') }}">
                                </div>

                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="number" name="quantity" class="form-control"
                                    value="{{ Request::old('quantity') }}">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh phòng khách sạn</label>
                                    <input id="img" type="file" name="img" class="form-control hidden"
                                        onchange="changeImg(this)" value=" {{Request::old('img')}} ">
                                    <img id="avatar" class="thumbnail" width="100%" height="200px"
                                        src=" {{ asset('backend/img/import-img.png') }} ">
                                </div>
                                
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Ảnh chi tiết phòng khách sạn</label>
                                    <input id="image-file" type="file" name="prd_img_name[]" class="form-control"
                                        multiple>
                                    <br>
                                    <div id="list_img_new" class="row">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea name="description" rows="8"
                                        class="tinymce-editor form-control">{{ Request::old('description') }}</textarea>                                        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thông tin chi tiết</label>
                                    <textarea id="editor" class="tinymce-editor form-control" rows="20"
                                        name="detail">{{ Request::old('detail') }}</textarea>
                                </div>
                                <button class="btn btn-success" name="add-product" type="submit">Thêm phòng</button>
                                <button class="btn btn-danger" type="reset">Làm mới</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src=" {{ asset('tinymce/script.js') }} "></script>
    <script src="{{ asset('backend/product/main.js') }}"></script>
@endsection
