@extends('layouts.admin')
@section('content')
<div class="box box-primary">
      <h1 class="box-title">Edit News</h1>


      @include('admin.notification')


    <!-- /.box-header -->
@foreach ($list as $l)

    <form class="update_form" role="form" method="POST" action="{{ action('SlidesController@update',$id) }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="_method" value="PATCH">

        <div> id = {{ $id }}</div>
        <br><br>

      <div class="box-body">
         <div class="form-group">
                <label>Image *</label>
                <div>
                    <img src="{{ asset($l->image) }}" alt="loading ..." height="200px">
                </div><br>
                <span> Change image</span>
                <input type="file" name="image">
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    @endforeach
  </div>

{{-- 
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
  </script> --}}
@endsection
