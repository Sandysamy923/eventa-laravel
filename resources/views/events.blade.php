<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EVENTA</title>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/templatemo-villa-agency.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  
</head>

<body>
  <div class="content-wrapper">

    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>

    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="info">
              <li><i class="fa fa-envelope"></i> info@EVENTA.com</li>
              <li><i class="fa fa-map"></i> Maadi, Cairo, Egypt</li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-4">
            <ul class="social-links">
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <a href="{{ route('home') }}" class="logo"><h1>EVENTA</h1></a>
              <ul class="nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('events') }}" class="active">Events</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('loginadmin') }}"><i class="fa fa-user"></i> As an Admin</a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-user"></i> Sign Up</a></li>
              </ul>
              <a class='menu-trigger'><span>Menu</span></a>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <span class="breadcrumb"><a href="#">Home</a> / EVENTS</span>
            <h3>EVENTS</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="section properties">
      <div class="container">
        <ul class="properties-filter">
          <li><a class="is_active" href="#!" data-filter="*">Show All</a></li>
          <li><a href="#!" data-filter=".adv">Concert</a></li>
          <li><a href="#!" data-filter=".str">Stand-up comedy</a></li>
          <li><a href="#!" data-filter=".rac">Theater</a></li>
        </ul>

        <div class="row properties-box">
          @foreach($events as $event)
            <div class="col-lg-4 col-md-6">
              <div class="item">
                @if($event->image)
                  <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="width: 100%; height: 170px; object-fit: cover;">
                @endif
                <h6>{{ $event->event_price }} EGP</h6>
                <h4>{{ $event->title }}</h4>
                <p>{{ $event->description }}</p>
                <p>{{ $event->event_date }}</p>
                <div class="main-button">
                  <a href="{{ route('registerpay', ['event_id' => $event->id]) }}">Book</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        
      </div>
    </div>

  </div>

 

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/isotope.min.js') }}"></script>
  <script src="{{ asset('js/owl-carousel.js') }}"></script>
  <script src="{{ asset('js/counter.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
