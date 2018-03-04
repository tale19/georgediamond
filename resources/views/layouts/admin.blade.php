@extends('layouts.master')

@section('title', 'Admin panel')

@section('main-css')
@endsection

@section('head-bottom')
    <!-- Custom styles for this template -->
    <style>
        body {
            font-size: .875rem;
        }

        /*
         * Sidebar
         */

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Behind the navbar */
            padding: 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            transition: 0.3s ease-in;
        }

        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 48px; /* Height of navbar */
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #999;
        }

        .sidebar .nav-link.active {
            color: #007bff;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .sidebar {
                width: 0;
            }
        }

        /*
         * Navbar
         */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        /*
         * Utilities
         */

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }
    </style>
@endsection


@section('navbar')
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-5 col-sm-3 col-md-2 mr-0" href="/admin">Admin panel</a>
        <button id="sidebar-toggler" class="navbar-toggler mr-1" type="button" aria-controls=".sidebar"
                aria-expanded="false"
                aria-label="Toggle sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="color:#fff" class="text-center d-none d-md-block w-100">
            {{ env('APP_NAME') }}
        </div>
    </nav>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-sm-3 col-md-2 d-md-block bg-light sidebar">
                <div id="sidebar-sticky" class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'admin' ? 'active' : '' }}" href="/admin">
                                <i class="fas fa-home"></i>
                                Admin home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'admin/shows' ? 'active' : '' }}"
                               href="/admin/shows">
                                <i class="fas fa-magic"></i>
                                Shows
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'admin/news' ? 'active' : '' }}"
                               href="/admin/news">
                                <i class="far fa-newspaper"></i>
                                News
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="/">
                                <i class="fas fa-globe"></i>
                                Back to main site
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link" style="color: #f30" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i> Sign out</a>
                        </li>
                        <form id="logout-form" method="POST" action="/logout">
                            {{ csrf_field() }}
                            <input type="hidden" name="logout" id="logout" class="form-control">
                        </form>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-12 col-md-10 ml-sm-auto pt-3 px-4">
               @yield('admin-main')
            </main>
        </div>
    </div>
@endsection

@section('footer')
@endsection

@section('customScripts')
    <script>
        var sidebarToggler = document.getElementById('sidebar-toggler');
        var sidebar = document.getElementById('sidebar');

        sidebarToggler.addEventListener('click', function () {

            this.classList.toggle('active');

            if (this.classList.value.indexOf('active') !== -1) /* == hasClass('active') */ {
                sidebar.style.width = 5 / 12 * 100 + '%';
            } else {
                sidebar.style.width = '0';
            }

        });

    </script>

    @yield('adminScripts')
@endsection

