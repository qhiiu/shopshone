@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <h1>Create Slides</h1>

    @include('admin/notification')

    <form role="form" method="post" action="{{ url('admin/slides') }}"  enctype="multipart/form-data">
        @csrf
      <div class="box-body">
            <div class="form-group">
                <label >Image</label>
                <input type="file" name="image" >
           </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
