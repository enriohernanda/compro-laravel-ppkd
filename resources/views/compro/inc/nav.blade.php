<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('home.index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home.index') }}"
                class="nav-item nav-link {{ (isset($active) && $active == 'home') ? 'active' : '' }}">
                Home
                </a>
                <a href="{{ route('about.index') }}"
                class="nav-item nav-link {{ (isset($active) && $active == 'about') ? 'active' : '' }}">
                About
                </a>
                <a href="{{ route('courses.index') }}"
                class="nav-item nav-link {{ (isset($active) && $active == 'courses') ? 'active' : '' }}">
                Courses
                </a>
                <div class="nav-item dropdown">
                    <a href="#"
                    class="nav-link dropdown-toggle {{ (isset($active) && in_array($active, ['team', 'testimonial'])) ? 'active' : '' }}"
                    data-bs-toggle="dropdown">
                        Pages
                    </a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('team.index') }}"
                        class="dropdown-item {{ (isset($active) && $active == 'team') ? 'active' : '' }}">
                        Our Team
                        </a>
                        <a href="{{ route('testimonial.index') }}"
                        class="dropdown-item {{ (isset($active) && $active == 'testimonial') ? 'active' : '' }}">
                        Testimonial
                        </a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="{{ route('contact.index') }}"
                class="nav-item nav-link {{ (isset($active) && $active == 'contact') ? 'active' : '' }}">
                Contact
                </a>
            </div>
            <a href="{{ route('login.index') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
