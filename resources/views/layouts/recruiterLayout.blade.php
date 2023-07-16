@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
    a:hover {
        cursor: pointer;
    }

    #container {
        display: grid;
        column-gap: 22px;
        grid-template-columns: 25fr 175fr;
        height: 100vh;
    }

    .left-side {
        background-color: white;
        padding: 15px;
        height: 75vh;
        border-radius: 10px;
    }

    .nav-links-container {
        display: flex;
        flex-direction: column;
        margin-top: 12px;
    }

    .nav-links-container nav {
        height: 100vh;
        width: 100%;
    }

    .nav-links-container .nav-link {
        margin-top: 10px;
        width: 100%;
        color: rgb(98, 98, 98);
        border-radius: 10px;
        text-align: left;
        padding-top: 5px;
    }
    .nav-links-container .nav-link:not(#job-management){
        height: 35px;
    }

    .nav-links-container .nav-link:hover:not(#job-management) {
        cursor: pointer;
        border: 1px solid gray;
    }

    .nav-links-container .nav-link ul {
        list-style-type: none;
    }

    .right-side {
        grid-column-start: 2;
        grid-column-end: 3;
        background-color: white;
        padding: 12px;
        border-radius: 10px;
    }

    #job-mgt {
        display: flex;
        flex-direction: column;
        justify-items: center;
        align-items: center;
        width: 100%;
        padding-top: 7px;
    }

    #job-mgt ul {
        width: 100%;
        padding: 0px;
    }

    #job-mgt ul li {
        text-decoration: none;
        color: gray;
        width: 100%;
        border-radius: 10px;
        height: 29px;
        margin: 5px 0px;
    }

    #job-mgt ul li:hover {
        cursor: pointer;
        color: black;
        border: 1px solid gray;
    }

    #job-mgt ul li a {
        text-decoration: none;
        color: gray;
    }

    #job-mgt ul li a:hover {
        cursor: pointer;
        color: black;
    }
</style>
@section('content')
    <div id="container" class="container">
        {{-- DASHBOARD --}}
        <div class="left-side shadow-sm">
            <h2>RECRUITER'S PORTAL</h2>
            <hr>
            <div class="nav-links-container">
                <nav>
                    <div id="job-management" class="nav-link">
                        Job Management
                        <div id="job-mgt">
                            <ul>
                                <li><a href="{{ route('JobPostForm.show') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-file-post" viewBox="0 0 16 16">
                                            <path
                                                d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8z" />
                                            <path
                                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                        </svg> Post a Job</a></li>
                                <li><a href="{{ route('jobPosts.show') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                            <path
                                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                        </svg> Recent Job Posts</a></li>
                            </ul>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#job-mgt').hide()
                        })
                        $("#job-management").hover(
                            function() {
                                $('#job-mgt').show()
                            },
                            function() {
                                $("#job-mgt").hide()
                            }
                        )
                    </script>
                    <a class="nav-link" href="{{ route('ReviewResumes.show') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-archive" viewBox="0 0 16 16">
                            <path
                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg> Review Resumes</a>
                    <a class="nav-link" href="{{ route('RecruiterProfile.show') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-buildings" viewBox="0 0 16 16">
                            <path
                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                            <path
                                d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                        </svg>
                        Company Profile
                    </a>
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        Log Out
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </nav>
            </div>
        </div>
        {{-- END OF DASHBOARD --}}

        {{-- ABOUT/ RIGHT SIDE --}}
        <div class="right-side shadow-sm">
            @yield('recruiter-content')
        </div>
        {{-- END OF ABOUT --}}
    </div>
@endsection
