@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" style="text-align: center">
                        <h3>View Your Profile</h3>
                        <form method="POST" action="{{ route('my_profile.create') }}">
                            @csrf
                            {{-- first name --}}
                            <div class="row mb-3">
                                <label for="fname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="fname"
                                        value="{{ $Profile->fname }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- last name --}}
                            <div class="row mb-3">
                                <label for="lname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="lname"
                                        value="{{ $Profile->lname }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- email --}}
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $Profile->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- phone number --}}
                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="tel"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ $Profile->phone_number }}">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <script>
                                        const phoneInputField = document.querySelector("#phone_number");
                                        const phoneInput = window.intlTelInput(phoneInputField, {
                                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                        });
                                    </script>
                                </div>
                            </div>

                            {{-- self-description --}}
                            <div class="row mb-3">
                                <label for="self-description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Describe yourself') }}</label>

                                <div class="col-md-6">
                                    <textarea id="self-description" placeholder="Describe yourself" rows="5"
                                        value="{{ $Profile->self_description }}"></textarea>

                                </div>
                            </div>

                            {{-- CV --}}
                            <div class="row mb-3">
                                <label for="cv"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Enter a file of your CV') }}</label>

                                <div class="col-md-6">
                                    <input id="cv" type="file"
                                        class="form-control @error('file') is-invalid @enderror" name="cv" required
                                        autocomplete="cv" value="{{ $Profile->cv }}">

                                    @error('cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
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
