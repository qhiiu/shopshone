@extends('master')

@section('content')

<div class="container">
    <div class="space100">&nbsp;</div>
        <div class="row justify-content-center"  style="font-size: 25px;">
            <div class="col-md-10"  style="font-family: -webkit-pictograph;">
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                         <div class="card-header"  style="font-size: 40px;">
                             Đăng nhập ngay !</div>
                    </div>
                    <div class="space40">&nbsp;</div>
                </div>
                    <div class="space30">&nbsp;</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <span for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</span>

                                <div class="col-md-6">
                            <div class="col-md-2"></div>
                                    <input   style="font-size: 20px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="font-size:19px; color:red;">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <span for="password" class="col-md-2 col-form-label text-md-right">{{ __('Mật khẩu') }}</span>

                                <div class="col-md-6">
                                    <input   style="font-size: 20px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input class="form-check-input show" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                            </div>
                                            <div class="col-md-11">
                                                Ghi nhớ đăng nhập
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-5"></div>
                                <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary"   style="font-size: 25px;">
                                                {{ __('Đăng nhập') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}"   style="font-size: 18px;">
                                                    {{ __('Quên mật khẩu?') }}
                                                </a>
                                            @endif
                                            <div class="space40">&nbsp;</div>
                                            <div class="mb-2">Hoặc đăng nhập bằng </div>
                                            <div class="space10">&nbsp;</div>
                                            <div>
                                                <a href="{{ route('login.facebook') }}" class="btn btn-primary "   style="font-size: 25px;">Facebook</a>
                                                <a href="{{ route('login.google') }}" class="btn btn-danger"   style="font-size: 25px;"> Google</a>
                                            </div></div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    <div class="space100">&nbsp;</div>
</div>
@endsection
