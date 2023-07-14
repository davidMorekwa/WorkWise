@extends('layouts.recruiterLayout')
@section('recruiter-content')
    <style>
        a:visited {
            color: blueviolet;
        }
    </style>
    <div class="container">
        <h4>{{$job_title->job_title}}</h4>
        @php
            $count = 1;
        @endphp
        @foreach ($resumes as $resume)
            <div>
                @php
                    echo '<span>' . $count . '.</span>';
                @endphp
                <a href="{{ asset('storage/' . $resume->resume) }}">{{ $resume->resume }}</a>
            </div>
            @php
                $count = $count + 1;
            @endphp
        @endforeach
    </div>
@endsection
