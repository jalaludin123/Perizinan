<nav class="header-navbar navbar py-1">
    <div class="container-fluid">
        <button class="btn btn-default" id="btn-slider" type="button">
            <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand me-auto text-danger" href="#">Dash<span class="text-warning">Board</span></a>
        <ul class="nav ms-auto">
            <li class="nav-item dropstart">
                <a class="nav-link text-dark ps-3 pe-1" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('darkpan-1.0.0/img/testimonial-1.jpg') }}" alt="user" class="img-user" />
                </a>
                <div class="dropdown-menu mt-2 pt-0" aria-labelledby="navbarDropdown">
                    <div class="d-flex p-3 border-bottom mb-2">
                        <img src="{{ asset('darkpan-1.0.0/img/testimonial-1.jpg') }}" alt="user"
                            class="img-user me-2" />
                        <div class="d-block">
                            <p class="fw-bold m-0 lh-1">{{ Auth::user()->name }}</p>
                            <small>{{ Auth::user()->email }}</small>
                        </div>
                    </div>
                    <a class="dropdown-item" href="#"> <i class="far fa-user-circle fa-lg me-3"
                            aria-hidden="true"></i>Profile </a>
                    <a class="dropdown-item" href="#"> <i class="fa fa-cog fa-lg me-3"
                            aria-hidden="true"></i>Setting </a>
                    <hr class="dropdown-divider" />
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-lg me-2" aria-hidden="true"></i>LogOut </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
