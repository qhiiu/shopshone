@extends('layouts.admin')
@section('content')

<div>
    <h1>Products type</h1>

    @include('admin.notification')
    <br>

    <p><a href="{{ url('admin/productsType/create') }}"  class="btn btn-success">Add new</a></p>

</div>
<div class="box">

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
        <tr>
          <th>id</th>
          <th>name</th>

          <th>created_at</th>
          <th>updated_at</th>
        </tr>

        @foreach ($list as $r)
        <tr>
          <td>{{$r->id}}</td>
          <td>{{$r->name}}</td>

          <td>{{$r->created_at}}</td>
          <td>{{$r->updated_at}}</td>
          <td>
            <a  class="btn btn-info" href="{{ action('ProductsTypeController@edit',$r->id) }}">Edit</a>
          </td>
          <td>
            <form class="delete_form" action="{{ action('ProductsTypeController@destroy',$r->id) }} " method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger ">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody></table>
    </div>
    <!-- /.box-body -->
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
