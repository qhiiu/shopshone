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
          <label for="exampleInputEmail1">name *</label>
          <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name">
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
