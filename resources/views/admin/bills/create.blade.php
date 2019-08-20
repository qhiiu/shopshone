@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add new</h3>
    </div>


@include('admin.notification')

    <!-- form start -->
    <form role="form" method="POST" action="{{ route('bills.store') }}">
        @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">id_products</label><br>
          <input type="number" name="id_products" id="" placeholder="id products">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">id_users</label><br>
                <input type="number" name="id_users" id="" placeholder="id users">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">number of products</label><br>
                <input type="number" name="number" id="" placeholder="number of products">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">date</label><br>
                <input type="date" name="date" id="" value="{{  date('Y-m-d') }}"  >
        </div>
        <br>
        <div>
                <label><b>Status</b></label>
                <div class="form-check">
                          <input type="radio"  name="status" value="done" checked>done
                  </div>
                <div class="form-check">
                      <input type="radio"  name="staus" value="waiting" >waiting
                  </div>
            </div>
            <br>
        <div class="form-group">
                <label for="exampleInputEmail1">VAT</label><br>
                <input type="numbet" name="vat" id="" value="" placeholder="%">
        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
