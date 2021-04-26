@extends('frontend.master.master')
@section('title','Trang chủ')

@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/home.css')}}">
@endsection

@section('content')
<section class="workshome">
    <div class="container">
        <div class="row mt-4">
            <div class="workshome-title col-12">
                <h2>MORRIS HOTEL PHÚ QUỐC</h2>
            </div>
            <div class="workshome-content col-12">
                <p>
                    Khách sạn Morris Phú Quốc (Khách sạn Amon cũ) từ lâu đã là địa chỉ quen thuộc không chỉ của
                    du khách
                    trong và ngoài nước
                    mà còn là đối tác tin cậy của các đơn vị lữ hành nội địa và nước ngoài – bởi chất lượng dịch
                    vụ cũng
                    như mức chi phí hợp lý.
                    Khách sạn Morris Phú Quốc nằm tại vị trí đắc địa ngay trung tâm chợ đêm Khu tổ hợp du lịch
                    Sonasea,
                    Bãi Trường.
                    Khách sạn cách Sân bay quốc tế Phú Quốc chưa đầy 15 phút lái xe và gần nhiều địa điểm du
                    lịch hấp
                    dẫn của huyện đảo.
                    Với quy mô gồm 03 tòa nhà và 126 phòng nghỉ, Khách sạn Morris Phú Quốc được thiết kế theo
                    lối kiến
                    trúc hiện đạị, đơn giản và tinh tế.
                    Tất cả các phòng đều được trang bị đầy đủ tiện nghi hiện đại theo tiêu chuẩn với ban công
                    thoáng mát
                    và rộng rãi.
                    Ngoài ra, Khách sạn Morris Phú Quốc còn cung cấp đầy đủ các dịch vụ tiện ích nghỉ dưỡng,
                    gồm: 02 Nhà
                    hàng, Coffee shop, quầy bar,
                    êu thị mini ngay trong khuôn viên khách sạn.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="workshome">
    <div class="container">
        <div class="row mt-4">
            <div class="workshome-title col-12">
                <h2>PHÒNG NGHỈ</h2>
            </div>
            <div class="workshome-content col-md-12">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="img-room">
                            <a href=" {{$product->path()}} ">
                                {{-- {{route('product.item',['id'=>$product->id])}} --}}
                                <img src="{{$product->img_path}}">
                            </a>
                        </div>
                        <p class="img-title">
                            {{$product->name}}
                        </p>
                    </div>
                    @endforeach

                    {{-- <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="img-room">
                            <a href="khach_san.html">
                                <img src="{{asset('frontend/images/superior.jpg')}}">
                            </a>
                        </div>
                        <p class="img-title">
                            Phòng Superior
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="img-room">
                            <a href="khach_san.html">
                                <img src="{{asset('frontend/images/deluxe.png')}}">
                                
                            </a>
                        </div>
                        <p class="img-title">
                            Phòng deluxe
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="img-room">
                            <a href="khach_san.html">
                                <img src="{{asset('frontend/images/triple.jpg')}}">
                            </a>
                        </div>
                        <p class="img-title">
                            Phòng triple
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="img-room">
                            <a href="khach_san.html">
                                <img src="{{asset('frontend/images/family.jpg')}}">
                                
                            </a>
                        </div>
                        <p class="img-title">
                            Phòng family
                        </p>
                    </div> --}}
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div id="slider">
                            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner h-300px">
                                  <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('frontend/images/dat-khach-san.jgp.jpeg')}}" alt="First slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/images/family.jpg')}}" alt="Second slide">
                                  </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <p class="custom">
                            Khách sạn Morris Phú Quốc luôn mong muốn sẽ là địa chỉ tin cậy khi Quý khách đến nghỉ ngơi hay công tác tại đảo ngọc Phú Quốc. Chúng tôi cam kết sẽ nỗ lực không ngừng để nâng cao chất lượng dịch vụ, giữ vững niềm tin, đáp ứng nhu cầu đa dạng của khách hàng và đối tác trong suốt quá trình phát triển của mình.
                        </p>
                    </div>
                </div>
                <br>
                <div class="row mt-4">
                    
                    <div class="col-md-6">
                        <p class="custom">
                            Với sức chứa lên tới 200 khách, Nhà hàng Morris là một trong những nhà hàng có sức phục vụ lớn nhất tại khu vực. Với đội ngũ đầu bếp và nhân viên phục vụ chuyên nghiệp và dày dặn kinh nghiệm, đến với Nhà hàng Morris, thực khách sẽ có dịp được thưởng thức những món ăn mang đậm hương vị tươi mới từ biển cả, những món ăn Việt Nam tinh tế đến những món ăn đặc sản Á - Âu độc đáo. 
                        </p>
                    </div>

                    <div class="col-md-6">
                        <div id="slider">
                            <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner h-300px">
                                  <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('frontend/images/dwm1462507482_khach_san_somerset_grand_ha_noi.jpg')}}" alt="First slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/images/hgp1515985808_khach_san_somerset_grand_ha_noi.jpg')}}" alt="Second slide">
                                  </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                        </div>

                    </div>
                </div>
                <br> <br>
                <div class="row">
                    <div class="col-md-12">
                        <div id="slider" class="nivoSlider">
                            <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('frontend/images/MORRIS-PHUQUOC-HOTEL-SUMMERPACKAGES-01.png')}}" alt="First slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/images/MORRIS-PHUQUOC-HOTEL-SUMMERPACKAGES-02.png')}}" alt="Second slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/images/MORRIS-PHUQUOC-HOTEL-SUMMERPACKAGES-04.png')}}" alt="Second slide">
                                  </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="workshome">
    <div class="container">
        <div class="row mt-4">
            <div class="workshome-title col-12">
                <h2>Đội ngũ nhân viên</h2>
            </div>
            <div class="workshome-content col-12">
                <p>
                    Đội ngũ nhân viên của Khách sạn Morris Phú Quốc được xây dựng với mong muốn truyền cảm hứng tốt đẹp đến với khách hàng. Quý khách sẽ cảm nhận được sự tân tâm và tinh tế từ những chi tiết nhỏ nhất. Được phục vụ Quý khách hàng là niềm vinh hạnh và là động lực to lớn của chúng tôi.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="workshome">
    <div class="container">
        <div class="row mt-4">
            <div class="workshome-title col-12">
                <h2>Nhà hàng</h2>
            </div>
            <div class="workshome-content col-12">
                <div id="slider">
                    <div id="carouselExampleControls4" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner h-450px">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('frontend/images/nha-hang-1.jpg')}}" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('frontend/images/nha-hang-2.jpg')}}" alt="Second slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls4" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls4" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    @parent

@endsection