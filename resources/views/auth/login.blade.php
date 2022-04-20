@extends('auth.layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>RC Air Craft</b>
        </div>
        <div class="card-body login-box-body">
            <form method="POST" action="{{ route('user-authenticate') }}">
                @csrf

                <input type="hidden" name="user_type" value="Admin">
                <div class="form-group has-feedback">
                    <label for="email" class="col-md-6 col-form-label">{{ __('Email Address') }}</label>
                    <input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <label for="password" class="col-md-6 col-form-label text-md-end">{{ __('Password') }}</label>
                    <input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" value="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link" href="{{ route('admin.forgot_password') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        {{-- if(Route::has('password.request'))
                            <a class="btn btn-link" href=" route('password.request') ">
                                 __('Forgot Your Password?')
                            </a>
                        endif --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
