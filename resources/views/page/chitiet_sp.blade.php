@extends('master')
@section('content')



<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <h1 class="inner-title"  style="    font-family: -webkit-pictograph;">Sản phẩm {{$sanpham->name}}</h1>
                <div class="space50">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-7">
                        <img src="{{$sanpham->image}}" alt="loading ... " >
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

                        <p style="font-size: 20px;">Lựa chọn :</p>
                        <div class="space10">&nbsp;</div>
                        <div class="single-item-options">
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
                                    <a href="{{route('chitietsanpham',$sptt->id)}}"><img src="{{$sptt->image}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price" style="margin-bottom: 5px;">
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
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">

                            @foreach ($new_product as $new)

                                <div class="media beta-sales-item row">
                                    <div class="col-md-5">
                                        <a href="{{route('chitietsanpham',$new->id)}}"><img src="{{$new->image}}" alt="" style="height: 60px;"></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="media-body">
                                            <div  class="beta-sales-price"><a href="{{ route('chitietsanpham',$new->id) }}">{{ $new->name }}</a></div>
                                            @if($new->promotion_price == 0)
                                                <span class ="flash-del"></span><br>
                                                Giá : <span class ="flash-sale" >{{number_format($new->unit_price)}} VND</span>
                                            @else
                                                <span class ="flash-del" >{{number_format($new->unit_price)}} VND </span><br>
                                                Giá : <span class ="flash-sale" >{{number_format($new->promotion_price)}} VND</span>
                                            @endif


                                        </div>
                                    </div>

                                </div>

                            @endforeach


                        </div>
                    </div>
                </div>

      <!-- ----------------------------------------------------------------------- -->
            </div>
        </div>
    </div>
</div>


@endsection
