@extends('layouts.admin')
@section('content')
<div class="box box-primary">
      <h1 class="box-title">Edit News</h1>


      @include('admin.notification')


    <!-- form start -->
@foreach ($list as $l)

    <form class="update_form" role="form" method="POST" action="{{ action('NewsController@update',$id) }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="_method" value="PATCH">

        <div><b> id </b>= {{ $id }}</div>
        <br><br>

        <div class="form-group">
                <label >Title  *</label><br>
                <textarea class="form-control" name="title" id="" cols="" rows="2" >{{ $l->title }}</textarea>
            </div>

        <div class="form-group">
            <label >content  *</label><br>
            <textarea class="form-control"  name="content" id="" cols="" rows="5" >{{ $l->content }}</textarea>
        </div>

        <div class="form-group">
                <label>Image</label>
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


  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
  {{-- <script>
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
