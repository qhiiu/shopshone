@extends('master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">

            <div class="space60">&nbsp;</div>
            <div class="row" style="font-size:larger;">
                <div class="col-sm-3" style="width:20%">
                    <ul class="list-group" >
                        <li class="list-group-item" ><a href="{{ route('thongtincanhan.index') }}" style="font-size: larger;">Thông tin cá nhân</a></li>
                        <li class="list-group-item" ><a href="{{ route('thongtincanhan._edit') }}" style="font-size: larger;">Cập nhật thông tin</a></li>
                        <li class="list-group-item" ><a href="{{ route('thongtincanhan.index') }}" style="font-size: larger;">Danh sách đơn hàng</a></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    @section('contentInfo')

                    @show
                </div>
            </div>


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
