@extends('layouts.app_auth')

@section('content')
    <style>
        /* Coded with love by Mutiullah Samim */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #2d9ceb !important;
        }

        .user_card {
            height: 450px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: #f39c12;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }

        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 140px;
            top: -75px;
            border-radius: 50%;
            background: #2d9ceb;
            padding: 10px;
            text-align: center;
        }

        .brand_logo {
            height: 150px;
            width: 170px;
            /* border-radius: 50%; */
            /* border: 2px solid white; */
        }

        .form_container {
            margin-top: 100px;
        }

        .login_btn {
            width: 100%;
            background: #c0392b !important;
            color: white !important;
        }

        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .login_container {
            padding: 0 2rem;
        }
        h5 {
            font-family: sans-serif;        
            }

        .input-group-text {
            background: #c0392b !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }

        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }

    </style>
    <div class="container h-100" style="margin-top: 100px">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <a href="/"><img src="{{ asset('image/logo-point.png') }}" class="brand_logo" alt="Logo"></a>
                    </div>
                </div>
                
                <div class="d-flex justify-content-center form_container">
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <h5>Login Point Clock</h5>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="email" id="email"
                                class="form-control input_user @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            {{-- <input type="password" name=""
                                class="form-control input_pass" value="" placeholder="password">
                            --}}
                            <input id="password" type="password"
                                class="form-control input_pass @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="custom-control custom-checkbox">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="button" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="{{ route('register') }}" class="ml-2">Sign Up</a>
                    </div>
                    {{-- @if (Route::has('password.request'))
                        <div class="d-flex justify-content-center links">
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                    @endif --}}



                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

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
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
