@php

@endphp

@extends('layouts.admin')
@section('content')
<div class="box box-primary">

    <h1>Edit Prodcuts Type</h1>


    @include('admin.notification')

    <!-- form start -->
@foreach ($list as $l)
    
    <form class="update_form" role="form" method="POST" action="{{ action('ProductsTypeController@update',$id) }}">
            @csrf

            <input type="hidden" name="_method" value="PATCH">

            <div> id = {{ $id }}</div>
            <br><br>


            <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $l->name }}">
                  </div>
          
                  <div class="form-group">
                    <label for="">description</label>
                    <textarea class="form-control" name="description" id="" rows="3">{{ $l->description }}"</textarea>
                  </div>
                <div class="form-group">
                          <label for="exampleInputPassword1">Image </label>
                          <input type="text" name="image" class="form-control" id="exampleInputPassword1" value="{{ $l->image }}">
                 </div>

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
