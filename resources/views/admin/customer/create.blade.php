@extends('layouts.admin')
@section('content')
      <h1 class="box-title">Create new Customer</h1>

    @include('admin/notification')
      <!-- form start -->
    <form role="form" action="{{ url('admin/customer') }}" method="POST">
    @csrf

        <div class="form-group">
            <label >name</label>
            <input type="text" class="form-control" placeholder="name" name="name">
        </div>
        
        <div>
            <label><b>Gender</b></label>
            <div class="form-check">
                      <input type="radio" class="form-check-input" name="gender" value="nam" checked>nam
              </div>
            <div class="form-check">
                  <input type="radio" class="form-check-input" name="gender" value="nữ" >nữ
              </div>
        </div>
        <br>
   
        <div class="form-group">
            <label >email</label>
            <input type="email" class="form-control" placeholder="email" name="email">
        </div>

        <div class="form-group">
            <label >address</label>
            <input type="text" class="form-control" placeholder="address" name="address">
        </div>

        <div class="form-group">
            <label >phone_number</label>
            <input type="tel" class="form-control" placeholder="phone_number" name="phone_number">
                {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
        </div>

        <div class="form-group">
          <label> Note </label>
          <textarea class="form-control" name="note" placeholder="note" id="" rows="3"></textarea>
        </div>


      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
@endsection
