@extends('layouts.master')

@section('title', 'Job Seekers')


@section('addon_css')

@endsection

@section('content')


    <!--wrapper start-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->

        <!--== End Header Wrapper ==-->

        <main class="main-content">
            <!--== Start Page Header Area Wrapper ==-->
            <div class="page-header-area sec-overlay sec-overlay-black"
                data-bg-img="{{ asset('assets/img/photos/bg2.jpg') }}">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-header-content">
                                <h2 class="title">Job Seekers</h2>
                                <nav class="breadcrumb-area">
                                    <ul class="breadcrumb justify-content-center">
                                        <li><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-sep">//</li>
                                        <li>Job Seeker</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Team Area Wrapper ==-->
            <section class="team-area team-inner2-area">
                <div class="container">
                    <div class="row">
                        @foreach ($applicants as $applicant)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <!--== Start Team Item ==-->
                            <div class="team-item">
                                <div class="thumb">
                                    <a href="candidate-details.html">
                                        <img src="{{ $applicant->media->first()?->getUrl() ?: asset('assets/img/team/profile.jpg') }}" width="160" height="160"
                                            alt="Image-HasTech">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="candidate-details.html">{{ $applicant->full_name }}</a></h4>
                                    <h5 class="sub-title">{{ $applicant->cv_title }}</h5>
                                    <div class="rating-box">
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                    </div>
                                    <p class="desc">
                                        @foreach ($applicant->skills as $key => $skill)
                                            {{ $skill->name }}@if ($key != count($applicant->skills) - 1)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                    <a class="btn-theme btn-white btn-sm" href="{{ route('job_seeker' ,[$applicant->id]) }}">View Profile</a>
                                </div>
                                <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech">
                                </div>
                                <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png"
                                        alt="Image-HasTech"></div>
                            </div>
                            <!--== End Team Item ==-->
                        </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-area">
                                <nav>
                                    <ul class="page-numbers d-inline-flex">
                                        <li>
                                            <a class="page-number active" href="candidate.html">1</a>
                                        </li>
                                        <li>
                                            <a class="page-number" href="candidate.html">2</a>
                                        </li>
                                        <li>
                                            <a class="page-number" href="candidate.html">3</a>
                                        </li>
                                        <li>
                                            <a class="page-number next" href="candidate.html">
                                                <i class="icofont-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Team Area Wrapper ==-->
        </main>

        <!--== Start Footer Area Wrapper ==-->

        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>

        <!--== Start Aside Menu ==-->
        <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
                <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i
                        class="icofont-simple-left"></i></button>
            </div>
            <div class="offcanvas-body">
                <!-- Mobile Menu Start -->
                <div class="mobile-menu-items">
                    <ul class="nav-menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Find Jobs</a>
                            <ul class="sub-menu">
                                <li><a href="job.html">Jobs</a></li>
                                <li><a href="job-details.html">Job Details</a></li>
                            </ul>
                        </li>
                        <li><a href="employers-details.html">Employers Details</a></li>
                        <li><a href="#">Candidates</a>
                            <ul class="sub-menu">
                                <li><a href="candidate.html">Candidates</a></li>
                                <li><a href="candidate-details.html">Candidate Details</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About us</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="registration.html">Registration</a></li>
                                <li><a href="page-not-found.html">Page Not Found</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <!-- Mobile Menu End -->
            </div>
        </aside>
        <!--== End Aside Menu ==-->
    </div>

@endsection

@section('addon_js')

@endsection
