@extends('layouts.master')

@section('title', 'Jobs')


@section('addon_css')
@endsection

@section('content')
    <div class="wrapper">



        <main class="main-content">
            <!--== Start Page Header Area Wrapper ==-->
            <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-header-content">
                                <h2 class="title">Job</h2>
                                <nav class="breadcrumb-area">
                                    <ul class="breadcrumb justify-content-center">
                                        <li><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-sep">//</li>
                                        <li>Job</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Page Header Area Wrapper ==-->
   <section class="filtering-data">         
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div >
                    <div class="job-search-form">
                        <form action="#">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Job title or keywords">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected>Choose City</option>
                                            <option>New York</option>
                                            <option>California</option>
                                            <option>Illinois</option>
                                            <option>Texas</option>
                                            <option>Florida</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected>Category</option>
                                            <option>Web Designer</option>
                                            <option>Web Developer</option>
                                            <option>Graphic Designer</option>
                                            <option>App Developer</option>
                                            <option>UI & UX Expert</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected>Salary</option>
                                            <option>50,000</option>
                                            <option>100,000</option>
                                            <option>3,000,000</option>
                                            <option>80,000,000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected>Skills</option>
                                            <option>Web Designer</option>
                                            <option>Web Developer</option>
                                            <option>Graphic Designer</option>
                                            <option>App Developer</option>
                                            <option>UI & UX Expert</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected>Job Type</option>
                                            <option>Full-Time</option>
                                            <option>Part-Time</option>
                                            <option>Freelance</option>
                                            <option>Remote</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success" ><i class="icofont-search-1"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

            <!--== Start Recent Job Area Wrapper ==-->
            <section class="recent-job-area recent-job-inner-area">
                <div class="container">
                    <div class="row">
                        @foreach ($jobs as $key => $job)
                            <div class="col-md-6 col-lg-4">
                                <!--== Start Recent Job Item ==-->
                                <div class="recent-job-item">
                                    <div class="company-info">
                                        <div class="logo">
                                            <a href="company-details.html"><img
                                                    src="{{ $job->company->image->getUrl() }}" width="75"
                                                    height="75" alt="Image-HasTech"></a>
                                        </div>
                                        <div class="content">
                                            <h4 class="name"><a
                                                    href="company-details.html">{{ $job->companyName }}</a></h4>
                                            <p class="address">{{ $job->city_name }}, {{ $job->country_name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="main-content">
                                        <h3 class="title"><a href="job-details.html">{{ $job->title }}</a></h3>
                                        {{-- <h5 class="work-type"></h5> --}}
                                        <h5 class="work-type">{{ $job->category_name }}</h5>
                                        <p class="desc">
                                            @foreach ($job->skills as $key => $skill)
                                                {{ $skill->name }}@if ($key != count($job->skills) - 1)
                                                    ,
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="recent-job-info">
                                        <div class="salary">
                                            <h4>{{ $job->salary_range }}</h4>

                                        </div>
                                        <a class="btn-theme btn-sm" href="{{ route('job' ,[$job->id]) }}">Apply Now</a>
                                    </div>
                                </div>
                                <!--== End Recent Job Item ==-->
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-area">
                                <nav>
                                    <ul class="page-numbers d-inline-flex">
                                        <li>
                                            <a class="page-number active" href="job.html">1</a>
                                        </li>
                                        <li>
                                            <a class="page-number" href="job.html">2</a>
                                        </li>
                                        <li>
                                            <a class="page-number" href="job.html">3</a>
                                        </li>
                                        <li>
                                            <a class="page-number next" href="job.html">
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
        @endsection

        @section('addon_js')
        @endsection
