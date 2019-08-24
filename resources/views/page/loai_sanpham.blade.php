@extends('master')
@section('content')


<div class="container-fluid ">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <ul class="aside-menu">
                        @foreach($loai as $l)
                            <li><b><a href="{{route('loaisanpham',$l->id)}}"  style="    font-size: large;    color: rgba(255, 0, 210, 0.97);">{{$l->name}}</a></b></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-8">
                    <div class="beta-products-list">
                        <h1  style="  color: rgba(255, 0, 210, 0.97);text-align: center;">{{$loai_sp->name}}</h1>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                           @foreach($sp_theoloai as $sp)
                            <div class="col-sm-3"   style="padding: 20px;">
                                <div class="single-item">
                                        @if($sp->promotion_price > 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/dienthoai/{{$sp->image}}" alt=""  style="height: 250px;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title"  style="font-size: 21px">{{$sp->name}}</p>
                                        <p class="single-item-price">
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
                                        <a class="add-to-cart pull-left" href=""><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h1  style="  color: rgba(255, 0, 210, 0.97);text-align: center;">Sản phẩm khác</h1>
                        <div class="beta-products-details">
                            {{-- <p class="pull-left">Tìm thấy {{count($sp_khac)}}</p> --}}
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                                @foreach($sp_khac as $spk)
                                <div class="col-sm-3"   style="padding: 20px;">
                                    <div class="single-item">
                                        @if($spk->promotion_price > 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href=""><img src="source/image/dienthoai/{{$spk->image}}" alt=""  style="height: 250px;"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title"  style="font-size: 21px">{{$spk->name}}</p>
                                            <p class="single-item-price">
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
                                            <a class="add-to-cart pull-left" href=""><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                        </div>
                        <div class="row">{{$sp_khac->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
