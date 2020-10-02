<header>
    <div class="container">
        <div id="navbar">
            <p>Posts</p>
            <nav id="nav">
                <ul id="navigation-links">
                    @auth
                    <li><a href="/posts">Posts</a></li>
                    <li><a href="/posts/create">Create</a></li>
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </nav>
        </div>

        @auth
        <div id="headings">
            <h1>Hello {{ Auth::user()->name }}</h1>
            <a href="/posts/create" class="orange-btn">Create Post</a>
        </div>
        @endauth
    </div>
</header>