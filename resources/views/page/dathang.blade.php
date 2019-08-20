@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h2 class="inner-title" style="margin-top:50px; font-size:50px;">Đặt hàng</h2>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">

        <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{-- lấy token của laravel --}}
        {{-- {!! csrf_field() !!} --}}
        <div class="row"><div class="thongbao" style=" font-size:25px; margin-bottom:50px; color:red;">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div></div>
				<div class="row">
					<div class="col-sm-6">

						<div class="space20">&nbsp;</div>

						<div class="form-block"style="margin-top:0px; margin-bottom:30px; " >
							<label for="name" style="color:#DF3A01; font-size:20px; ">Họ và tên</label>
							<input type="text" id="name" name="name" placeholder="Mời bạn nhập họ và tên" required style=" border: 1px solid #01DF01;">
						</div>
						<div class="form-block" style="margin-top:30px; margin-bottom:30px; ">
							<label style="color:#DF3A01; font-size:20px;">Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%" style=" border: 1px solid red;"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%" style=" border: 1px solid #01DF01;"><span>Nữ</span>

						</div>

						<div class="form-block" style="margin-top:30px;">
							<label for="email" style="color:#DF3A01; font-size:20px;">Email</label>
							<input type="email" id="email" name="email" required placeholder="Mời bạn nhập email" style=" border: 1px solid #01DF01;">
						</div>

						<div class="form-block" style="margin-top:30px; ">
							<label for="adress" style="color:#DF3A01; font-size:20px;">Địa chỉ</label>
							<input type="text" id="address"name="address"placeholder="Mời bạn nhập địa chỉ của mình" required style=" border: 1px solid #01DF01;">
						</div>


						<div class="form-block" style="margin-top:30px;" >
							<label for="phone" style="color:#DF3A01; font-size:20px;">Điện thoại*</label>
							<input type="text" id="phone"name="phone" placeholder="Mời bạn nhập số điện thoại của mình" required style=" border: 1px solid #01DF01;">
						</div>

						<div class="form-block" style="margin-top:30px;">
							<label for="notes" style="color:#DF3A01; font-size:20px;">Ghi chú</label>
							<textarea id="notes" name="notes" placeholder="Mời bạn thêm ghi chú nếu có" style=" border: 1px solid #01DF01;"></textarea>
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
                                        <img width="25%" src="source/image/dienthoai/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Đơn giá:{{number_format($cart['price'])}}VND</span>
												<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>

											</div>
										</div>
                                    <!-- end one item -->
                                    @endforeach
                                    @endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left" ><p class="your-order-f18" >Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black"> @if(Session::has('cart')){{number_format($totalPrice)}}VND @else 0 VND @endif</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head" ><h5 style="color:red;">Hình thức thanh toán</h5></div>

							<div class="your-order-body" >
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" name="payment">
										<label for="payment_method_bacs"  style="color:#088A08;">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text=""name="payment">
										<label for="payment_method_cheque"  style="color:#088A08;">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Shop 1999
											<br>- Ngân hàng Viettinbank chi nhánh Đống Đa, Hà Nội
										</div>
									</li>

								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="" style="  background-color:#FF0040;">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
    </div> <!-- .container -->
    @endsection
