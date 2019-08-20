@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <h1>Create Products Type</h1>

    @include('admin/notification')

    <!-- form start -->
    <form role="form" method="post" action="{{ url('admin/productsType') }}">
        @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name">
        </div>

        <div class="form-group">
          <label for="">description</label>
          <textarea class="form-control" name="description" id="" rows="3"></textarea>
        </div>
      <div class="form-group">
                <label for="exampleInputPassword1">Image </label>
                <input type="text" name="image" class="form-control" id="exampleInputPassword1" placeholder="image path">
       </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
