@extends('master')
@section('content')
<div class="container-fluid ">
        <div class="space60">&nbsp;</div>
        <div class="row">
            <div class="col-sm-1">  </div>
            <div class="col-sm-8">
                        <div style="    font-size: 30px;   line-height: 40px;color:blue">
                                Trang tin tức
                        </div>
                        <br>
                        @foreach ($news_read as $news_read)

                        <div style="    font-size: 40px;         line-height: 40px;">
                                {{ $news_read->title }}
                        </div>
                        <div style="color: #999;margin: 20px 0px;">
                            ngày :<span>{{ $news_read->updated_at }}</span>
                        </div>

                        <div  class="text-center">
                            <figure>
                                <img src="{{$news_read->image}}" alt=" loading ... " style="height: 400px;">
                                <figcaption style="color:#999"> Hình ảnh </figcaption>
                            </figure>
                        </div>

                        <div class="space40">&nbsp;</div>
                        <div style="    line-height: 30px;font-size:20px">
                            {{ $news_read->content }}
                        </div>
                        <div class="space100">&nbsp;</div>
                    @endforeach
            </div>
            <div class="col-sm-3 aside">
                    <!-- ------ Sản phẩm mới nhất ----------------------------------------------------------------- -->
                <div class="widget">
                    <h3 class="widget-title">Tin tức mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($news as $n)
                                <div class="media beta-sales-item row">
                                    <div class="col-sm-5" style="padding-left: 10px;">
                                        <a href="{{route('tintuc',$n->id)}}"><img src="{{$n->image}}" alt=" loading ... " style="height: 60px;"></a>
                                    </div>
                                    <div class="col-sm-7" style="padding-left: 0;">
                                        <div class="media-body">
                                            <span class="beta-sales-price" style="font-size:15px">
                                                <a href="{{route('tintuc',$n->id)}}">{{ $n->title }} </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12"> {{ $news->links() }}    </div>

                <!-- ----------------------------------------------------------------------- -->
            </div>
        </div>
    </div>
@endsection
