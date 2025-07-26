<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>EVENTA Agency</title>

    
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">


    
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-villa-agency.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  </head>

<body>

  
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
                   
                    <a href="{{route('home')}}" class="logo">
                        <h1>EVENTA</h1>
                    </a>
                    
                    <ul class="nav">
                      <li><a href="{{route('home')}}" class="active">Home</a></li>
                      <li><a href="{{route('events')}}">Events</a></li>
                      <li><a href="#about-us">About Us</a></li>
                      <li><a href="{{route('contact')}}">Contact Us</a></li>
                      <li><a href="{{route('loginadmin')}}"><i class="fa fa-user"></i> As an Admin </a></li>
                      <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Sign Up</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    
                </nav>
            </div>
        </div>
    </div>
  </header>
  

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Gouna, <em>Egypt</em></span>
          <h2>Hurry up! Your next event is just a click away.</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">North Coast, <em>Egypt</em></span>
          <h2 >Your ticket to unforgettable nights. Don’t wait!</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Cairo, <em>Egypt</em></span>
          <h2>Your weekend plans? Just one ticket away.</h2>
        </div>
      </div>
    </div>
  </div>

 

  <div class="properties section">
    <div class="container">
      <div class="row">
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
              <a href="{{ route('registerpay',['event_id'=>$event->id]) }}">Book</a>
            </div>
      </div>
    </div>
  @endforeach
</div>

        
</div>
</div>

  
  
  <div class="container bg-light mt-5 pt-5" id="about-us" >
    <div class="row align-items-center">
     
      <div class="col-md-6 section-heading about-text" >
        <h6>| About Us</h6>
        
         <br>
        <div class="content">
          <p>
           The company is aimed at supplying entertainment houses, venue owners, event organizers and planners, with an easy and feasible solution to sell and market their tickets/invitations. The services provided do not end there; also provides consultation and fraud protection as well as spectator entry monitoring and surveillance.

In today's world where technological breakthroughs dominate our lives, it has become important that entertainment houses and event venues adopt such technological innovations in running their businesses.

These technologies lead to quicker, more accurate and obviously easier ways for these entities to reach their audience and vice versa. We sees it as a duty that they provide their clients the most convenient way to find their places in the events they want to attend. We also helps clients find the suitable audience for their events, books the tickets for them, as well as delivers it to the spectators when needed.
          </p>
        </div>
      </div>
     
      <div class="col-md-6 about-img text-center">
        <img src="{{asset('images/aboutus.jpeg')}}" class="img-fluid rounded" alt="about us" />
      </div>
    </div>
  </div>


  <div class="contact section" id="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Agents</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27653.563880431575!2d31.241050732053896!3d29.959436497822075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583809b8f551e3%3A0x6265c5febb8ab4a3!2sMaadi%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1753205024371!5m2!1sen!2seg" width="100%" height="500px" style="border:0;" allowfullscreen="" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>info@event.co<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2025 Event Agency Co., Ltd. All rights reserved. </p>
      </div>
    </div>
  </footer>

  
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/isotope.min.js')}}"></script>
  <script src="{{asset('js/owl-carousel.js')}}"></script>
  <script src="{{asset('js/counter.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  </body>
</html>