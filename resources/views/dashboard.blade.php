<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EVENTA Agency</title>

   
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">


 
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-villa-agency.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>
  
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">
                        <h1>EVENTA</h1>
                    </a>
                    
                    <ul class="nav">
                      <li><a href="{{route('dashboard')}}" class="active">Profile</a></li>
                      <li><a href="{{route('home')}}" >Home</a></li>
                      <li><a href="{{route('events')}}">Events</a></li>
                      <li><a href="{{route('contact')}}">Contact Us</a></li>
                      
                      <li>
                           <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                           <button type="submit" class="btn btn-custom">
                             <i class="fa fa-user"></i> Log Out
                           </button>
                          </form>
                     </li>

                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                   
                </nav>
            </div>
        </div>
    </div>
  </header>
    
  <div class="container mt-5">
    <h2 class="text-center text-dark mb-4">Your Events</h2>
    <h4>Welcome, {{ Auth::user()->name }} !</h4>
    <br>

    @forelse($bookings as $booking)
    <div class="event-card row align-items-center">
      <div class="col-md-8">
        <h4> {{ $booking->event->title }}</h4>
        <br>
        <p> <strong>{{ $booking->event->description }}</strong></p>
        <p> <strong>Price: </strong>{{ $booking->event->event_price }} EGP</p>
        <p><strong>Date:</strong> {{ $booking->event->event_date }}</p>
    <p><strong>Location:</strong> {{ $booking->event->location }}</p>
  </div>
@empty
    <p>You haven't booked any events yet.</p>
@endforelse
      </div>
     

    </div>

  
    
    
</div>
</body>
</html>

