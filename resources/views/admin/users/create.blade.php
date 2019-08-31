@extends('layouts.admin')
@section('content')
      <h1 class="box-title">Create new Users</h1>

    @include('admin/notification')
      <!-- form start -->
    <form role="form" action="{{ url('admin/users') }}" method="POST">
    @csrf
        <div>
            <label><b>Role  *</b></label>
            <div class="form-check">
                      <input type="radio" class="form-check-input" name="role" value="admin" >admin
              </div>
            <div class="form-check">
                  <input type="radio" class="form-check-input" name="role" value="" checked>users
              </div>
        </div>
        <br>
        <br>

        <div class="form-group">
          <label >full name *</label>
          <input type="text" class="form-control" placeholder="name" name="name">
        </div>

        <div class="form-group">
            <label >email *</label>
            <input type="email" class="form-control" placeholder="email" name="email">
        </div>

        <div class="form-group">
            <label >password *</label>
            <input type="password" class="form-control" placeholder="password" name="password">
        </div>
        <div>
            <label><b>Gender  *</b></label>
            <div class="form-check">
                      <input type="radio" class="form-check-input" name="gender" value="nam" checked >Male
              </div>
            <div class="form-check">
                  <input type="radio" class="form-check-input" name="gender" value="nữ" >Female
              </div>
        </div>
        <br>

        <div class="form-group">
            <label >phone</label>
            <input type="tel" class="form-control" placeholder="phone" name="phone">
            {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
        </div>

        <div class="form-group">
            <label >address</label>
            <input type="text" class="form-control" placeholder="address" name="address">
        </div>

        <div class="form-group">
            <label >Day of birth</label>
            <input type="date" class="form-control" placeholder="dob" name="dob">
        </div>

        <div class="form-group">
            <label >remember_token</label>
            <input type="text" class="form-control" placeholder="remember_token" name="remember_token" readonly>
        </div>

      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
@endsection
