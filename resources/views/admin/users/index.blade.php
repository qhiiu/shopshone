@extends('layouts.admin')
@section('content')

    <h1>Users</h1>

    @include('admin.notification')
    <br><br>


    <p><a  href="{{ route('users.create') }}" class="btn btn-success">Create new</a></p>
<div class="box">

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
        <tr>
          <th>id</th>
          <th>role</th>
          <th>email</th>
          <th>password</th>
          <th>name</th>
          <th>gender</th>
          <th>phone</th>
          <th>address</th>
          <th>dob</th>
          <th>remember_token</th>

          <th>created_at</th>
          <th>updated_at</th>
        </tr>

        @foreach ($list as $r)
        <tr>
          <td>{{$r->id}}</td>
          <td>{{$r->role}}</td>
          <td>{{$r->email}}</td>
          <td>{{ $r->password }}</td>
          <td>{{$r->name}}</td>
          <td>{{$r->gender}}</td>
          <td>{{$r->phone}}</td>
          <td>{{$r->address}}</td>
          <td>{{$r->dob}}</td>
          <td>{{$r->remember_token}}</td>

          <td>{{$r->created_at}}</td>
          <td>{{$r->updated_at}}</td>

          <td>
            <a class="btn btn-info" href="{{ action('UsersController@edit',$r->id) }}">Edit</a>
          </td>
          <td>
             <form class="delete_form" action="{{ action('UsersController@destroy',$r->id) }} " method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger delete">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody></table>
    </div>

</div>
{{ $list->links() }}


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
