<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
    `    <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vat.calculator') }}">
                    <span data-feather="file"></span>
                    Vat Calculator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <span data-feather="file"></span>
                    Profile
                </a>
            </li>
        </ul>`
    </div>
</nav>