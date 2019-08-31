@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add new Bill details</h3>
    </div>


@include('admin.notification')

    <!-- form start -->
    <form role="form" method="POST" action="{{ route('bill_details.store') }}">
        @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">id_bill</label><br>
          <input type="number" name="id_bill" id="" placeholder="id_bill">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">id_product</label><br>
                <input type="number" name="id_product" id="" placeholder="id_product">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">quantity</label><br>
                <input type="number" name="quantity" id="" placeholder="quantity">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">unit_price</label><br>
                <input type="number" name="unit_price" id="" value="" placeholder="unit_price">
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
