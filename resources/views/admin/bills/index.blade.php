@extends('layouts.admin')
@section('content')

    <h1 >Bills</h1>

    @include('admin.notification')
    <br><br>

    {{-- if want edit , you can open followed line --}}
    {{-- <a><a href="{{ url('admin/bills/create') }}"  class="btn btn-success">Add new</a></a> --}}
    <div class="box">

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
        <tr>
          <th>id</th>
          <th>id_customer</th>
          <th>date_order</th>
          <th>total</th>
          <th>payment</th>
          <th>note</th>

          <th>created_at</th>
          <th>updated_at</th>

          <th>id_product</th>
          <th>quantity</th>
          <th>unit_price</th>
        </tr>

        @foreach ($list as $r)
        <tr>
          <td>{{$r->id}}</td>
          <td>{{$r->id_customer}}</td>
          <td>{{$r->date_order}}</td>
          <td>{{$r->total}}</td>
          <td>{{$r->payment}}</td>
          <td>{{$r->note}}</td>

          <td>{{$r->created_at}}</td>
          <td>{{$r->updated_at}}</td>

          <td>{{$r->id_product}}</td>
          <td>{{$r->quantity}}</td>
          <td>{{$r->unit_price}}</td>



          <td>
                <form class="delete_form" action="{{ action('BillsController@destroy',$r->id) }} " method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger ">Delete</button>
                </form>
        </td>
          {{-- <td>
            {{-- if want edit , you can open followed line --}}
            {{-- <a  class="btn btn-info" href="{{ url('admin/bills/edit') }}">Edit</a> --}}
          {{-- </td>  --}}
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
