<header class="header">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
                <div class="close-btn"><i class="icon-close"></i></div>
                <div class="row d-flex justify-content-center">
                    @if(Auth::check())
                        <!-- create post form -->
                        @include('frontend.posts.create')
                    @else
                        @include('frontend.auth.login')
                        <!-- register form -->
                        @include('frontend.auth.register')
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <!-- Navbar Brand --><a href="{{ route('frontend_home') }}" class="navbar-brand">TwentyCI Blog</a>
                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <input type="search" placeholder="What are you looking for?">
                                <button type="submit" class="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link show-form" data-form=".create-post-page">Create Post</a>
                        </li>
                        <li class="nav-item"><a href="{{route('frontend_logout')}}" class="nav-link">Logout</a>
                        </li>
                    @else
                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link show-form" data-form=".login-page">Login</a>
                        </li>
                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link show-form" data-form=".register-page">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>