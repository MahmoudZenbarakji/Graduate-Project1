@extends('layouts.master')

@section('title', 'Job Seeker Details')


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
                                <h2 class="title">Job Seeker Details</h2>
                                <nav class="breadcrumb-area">
                                    <ul class="breadcrumb justify-content-center">
                                        <li><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-sep">//</li>
                                        <li>Job Seeker Details</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Team Details Area Wrapper ==-->
            <section class="team-details-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="team-details-wrap">
                                <div class="team-details-info">
                                    <div class="thumb">
                                        <img src="{{ $applicant->media->first()?->getUrl() ?: asset('assets/img/team/profile.jpg') }}"
                                            width="130" height="130" alt="{{ $applicant->full_name }}">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{ $applicant->full_name }}</h4>
                                        <h5 class="sub-title">{{ $applicant->cv_title }}</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i>{{ $applicant->city_name }},
                                                {{ $applicant->country_name }}</li>
                                            <li><i class="icofont-email"></i>{{ $applicant->user_email }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-details-btn">
                                    <button type="button" class="btn-theme">Download Resume</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="team-details-item">

                                <div class="candidate-details-wrap">
                                    <h4 class="content-title">Education</h4>
                                    <div class="candidate-details-content">
                                        @foreach ($applicant->educations as $education)
                                            <div class="content-item">
                                                <h4 class="title">
                                                    {{ $education->header }}
                                                    <span>//</span>
                                                    <span>

                                                        {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }}
                                                        -

                                                        {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : 'present' }}
                                                    </span>
                                                </h4>
                                                <h5 class="sub-title">{{ $education->organization }}</h5>
                                                <p class="desc">{{ $education->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="candidate-details-wrap">
                                    <h4 class="content-title">Work & Experience</h4>
                                    <div class="candidate-details-content">
                                        @foreach ($applicant->workExperiences as $workExperience)
                                            <div class="content-item">
                                                <h4 class="title">
                                                    {{ $workExperience->header }}
                                                    <span>//</span>
                                                    <span>

                                                        {{ \Carbon\Carbon::parse($workExperience->start_date)->format('Y') }}
                                                        -

                                                        {{ $workExperience->end_date ? \Carbon\Carbon::parse($workExperience->end_date)->format('Y') : 'present' }}
                                                    </span>
                                                </h4>
                                                <h5 class="sub-title">{{ $workExperience->organization }}</h5>
                                                <p class="desc">{{ $workExperience->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="team-sidebar">
                                <div class="widget-item">
                                    <div class="widget-title">
                                        <h3 class="title">Information</h3>
                                    </div>
                                    <div class="summery-info">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="table-name">Job Type </td>
                                                    <td class="dotted">:</td>
                                                    <td> @foreach ($applicant->job_types as $key => $jobType)
                                                        {{ $jobType->name }}@if ($key != count($applicant->job_types) - 1)
                                                            ,
                                                        @endif
                                                    @endforeach</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Work in </td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $applicant->cv_title }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Offered Salary</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $applicant->salary_range }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="table-name">Experience</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $applicant->experience_year }} Years</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Gender</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $applicant->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Nationality</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $applicant->nationName }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Skills</td>
                                                    <td class="dotted">:</td>
                                                    <td>
                                                        @foreach ($applicant->skills as $key => $skill)
                                                            {{ $skill->name }}@if ($key != count($applicant->skills) - 1)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Level</td>
                                                    <td class="dotted">:</td>
                                                    <td>{{ $applicant->education_level }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-name">Views</td>
                                                    <td class="dotted">:</td>
                                                    <td>8,567</td>
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
            <!--== End Team Details Area Wrapper ==-->
        </main>



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
