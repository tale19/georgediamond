<nav id="navbar" class="navbar navbar-fixed-top navbar-expand-md navbar-light bg-light" style="border-bottom: 1px solid #337ab7">
    <div class="container">
        <a class="navbar-brand mr-auto" href="/"><img src="/storage/images/GeorgeDiamondLogo.png" height="50"/></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav col-8">
                <li class="nav-item">
                    <a class="nav-link @if(request()->path() == '/') active @endif" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->path() == 'about') active @endif" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->path() == 'shows') active @endif" href="/shows">Shows</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    @if(substr(request()->path(), 0, 4) == 'news' ||
                    request()->path() == 'search')active @endif"
                    href="/news">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->path() == 'contact') active @endif"
                       href="/contact">Contact</a>
                </li>
            </ul>
            @auth
            <ul class="navbar-nav col-4">
                <li id="dropdown-main-theme" class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link"
                       data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <span style="font-size: 0.75em;"><i class="fas fa-cog"></i></span>&nbsp;Admin panel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" style="color:#ef0f00">
                                <span style="font-size: 0.75em;"><i class="fas fa-power-off"></i></span>&nbsp;Sign out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>