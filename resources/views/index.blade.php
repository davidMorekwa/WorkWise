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
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="initial.css">
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

            <a href="{{ url('/') }}" class="menu-link">
                <ion-icon name="newspaper-outline"></ion-icon> Find jobs
            </a>

            <a href="#" class="menu-link">
                <ion-icon name="bookmarks-outline"></ion-icon> Bookmarks
            </a>

            <a href="{{ url('/myprofile') }}" class="menu-link">
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
            <div class="search">
                <input type="text" placeholder="Search for a Job..." />
                <button class="btn-search" title="search">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </div>

        <!-- FILTER -->
        <div class="filter-wrapper">
            <p class="filter-title">Recommendation</p>
            <div class="filter">
                <button class="btn-filter">Data Analyst</button>
                <button class="btn-filter">FrontEnd Development</button>
                <button class="btn-filter">BackEnd Development</button>
                <button class="btn-filter">Fullstack Development</button>
                <button class="btn-filter">Fullstack Development</button>
            </div>
        </div>

        <!-- SORT -->
        <div class="sort">
            <p class="sort-title">sort</p>
            <div class="sort-list">
                <select name="sort-list" id="sort-list" title="sort-list">
                    <option value="" class="sort-list-item">All</option>
                    <option value="" class="sort-list-item">Newest Post</option>
                    <option value="" class="sort-list-item">Oldest Post</option>
                    <option value="" class="sort-list-item">Most Relevant</option>
                    <option value="" class="sort-list-item">Highest Paying</option>
                </select>
            </div>
        </div>

        <!-- CARDS -->
        <div class="wrapper" id="wrapper">
            @foreach ($organizations as $organization)
                <fieldset>
                    <div class="card" id="cards">
                        <div style="font-size: 1.6rem;font-weight: 600; color: #894c75;">
                            <h1>Job Title: {{ $organization->job_title }}</h1>
                        </div>
                        <div style="font-style: italic">
                            <h3>Job Type: {{ $organization->type }}</h3>
                        </div>
                        <div>
                            <p>OVERVIEW: <br />{!! $organization->overview !!}</p>
                        </div>
                        @guest
                            <a href="{{ route('login') }}" class="btn-apply">Apply Now</a>
                        @else
                            <form action="{{ route('applications.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="organization_id" value="{{ auth()->user()->id }}">
                                <input type="text" hidden name="job_id" id="job_id" value="{{ $organization->id }}"
                                    required><br />
                                <input type="file" name="resume" id="resume" value="{{ auth()->user()->cv }}"
                                    required>
                                <button type="submit"
                                    style="background-color: #556973;color:aliceblue; border: none; padding: 10px 20px; border-radius: 20px; font-size: 16px; cursor: pointer;">Apply</button>
                            </form>

                        </div>
                    @endguest
                </fieldset>
            @endforeach
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
