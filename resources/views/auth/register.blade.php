@extends('layouts.appwithoutnav')
<style>
    .auth-button {
        background-color: #556973;
        text-transform: uppercase;
        font-size: .9rem;
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
                        style="background-color: #556973; font-size:1.2rem; font-weight:600; text-transform:uppercase; text-align:center; color:aliceblue";>
                        {{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- first name
                            <div class="row mb-3">
                                <label for="fname" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem; font-weight:550;">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" style="font-size: .9rem"
                                        class="form-control @error('name') is-invalid @enderror" name="fname"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- last name --}}
                            {{-- <div class="row mb-3">
                                <label for="lname" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem; font-weight:550;">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" style="font-size: .9rem"
                                        class="form-control @error('name') is-invalid @enderror" name="lname"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            {{-- email --}}
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem; font-weight:550;">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" style="font-size: .9rem"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- user-role --}}
                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem; font-weight:550;">{{ __('Role') }}</label>

                                <select id="role" name="role"
                                    style="background-color: #8c9da6; font-size:.9rem; text-transform:capitalize; text-align:center; color:rgb(35, 46, 55); width:150px; border-radius:10px; margin:0 .9rem;">
                                    <option value="3">Job Seeker</option>
                                    <option value="2">Recruiter</option>
                                </select>
                            </div>

                            {{-- password --}}
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem; font-weight:550;">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" style="font-size: .9rem"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password must be 8 characters">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- confirm-password --}}
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"
                                    style="font-size: .9rem; font-weight:550;">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        style="font-size: .9rem" name="password_confirmation" required
                                        autocomplete="new-password" placeholder="Password must be 8 characters">
                                </div>
                            </div>

                            {{-- buttons --}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    
                                    <button type="submit" class="auth-button">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
