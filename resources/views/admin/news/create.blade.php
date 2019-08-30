@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <h1>Create News</h1>

    @include('admin/notification')

    <form role="form" method="post" action="{{ url('admin/news') }}" enctype="multipart/form-data">
        @csrf
      <div class="box-body">
        <div class="form-group">
                <label for="">Title *</label>
                <textarea class="form-control" name="title" id="" rows="2"></textarea>
        </div>
        <div class="form-group">
          <label for="">Content  *</label>
          <textarea class="form-control" name="content" id="" rows="3"></textarea>
        </div>
        <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="image" >
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
