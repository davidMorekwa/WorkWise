@extends('layouts.recruiterLayout')
@section('recruiter-content')
    <style>
        a:visited {
            color: blueviolet;
        }

        .resume {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin: 5px;
        }

        .resume-link {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .resume-link button:hover {
            border: 1px solid gray;
        }
    </style>
    <div class="container">
        <h4>{{ $job_title->job_title }}</h4>
        <span style="color: gray">Total Applicants: {{ count($resumes) }}</span>
        @php
            $count = 1;
        @endphp
        <span class="alert alert-success mb-3" role="alert" id="successMsg" style="display: none">Updated</span>
        @foreach ($resumes as $resume)
            <div class="resume">
                <span>{{ $count }}. </span>
                <div class="resume-link shadow-sm">
                    <a href="{{ asset('storage/' . $resume->resume) }}">{{ $resume->resume }}</a>
                    <form method="POST" action="{{ url('/reviewResume/reject') }}">
                        @csrf
                        <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                        <button type="submit" class="btn" data-button-id="{{ $resume->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            @php
                $count++;
            @endphp
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn').click(function(e) {
                e.preventDefault();
                var btnId = $(this).data('button-id');
                console.log("button=>" + btnId);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ url('/reviewResume/reject') }}",
                    data: {
                        application_id: btnId
                    },
                    success: function(response) {
                        location.reload();
                        $("#successMsg").fadeIn();
                        $("#successMsg").fadeOut();
                    }
                });
            });
        });
    </script>
@endsection
