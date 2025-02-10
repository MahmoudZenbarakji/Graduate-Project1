@extends('layouts.master')

@section('title', 'Companies')


@section('content')
    <header>
        <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-12">
                        <div class="page-header-content">
                            <h2 class="title">Employers Details</h2>
                            <nav class="breadcrumb-area">
                                <ul class="breadcrumb justify-content-center">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-sep">//</li>
                                    <li>Employers</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container mt-4">
        <div class="row gy-4">
            <!-- Company 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="company-card d-flex border rounded">
                    <div class="company-left p-3 bg-light">
                        <div class="company-logo mb-3">
                            <img src="assets/img/companies/company1.jpg" alt="Company Logo" class="img-fluid rounded-circle"
                                style="width: 60px; height: 60px;">
                        </div>
                        <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                        <p class="company-address mb-1">123 Tech Lane</p>
                        <p class="company-country">
                            <i class="fas fa-map-marker-alt text-danger"></i> San Francisco, USA
                        </p>
                    </div>
                    <div class="company-right p-3">
                        <h2 class="company-title">Tech Solutions Inc.</h2>
                        <!-- Categories as a list -->
                        <ul class="list-unstyled ">
                            <li class="category">1-Web Development</li>
                            <li class="category">2-Mobile Apps</li>
                            <li class="category">3-Cloud Computing</li>
                        </ul>
                        <div class="company-actions mt-3">
                            <a href="company-details.html" class="btn-theme btn-white btn btn-sm btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="company-card d-flex border rounded">
                    <div class="company-left p-3 bg-light ">
                        <div class="company-logo mb-3">
                            <img src="assets/img/companies/company2.jpg" alt="Company Logo" class="img-fluid rounded-circle"
                                style="width: 60px; height: 60px;">
                        </div>
                        <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                        <p class="company-address mb-1">456 Creative Blvd</p>
                        <p class="company-country">
                            <i class="fas fa-map-marker-alt text-danger"></i> New York, USA
                        </p>
                    </div>
                    <div class="company-right p-3">
                        <h2 class="company-title">Creative Minds</h2>
                        <!-- Categories as a list -->
                        <ul class="list-unstyled ">
                            <li class="category">1-Branding</li>
                            <li class="category">2-Marketing</li>
                            <li class="category">3-Design</li>
                        </ul>
                        <div class="company-actions mt-3">
                            <a href="company-details.html" class="btn-theme btn-white btn btn-sm btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="company-card d-flex border rounded">
                    <div class="company-left p-3 bg-light ">
                        <div class="company-logo mb-3">
                            <img src="assets/img/companies/company3.jpg" alt="Company Logo" class="img-fluid rounded-circle"
                                style="width: 60px; height: 60px;">
                        </div>
                        <div class="content">
                
                
                <div class="rating-box">
                  <i class="icofont-star" ></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
              </div>
                        <p class="company-address mb-1">789 Innovate St</p>
                        <p class="company-country">
                            <i class="fas fa-map-marker-alt" style="color:white" ></i> London, UK
                        </p>
                    </div>
                    <div class="company-right p-3">
                        <h2 class="company-title">Global Innovators</h2>
                        <!-- Categories as a list -->
                        <ul class="list-unstyled ">
                            <li class="category">1-AI</li>
                            <li class="category">2-Blockchain</li>
                            <li class="category">3-IoT</li>
                        </ul>
                        <div class="company-actions mt-3">
                            <a href="company-details.html" class="btn-theme btn-white btn btn-sm ">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <!-- Include Bootstrap JS -->
@endsection

@section('addon_js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
@endsection
