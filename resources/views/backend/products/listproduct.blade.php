@extends('backend.master.master')

@section('title', 'Danh sách sản phẩm')
@section('css')
    <link rel="stylesheet" href=" {{ asset('backend/product/style.css') }} ">
@endsection

@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('backend.layouts.page-header',["name"=>"Danh sách các phòng"])

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
                                <a href=" {{ route('product.create') }} " class="btn btn-primary">Thêm phòng</a>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Thông tin</th>
                                            <th>Giá phòng</th>
                                            <th>Ảnh chi tiết</th>
                                            <th>Số lượng</th>
                                            <th width='18%'>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td> {{ $products->firstItem() + $key }} </td>
                                                <td width="42%">
                                                    <div class="row">
                                                        <div class="col-md-5"><img src="{{ $product->img_path }}"
                                                                alt="Áo đẹp" width="100%" class="thumbnail"></div>
                                                        <div class="col-md-7">
                                                            <p><strong>Tên phòng:</strong></p>
                                                            <p>{{ $product->name }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{number_format($product->price, 0, ',', '.') }} vnđ</td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#prd-{{ $product->id }}"
                                                        class="btn btn-primary">{{ count($product->images) }} ảnh
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="prd-{{ $product->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hình ảnh
                                                                        chi tiết
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        @foreach ($product->images as $productImg)
                                                                            <div id="image_details"
                                                                                class="col-lg-6 col-md-6 col-sm-6">
                                                                                <img src="{{ $productImg->prd_img_path }}"
                                                                                    width="200px">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                                        class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</a>
                                                    <a data-url={{ route('product.delete', ['id' => $product->id]) }}
                                                        id="prd_delete"
                                                        href="{{ route('product.delete', ['id' => $product->id]) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                </td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $products->links() }}
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
