


@extends('layouts.admin')
@section('content')
<div class="box box-primary">
      <h1 class="box-title">Edit Users</h1>

      @include('admin.notification')

@foreach ($list as $l)
    
      <form class="update_form" role="form" method="POST" action="{{ action('CustomerController@update',$id) }}">
            @csrf

            <input type="hidden" name="_method" value="PATCH">
            <div><b> id </b>= {{ $id }}</div>
            <br><br>

         <div class="box-body">
                <div class="form-group">
                        <label >name</label>
                        <input type="text" class="form-control" value="{{ $l->name }}" name="name">
                    </div>
                    
                    <div>
                        <label><b>Gender</b></label>
                        <div class="form-check">
                                  <input type="radio" class="form-check-input" name="gender" value="nam" checked>nam
                          </div>
                        <div class="form-check">
                              <input type="radio" class="form-check-input" name="gender" value="nữ" >nữ
                          </div>
                    </div>
                    <br>
               
                    <div class="form-group">
                        <label >email</label>
                        <input type="email" class="form-control"value="{{ $l->email }}" name="email" readonly>
                    </div>
            
                    <div class="form-group">
                        <label >address</label>
                        <input type="text" class="form-control"value="{{ $l->address }}" name="address">
                    </div>
            
                    <div class="form-group">
                        <label >phone_number</label>
                        <input type="tel" class="form-control" value="{{ $l->phone_number }}" name="phone_number">
                            {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
                    </div>
            
                    <div class="form-group">
                      <label> Note </label>
                      <textarea class="form-control" name="note" value="{{ $l->note }}" id="" rows="3"></textarea>
                    </div>
            </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    @endforeach
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.update_form').on('submit',function(){
            if(confirm('Update : Are you sure ? ')){
                return true;
            }else {
                return false;
            }
        });
    });
</script>
@endsection
