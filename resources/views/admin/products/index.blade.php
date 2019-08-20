@extends('layouts.admin')
@section('content')
      <table class="table table-hover">
                    {{-- ----------------------- phone---------------------------- --}}
                <h1>         Products               </h1>

                @include('admin.notification')

                <p><a href="{{ url('admin/products/create') }}"  class="btn btn-success">Add new</a></p>

                <div>
                    @foreach ($list as $r)
                            <p>
                                <button class="btn btn-primary abc" type="button" data-toggle="collapse" data-target="#collapseExample{{$r->id}}" aria-expanded="false" aria-controls="collapseExample{{$r->id}}">
                                    <div>id :
                                        <span >{{$r->id}}</span>
                                        /
                                        <span >{{ $r->name }}</span>
                                    </div>
                                </button>
                                {{-- ------------------ ----------------- --}}

                                <a  class="btn btn-info" href="{{ action('ProductsController@edit',$r->id) }}">Edit</a>

                                <form class="delete_form " action="{{ action('ProductsController@destroy',$r->id) }} " method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete">Delete</button>
                                </form>
                            </p>


                            <div class="collapse" id="collapseExample{{$r->id}}">
                                <div class="card card-body">
                                    <span class="product_column1">id</span>
                                    <span class="product_column2">{{$r->id}}</span>
                                </div>
                                <div  class="card card-body">
                                    <span class="product_column1">name</span>
                                    <span class="product_column2">{{$r->name}}</span>
                                </div>
                                <div  class="card card-body">
                                    <span class="product_column1">id_type</span>
                                    <span class="product_column2">{{$r->id_type}}</span>
                                </div>
                                <br>
                                <div  class="card card-body">
                                    <span class="product_column1">description</span>
                                    <span class="product_column2">{{$r->description}}</span>
                                </div>
                                <br>
                                <div  class="card card-body">
                                    <span class="product_column1">unit_price</span>
                                    <span class="product_column2">{{$r->unit_price}}</span>
                                </div>
                                <div  class="card card-body">
                                    <span class="product_column1">promotion_price</span>
                                    <span class="product_column2">{{$r->promotion_price}}</span>
                                </div>
                                <div  class="card card-body">
                                    <span class="product_column1">image</span>
                                    <span class="product_column2">{{$r->image}}</span>
                                </div>
                                <div class="card card-body">
                                    <span class="product_column1">unit</span>
                                    <span class="product_column2">{{$r->unit}}</span>
                                </div>
                                <div class="card card-body">
                                    <span class="product_column1">new</span>
                                    <span class="product_column2">{{$r->new}}</span>
                                </div>

                                <br>

                                <div class="card card-body">
                                    <span class="product_column1">created_at</span>
                                    <span class="product_column2">{{$r->created_at}}</span>
                                </div>
                                <div class="card card-body">
                                    <span class="product_column1">updated_at</span>
                                    <span class="product_column2">{{$r->updated_at}}</span>
                                </div>

                            </div>

                    @endforeach
                </div>
                    {{-- ----------------------- end products---------------------------- --}}
    </table>

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
