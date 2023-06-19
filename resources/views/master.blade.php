<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Laughing Stock</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<header class="mb-5">
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <div></div>
            <button
                class="navbar-toggler d-lg-none float-end"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarExample01"
                aria-controls="navbarExample01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 fs-4 text-center mb-lg-0">
                    <li class="nav-item active ">
                        <a class="nav-link text-primary" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item text-light">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li class="nav-item text-light">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                @auth
                    <div class="d-flex justify-content-center">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="{{ route('posts.create') }}">Create Post</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('posts.manage') }}">Manage Posts</a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('categories.create') }}">Create Category</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('categories.manage') }}">Manage Categories</a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <img src="{{ asset('/storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle mx-2" style="max-height: 40px">
                    </div>
                @else
                    <div>
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>



    <!-- Navbar -->

    <!-- Background image -->
    <div class="text-center bg-image"
        style="
          background: url('https://picsum.photos/800/400') center/cover;
          height: 400px;
          margin-top: 58px;
              ">
        <div class="mask"
             style="
                background-color: rgba(0, 0, 0, 0.6);
                height: inherit;
                width: inherit;
                   ">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3" style="font-size: 4rem;">The Laughing Stock</h1>
                    <h4 class="mb-3 text-muted">A Comedy Blog for the Ages</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
</header>

<div class="container-fluid">
    <div class="row content justify-content-center">
        <div class="col-sm-10 text-left">
            <main class="container">
                <div class="row g-5">
                    <div class="col-md-8">
                        @yield('content')
                    </div>

                    <div class="col-md-4">
                        <div class="position-sticky" style="top: 2rem;">
                            <div class="p-4 bg-body-tertiary rounded">
                                <h4 class="fst-italic">About the Blog</h4>
                                <p class="mb-0">
                                    "The Laughing Stock" is a comedy blog site that offers a hilarious and
                                    lighthearted take on current events, pop culture, and everyday life.
                                    From witty satire to funny memes, this blog is dedicated to bringing
                                    a smile to your face and brightening up your day with its clever humor
                                    and comedic commentary. Join the fun and become a part of the Laughing Stock
                                    community today!
                                </p>
                            </div>

                            <div class="p-4 bg-body-tertiary rounded">
                                <h4 class="fst-italic">About the Author</h4>

                                <p class="mb-0">
                                    FunnyGuyChad is a hilarious buddy who loves to joke around. A graduate from
                                    Denver Clown College, and proud owner of a very angry chihuahua, he'll post about
                                    anything and everything. Nothing is off limits!
                                </p>
                            </div>

                            <div class="p-4">
                                <h4 class="fst-italic">Elsewhere</h4>
                                <ol class="list-unstyled">
                                    <li><a href="#">GitHub</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Facebook</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    @yield('footer')
</footer>


</body>
</html>

