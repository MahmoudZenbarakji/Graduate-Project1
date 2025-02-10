@extends('layouts.master')

@section('title', 'Job Details')


@section('addon_css')

@endsection

@section('content')
    <!--wrapper start-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->

        <!--== End Header Wrapper ==-->

        <main class="main-content">
            <!--== Start Page Header Area Wrapper ==-->
            <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-header-content">
                                <h2 class="title">Job Details</h2>
                                <nav class="breadcrumb-area">
                                    <ul class="breadcrumb justify-content-center">
                                        <li><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-sep">//</li>
                                        <li>Job Details</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Job Details Area Wrapper ==-->
            <section class="job-details-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="job-details-wrap">
                                <div class="job-details-info">
                                    <div class="thumb">
                                        <img src="{{ $job->company->image->getUrl() }}" width="130" height="130"
                                            alt="Image-HasTech">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{ $job->title }}</h4>
                                        <h5 class="sub-title">{{ $job->companyName }}</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i>{{ $job->city_name }}, {{ $job->country_name }}</li>
                                            <li><i class="icofont-email"></i> {{ $job->user_email }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-details-price">
                                    <h4 class="title">{{ $job->salary_range }}</h4>
                                    <button type="button" class="btn-theme">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="job-details-item">
                                <div class="content">
                                    <h4 class="title">Description</h4>
                                    <p class="desc">{{ $job->description }}</p>

                                </div>
                                <div class="content">
                                    <h4 class="title">Responsibilities</h4>
                                    <p class="desc">{{ $job->responsibility }}</p>
                                </div>
                                <div class="content">
                                    <h4 class="title">Requirements</h4>
                                    <p class="desc">{{ $job->requirement }}</p>
                                </div>
                                <div class="content">
                                    <h4 class="title">Benefits</h4>
                                    <p class="desc">{{ $job->benefits }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="job-sidebar">
                                <div class="widget-item">
                                    <div class="widget-title">
                                        <h3 class="title">Summery</h3>
                                    </div>
                                    <div class="summery-info">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="table-name">Job Type</td>
                                                    <td class="dotted">:</td>
                                                    <td data-text-color="#03a84e">{{ $job->job_type_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Category</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $job->category_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Posted</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $job->created_at->format('Y-m-d')}}</td>
                                                </tr>

                                                <tr>
                                                    <td class="table-name">Salary</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $job->salary_range }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Experience</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $job->experiences_year }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Skills</td>
                                                    <td class="dotted">:</td>
                                                    <td>@foreach ($job->skills as $key => $skill)
                                                        {{ $skill->name }}@if ($key != count($job->skills) - 1)
                                                            ,
                                                        @endif
                                                    @endforeach</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Applied</td>
                                                    <td class="dotted">:</td>
                                                    <td>26 Applicant</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Application End</td>
                                                    <td class="dotted">:</td>
                                                    <td data-text-color="#ff6000">{{ $job->closed_date }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="widget-item">
                                    <div class="widget-title">
                                        <h3 class="title">Share With</h3>
                                    </div>
                                    <div class="social-icons">
                                        <a href="https://www.facebook.com" target="_blank" rel="noopener"><i
                                                class="icofont-facebook"></i></a>

                                        <a href="https://www.skype.com" target="_blank" rel="noopener"><i
                                                class="icofont-skype"></i></a>
                                        <a href="https://www.pinterest.com" target="_blank" rel="noopener"><i
                                                class="icofont-whatsapp"></i></a>
                                        <a href="https://dribbble.com/" target="_blank" rel="noopener"><i
                                                class="icofont-instagram"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Job Details Area Wrapper ==-->
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
