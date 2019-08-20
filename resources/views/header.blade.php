<div id="header">

    <div class="header-body"  style="background-color:#00FFFF">
        <div class="container beta-relative">
            <div class="pull-left" >
                <a href="{{route('trangchu')}}" id="logo"><img src="source/image/logo.png" width="300px" height="100px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov" style=" float:left">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp" >
                    <form role="search" method="get" id="searchform" action="/" style="width:300px; padding-top:10px;">
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." style="background-color:#FFFFCC;" />
                        <button class="fa fa-search" type="submit" id="searchsubmit" style=" padding-top:15px;"></button>
                    </form>
                </div>
                <div class="beta-comp">
                        @if(Session::has('cart'))

                                    <div class="cart" style="margin:10px;background-color:#FFFFCC; ">

                                        <div class="beta-select" style=""><i class="fa fa-shopping-cart"></i> Giỏ hàng(@if(Session::has('cart')) {{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                                        <div class="beta-dropdown cart-body">


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
                                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}} @else{{number_format($product['item']['promotion_price'])}}@endif VND</span></div>
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
    <div class="header-bottom" style="background-color:#82FA58;">
        <div class="container" style="width:1300px;">
            <a class="visible-xs beta-menu-toggle pull-right" href="#" ><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu" >
                <ul class="l-inline ov">
                <li style="width:150px; "><a href="{{route('trangchu')}}" >Trang chủ</a></li>
                <li style="width:150px;"><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $loai)
                        <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                              @endforeach
                        </ul>
                    </li>
                <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                <li><a href="{{route('lienhe')}}">Liên hệ</a></li>


                {{-- ---------try------- --}}
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('register') }}">Đăng kí</a></li>
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{-- -------------------- ẩn đăng ký , đăng nhập nếu đã có -------------------------------- --}}
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{-- <form id="logout-form" action="{{ route('bills.index') }}" method="get" style="display: none;"> --}}
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
