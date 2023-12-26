<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto col-md-3">
            <a href="/"><img src="{{ asset('assets/images/logo/scplogo.jpg')}}" alt="" class="img-fluid"></a>
        </div>
        <div class="header-middle col-md-6 text-center">
            <p>Dedicated Educational Service Provider for <br />Registered Schools and Educational Institutionals</p>
        </div>
        <div class="col-md-3">
            
            <a href="{{route('authenticate.login')}}" class="btn scrollto light-btn-bordr">Sign In</a>
            <a class="nav-link scrollto dip-btn-bordr" href="{{route('authenticate.createSchoolAccount')}}">Create Account</a>
        </div>

    </div>
</header><!-- End Header -->
<!--<div id="header-middle">
    <div class="container text-md-left">
        <p>Dedicated Educational Service Provider for Registered Schools and Educational Institutionals</p>
    </div>
</div>-->
<div style="clear: both"></div>
<div id="header-botto-menu">
    <div class="container align-items-center text-center">
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>
                <li><a class="nav-link scrollto" href="#">Services</a></li>
                <li><a class="nav-link scrollto" href="#">Vision & Mission</a></li>
                <li><a class="nav-link scrollto " href="#">Service Plan</a></li>
                <li><a class="nav-link scrollto" href="#">Contact Us</a></li>
                <li><a class="nav-link scrollto" href="{{ route('authenticate.register') }}">User Registration</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</div>