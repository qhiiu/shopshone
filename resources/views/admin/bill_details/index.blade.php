@extends('layouts.admin')
@section('content')

    <h1 >Bill details</h1>

    @include('admin.notification')
    <br><br>

    <p><a href="{{ url('admin/bill_details/create') }}"  class="btn btn-success">Add new</a></p>
    <div class="box">

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
        <tr>
          <th>id</th>
          <th>id_bill</th>
          <th>id_product</th>
          <th>quantity</th>
          <th>unit_price</th>

          <th>created_at</th>
          <th>updated_at</th>
        </tr>

        @foreach ($list as $r)
        <tr>
          <td>{{$r->id}}</td>
          <td>{{$r->id_bill}}</td>
          <td>{{$r->id_product}}</td>
          <td>{{$r->quantity}}</td>
          <td>{{$r->unit_price}}</td>

          <td>{{$r->created_at}}</td>
          <td>{{$r->updated_at}}</td>
          <td>
            <a class="btn btn-info" href="{{ action('Bill_detailsController@edit',$r->id) }}">Edit</a>
            </td> 
          <td>
            <form class="delete_form" action="{{ action('Bill_detailsController@destroy',$r->id) }} " method="POST">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger ">Delete</button>
            </form>
          </td>

        </tr>
        @endforeach
      </tbody></table>
    </div>
  </div>
  {{$list->links()}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".delete_form").on('submit', function () {
            if(confirm("Delete : Are you sure ?")){
                return true;
            } else{
                return false;
            }
        });
    });
</script>
@endsection
