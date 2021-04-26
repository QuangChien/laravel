<header id="header">
    <div class="container">
        <div class="col-md-12">
            <div class="row header-nav">
                <div class="icon-menu">
                    <svg id="icon-svg" class="icon-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </div>


                <div class="logo col-sm-3 col-lg-2 col-md-3">
                    <a class="navbar-brand" href="/">
                        <img src=" {{asset('frontend/images/Logo01.jpg')}} ">
                    </a>
                </div>

                <div class="header-call-mobile">
                    <p class="call-phone">
                        0352.860.701
                    </p>
                </div>
                <div id="navbar-overlay" class="navbar-overlay"></div>
                <div id="navbar-mobile" class="navbar-mobile">
                    <svg id="navbar-moblie-close" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11 navbar-moblie-close" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                    <ul class="navbar-list-moblie">
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'index') ? 'navbar-moblie-active' : '' }}" href=" {{route('index')}} ">Trang chủ <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'introduction') ? 'navbar-moblie-active' : '' }}" href="{{route('introduction')}}">Giới thiệu</a>
                        </li>
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'product.list') || (\Request::route()->getName() == 'product.item') ? 'navbar-moblie-active' : '' }}"  href="{{route('product.list')}}">Đặt khách sạn</a>
                        </li>
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'contact') ? 'navbar-moblie-active' : '' }}" href="{{route('contact')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="navbar col-sm-9 col-lg-7 col-md-9 col-xs-4">
                    <ul class="navbar-list">
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'index') ? 'active' : '' }}" href=" {{route('index')}} ">Trang chủ <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'introduction') ? 'active' : '' }}" href="{{route('introduction')}}">Giới thiệu</a>
                        </li>
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'product.list') || (\Request::route()->getName() == 'product.item') ? 'active' : '' }}"  href="{{route('product.list')}}">Đặt khách sạn</a>
                        </li>
                        <li>
                            <a class="{{ (\Request::route()->getName() == 'contact') ? 'active' : '' }}" href="{{route('contact')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="header-call-wrap col-sm-0 col-lg-3 col-md-0">
                    <div class="header-call">
                        <div class="call-icon ">
                            <img src="{{asset('frontend//images/call.gif')}}">
                        </div>
                        <p class="call-phone">
                            0352.860.701
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
