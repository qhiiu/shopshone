@extends('layouts.admin')
@section('content')
      <table class="table table-hover">
                    {{-- ----------------------- phone---------------------------- --}}
                <h1>         Products               </h1>

                @include('admin.notification')

                <p><a href="{{ url('admin/products/create') }}"  class="btn btn-success">Add new</a></p>

                <div>
                    @foreach ($list as $r)
                            <div class="row" style="margin-bottom:5px;margin-left:10px">
                                    <button class="btn btn-primary abc" type="button" data-toggle="collapse" data-target="#collapseExample{{$r->id}}" aria-expanded="false" aria-controls="collapseExample{{$r->id}}">
                                        <div>
                                            <span >{{ $r->name }}</span>
                                            <span>
                                                <img src="{{ asset($r->image) }}" alt="loading ..." height="30px">
                                            </span>
                                        </div>
                                    </button>

                                    <a  class="btn btn-info" href="{{ action('ProductsController@edit',$r->id) }}">Edit</a>
                                    <form class="delete_form " action="{{ action('ProductsController@destroy',$r->id) }} " method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete">Delete</button>
                                    </form>
                            </div>
                            <div class="collapse" id="collapseExample{{$r->id}}" style="line-height: 28px;">
                                <div class="card card-body">
                                    <b class="col-md-2" style="width:10%;">id</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->id}}</span>
                                </div>
                                <div  class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">name</b>
                                    <span class="col-md-10"  style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->name}}</span>
                                </div>
                                <div  class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">id_type</b>
                                    <span class="col-md-10"  style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->id_type}}</span>
                                </div>
                                <br>
                                <div  class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">description</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->description}}</span>
                                </div>
                                <br>
                                <div  class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6;">unit_price</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->unit_price}}</span>
                                </div>
                                <div  class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">promotion_price</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->promotion_price}}</span>
                                </div>
                                <div  class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">image</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->image}}
                                        <div>
                                            <img src="{{ asset($r->image) }}" alt="loading ..." height="150px">
                                        </div>
                                    </span>
                                </div>
                                <div class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">unit</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->unit}}</span>
                                </div>
                                <div class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">new</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->new}}</span>
                                </div>

                                <br>

                                <div class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">created_at</b>
                                    <span class="col-md-10" style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->created_at}}</span>
                                </div>
                                <div class="card card-body">
                                    <b class="col-md-2" style="width:10%;border-top:1px solid #d6d6d6">updated_at</b>
                                    <span class="col-md-10"  style="border-left:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6">{{$r->updated_at}}</span>
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
