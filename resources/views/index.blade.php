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

        <!-- CARDS -->
        <div class="wrapper" id="wrapper">
            @if ($organizations->isEmpty())
                <h2 style="text-align:center; padding-top:4rem; font-size:1.8rem;">There are no Job postings made yet.
                </h2>
            @else
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
                            <form action="{{ url('jobPost', [$organization->id]) }}" method="GET">
                                @csrf
                                <input type="text" value={{ $organization->id }} hidden>
                                <button type="submit"
                                    style="background-color: #556973;color:aliceblue; border: none; padding: 10px 20px; border-radius: 20px; font-size: 16px; cursor: pointer;">
                                    Show More</button>
                            </form>
                        </div>
                    </fieldset>
                @endforeach
            @endif
        </div>
        <p>{{ $organizations->links('pagination.custom-pagination') }}</p>
    </div>



    <!-- MAIN JS -->
    <script src="index.js"></script>
    <!-- ICONS JS -->
    <script type="module"src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- Other head elements... -->

    <script>
        document.getElementById('executeButton').addEventListener('click', function() {
            // Make an AJAX call to execute the function and display the pop-up
            fetch('/execute-function')
                .then(response => response.text())
                .then(html => {
                    // Append the returned HTML (pop-up) to the body of the page
                    document.body.insertAdjacentHTML('beforeend', html);
                });
        });
    </script>

</body>

</html>
