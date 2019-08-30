@extends('master')
@section('content')


<div class="container-fluid ">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-1" style="width: 5%;"></div>


                {{-- --------------------- side bar left--------------  --}}
                <div class="col-sm-2" style="   padding-left: 0px;   padding-right: 0px;">

                    <div class="col-sm-12 header-bottom" style="    border-top-width: 0px;border-bottom-width: 0px;">
                    {{-- <div class="col-sm-2"> --}}
                        <ul class="list-group">
                            @foreach($loai as $l)
                                <li class="list-group-item"><a href="{{route('loaisanpham',$l->id)}}"  style="    font-size: large; ">{{$l->name}}</a></li>
                            @endforeach
                        </ul>
                    {{-- </div> --}}
                    </div>
                </div>
                {{-- ---------------------end side bar left--------------  --}}




                <div class="col-sm-6" style=" width: 55%;">
                    <div class="beta-products-list">
                        <h1  style="  color: rgba(255, 0, 210, 0.97);text-align: center; font-family: -webkit-pictograph;" >{{$loai_sp->name}}</h1>
                        <div class="space15">&nbsp;</div>
                        <div class="row" >
                           @foreach($sp_theoloai as $sp)
                            <div class="col-sm-4"  style="padding: 20px;">
                                <div class="single-item st" data-image="{{$sp->image}}">
                                        @if($sp->promotion_price > 0)
                                            <div class="ribbon-wrapper"><div  class="ribbon sale">Sale</div></div>
                                        @endif
                                            <div class="single-item-header" >
                                                <a href="{{route('chitietsanpham',$sp->id)}}"><img src="{{$sp->image}}" alt="loading... " height="280px"></a>
                                            </div>

                                    <div class="single-item-body">
                                        <p class="single-item-title"  style="font-size: 21px">{{$sp->name}}</p>
                                        <p class="single-item-price" style="margin-bottom: 5px">
                                            @if($sp->promotion_price > 0)
                                                <span class="flash-del"  style="    font-size: 15px;">{{$sp->unit_price}} VND</span><br>
                                                <span class="flash-sale"  style="    font-size: 22px;">{{$sp->promotion_price}} VND</span>
                                            @else
                                                <span class="flash-del"  style="    font-size: 15px;"></span><br>
                                                <span class="flash-sale"  style="    font-size: 22px;">{{$sp->unit_price}} VND</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('themgiohang',$sp->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('chitietsanpham',$sp->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $sp_theoloai->links() }}
                    </div> 

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h1  style="  color: rgba(255, 0, 210, 0.97);text-align: center;font-family: -webkit-pictograph;">Sản phẩm của shop</h1>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                                @foreach($sp_khac as $spk)
                                <div class="col-sm-4"   style="padding: 20px;">
                                    <div class="single-item">
                                        @if($spk->promotion_price > 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header st" >
                                            <a href="{{ route('chitietsanpham',$spk->id) }}"><img src="{{$spk->image}}" alt=""  style="height: 250px;"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title"  style="font-size: 21px">{{$spk->name}}</p>
                                            <p class="single-item-price" style="margin-bottom: 5px">
                                                @if($spk->promotion_price > 0)
                                                    <span class="flash-del" style="    font-size: 15px;">{{$spk->unit_price}} VND</span><br>
                                                    <span class="flash-sale" style="    font-size: 22px;">{{$spk->promotion_price}} VND</span>
                                                @else
                                                    <span class="flash-del" style="    font-size: 15px;"></span><br>
                                                    <span class="flash-sale" style="    font-size: 22px;">{{$spk->unit_price}} VND</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{ route('themgiohang',$spk->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('chitietsanpham',$spk->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        <div class="row">{{$sp_khac->links()}}</div>
                        <div class="space40">&nbsp;</div>
                    </div> 
                </div>
                <div class="col-md-2 aside" style="width:20%">
                            <!-- ------ Sản phẩm mới nhất ----------------------------------------------------------------- -->
                        <div class="widget">
                            <h3 class="widget-title">Sản phẩm mới</h3>
                            <div class="widget-body">
                                <div class="beta-sales beta-lists">
                                    @foreach ($new_product as $new)
                                        <div class="media beta-sales-item row">
                                            <div class="col-md-4">
                                                <a class="st" href="{{route('chitietsanpham',$new->id)}}"><img src="{{$new->image}}" alt="loading ... " style="height: 60px;"></a>
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
                </div>
            </div> 
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

