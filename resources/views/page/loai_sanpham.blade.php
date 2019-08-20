@extends('master')
@section('content')


<div class="inner-header">
    <div class="container">
        <div class="pull-left">
        <h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
            <a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($loai as $l)
                    <li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                           @foreach($sp_theoloai as $sp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                        @if($sp->promotion_price!=0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                    <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/dienthoai/{{$sp->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sp->name}}</p>
                                        <p class="single-item-price">
                                            @if($sp->promotion_price!=0)
                                        <span class="flash-del">{{$sp->unit_price}} VND</span>
                                        <span class="flash-sale">{{$sp->promation_price}} VND</span>
                                        @else
                                        <span class="flash-del">{{$sp->unit_price}} VND</span>
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
                        <h4>San Pham Khac</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tim thay {{count($sp_khac)}}</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                                @foreach($sp_khac as $spk)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                            @if($spk->promotion_price!=0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                        <div class="single-item-header">
                                            <a href=""><img src="source/image/dienthoai/{{$spk->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$spk->name}}</p>
                                            <p class="single-item-price">
                                                @if($spk->promotion_price!=0)
                                            <span class="flash-del">{{$spk->unit_price}} VND</span>
                                            <span class="flash-sale">{{$spk->promation_price}} VND</span>
                                            @else
                                            <span class="flash-del">{{$spk->unit_price}} VND</span>
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
                        <div class="row">{{$sp_khac->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
