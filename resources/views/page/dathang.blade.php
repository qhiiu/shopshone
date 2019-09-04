@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
            @if(Session::has('thongbao'))
                <div class="row" style="margin-top: 20px;">
                    <div class="thongbao" style=" font-size:25px; margin-bottom:10px;text-align: center;">
                        <span style="  padding: 15px;background: #1cff02; border-radius: 30px;     color: blue;">
                            {{Session::get('thongbao')}}
                        </span>
                    </div>
                </div>
            @endif
            @if(Session::has('gioHangTrong'))
                <div class="row" style="margin-top: 20px;">
                    <div class="thongbao" style=" font-size:25px; margin-bottom:10px;text-align: center;">
                        <span style="  padding: 15px;background: red; border-radius: 30px;  color:rgb(255, 214, 88);">
                            {{Session::get('gioHangTrong')}}
                        </span>
                    </div>
                </div>
            @endif
			<div class="pull-left">
				<h2 class="inner-title" style="margin-top:30px; font-size:50px;">Đặt hàng</h2>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="content" style="padding: 40px 0;">

        <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{-- lấy token của laravel --}}
        {{-- {!! csrf_field() !!} --}}
				<div class="row">
					<div class="col-sm-6">
						<div class="form-block"style="margin-top:0px; margin-bottom:30px; " >
							<label for="name" style="color:#DF3A01; font-size:20px; ">Họ và tên *</label>
							<input type="text" id="name" name="name" placeholder="Mời bạn nhập họ và tên" required style=" border: 1px solid #01DF01;">
						</div>
						<div class="form-block" style="margin-top:30px;">
							<label for="email" style="color:#DF3A01; font-size:20px;">Email</label>
							<input type="email" id="email" name="email" required placeholder="Mời bạn nhập email" style=" border: 1px solid #01DF01;">
						</div>
						<div class="form-block" style="margin-top:30px; ">
							<label for="adress" style="color:#DF3A01; font-size:20px;">Địa chỉ nhận hàng</label>
							<input type="text" id="address"name="address"placeholder="Mời bạn nhập địa chỉ nhận hàng của mình" required style=" border: 1px solid #01DF01;">
						</div>
						<div class="form-block" style="margin-top:30px;" >
							<label for="phone" style="color:#DF3A01; font-size:20px;">Điện thoại*</label>
							<input type="text" id="phone"name="phone" placeholder="Mời bạn nhập số điện thoại của mình" required style=" border: 1px solid #01DF01;">
						</div>
						<div class="form-block" style="margin-top:30px;">
							<label for="note" style="color:#DF3A01; font-size:20px;">Ghi chú</label>
							<textarea id="note" name="note" placeholder="Thêm ghi chú " style=" border: 1px solid #01DF01;"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5 style="color:red;">Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
										@if(Session::has('cart'))
											@foreach($product_cart as $cart)
                                        <!--  one item	 -->
                                            <div class="media">
                                                <div class="col-sm-1">
                                                    <a class="cart-item-delete" href="{{route('xoagiohang',$cart['item']['id'])}}"><i class="fa fa-times"></i></a>
                                                </div>
                                                <div class="col-sm-11">
                                                    <a href="{{ route('chitietsanpham',$cart['item']['id']) }}"><img width="20%" src="{{$cart['item']['image']}}" alt="" class="pull-left"></a>
                                                    <div class="media-body" style="font-size: 20px;padding:10px">
                                                        <div class=""><a href="{{ route('chitietsanpham',$cart['item']['id']) }}">{{ $cart['item']['name'] }}</a></div>
                                                        <div class="space20">&nbsp;</div>
                                                        <div class="color-orange your-order-info">Giá sản phẩm : {{number_format($cart['price'])}}VND</div>
                                                        <div class="space20">&nbsp;</div>
                                                        <div class="color-orange your-order-info">
                                                            <span>Số lượng :</span>
                                                            @if ($cart['qty'] > 1)
                                                            <span style="  display: inline-block;   width: 25px;  border: 1px solid #ccc; ;
                                                            text-align: center;"> <a href="{{ route('reduceByOne',$cart['item']['id']) }}"> - </a>
                                                            </span>
                                                            @endif
                                                            <span>{{ $cart['qty'] }}</span>
                                                            <span style="  display: inline-block;  width: 25px;   border: 1px solid #ccc; ;
                                                            text-align: center;"><a href="{{ route('addByOne',$cart['item']['id']) }}"> + </a></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <!-- end one item -->
                                        @endforeach
                                    @endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left" ><p class="your-order-f18"  style="font-size: x-large;">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-orange"> @if(Session::has('cart')){{number_format($totalPrice)}}VND @else 0 VND @endif</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head" ><h5 style="color:red;">Hình thức thanh toán</h5></div>

							<div class="your-order-body" style="padding: 5px 25px;">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" name="payment">
										<label for="payment_method_bacs"  style="color:#088A08;    font-size: large;">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;    margin: unset;    font-size: large;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text=""name="payment">
										<label for="payment_method_cheque"  style="color:#088A08;    font-size: large;">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;    font-size: large;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Shop 9x
											<br>- Ngân hàng Viettinbank chi nhánh Đống Đa, Hà Nội
										</div>
									</li>

								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="" style="  background-color:#FF0040;font-size: x-large;">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
    </div> <!-- .container -->
    <div class="space100">&nbsp;</div>
    @endsection
