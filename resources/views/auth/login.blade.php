@extends('layouts.app')
{{-- @extends('master') --}}


@section('content')
<div class="container">
<div class="height1"></div>
    <div class="row justify-content-center"  style="font-size: larger;">
        <div class="col-md-8"  style="font-family: -webkit-pictograph;">
            <div class="card">
                <div class="card-header">{{ __('Đăng nhập') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <span for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</span>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <span for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</span>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input show" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                    <span class="form-check-label ml-4" for="remember">
                                        {{ __('Ghi nhớ đăng nhập') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng nhập') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                @endif
                                <br><br>
                                <div class="mb-2">Hoặc đăng nhập bằng </div>
                                <div>
                                    <a href="{{ route('login.facebook') }}" class="btn btn-primary ">Facebook</a>
                                    <a href="{{ route('login.google') }}" class="btn btn-danger">Google</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="height2"></div>
</div>
@endsection
