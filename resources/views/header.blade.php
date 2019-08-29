<div id="header">

    <div class="header-body"  style="background-color: white">
        <div class="container beta-relative">
            <div class="pull-left" >
                <a href="{{route('trangchu')}}" id="logo"><img src="source/image/l.png" width="300px" height="100px" alt="" ></a>
            </div>
            <div class="pull-right beta-components space-left ov" style=" float:left">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp" >
                    <form role="search" method="get" id="searchform" action="{{ route('trangchu') }}" style="width:300px; padding-top:10px;" >
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." style="background-color: #f7f7f7;border-radius: 19px;border-color: deepskyblue;" />
                        <button class="fa fa-search" type="submit" id="searchsubmit" style=" padding-top:15px;bottom: 5px;right: 15px"></button>
                    </form>
                </div>
            {{-- -------------- --}}
                <div class="beta-comp" style="font-size: large;">
                        @if(Session::has('cart'))
                            <div class="cart" style="margin:10px;background-color: #ffdddd;     border-radius: 10px;    border: 2px solid rgb(255, 9, 103);">
                                <div class="beta-select" style=""><i class="fa fa-shopping-cart"></i> Giỏ hàng(@if(Session::has('cart')) {{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                                <div class="beta-dropdown cart-body" style="    border-radius: 10px;background-color:white;    border: 2px solid rgb(255, 9, 103);" >
                                    @foreach($product_cart as $product)
                                    <div class="cart-item">
                                    <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="{{route('chitietsanpham',$product['item']['id'])}}"><img src="source/image/dienthoai/{{$product['item']['image']}}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{$product['item']['name']}}</span>
                                                <span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}} @else{{number_format($product['item']['promotion_price'])}}@endif</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="cart-caption">
                                        <div class="clearfix"></div>
                                        <div class="center">
                                            <div class="space10">&nbsp;</div>
                                        <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                </div>
            {{-- -------------- --}}

            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
{{-- -------------------------------------------------------------------------------------------------------------- --}}


<nav class="navbar navbar-inverse header-bottom"  style="background-color:#215fa6; margin-bottom: 0px;" >
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">9x shop </a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class=""><a href="{{ route('trangchu') }}">Trang chủ</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('loaisanpham',1) }}">Sản phẩm <span class="caret"></span></a>
                <ul class="dropdown-menu"  style="font-size: 22px;">
                        @foreach($loai_sp as $loai)
                        <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                      @endforeach
                </ul>
              </li>
              <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
              <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
              <li><a href="{{ route('dathang') }}">Giỏ hàng</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @guest
                <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in" style="margin-right:10px"></span>Đăng nhập</a></li>
              @else
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user" style="margin-right:10px"></span>{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu"  style="font-size: 22px;">
                            <li><a href="{{route('thongtincanhan.index')}}">Thông tin cá nhân</a></li>
                            <li><a href="{{route('thongtincanhan._edit')}}">Cập nhật thông tin</a></li>
                            <li><a href="{{route('thongtincanhan.index')}}">Danh sách đơn hàng</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style=" color: #215fa6;">
                                    Đăng xuất
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                    </ul>
                  </li>
              @endguest
            </ul>
          </div>
        </div>
</nav>
    {{-- -------------------------------------------------------------------------------------------------------------- --}}
</div> <!-- #header -->
