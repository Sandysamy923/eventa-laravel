<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
  <link rel="stylesheet" href="{{asset('css/sign-up.css')}}">
  <title>Sign-Up</title>
</head>
<body>

@if ($errors->any())
  <div class="alert alert-danger container">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="text-center mb-3">
  <a href="{{route('home')}}">
    <img src="{{asset('images/logos.png')}}" class="logo" alt="Logo">
  </a>
</div>

<form action="{{route('registerpayuser')}}" method="post" class="container">
  @csrf
  
  <div class="divider-text text-uppercase text-muted text-center mb-3">
    <h6>Create Account</h6>
  </div>

  <div class="row g-4">
    
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-label ms-5" for="form3Example1c">Name</label>
        <input type="hidden" name="event_id" value="{{ $event_id }}">
        <input type="text" name="name" value="{{old('name')}}" id="form3Example1c" class="form-control w-75 ms-5" />
        @error('name')
          <p style="color: red">{{$message}}</p>
        @enderror
      </div>

      <div class="form-group mt-3">
        <label class="form-label ms-5" for="form3Example3c">Email</label>
        <input type="email" name="email" value="{{old('email')}}" id="form3Example3c" class="form-control w-75 w-75 ms-5" placeholder="ex:@gmail.com" />
        @error('email')
          <p style="color: red">{{$message}}</p>
        @enderror
      </div>
    </div>

    
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-label ms-5" for="form3Example4c">Password</label>
        <input type="password" name="password" value="{{old('password')}}" id="form3Example4c" class="form-control w-75 ms-5" />
        @error('password')
          <p style="color: red">{{$message}}</p>
        @enderror
      </div>

      <div class="form-group mt-3">
        <label class="form-label ms-5" for="form3Example4cd">Repeat Password</label>
        <input type="password" name="password_confirmation" id="form3Example4cd" class="form-control w-75 ms-5" />
      </div>
    </div>
  </div>

  <div class="form-check d-flex justify-content-center my-4">
    <input class="form-check-input me-2" value="1" {{old('acceptterm') ? 'checked' : ''}} name="acceptterm" type="checkbox" id="form2Example3c" />
    <label class="form-check-label" for="form2Example3">
      I agree to all statements in <a href="#!">Terms of service</a>
    </label>
  </div>
  @error('acceptterm')
    <p class="text-center" style="color: red">{{$message}}</p>
  @enderror

  <button type="submit" class="btn btn-sm-custom">
    Register <i class="fa-solid fa-arrow-right ms-2" id="arrow"></i>
  </button>

  <p class="text-center mt-3">
    Already have an Account?
    <a class="btn btn-secondary" href="{{ route('loginpay', ['event_id' => $event_id]) }}">Log in</a>
  </p>
</form>

</body>
</html>
