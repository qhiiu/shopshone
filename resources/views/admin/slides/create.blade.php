@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <h1>Create Slides</h1>

    @include('admin/notification')

    <form role="form" method="post" action="{{ url('admin/slides') }}">
        @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">link</label>
          <input type="text" class="form-control" name="link" id="exampleInputEmail1" placeholder="Enter link">
        </div>

      <div class="form-group">
                <label for="exampleInputPassword1">Image  *</label>
                <input type="text" name="image" class="form-control" id="exampleInputPassword1" placeholder="image path">
       </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
