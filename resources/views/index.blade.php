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
    {{-- <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

    </div> --}}

    <!-- SIDENAV -->
    <div class="sidenav" id="sidenav">
        <!-- LOGO -->
        <h1 class="mylogo">WorkWise</h1>

        <!-- SIDE MENU -->
        <div class="side-menu">
            <a href="#">
                <ion-icon name="home-outline"></ion-icon> Home
            </a>
            <a href="#">
                <ion-icon name="newspaper-outline"></ion-icon> Find jobs
            </a>
            <a href="#">
                <ion-icon name="bookmarks-outline"></ion-icon> Bookmarks
            </a>
            <a href="#">
                <ion-icon name="mail-unread-outline"></ion-icon> Message
            </a>
            <a href="#">
                <ion-icon name="settings-outline"></ion-icon> Settings
            </a>
        </div>
        <!-- AUTHENTICATION -->
        <div class="authentication">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif @endauth
                    </div>
                @endif
            </div>
            <!-- PROFILE -->
            <div class="profile">
                <img src="assets/person.jpg" alt="Person" />
                <div class="profile-name">
                    <h4>Steve Mike</h4>
                    <p>Web Development</p>
                </div>
            </div>
        </div>

        <!-- MAIN -->
        <div class="main">
            <!-- MAIN HEADER -->
            <div class="main-header">
                <ion-icon class="menu-bar" name="menu-outline"></ion-icon>
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
                <!-- CARD 1 -->
                <div class="card" id="cards">
                    <div class="card-left blue-bg">
                        <img src="assets/googleicon.svg" alt="" />
                    </div>
                    <div class="card-center">
                        <h3>Google</h3>
                        <p class="card-detail">Web Development, FrontEnd</p>
                        <p class="card-location">
                            <ion-icon name="location-outline"></ion-icon>
                        </p>
                        <div class="card-sub">
                            <p class="card-sub-details">
                                <ion-icon name="today-outline"></ion-icon>5 mins ago
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon> Full-time
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon>500 Applicants
                            </p>
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-tag">
                            <h3>Division</h3>
                            <a href="#">Data Analyst</a>
                        </div>
                        <div class="card-salary">
                            <p><b>$500</b> / Year</p>
                        </div>
                        <div class="card-more">
                            <a href="#">Read more...</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="card" id="cards">
                    <div class="card-left blue-bg">
                        <img src="assets/googleicon.svg" alt="" />
                    </div>
                    <div class="card-center">
                        <h3>Google</h3>
                        <p class="card-detail">Web Development, FrontEnd</p>
                        <p class="card-location">
                            <ion-icon name="location-outline"></ion-icon>
                        </p>
                        <div class="card-sub">
                            <p class="card-sub-details">
                                <ion-icon name="today-outline"></ion-icon>5 mins ago
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon> Full-time
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon>500 Applicants
                            </p>
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-tag">
                            <h3>Division</h3>
                            <a href="#">Data Analyst</a>
                        </div>
                        <div class="card-salary">
                            <p><b>$500</b> / Year</p>
                        </div>
                        <div class="card-more">
                            <a href="#">Read more...</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="card" id="cards">
                    <div class="card-left blue-bg">
                        <img src="assets/googleicon.svg" alt="" />
                    </div>
                    <div class="card-center">
                        <h3>Google</h3>
                        <p class="card-detail">Web Development, FrontEnd</p>
                        <p class="card-location">
                            <ion-icon name="location-outline"></ion-icon>
                        </p>
                        <div class="card-sub">
                            <p class="card-sub-details">
                                <ion-icon name="today-outline"></ion-icon>5 mins ago
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon> Full-time
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon>500 Applicants
                            </p>
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-tag">
                            <h3>Division</h3>
                            <a href="#">Data Analyst</a>
                        </div>
                        <div class="card-salary">
                            <p><b>$500</b> / Year</p>
                        </div>
                        <div class="card-more">
                            <a href="#">Read more...</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="card" id="cards">
                    <div class="card-left blue-bg">
                        <img src="assets/googleicon.svg" alt="" />
                    </div>
                    <div class="card-center">
                        <h3>Google</h3>
                        <p class="card-detail">Web Development, FrontEnd</p>
                        <p class="card-location">
                            <ion-icon name="location-outline"></ion-icon>
                        </p>
                        <div class="card-sub">
                            <p class="card-sub-details">
                                <ion-icon name="today-outline"></ion-icon>5 mins ago
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon> Full-time
                            </p>
                            <p class="card-sub-details">
                                <ion-icon name="hourglass-outline"></ion-icon>500 Applicants
                            </p>
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-tag">
                            <h3>Division</h3>
                            <a href="#">Data Analyst</a>
                        </div>
                        <div class="card-salary">
                            <p><b>$500</b> / Year</p>
                        </div>
                        <div class="card-more">
                            <a href="#">Read more...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD DETAILS -->
        <div class="detail" id="detail">
            <ion-icon class="close-detail" name="close-circle-outline"></ion-icon>

            <!-- DETAIL HEADER -->
            <div class="detail-header">
                <img src="assets/googleicon.svg" alt="google" />
                <h2>Google</h2>
                <p>Data Science</p>
            </div>
            <hr class="divider" />

            <!-- DETAIL DESCRIPTION -->
            <div class="detail-description">
                <div class="about">
                    <h4>About Company</h4>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta
                        velit explicabo ea tenetur temporibus sed doloribus ducimus rerum
                        aliquam praesentium.
                    </p>
                    <a href="#">Read more</a>
                </div>
                <hr class="divider" />

                <!-- QUALIFICATION -->
                <div class="qualification">
                    <h4>Qualification</h4>
                    <ul class="qualification-list">
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Voluptatem, placeat.
                        </li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                    </ul>
                </div>
                <hr class="divider" />
            </div>
            <div class="detail-btn">
                <button class="btn-apply">Apply Now</button>
                <button class="btn-save">Save job</button>
            </div>
        </div>

        <!-- MAIN JS -->
        <script src="main.js"></script>
        <!-- ICONS JS -->
        <script
  type="module"
  src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </body>

    </html>
