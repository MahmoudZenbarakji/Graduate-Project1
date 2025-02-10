@section('addon_css')
@endsection
<section>
    <header class="header-area transparent">
        <div class="container">
            <div class="row no-gutter align-items-center position-relative">
                <div class="col-12">
                    <div class="header-align">
                        <div class="header-align-start">
                            <div class="header-logo-area">
                                <a href="index.html">
                                    <img class="logo-main" src="{{ asset('assets/img/logo-light.png') }}"
                                        alt="Logo" />
                                    <img class="logo-light" src="{{ asset('assets/img/logo-light.png') }}"
                                        alt="Logo" />
                                </a>
                            </div>
                        </div>
                        <div class="header-align-center">
                            <div class="header-navigation-area position-relative">
                                <ul class="main-menu nav">
                                    <li><a href="{{ route('home_page') }}"><span>Home</span></a></li>
                                    <li class="has-submenu"><a href="{{ route('jobs') }}"><span>Jobs</span></a>
                                    </li>
                                    <li><a href="{{ route('companies') }}"><span>Companies</span></a></li>
                                    <li class="has-submenu"><a href="{{ route('job_seekers') }}"><span>Job
                                                Seekers</span></a>
                                    </li>


                                    <li><a href="{{ route('contact') }}"><span>Contact</span></a></li>
                                    <li class="has-submenu"><a href=""><span>Arabic
                                                </span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-align-end">
                            <div class="header-action-area">
                                <a class="btn-registration" href="{{ url('Registration') }}"><span>+</span>
                                    Registration</a>
                                <button class="btn-menu" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                    <i class="icofont-navigation-menu"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</section>
@section('addon_js')
@endsection
