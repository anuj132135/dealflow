<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="keywords"
    content="Bootstrap Admin Template, CRM Dashboard, Admin Panel, Bootstrap 5 Dashboard, Project Management, Analytics Template, Responsive Admin">
  <meta name="description"
    content="NexLink is a modern Bootstrap 5 CRM Admin Dashboard Template designed for managing sales, analytics, projects, and team performance with clean UI, responsive layout, and prebuilt pages.">
  <title>DealFlow</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&amp;display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/libs/flaticon/css/all/all.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/lucide/lucide.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/simplebar.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/node-waves/waves.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
</head>

<body>
  <div class="page-layout">
    <div class="error fixed-top">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> {{$error}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endforeach
      @elseif(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @elseif(session('loggedoutSuccess'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{session('loggedoutSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    </div>

    <div class="auth-frame-wrapper">
      <div class="row g-0 h-100">
        <div class="col-xl-8 col-lg-7 col-md-6">
          <div class="auth-frame" style="background-image: url('assets/images/wind.gif')"></div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 align-self-center">
          <div class="p-4 p-sm-5 maxw-450px m-auto">
            <div class="mb-4 text-center">
              <a href="http://../index.html" aria-label="NexLink logo">
                <img class="visible-light" src="{{ asset('assets/images/logo.png') }}" alt="logo" width="100rem">
              </a>
            </div>
            <div class="text-center mb-5">
              <h5 class="mb-1">Welcome to DealFlow</h5>
              <p>Sign in to access your CRM dashboard.</p>
            </div>
            <form action="{{ route('submit_login') }}" method="POST">
              @csrf
              <div class="mb-4">
                <label class="form-label" for="Email">Email Address:</label>
                <input type="email" class="form-control" id="Email" placeholder="Enter Email" name="email"
                  value="{{ old('email') }}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="Password">Password</label>
                <div class="password-wrapper">
                  <input type="password" class="form-control password-input" id="Password"
                    placeholder="Enter Your Password" name="password" value="{{ old('password') }}">
                  <span class="show_password">
                    <svg viewBox="0 0 24 24" fill="none" height="1rem" xmlns="http://www.w3.org/2000/svg">
                      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                      <g id="SVGRepo_iconCarrier">
                        <path
                          d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                          stroke="#7a7a7a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                          d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                          stroke="#7a7a7a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                      </g>
                    </svg>
                  </span>
                </div>
              </div>
              <div class="mb-3">
                <button type="submit" value="Submit"
                  class="btn btn-primary waves-effect waves-light w-100">Login</button>
              </div>
              {{-- <p class="mb-5 text-center">Don't have an account? <a href="{{ route('register') }}">Register here</a>
              </p> --}}
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
  <script src="{{ asset('assets/js/appSettings.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
  <script>
    // show password >>>>>>

document.querySelector(".show_password").onclick = () =>{
  const togglebtn1 = document.querySelector("#Password");
   if(togglebtn1.type === "password"){
     togglebtn1.type = "text";
    }else{
    togglebtn1.type = "password";
    
   }
}
  </script>
</body>

</html>