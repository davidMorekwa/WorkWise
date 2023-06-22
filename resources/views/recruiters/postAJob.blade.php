@extends('layouts.recruiterLayout')
<style>
    #button {
        background: #894c75;
        color: white;
        border: none;
        height: 35px;
        border-radius: 7px;
    }
</style>
@section('recruiter-content')
    <div class="card-body">
        <form method="POST" action="{{ route('JobPost.create') }}">
            @csrf
            {{-- Job type --}}
            <div class="row mb-3">
                <label for="job_type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                <div class="col-md-6">
                    <select class="form-select" id="job_type" name="job_type">
                        <option value="full-time">Full Time</option>
                        <option value="internship">Internship</option>
                    </select>
                </div>
            </div>
            {{-- Job Title --}}
            <div class="row mb-3">
                <label for="Job Title" class="col-md-4 col-form-label text-md-end">{{ __('Job Title') }}</label>

                <div class="col-md-6">
                    <input id="job_title" type="text" class="form-control" name="job_title"
                        value="{{ old('job_title') }}" required autocomplete="job_title" autofocus
                        placeholder="e.g. Software Engineer">
                </div>
            </div>
            {{-- Position Title --}}
            <div class="row mb-3">
                <label for="position_title" class="col-md-4 col-form-label text-md-end">{{ __('Position Title') }}</label>

                <div class="col-md-6">
                    <input id="position_title" type="text" class="form-control" name="position_title"
                        value="{{ old('company_website') }}" autocomplete="company_website"
                        placeholder="e.g. Senior Software Engineer">
                </div>
            </div>
            {{-- Overview/Description --}}
            <div class="row mb-3">
                <label for="job_overview" class="col-md-4 col-form-label text-md-end">{{ __('Job Description') }}</label>

                <div class="col-md-6">
                    <textarea id="job_overview" name="job_overview" cols="50" rows="10" required></textarea>
                </div>
            </div>
            {{-- Qualifications --}}
            <div class="row mb-3">
                <label for="qualifications" class="col-md-4 col-form-label text-md-end">{{ __('Qualifiations') }}</label>

                <div class="col-md-6">
                    <textarea id="qualifications" name="qualifications" cols="50" rows="10" required></textarea>
                </div>
            </div>
            {{-- Responsibilities --}}
            <div class="row mb-3">
                <label for="responsibilities"
                    class="col-md-4 col-form-label text-md-end">{{ __('Responsibilities') }}</label>

                <div class="col-md-6">
                    <textarea id="responsibilities" name="responsibilities" cols="50" rows="10" required></textarea>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" id="button">
                        {{ __('Create Post') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
