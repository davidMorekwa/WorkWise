@extends('layouts.recruiterLayout')
@section('recruiter-content')
<div class="job-container">
    @foreach ($jobs as $job)
        <div class="job-card shadow-sm" id="cards">
            <div class="job-details">
                <img src="assets/googleicon.svg" alt="" />
                <div>
                    <span>{{ $job->job_title }}</span>
                    {{-- TODO: JOB LOCATION --}}
                    <span>{{ $job->type }}</span>
                </div>
            </div>
            <form method="GET", action="{{ url('/reviewResumes/review', [$job->id]) }}">
                @csrf
                <button class="btn show" style="color: white">Show Post</button>
                <input type="text" name="post_id" value="{{ $job->id }}" hidden>
                <button type="submit" class="btn close">Review</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
