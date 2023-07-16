@extends('layouts.recruiterLayout')
@section('recruiter-content')
<style>
    .job-container{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 10px;
    }
    .job-card{
        width: 20%;
        height: 270px;
        margin: 10px;
        border-radius: 15px;
        background-color: rgb(254, 254, 254);
        border: 1px solid white;
        padding: 15px;
        display: flex;
        flex-direction: column;
        align-content: center;justify-content: space-around;
    }
    .job-card:hover{
        transform: scale(1.05);
        transition: ease-in;
        transition-duration: 500ms;
        cursor: pointer;
    }
    .job-card p{
        text-align: center;
    }
    .job-card #job_title{
        font-weight: 500;
        text-align: center;
    }
    .job-card #position_title, #type{
        color: gray;
    }
    .review{
        border: 0.5px solid black;
    }
    .review:hover{
        background-color: #894c75;
        color: white;
    }
    .job-card form{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="job-container">
    @foreach ($jobs as $job)
    <div class="job-card shadow-sm">
        <h6 id='job_title'>{{$job->job_title}}</h6>
        <p id="position_title">{{$job->position_title}}</p>
        <p id="type">{{ $job->type }}</p>
        <form method="GET", action="{{ url('/reviewResumes/review', [$job->id]) }}">
            @csrf
            <input type="text" name="post_id" value="{{ $job->id }}" hidden>
            <button type="submit" class="btn review">Review</button>
        </form>
    </div>
    @endforeach
</div>
@endsection
