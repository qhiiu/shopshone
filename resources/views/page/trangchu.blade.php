 @extends('master')
  {{--kế thừa lại trang gốc  --}}
@section('content')

<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div>
            <div class="banner" >
                <ul>
                    @foreach ($slide as $sl)
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{$sl->image}}" data-src="{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!--slider-->

<div class="container-fluid ">
    <div class="space60">&nbsp;</div>
    <div class="row">
        <div class="col-sm-1" >  </div>
        <div class="col-sm-8">
                <div id="content" class="space-top-none">
                        <div class="main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="beta-products-list">
                                    <h1  style="  color: rgba(255, 0, 210, 0.97);text-align: center;font-family: -webkit-pictograph;">Sản phẩm mới</h1>
                                    <div class="beta-products-details">
                                        {{-- <p class="pull-left">Tìm thấy {{count($new_product)}}</p> --}}
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row">
                                        @foreach ($new_product as $new)
                                            <div class="col-sm-4" style="padding: 10px;">
                                                <div class="single-item">

                                                    @if($new->promotion_price > 0 )
                                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                                    @endif

                                                    <div class="single-item-header">
                                                        <a href="{{route('chitietsanpham',$new->id)}}"><img src="{{$new->image}}" alt="loading ... " style="height: 280px;"></a>
                                                    </div>
                                                    <div class="single-item-body">
                                                        <p class="single-item-title"  style="font-size: 19px">{{ $new->name }} </p>
                                                        <p class="single-item-price" style="margin-bottom: 5px;">
                                                            @if($new->promotion_price == 0)
                                                                <span class ="flash-del" style="    font-size: 15px;"></span><br>
                                                                <span class ="flash-sale" style="    font-size: 22px;">{{number_format($new->unit_price)}} VND</span>
                                                            @else
                                                                <span class ="flash-del" style="    font-size: 15px;">{{number_format($new->unit_price)}} VND </span><br>
                                                                <span class ="flash-sale" style="    font-size: 22px;">{{number_format($new->promotion_price)}} VND</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="single-item-caption">
                                                        <a class="add-to-cart pull-left" href="{{ route('themgiohang',$new->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">{{$new_product->links()}} </div>
                                </div>
                        {{-- --------------------------------------------------------------------------------- --}}
                                <div class="space50">&nbsp;</div>

                                <div class="beta-products-list">
                                    <h1  style="  color: rgba(255, 0, 210, 0.97);text-align: center;font-family: -webkit-pictograph;">Sản phẩm khuyến mãi</h1>
                                    <div class="beta-products-details">
                                        {{-- <p class="pull-left">Tìm thấy {{count($sanpham_khuyenmai)}}</p> --}}
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        @foreach($sanpham_khuyenmai as $spkm)
                                        <div class="col-sm-4"  style="padding: 20px;">
                                            <div class="single-item">
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                                <div class="single-item-header">
                                                    <a href="{{route('chitietsanpham',$spkm->id)}}" ><img src="{{ $spkm->image}}" alt="loading ... "  style="height: 280px;"></a>
                                                </div>
                                                <div class="single-item-body">
                                                <p class="single-item-title" style="font-size: 19px">{{$spkm->name}}</p>
                                                    <p class="single-item-price" style="margin-bottom:5px">
                                                        <span class="flash-del"  style="    font-size: 15px;">{{number_format($spkm->unit_price)}}VND</span><br>
                                                        <span class="flash-sale" style="    font-size: 22px;">{{number_format($spkm->promotion_price)}}VND</span>
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$spkm->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$spkm->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">{{$sanpham_khuyenmai->links()}}</div>

                                </div> <!-- .beta-products-list -->
                            </div>
                        </div> <!-- end section with sidebar and main content -->


                        </div> <!-- .main-content -->
                        </div> <!-- #content -->
        </div>
        <div class="col-sm-3 aside" >
                <!-- ------ Sản phẩm mới nhất ----------------------------------------------------------------- -->
            <div class="row">
                    <div class="widget">
                        <h3 class="widget-title">Tin tức mới</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach ($news as $news)
                                    <div class="media beta-sales-item row">
                                        <div class="col-sm-3" style="padding-left: 10px;">
                                            <a href="{{route('tintuc',$news->id)}}"><img src="{{$news->image}}" alt=" loading ... " style="height: 60px;"></a>
                                        </div>
                                        <div class="col-sm-9" style="padding: 0;">
                                            <div class="media-body">
                                                <span class="beta-sales-price" style="font-size:19px">
                                                    <a href="{{route('tintuc',$news->id)}}">{{ $news->title }} </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
            {{-- --------------------------- phuc kien ------------------------------------------------------------- --}}
            <div class="row">
                    <div class="widget">
                        <h3 class="widget-title">Phụ kiên Smartphone</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach ($phukien as $phukien)
                                    <div class="media beta-sales-item row">
                                        <div class="col-sm-3">
                                            <a href="{{route('chitietsanpham',$phukien->id)}}"><img src="{{$phukien->image}}" alt="loading ..." style="height: 60px;"></a>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <div  class="beta-sales-price"><a href="{{ route('chitietsanpham',$phukien->id) }}">{{ $phukien->name }}</a></div>
                                                @if($phukien->promotion_price == 0)
                                                    <span class ="flash-del"></span><br>
                                                    Giá : <span class ="flash-sale" >{{number_format($phukien->unit_price)}} VND</span>
                                                @else
                                                    <span class ="flash-del" >{{number_format($phukien->unit_price)}} VND </span><br>
                                                    Giá : <span class ="flash-sale" >{{number_format($phukien->promotion_price)}} VND</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
