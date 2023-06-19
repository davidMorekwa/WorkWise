@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
    a:hover{
        cursor: pointer;
    }
    #container{
        display: grid;
        column-gap: 22px;
        grid-template-columns: 25fr 175fr;
        height: 100vh;
    }
    .left-side{
        background-color: white;
        padding: 15px;
        height: 75vh;
        border-radius: 10px;
    }
    .nav-links-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 12px;
    }
    .nav-links-container nav{
        height: 100vh;
        width: 100%;
    }
    .nav-links-container .nav-link{
        margin-top: 10px;
        width: 100%;
        color: rgb(98, 98, 98);
        border-radius: 10px;
        text-align: center;
        padding-top: 7px;
    }
    .nav-links-container .nav-link:hover{
        cursor: pointer;
    }
    .nav-links-container .nav-link ul{
        list-style-type: none;
    }
    .right-side{
        grid-column-start: 2;
        grid-column-end: 3;
        background-color: white;
        padding: 12px;
        border-radius: 10px;
    }
</style>
@section('content')
    
<div id="container"  class="container">
    {{-- DASHBOARD --}}
    <div class="left-side shadow-sm">
        <h2>RECRUITER'S PORTAL</h2>
        <hr>
        <div class="nav-links-container">
            <nav>
                <a class="nav-link" href="">Dashboard</a>
                <a id="job-management" class="nav-link" href="">Job Management
                    <div id="job-mgt">
                        <ul>
                            {{-- <a style="display: inline" class="nav-link" href="{{ route('JobPostForm.show')}}"><li class="nav-link">Post a Job</li></a> --}}
                            <li class="nav-link">Recent Job postings</li>
                        </ul>
                    </div>
                </a>
                <script>
                    $(document).ready(function(){
                        $('#job-mgt').hide()
                    })
                    $("#job-management").hover(
                        function(){
                            $('#job-mgt').show()
                        }, 
                        function(){
                            $("#job-mgt").hide()
                        }
                    )
                </script>
                <a style="display: inline" class="nav-link" href="{{ route('JobPostForm.show')}}"><li class="nav-link">Post a Job</li></a>
                <a style="display: inline" class="nav-link" href="{{ route('jobPosts.show')}}"><li class="nav-link">Recent Job Posts</li></a>
                <a class="nav-link" href="">Review Resumes</a>
                <a class="nav-link" href="{{ route('RecruiterProfile.show')}}">Company Profile</a>
                <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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