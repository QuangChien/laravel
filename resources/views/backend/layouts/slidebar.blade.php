<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
    <ul class="nav menu">
       <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
          <a href="{{route('home')}}">
             <svg class="glyph stroked dashboard-dial">
                <use xlink:href="#stroked-dashboard-dial"></use>
             </svg>
             Tổng quan
          </a>
       </li>
      
       <li class="{{ Request::routeIs('product.*') ? 'active' : '' }}">
          <a href=" {{route('product.index')}} ">
             <svg class="glyph stroked bag">
                <use xlink:href="#stroked-bag"></use>
             </svg>
             Phòng khách sạn
          </a>
       </li>
       <li class="{{ Request::routeIs('comment.*') ? 'active' : '' }}">
         <a href="{{route('comment.index')}}">
            <svg class="glyph stroked clipboard with paper">
               <use xlink:href="#stroked-clipboard-with-paper" />
            </svg>
            Danh sách bình luận
         </a>
      </li>

      <li class="{{ Request::routeIs('contact.*') ? 'active' : '' }}">
         <a href="{{route('contact.index')}}">
            <svg class="glyph stroked clipboard with paper">
               <use xlink:href="#stroked-clipboard-with-paper" />
            </svg>
            Danh sách liên hệ
         </a>
      </li>
       <li class="{{ Request::routeIs('order.*') ? 'active' : '' }}">
          <a href="{{route('order.index')}}">
             <svg class="glyph stroked notepad ">
                <use xlink:href="#stroked-notepad" />
             </svg>
             Đơn hàng
          </a>
       </li>
       <li role="presentation" class="divider"></li>
       <li class="{{ Request::routeIs('user.*') ? 'active' : '' }}">
          <a href=" {{route('user.index')}} ">
             <svg class="glyph stroked male-user">
                <use xlink:href="#stroked-male-user"></use>
             </svg>
             Quản lý thành viên
          </a>
       </li>
    </ul>
 </div>