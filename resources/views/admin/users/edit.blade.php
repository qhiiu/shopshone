


@extends('layouts.admin')
@section('content')
<div class="box box-primary">
      <h1 class="box-title">Edit Users</h1>

      @include('admin.notification')

    <!-- form start -->
    @foreach ($list as $l)

    <form class="update_form" role="form" method="POST" action="{{ action('UsersController@update',$id) }}">
            @csrf

            <input type="hidden" name="_method" value="PATCH">
            <div><b> id </b>= {{ $id }}</div>
            <div><b> role </b> = {{ $l->role }}</div>
            <br><br>
            <div class="box-body">
                    <div class="form-group">
                      <label >name</label>
                      <input type="text" class="form-control" value="{{ $l->name }}" name="name" readonly>
                    </div>

                    <div class="form-group">
                        <label >password</label>
                        <input type="password" class="form-control" value="{{ $l->password }}" name="password" readonly>
                    </div>

                    <div class="form-group">
                        <label >email</label>
                        <input type="email" class="form-control" value="{{ $l->email }}" name="email" readonly>
                    </div>

                    <div class="form-group">
                        <label >phone</label>
                        <input type="tel" class="form-control" value="{{ $l->phone }}" name="phone">
                        {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
                    </div>

                    <div class="form-group">
                        <label >address</label>
                        <input type="text" class="form-control" value="{{ $l->address }}" name="address">
                    </div>

                    <div class="form-group">
                        <label >remember_token</label>
                        <input type="text" class="form-control" value="{{ $l->remember_token }}" name="remember_token" readonly>
                    </div>
            </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    @endforeach

  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.update_form').on('submit',function(){
            if(confirm('Update : Are you sure ? ')){
                return true;
            }else {
                return false;
            }
        });
    });
</script>
@endsection
