<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- ICON --}}
    <link rel="shortcut icon" href="">
    <title>WorkWise</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- CSS Styles -->
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../initial.css">
</head>

<body class="antialiased">

    <!-- SIDENAV -->
    <div class="sidenav" id="sidenav">
        <!-- LOGO -->
        <a class="navbar-title" href="{{ url('/') }}">
            Workwise
        </a>
        <!-- SIDE MENU -->
        <div class="side-menu">
            @guest
                <a href="{{ route('login') }}" class="menu-link" style="font-size: 1rem">
                    <ion-icon name="newspaper-outline"></ion-icon> View Applied Jobs
                </a>
            @else
                <a href="{{ url('/ViewAppliedJobs') }}" class="menu-link" style="font-size: 1rem">
                    <ion-icon name="newspaper-outline"></ion-icon> View Applied Jobs
                </a>
            @endguest

            <a href="#" class="menu-link" style="font-size: 1rem">
                <ion-icon name="bookmarks-outline"></ion-icon> Bookmarks
            </a>

            <a href="{{ url('/viewprofile') }}" class="menu-link" style="font-size: 1rem">
                <ion-icon name="settings-outline"></ion-icon> View Profile
            </a>


        </div>

        <ul class="navbar-nav ms-auto" style="display:flex; align-items:center; padding:.8rem; flex-direction:column;">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item-mine">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item-mine">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size: 14px">
                        {{ Auth::user()->email }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <a class="nav-item-mine" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>

    <!-- MAIN -->
    <div class="main" id="main">
        <!-- MAIN HEADER -->
        <div class="main-header">
            <ion-icon class="menu-bar" id="menu-bar" name="menu-outline"></ion-icon>
            <form action="{{ route('filterjobs.index') }}" method="GET" style="display: flex">
                <input type="text" id="filters" name="filters"
                    placeholder="BY: Job title, Job type, Organization, position title"
                    style="display: flex; align-items: center; padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 500px; margin-right: 5px; text-align:center;">
                <button type="submit"
                    style="padding: 8px 12px; background-color: #894c75; color: #fff; border: none; border-radius: 4px;
                cursor: pointer;">Filter</button>
            </form>
        </div>

        <!-- SORT -->
        <div class="sort">
            <div class="sort-list">
                {{-- <form action="{{ route('filterjobs.index') }}" method="GET">  
                    <input type="text" id="filters" name="filters">
                    <button type="submit">Filter</button>
                </form> --}}
            </div>
        </div>

        <!-- CARDS -->
        <div class="wrapper" id="wrapper">
            <div class="card" id="cards">
                <div style="font-size: 1.6rem;font-weight: 600; color: #894c75;">
                    <h1>Job Title: {{ $job->job_title }} <br><span>{{$organisation->organisation_name}}</span></h1>
                </div>
                <div style="font-style: italic">
                    <h3 style="color: gray">Job Type: {{ $job->type }}</h3>
                </div>
                <div>
                    <p>OVERVIEW: <br />{!! $job->overview !!}</p>
                </div>
                <div>
                    <p>Requirements: <br>{!! $job->qualifications !!}</p>
                </div>
                <div>
                    <p>Responsibilities: <br>{!! $job->responsibilities !!}</p>
                </div>
                @guest
                    <a href="{{ route('login') }}" class="btn-apply">Apply Now</a>
                @else
                    <form action="{{ route('applications.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="organization_id" value="{{ $job->id }}">
                                    <input type="text" hidden name="job_id" id="job_id"
                                        value="{{ $job->id }}" required><br />
                                    <input type="file" name="resume" id="resume"
                                        value="{{ auth()->user()->cv }}" required>
                                    <button type="submit"
                                        style="background-color: #556973;color:aliceblue; border: none; padding: 10px 20px; border-radius: 20px; font-size: 16px; cursor: pointer;">Apply</button>
                                        
                                </form>

                </div>
            @endguest
            
            {{-- <h3>Similar Jobs</h3>
            {{-- SIMILAR JOBS SECTION 
            @foreach ($similar_jobs as $job)
                    <fieldset>
                        <div class="card" id="cards">
                            <div style="font-size: 1.6rem;font-weight: 600; color: #894c75;">
                                <h1>Job Title: {{ $job->job_title }}</h1>
                            </div>
                            <div>
                                <p>OVERVIEW: <br />{!! $job->overview !!}</p>
                            </div>
                            <form action="{{ url('jobPost', [$job->id]) }}" method="GET">
                                @csrf
                                <input type="text" value={{ $job->id }}>
                                <button type="submit"
                                    style="background-color: #556973;color:aliceblue; border: none; padding: 10px 20px; border-radius: 20px; font-size: 16px; cursor: pointer;">Show
                                    More</button>
                            </form>
                    </fieldset>
                @endforeach --}}

        </div>
    </div>
    </div>

    <!-- MAIN JS -->
    <script src="index.js"></script>
    <!-- ICONS JS -->
    <script type="module"src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</body>

</html>
