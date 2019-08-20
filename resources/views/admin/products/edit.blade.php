@php

@endphp

@extends('layouts.admin')
@section('content')
<div class="box box-primary">

    <h1>Edit Products</h1>


    @include('admin.notification')

    <!-- form start -->
@foreach ($list as $l)
    

    <form class="update_form" role="form" method="POST" action="{{ action('ProductsController@update',$id) }}">
            @csrf

            <input type="hidden" name="_method" value="PATCH">

            <div><b> id </b> = {{ $id }}</div>
            <br><br>


           <div class="form-group">
                <label >name</label>
                <input type="text" class="form-control" value="{{ $l->name }}" name="name">
        </div>
        <div class="input-group mb-3">
                <label class="input-group-text"  >id_type</label>
                <br>
            <select class="custom-select"  name="id_type">
                @foreach ($list_type_products as $r)
                    <option value="{{ $r->id }}" >{{ $r->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
          <label for="">description</label>
          <textarea class="form-control" name="description" rows="5">{{ $l->description }}</textarea>
        </div>

        <div class="form-group">
            <label >unit_price</label>
            <input type="number" class="form-control" value="{{ $l->unit_price }}" name="unit_price" >
        </div>
        <div class="form-group">
            <label >promotion_price</label>
            <input type="number" class="form-control" value="{{ $l->promotion_price }}" name="promotion_price">
        </div>
        <div class="form-group">
            <label >image</label>
            <input type="text" class="form-control" value="{{ $l->image }}" name="image">
        </div>
        <div class="form-group">
            <label >unit</label>
            <input type="text" class="form-control" value="{{ $l->unit }}" name="unit">
        </div>
        <div>
            <label><b>new</b></label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="new" value="1" checked>new
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="new" value="0" >not new
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
