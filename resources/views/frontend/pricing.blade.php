@extends('layouts.master')

    @section('title', 'Pricing')

        @section('content')
        <header>
        <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-12">
                        <div class="page-header-content">
                            <h2 class="title">Pricing Details</h2>
                            <nav class="breadcrumb-area">
                                <ul class="breadcrumb justify-content-center">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-sep">//</li>
                                    <li>pricing</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
   <section class="pricing-section">
    <div class="container">
        <h2 class="pricing-header">Choose Your Subscription Plan</h2>
        <p>Find the perfect plan that fits your needs and budget.</p>

        <div class="row justify-content-center">
            <!-- Monthly Plan -->
            <div class="col-md-4 mb-4">
                <div class="pricing-card">
                    <h3>Monthly Plan</h3>
                    <p class="price">$9.99<span class="text-muted">/month</span></p>
                    <p>Great for users who need flexibility.</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Access all job listings</li>
                        <li><i class="fas fa-check-circle"></i> Apply to unlimited jobs</li>
                        <li><i class="fas fa-check-circle"></i> Email notifications</li>
                    </ul>
                    <a href="#" class="btn-subscribe">Subscribe Now</a>
                </div>
            </div>

            <!-- Yearly Plan (Featured) -->
            <div class="col-md-4 mb-4">
                <div class="pricing-card featured">
                    <h3>Yearly Plan</h3>
                    <p class="price">$99.99<span class="text-light">/year</span></p>
                    <p>Best value! Save 20% with yearly billing.</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> All features of Monthly Plan</li>
                        <li><i class="fas fa-check-circle"></i> 2 months free</li>
                        <li><i class="fas fa-check-circle"></i> Priority support</li>
                    </ul>
                    <a href="#" class="btn-subscribe">Subscribe Now</a>
                </div>
            </div>
        </div>
    </div>
        </section>

         @endsection

            @section('addon_js')
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                    <!-- Include Font Awesome JS -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
            @endsection















