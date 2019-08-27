@extends('master')
@section('content')

<div class="inner-header">
    <div class="space40">&nbsp;</div>
    <div class="container">
        <div class="pull-left">
            <h1 class="inner-title"  style="    font-family: -webkit-pictograph;">Sản phẩm {{$sanpham->name}}</h1>
        </div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-7">
                        <img src="source/image/dienthoai/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-5">
                        <div class="single-item-body">
                            <p style="font-size: 20px;">Giá sản phẩm : </p>
                            <div class="space10">&nbsp;</div>
                            <p class="single-item-price" >
                                    @if($sanpham->promotion_price == 0)
                                        <span class ="flash-del" style="    font-size: 15px;"></span><br>
                                        <span class ="flash-sale" style="    font-size: 22px;">{{number_format($sanpham->unit_price)}} VND</span>
                                    @else
                                        <span class ="flash-del" style="    font-size: 15px;">{{number_format($sanpham->unit_price)}} VND </span><br>
                                        <span class ="flash-sale" style="    font-size: 22px;">{{number_format($sanpham->promotion_price)}} VND</span>
                                    @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        {{-- <div class="single-item-desc">
                        <p>{{$sanpham->description}}</p>
                        </div> --}}
                        <div class="space20">&nbsp;</div>

                        <p style="font-size: 20px;">Lựa chọn :</p>
                        <div class="space10">&nbsp;</div>
                        <div class="single-item-options">
{{-- ------------------chọn màu sản phầm, hiện tại ko càn ------------------------ --}}
                            {{-- <select class="wc-select" name="color" style="font-size:16px">
                                <option>Màu</option>
                                <option value="Đỏ">Đỏ</option>
                                <option value="Xanh">Xanh</option>
                                <option value="Vàng">Vàng</option>
                                <option value="Đen">Đen</option>
                                <option value="Trắng">Trắng</option>
                            </select> --}}
                            <select class="wc-select" name="soluong"  style="font-size:16px">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space20">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description"  style="font-size:23px">Mô tả</a></li>
                    </ul>

                    <div class="panel" id="tab-description" >
                        <p  style="font-size:16px">{{$sanpham->description}}</p>
                        </div>

                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4 style="    font-family: -webkit-pictograph;"><b> Sản phẩm tương tự</b></h4>
                    <div class="space40">&nbsp;</div>
                    <div class="row">
                        @foreach($sp_tt as $sptt)
                        <div class="col-sm-4">
                            <div class="single-item">
                                    @if($sptt->promotion_price > 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/dienthoai/{{$sptt->image}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price">
                                        @if($sptt->promotion_price == 0)
                                            <span class ="flash-del" style="    font-size: 15px;"></span><br>
                                            <span class ="flash-sale" style="    font-size: 22px;">{{number_format($sptt->unit_price)}} VND</span>
                                        @else
                                            <span class ="flash-del" style="    font-size: 15px;">{{number_format($sptt->unit_price)}} VND </span><br>
                                            <span class ="flash-sale" style="    font-size: 22px;">{{number_format($sptt->promotion_price)}} VND</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{ route('themgiohang',$sptt->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- <div class="row">{{$sptt->links()}}</div> --}}
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm bán chạy nhất</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                <div class="media-body">
                                    Giá :
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
