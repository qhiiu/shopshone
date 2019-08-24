<div id="header">

    <div class="header-body"  style="background-color: #fc5780">
        <div class="container beta-relative">
            <div class="pull-left" >
                <a href="{{route('trangchu')}}" id="logo"><img src="source/image/logo.png" width="300px" height="100px" alt="" style="    border-radius: 25px;"></a>
            </div>
            <div class="pull-right beta-components space-left ov" style=" float:left">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp" >
                    <form role="search" method="get" id="searchform" action="{{ route('trangchu') }}" style="width:300px; padding-top:10px;" >
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." style="background-color: #ffcbcb;" />
                        <button class="fa fa-search" type="submit" id="searchsubmit" style=" padding-top:15px;"></button>
                    </form>
                </div>
                <div class="beta-comp" style="font-size: large;">
                        @if(Session::has('cart'))

                                    <div class="cart" style="margin:10px;background-color:#FFFFCC;     border-radius: 10px; ">

                                        <div class="beta-select" style=""><i class="fa fa-shopping-cart"></i> Giỏ hàng(@if(Session::has('cart')) {{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                                        <div class="beta-dropdown cart-body" style="    border-radius: 10px;background-color:#FFFFCC" >


                                            @foreach($product_cart as $product)
                                            <div class="cart-item">
                                            <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
                                                <div class="media">
                                                    <a class="pull-left" href="#"><img src="source/image/dienthoai/{{$product['item']['image']}}" alt=""></a>
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

                                    </div> <!-- .cart -->
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color:#215fa6;">
        <div class="container" style="width:1300px;">
            <a class="visible-xs beta-menu-toggle pull-right" href="#" ><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu" >
                <ul class="l-inline ov">
                <li style="width:150px; "><a href="{{route('trangchu')}}" >Trang chủ</a></li>
                <li style="width:150px;"><a href="{{ route('loaisanpham',1) }}" style="    padding: 10px 22px;">Sản phẩm <span class="caret"></span></a>
                        <ul class="sub-menu"    style=" background-color: #FFFFCC;">
                            @foreach($loai_sp as $loai)
                        <li><a href="{{route('loaisanpham',$loai->id)}}" style="    color: rgba(255, 0, 210, 0.97);">{{$loai->name}}</a></li>
                              @endforeach
                        </ul>
                    </li>
                <li style="width:150px; "><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                <li style="width:150px; "><a href="{{route('lienhe')}}">Liên hệ</a></li>
                <li style="width:150px;"><a href="{{ route('dathang') }}">Giỏ hàng</a></li>

                {{-- ---------try------- --}}
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('register') }}">Đăng kí</a></li>
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                    @else
                        <li class="nav-item dropdown"  style="width:220px;">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('thongtincanhan.index') }}">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="sub-menu" style="    background: beige;">
                                    <li><a class="dropdown-item" href="{{ route('thongtincanhan.index') }}" style="color: red;">Thông tin cá nhân</a></li>
                                    <li class="list-group-item"><a href="{{ route('thongtincanhan._edit') }}" style="color: red;">Cập nhật thông tin</a></li>
                                    <li class="list-group-item"><a href="" style="color: red;">Danh sách đơn hàng</a></li>
                                    <li class="list-group-item"><a href="" style="color: red;">#</a></li>
                                    <li class="list-group-item"><a href="" style="color: red;">#</a></li>
                                    <li class="list-group-item"><a href="" style="color: red;">#</a></li>
                                    <li class="list-group-item"><a href="" style="color: red;">#</a></li>
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
                {{-- ------end try---------- --}}

                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
