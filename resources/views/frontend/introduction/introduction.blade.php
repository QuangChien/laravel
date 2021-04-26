@extends('frontend.master.master')
@section('title','Giới thiệu')

@section('css')
<link rel="stylesheet" href=" {{asset('frontend/css/gioi_thieu.css')}} ">
@endsection

@section('content')
<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="prd-title">
                    <h2>
                        <span>MORRIS HOTEL PHÚ QUỐC</span>
                    </h2>
                </div>
                
                <div class="mt-3">
                    <p>
                        Khách sạn Morris Phú Quốc (Khách sạn Amon cũ) từ lâu đã là địa chỉ quen thuộc không chỉ của du khách trong và ngoài nước mà còn là đối tác tin cậy của các đơn vị lữ hành nội địa và nước ngoài – bởi chất lượng dịch vụ cũng như mức chi phí hợp lý. Khách sạn Morris Phú Quốc nằm tại vị trí đắc địa ngay trung tâm chợ đêm Khu tổ hợp du lịch Sonasea, Bãi Trường. Khách sạn cách Sân bay quốc tế Phú Quốc chưa đầy 15 phút lái xe và gần nhiều địa điểm du lịch hấp dẫn của huyện đảo. Với quy mô gồm 03 tòa nhà và 126 phòng nghỉ, Khách sạn Morris Phú Quốc được thiết kế theo lối kiến trúc hiện đạị, đơn giản và tinh tế. Tất cả các phòng đều được trang bị đầy đủ tiện nghi hiện đại theo tiêu chuẩn với ban công thoáng mát và rộng rãi. Ngoài ra, Khách sạn Morris Phú Quốc còn cung cấp đầy đủ các dịch vụ tiện ích nghỉ dưỡng, gồm: 02 Nhà hàng, Coffee shop, quầy bar, siêu thị mini ngay trong khuôn viên khách sạn.
                    </p>

                    <img width="100%" src=" {{asset('frontend/images/superior.jpg')}} " alt="">

                    <p class="mt-2">
                        Khách sạn Morris Phú Quốc luôn mong muốn sẽ là địa chỉ tin cậy khi Quý khách đến nghỉ ngơi hay công tác tại đảo ngọc Phú Quốc. Chúng tôi cam kết sẽ nỗ lực không ngừng để nâng cao chất lượng dịch vụ, giữ vững niềm tin, đáp ứng nhu cầu đa dạng của khách hàng và đối tác trong suốt quá trình phát triển của mình.
                    </p>
                </div>
            </div>
            @include('frontend.layouts.slidebar')
        </div>
    </div>
</section>
@endsection

        
