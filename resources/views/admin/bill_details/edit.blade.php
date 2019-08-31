@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Bill details</h3>
    </div>

@include('admin.notification')

@foreach ($list as $l)
    
<form class="update_form" role="form" method="POST" action="{{ action('Bill_detailsController@update',$id) }}">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div><b> id </b>= {{ $id }}</div>
    <br><br>

      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">id_bill</label><br>
          <input type="number" name="id_bill" id="" value="{{ $l->id_bill }}">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">id_product</label><br>
                <input type="number" name="id_product" id="" value="{{ $l->id_product }}">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">quantity</label><br>
                <input type="number" name="quantity" id="" value="{{ $l->quantity }}">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">unit_price</label><br>
                <input type="number" name="unit_price" id=""  value="{{ $l->unit_price }}">
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    @endforeach
 </div>
@endsection
