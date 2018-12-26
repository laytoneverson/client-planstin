@extends('layouts.app')

@section('header')

    <!-- header start -->
    <header>
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container">
                <a class="navbar-brand" href="#"><img class="head-logo" src="{{asset('images/head-logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Benefits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Payroll</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-red" href="#">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-red" href="#">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- header end -->

@endsection

@section('footer')
    <!--footer started-->
    <footer class="footer">
        <div class="section-lg bg-blue-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h4>Planstin</h4>
                        <p>We are a HR, Payroll and Benefit Administration solution provider for small to large businesses. Because business is our passion, we know how to help and we deliver with real service.</p>
                        <p><a href="">Read More <i class="fa fa-chevron-right"></i></a></p>
                    </div>
                    <div class="col-lg-3">
                        <h4>Online Portals</h4>
                        <ul class="list-unstyled">
                            <li class="media">
                                <div class="icon">
                                    <img src="/images/icons/white/user-tie.png">
                                </div>
                                <div class="media-body text-blue-light">
                                    Exclusive portal for employers to see their services, invoices, payments etc.
                                </div>
                            </li>
                            <li class="media">
                                <div class="icon">
                                    <img src="/images/icons/white/users.png">
                                </div>
                                <div class="media-body text-blue-light">
                                    Exclusive portal for employees to choose and enroll for their benefits.
                                </div>
                            </li>
                            <li class="media">
                                <div class="icon">
                                    <img src="/images/icons/white/user-tie.png">
                                </div>
                                <div class="media-body text-blue-light">
                                    Exclusive portal for Brokers and Affiliates to work with us.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h4>Tags</h4>
                        <div class="tags">
                            <span class="badge">BUSINESS</span>
                            <span class="badge">HEALTH</span>
                            <span class="badge">HR</span>
                            <span class="badge">BROKERS</span>
                            <span class="badge">BENEFITS</span>
                            <span class="badge">PAYROLL</span>
                        </div>
                        <br>
                        <h4>LINKS</h4>
                        <p>
                            <a href="">Employer's Portal</a><br>
                            <a href="">Employee's Portal</a><br>
                            <a href="">Broker's Portal</a><br>
                            <a href="">Open Enrollment</a><br>
                            <a href="">Claims Processing</a>
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <h4>Get In Touch</h4>
                        <div class="links">
                            <div class="d-flex mb-4 align-items-start text-blue-light"><i class="fa fa-fw fa-phone mr-3"></i><span>(888) 920-7526</span></div>
                            <div class="d-flex mb-4 align-items-start text-blue-light"><i class="fa fa-fw fa-envelope mr-3"></i><span>info@planstin.com</span></div>
                            <div class="d-flex mb-4 align-items-start text-blue-light"><i class="fa fa-fw fa-map-marker mr-3"></i><span>283 W Hilton Dr Suite 1<br>St George, UT 84770</span></div>
                        </div>
                        <br>
                        <h4>Business Hours</h4>
                        <p>Monday – Friday: 8 am to 6 pm MST</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray py-3">
            <p class="footer-text text-white no-mgr-bottom">All Rights Reserved 2018 Planstin, Inc.</p>
        </div>
    </footer>
    <!--footer end-->
@endsection

@section('container')
    @yield('content')
@endsection
