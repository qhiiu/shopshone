@extends('master')
@section('content')

<div class="space70">&nbsp;</div>
@if(Session::has('support_success'))
<div class="row" style="margin-top: 20px;">
    <div class="thongbao" style=" font-size:25px; margin-bottom:10px;text-align: center;">
        <span style="  padding: 15px;background: #1cff02; border-radius: 30px;     color: blue;">
            {{Session::get('support_success')}}
        </span>
    </div>
</div>
@endif


<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Liên hệ </h2>
                <div class="space20">&nbsp;</div>
                <div class="space20">&nbsp;</div>
                <form action="{{ route('support.store') }}" method="POST" class="contact-form">
                    @csrf

                    <div class="form-block">
                        <input name="name" type="text" placeholder="Your Name (required)">
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong style="font-size:19px; color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-block">
                        <input name="email" type="email" placeholder="Your Email (required)">
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="font-size:19px; color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-block">
                        <input name="title" type="text" placeholder="title">
                    </div>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong style="font-size:19px; color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-block">
                        <textarea name="content" placeholder="Your Content"></textarea>
                    </div>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong style="font-size:19px; color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
<div class="beta-map">
    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" ></iframe></div>
</div>
@endsection
