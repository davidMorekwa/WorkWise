@extends('layouts.recruiterLayout')
{{-- <link rel="stylesheet" href="{{asset('/index.css')}}"> --}}
<style>
    .job-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
    }

    .job-card {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-evenly;
        width: 45%;
        padding: 10px 0px;
        margin: 12px;
        border-radius: 9px;
    }

    .job-card .job-details {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        width: 65%;
    }

    .job-card .job-details>div span {
        color: gray;
    }

    .job-card>div>div {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .job-card img {
        width: 20%;
        margin-right: 12px;
    }

    .job-card>div button {
        width: 125px;
        color: white;
        margin: 5px;
    }

    .job-card>div .close {
        background-color: rgba(112, 4, 4, 0.845);
        border: 1px solid red;
    }

    .job-card>div .show {
        background: #894c75;
        border: none;
    }
    .closed{
        opacity: 0.45;
    }
</style>

@section('recruiter-content')
    <h5>Open Job Posts</h5>
    <hr>
    <div class="job-container">
        @foreach ($openJobs as $job)
            <div class="job-card shadow-sm" id="cards">
                <div class="job-details">
                    <img src="assets/googleicon.svg" alt="" />
                    <div>
                        <h4>{{ $organisation }}</h4>
                        <span>{{ $job->job_title }}</span>
                        {{-- TODO: JOB LOCATION --}}
                        <span>{{ $job->type }}</span>
                    </div>
                </div>
                <form method="POST", action="{{ route('JobPost.close') }}">
                    @csrf
                    <button class="btn show" style="color: white">Show Post</button>
                    <input type="text" name="post_id" value="{{ $job->id }}" hidden>
                    <button type="submit" class="btn close">Close</button>
                </form>
            </div>
        @endforeach
    </div>
    <hr>
    <h5>Closed Job Posts</h5>
    <div class="job-container">
        @foreach ($closedJobs as $job)
            <div class="job-card shadow-sm closed" id="cards">
                <div class="job-details">
                    <img src="assets/googleicon.svg" alt="" />
                    <div>
                        <h4>{{ $organisation }}</h4>
                        <span>{{ $job->job_title }}</span>
                        {{-- TODO: JOB LOCATION --}}
                        <span>{{ $job->type }}</span>
                    </div>
                </div>
                <form method="POST", action="{{ route('JobPost.close') }}">
                    @csrf
                    <button class="btn show" style="color: white">Show Post</button>
                    <input type="text" name="post_id" value="{{ $job->id }}" hidden>
                </form>
            </div>
        @endforeach
    </div>
@endsection
