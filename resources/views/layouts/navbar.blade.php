<nav class="topnav navbar navbar-light">
    <button
        type="button"
        class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle text-muted pr-0"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img
                        src="./assets/avatars/face-1.jpg"
                        alt="..."
                        class="avatar-img rounded-circle">
                </span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('profiles.edit') }}">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="dropdown-item" value="Logout">
                </form>
            </div>
        </li>
    </ul>
</nav>