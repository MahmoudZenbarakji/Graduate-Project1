@extends('layouts.master')

@section('title', 'Home Page')



@section('addon_css')

@endsection

@section('content')

    <main class="main-content">



        <!--== Start Hero Area Wrapper ==-->
        <section class="home-slider-area">
            <div class="home-slider-container default-slider-container">
                <div class="home-slider-wrapper slider-default">
                    <div class="slider-content-area" data-bg-img="{{ asset('assets/img/slider/slider-bg.jpg') }}">
                        <div class="container pt--0 pb--0">
                            <div class="slider-container">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-12 col-lg-8">
                                        <div class="slider-content">
                                            <h2 class="title"><span class="counter" data-counterup-delay="80">2,568</span>
                                                job available <br>You can choose your dream job</h2>
                                            <p class="desc">Find great job for build your bright career. Have many job in
                                                this plactform.</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="job-search-wrap">
                                            <div class="job-search-form">
                                                <form action="#">
                                                    <div class="row row-gutter-10">
                                                        <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Job title or keywords">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option value="1" selected>Choose City</option>
                                                                    @foreach ($cities as $city)
                                                                        <option value="2">{{ $city->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option value="1" selected>Category</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="2">{{ $category->name }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                            <div class="form-group">
                                                                <button type="button" class="btn-form-search"><i
                                                                        class="icofont-search-1"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-12">
                        <div class="play-video-btn">
                            <a href="https://www.youtube.com/mcvqOUtcAJg" class="video-popup">
                                <img src="assets/img/icons/play.png" alt="Image-HasTech">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-slider-shape">
                <img class="shape1" data-aos="fade-down" data-aos-duration="1500" src="assets/img/slider/vector1.png"
                    width="270" height="234" alt="Image-HasTech">
                <img class="shape2" data-aos="fade-left" data-aos-duration="2000" src="assets/img/slider/vector2.png"
                    width="201" height="346" alt="Image-HasTech">
                <img class="shape3" data-aos="fade-right" data-aos-duration="2000" src="assets/img/slider/vector3.png"
                    width="276" height="432" alt="Image-HasTech">
                <img class="shape4" data-aos="flip-left" data-aos-duration="1500" src="assets/img/slider/vector4.png"
                    width="127" height="121" alt="Image-HasTech">
            </div>
        </section>
        <!--== End Hero Area Wrapper ==-->

        <!--== Start Job Category Area Wrapper ==-->
        <section class="job-category-area">
            <div class="container" data-aos="fade-down">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3 class="title">Popular Category</h3>
                            <div class="desc">
                                <p>Many desktop publishing packages and web page editors</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-gutter-20">
                    @foreach ($categories as $category)
                        <div class="col-sm-6 col-lg-3">
                            <div class="job-category-item">
                                <div class="content">
                                    <h3 class="title"><a href="job-details.html">{{ $category->name }}
                                            <span>({{ $category->jobs_count }})</span></a>
                                    </h3>
                                </div>
                                <a class="overlay-link" href="job-details.html"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--== End Job Category Area Wrapper ==-->

        <!--== Start Recent Job Area Wrapper ==-->
        <section class="recent-job-area bg-color-gray">
            <div class="container" data-aos="fade-down">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3 class="title">Recent Job Circulars</h3>
                            <div class="desc">
                                <p>Many desktop publishing packages and web page editors</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($latestJobs as $key => $latestJob)
                        <div class="col-md-6 col-lg-4">
                            <!--== Start Recent Job Item ==-->
                            <div class="recent-job-item">
                                <div class="company-info">
                                    <div class="logo">
                                        <a href="company-details.html"><img
                                                src="{{ $latestJob->company->image->getUrl() }}" width="75"
                                                height="75" alt="Image-HasTech"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="name"><a
                                                href="company-details.html">{{ $latestJob->companyName }}</a></h4>
                                        <p class="address">{{ $latestJob->city_name }}, {{ $latestJob->country_name }}</p>
                                    </div>
                                </div>
                                <div class="main-content">
                                    <h3 class="title"><a href="job-details.html">{{ $latestJob->title }}</a></h3>
                                    {{-- <h5 class="work-type"></h5> --}}
                                    <h5 class="work-type">{{ $latestJob->category_name }}</h5>
                                    <p class="desc">
                                        @foreach ($latestJob->skills as $key => $skill)
                                            {{ $skill->name }}@if ($key != count($latestJob->skills) - 1)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                                <div class="recent-job-info">
                                    <div class="salary">
                                        <h4>{{ $latestJob->salary_range }}</h4>

                                    </div>
                                    <a class="btn-theme btn-sm" href="job-details.html">Apply Now</a>
                                </div>
                            </div>
                            <!--== End Recent Job Item ==-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--== End Recent Job Area Wrapper ==-->

        <!--== Start Work Process Area Wrapper ==-->
        <section class="work-process-area">
            <div class="container" data-aos="fade-down">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3 class="title">How It Work?</h3>
                            <div class="desc">
                                <p>Many desktop publishing packages and web page editors</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="working-process-content-wrap">
                            <div class="working-col">
                                <!--== Start Work Process ==-->
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w1.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w1-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Create an Account</h4>
                                        <p class="desc">It is long established fact reader distracted readable content
                                        </p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <!--== End Work Process ==-->
                            </div>
                            <div class="working-col">
                                <!--== Start Work Process ==-->
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w2.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w2-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">CV/Resume</h4>
                                        <p class="desc">It is long established fact reader distracted readable content
                                        </p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <!--== End Work Process ==-->
                            </div>
                            <div class="working-col">
                                <!--== Start Work Process ==-->
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w3.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w3-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Find Your Job</h4>
                                        <p class="desc">It is long established fact reader distracted readable content
                                        </p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <!--== End Work Process ==-->
                            </div>
                            <div class="working-col">
                                <!--== Start Work Process ==-->
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w4.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w4-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Save & Apply</h4>
                                        <p class="desc">It is long established fact reader distracted readable content
                                        </p>
                                    </div>
                                    <div class="shape-arrow-icon d-none">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <!--== End Work Process ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Work Process Area Wrapper ==-->

        <!--== Start Divider Area Wrapper ==-->
        <section class="sec-overlay sec-overlay-theme bg-img" data-bg-img="assets/img/photos/bg1.jpg">
            <div class="container pt--0 pb--0">
                <div class="row justify-content-center divider-style1">
                    <div class="col-lg-10 col-xl-7">
                        <div class="divider-content text-center">
                            <h4 class="sub-title" data-aos="fade-down">Trial Version Available</h4>
                            <h2 class="title" data-aos="fade-down">Download Our Mobile App. <br>You Can Ready Resume &
                                Apply
                                Job.</h2>
                            <div class="divider-btn-group">



                                <a class="btn-divider" data-aos="fade-down" href="page-not-found.html">
                                    <img src="assets/img/photos/google-play.png" width="201" height="63"
                                        class="icon" alt="Image-HasTech">
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-layer-style1"></div>
            <div class="bg-layer-style2"></div>
        </section>
        <!--== End Divider Area Wrapper ==-->

        <!--== Start Team Area Wrapper ==-->
        @yield('candidates')
        <!--== End Team Area Wrapper ==-->

        <!--== Start Brand Logo Area Wrapper ==-->
        <div class="brand-logo-area">
            <div class="container pt--0 pb--0" data-aos="fade-down">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-logo-content">
                            <div class="swiper brand-logo-slider-container">
                                <div class="swiper-wrapper">
                                    @foreach ($companies as $company)
                                        <div class="swiper-slide">
                                            <!--== Start Brand Logo Item ==-->
                                            <div class="brand-logo-item">
                                                <img src="{{ $company->image->getUrl() }}" alt="Image-HasTech">
                                            </div>
                                            <!--== End Brand Logo Item ==-->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--== Add Swiper Arrows ==-->
                            <div class="swiper-btn-wrap">
                                <div class="brand-swiper-btn-prev">
                                    <i class="icofont-long-arrow-left"></i>
                                </div>
                                <div class="brand-swiper-btn-next">
                                    <i class="icofont-long-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Brand Logo Area Wrapper ==-->



    </main>

@section('addon_js')

@endsection

@endsection
