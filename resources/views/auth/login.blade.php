@extends('layouts.appwithoutnav')
<style>
    .auth-button {
        background-color: #556973;
        text-transform: uppercase;
        font-size: 1rem;
        border-radius: 5px;
        border: none;
        padding: .4rem;
        font-weight: 600;
        color: aliceblue;
    }

    .auth-button:hover {
        background-color: #084462;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"
                        style="background-color: #556973; font-size:1.2rem; font-weight:600; text-transform:uppercase; text-align:center; color:aliceblue;">
                        {{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" style="font-size: .9rem"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" style="font-size: .9rem"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            style="border-color: black" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember" style="font-size: .9rem">
                                            {{ __('Remember Me') }}
                                        </label>

                                    </div>

                                </div>

                            </div>

                            <div class="row mb-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}"
                                        style="font-size: .9rem; color:#0b1c24; font-weight:600;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="auth-button"> {{ __('Login') }} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
