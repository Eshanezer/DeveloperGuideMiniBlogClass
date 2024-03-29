<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-12 search-form-wrap js-search-form">
                <form method="get" action="#">
                    <input type="text" id="s" class="form-control" placeholder="Search...">
                    <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                </form>
            </div>

            <div class="col-4 site-logo">
                <a href="index.html" class="text-black h2 mb-0">Mini Blog</a>
            </div>

            <div class="col-8 text-right">
                <nav class="site-navigation" role="navigation">
                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @if (auth()->user() != null && auth()->user()->role != 2)
                            @if (auth()->user()->role == 1)
                                <li><a href="{{ route('sytem.users') }}">Users Manage</a></li>

                            @endif
                            <li><a href="{{ route('post.index') }}">Posts Manage</a></li>
                            <li><a href="{{ route('category.index') }}">Category Manage</a></li>
                        @endif
                        @auth
                            <li><a href="#">Hi,{{ auth()->user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @endauth
                        @guest
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endguest
                        <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span
                                    class="icon-search"></span></a></li>
                    </ul>
                </nav>
                <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span
                        class="icon-menu h3"></span></a>
            </div>
        </div>

    </div>
</header>
