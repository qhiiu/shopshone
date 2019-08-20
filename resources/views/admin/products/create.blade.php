@php

@endphp

@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <h1>Create Products</h1>

    @include('admin.notification')

    <!-- form start -->
    <form role="form" action="{{ route('products.store') }}" method="post">
        @csrf
      <div class="box-body">
        <div class="form-group">
                <label >name</label>
                <input type="text" class="form-control" placeholder="name" name="name">
        </div>
        <div class="input-group mb-3">
                <label class="input-group-text"  >id_type</label>
                <br>
            <select class="custom-select"  name="id_type">
                @foreach ($list_type_products as $l)
                    <option value="{{ $l->id }}" >{{ $l->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
          <label for="">description</label>
          <textarea class="form-control" name="description" placeholder="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label >unit_price</label>
            <input type="number" class="form-control" placeholder="$" name="unit_price" value="">
        </div>
        <div class="form-group">
            <label >promotion_price</label>
            <input type="number" class="form-control" placeholder="$" name="promotion_price">
        </div>
        <div class="form-group">
            <label >image</label>
            <input type="text" class="form-control" placeholder="image" name="image">
        </div>
        <div class="form-group">
            <label >unit</label>
            <input type="text" class="form-control" placeholder="unit" name="unit">
        </div>
        <div>
            <label><b>new</b></label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="new" value="1" checked>new
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="new" value="0" >not new
            </div>
        </div>


      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
