@extends('layouts.recruiterLayout')
<style>
    #profileContainer {
        margin-top: 5%;
        padding: 12px;
    }

    #profileContainer img {
        width: 75px;
    }

    #org-name {
        font-weight: bolder;
        margin-bottom: 0px;
    }

    #org-name>svg:hover {
        cursor: pointer;
    }

    #org-info {
        margin-top: 0px;
    }

    #org-info>span {
        color: grey;
        margin: 8px;
    }

    #button {
        background: #894c75;
        color: white;
        border: none;
        height: 35px;
        border-radius: 7px;
    }

    #org-profile-nav>ul {
        list-style-type: none;
        display: flex;
        flex-direction: row;
        width: 100%;
        border-bottom: 1px solid rgb(181, 181, 181);
    }

    #org-profile-nav>ul li {
        margin: 0px 10px;
        width: 65px;
        border-radius: 7px;
        text-align: center;
        color: gray;
    }

    #org-profile-nav>ul li:hover {
        cursor: pointer;
        color: black;
    }

    .paragraph {
        color: gray;
        text-decoration: none;
    }

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
</style>
@section('recruiter-content')
    <div id="profileContainer">
        <div>
            <div>
                <h1 id="org-name">
                    <img src="{{ asset('/assets/sampleLogo.jpg') }}" alt="">
                    {{ $Profile->organisation_name }}
                    <a href="{{ route('EditRecruiterProfile.show') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="gray" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg></a>
                </h1>
                <div id="org-info">
                    <span>{{ $Profile->industry }}</span>
                    <span>.</span>
                    <span>{{ $Profile->location }}</span>
                    <span>
                        <a href="{{ $Profile->website }}" target="blank">
                            <button id="button">Learn More
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg>
                            </button>
                        </a>
                    </span>
                </div>
                <hr>
                <nav id="org-profile-nav">
                    <ul>
                        <li>Home</li>
                        <li>About</li>
                        <li>Jobs</li>
                        <li>People</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div>
            <h4>About</h4>
            <p class="paragraph">{{ $Profile->about }}</p>

        </div>
        <div>
            <h4>Recent Job Openings</h4>
            <div class="job-container">
                @foreach ($openJobs as $job)
                    <div class="job-card shadow-sm" id="cards">
                        <div class="job-details">
                            <img src="assets/googleicon.svg" alt="" />
                            <div>
                                <h4>{{ $Profile->organisation_name }}</h4>
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
            <a href="{{ route('jobPosts.show') }}" class="paragraph">Show all openings
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg>
            </a>
        </div>
    </div>
@endsection
{{-- @php
    $txt = $Profile->about;
    // computeTfIdf($txt);
@endphp --}}
