<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <div class="logo">
            </div>
            <img width="73" src="images/logo.svg" alt="logo">

        </a>
        <div class="collapse navbar-collapse ml-auto justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-4">
                    <a style="color: white" class="nav-link" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item pe-4">
                    <a style="color: white" class="nav-link" href="{{ route('pcmodel.index') }}">PC Model</a>
                </li>
                <li class="nav-item pe-4">
                    <a style="color: white" class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item pe-4">
                    <a style="color: black; background-color:white;" class="px-4 btn btn-xl nav-link btn-nav"
                        role="button" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a style="color: black; background-color:white;" class="px-4 btn btn-xl nav-link btn-nav"
                        role="button" href="{{ url('/register') }}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
