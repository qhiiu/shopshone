@extends('layouts.admin')
@section('content')

<div>
    <h1>Slides</h1>

    @include('admin.notification')
    <br>

    <p><a href="{{ url('admin/slides/create') }}"  class="btn btn-primary">Add new</a></p>

</div>
<div class="box">

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
        <tr>
          <th>id</th>
          <th>link</th>
          <th>image</th>

          <th>created_at</th>
          <th>updated_at</th>
        </tr>

        @foreach ($list as $r)
        <tr>
          <td>{{$r->id}}</td>
          <td>{{$r->link}}</td>
          <td>{{$r->image}}</td>

          <td>{{$r->created_at}}</td>
          <td>{{$r->updated_at}}</td>
          <td>
            <a  class="btn btn-info" href="{{ action('SlidesController@edit',$r->id) }}">Edit</a>
          </td>
          <td>
            <form class="delete_form" action="{{ action('SlidesController@destroy',$r->id) }} " method="POST">
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
