<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
  <link rel="stylesheet" href="{{asset('css/sign-up.css')}}">
  <title>login</title>
</head>
<body>

<div class="text-center mb-3">
  <a href="{{route('home')}}">
    <img src="{{asset('images/logos.png')}}" class="logo" alt="Logo">
  </a>
</div>
<br>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{route('loginuser')}}" method="post">
  @csrf

  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
   
    <a href="{{route('google')}}" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-google"></i> Sign in with Google
    </a>
  </div>

  <div class="divider d-flex align-items-center my-4">
    <p class="text-center fw-bold mx-3 mb-0">Or</p>
  </div>

  <div class="divider-text text-uppercase text-muted text-center mb-3">
    <h6>Login</h6>
  </div>

  <div class="row justify-content-center g-3">
    
    <div class="col-md-5">
      <div class="form-group">
        <label class="form-label" for="form3Example3">Email Address</label>
        <input type="email" name="email" value="{{old('email')}}" id="form3Example3" class="form-control form-control-sm"
               placeholder="Enter a valid email" />
      </div>
    </div>

    
    <div class="col-md-5">
      <div class="form-group">
        <label class="form-label" for="form3Example4">Password</label>
        <input type="password" name="password" value="{{old('password')}}" id="form3Example4" class="form-control form-control-sm"
               placeholder="Enter password" />
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center align-items-center mt-3">
    <div class="form-check mb-0">
      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
      <label class="form-check-label" for="form2Example3">
        Remember me
      </label>
    </div>
  </div>

  <button type="submit" class="btn btn-sm-custom w-100 mt-4 login">
    Log in <i class="fa-solid fa-arrow-right ms-2" id="arrow"></i>
  </button>

</form>

</body>
</html>
