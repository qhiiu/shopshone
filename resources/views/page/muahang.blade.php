@extends('master')
@section('content')
<form>
    <div class="form-group" style="width:500px; margin-left:200px; margin-top:50px;">
      <label for="exampleInputEmail1">Họ và tên</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"style=" margin-top:10px; ">

    </div>
    <div class="form-group" style="width:500px; margin-left:200px;">
      <label for="exampleInputPassword1">Số điện thoại</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style=" margin-top:10px; ">
    </div>
    <div class="form-group" style="width:500px; margin-left:200px; margin-top:20px;">
        <label for="exampleInputEmail1">Địa chỉ nhận hàng</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"style=" margin-top:10px; ">

      </div>
      <div class="form-group" style="width:500px; margin-left:200px;">
        <label for="exampleInputPassword1">Ghi chú khác của bạn</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style=" margin-top:10px; ">
      </div>

    <button type="submit" class="btn btn-primary" style="width:150px; margin-top:30px;margin-left:200px;margin-bottom:100px;">Đặt mua ngay</button>
  </form>
@endsection