@extends('master')
@section('content')
<div class="container-fluid ">
        <div class="space60">&nbsp;</div>
        <div class="row">
            <div class="col-md-2">  </div>
            <div class="col-md-7">
                <div class="col-md-11">
                        @foreach ($news_read as $news_read)
                        <div style="    font-size: 40px;         line-height: 40px;">
                                {{ $news_read->title }}
                        </div>
                        <div style="color: #999;margin: 20px 0px;">
                            ngày :<span>{{ $news_read->updated_at }}</span>
                        </div>

                        <div  class="text-center">
                            <figure>
                                <img src="source/image/tintuc/{{$news_read->image}}" alt=" loading ... " style="height: 400px;">
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
            </div>
            <div class="col-md-3 aside" style="width: 21%">
                    <!-- ------ Sản phẩm mới nhất ----------------------------------------------------------------- -->
                <div class="widget">
                    <h3 class="widget-title">Tin tức mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($news as $news)
                                <div class="media beta-sales-item row">
                                    <div class="col-md-5" style="padding-left: 10px;">
                                        <a href="{{route('tintuc',$news->id)}}"><img src="source/image/tintuc/{{$news->image}}" alt=" loading ... " style="height: 60px;"></a>
                                    </div>
                                    <div class="col-md-7" style="padding-left: 0;">
                                        <div class="media-body">
                                            <span class="beta-sales-price" style="font-size:15px">
                                                <a href="{{route('tintuc',$news->id)}}">{{ $news->title }} </a>
                                            </span>
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
@endsection
