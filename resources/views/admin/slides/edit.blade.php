@extends('layouts.admin')
@section('content')
<div class="box box-primary">
      <h1 class="box-title">Edit News</h1>


      @include('admin.notification')


    <!-- /.box-header -->
@foreach ($list as $l)
    
    <form class="update_form" role="form" method="POST" action="{{ action('SlidesController@update',$id) }}">
        @csrf

        <input type="hidden" name="_method" value="PATCH">

        <div> id = {{ $id }}</div>
        <br><br>


      <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">link</label>
            <input type="text" class="form-control" name="link" id="exampleInputEmail1" value="{{ $l->link }}">
        </div>

        <div class="form-group">
                <label for="exampleInputPassword1">Image </label>
                <input type="text" name="image" class="form-control" id="exampleInputPassword1" value="{{ $l->image }}">
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
