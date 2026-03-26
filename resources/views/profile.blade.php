<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('assets/libs/flaticon/css/all/all.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/lucide/lucide.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/simplebar.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/node-waves/waves.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="{{ asset('/assets/css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}">

</head>

<body>
  <div class="error fixed-top">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Alert!</strong> {{session('success')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('deleteSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{session('deleteSuccess')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Alert!</strong> {{$error}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
    @endif
  </div>

  {{-- Sidebar --}}
  <div class="float-left w-1/5">
    @include('components.sidebar')
  </div>
  <div class="float-right w-4/5">
    {{-- Header --}}
    @include('components.header')

    {{-- User Profile --}}
    <main class="p-10 dashboard">
      <p class="p-2"><a href="{{route('dashboard')}}">Home</a> > Profile</p>
      <div class="container-fluid">
        <div class="row">


          <div class="col-lg-4 col-sm-12">
            <div class="row">

              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header pb-0 border-0">
                    <div class="mb-4 border-bottom pb-4 d-flex border-0 justify-content-between align-items-start">
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl rounded-circle position-relative me-3">
                          <img src="{{ !empty(Auth::user()->image) ? asset('storage/'.Auth::user()->image) : asset("assets/images/default_profile_icon.webp") }}" alt="Image">

                          <button type="button"
                            class="avatar avatar-xxs bg-primary rounded-circle text-white position-absolute top-0 mt-n1 me-n1 end-0"
                            data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                            <svg viewBox="0 0 24 24" height="1rem" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                              <g id="SVGRepo_iconCarrier">
                                <path
                                  d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
                                  stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                  d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
                                  stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                              </g>
                            </svg>
                          </button>
                          <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1"
                            aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                            <form action="{{route('changeImage', Auth::user()->id)}}" method="POST"
                              enctype="multipart/form-data">
                              @method('PUT')
                              @csrf
                              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Change Image
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="mb-3">
                                      <input class="form-control" type="file" id="image" name="image"
                                        value="{{old('image')}}" required>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect waves-light"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="submit"
                                      onclick="return confirm('Are you sure you want to change your image?')"
                                      class="btn btn-primary waves-effect waves-light">Save</button>
                                  </div>
                                </div>
                              </div>
                            </form>

                          </div>

                        </div>
                        <div class="clearfix">
                          <h4 class="fw-bold mb-0">{{Auth::user()->name}}</h4>
                          <small class="mb-0">{{Auth::user()->email}}</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">

                    <div class="mb-4 border-bottom pb-4">
                      <div class="mb-3">
                        <h4 class="card-title mb-0">Basic Information</h4>
                      </div>
                      <div class="clearfix">
                        <div class="mb-3">
                          <span class="mb-1">Phone</span>
                          <p class="text-dark fw-semibold mb-0">{{Auth::user()->mobile}}</p>
                        </div>
                        <div class="mb-3">
                          <span class="mb-1">Designation</span>
                          <p class="text-dark fw-semibold mb-0">{{Auth::user()->designation}}</p>
                        </div>
                        <div class="mb-0">
                          <span class="mb-1">Department</span>
                          <p class="text-dark fw-semibold mb-0">{{Auth::user()->department}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card border border-danger bg-danger-subtle border-2">
                  <div class="card-header border-0 pb-0">
                    <h5 class="text-danger fw-bold mb-0">Danger Zone</h5>
                    <small>Critical actions that affect your account.</small>
                  </div>
                  <div class="card-body">
                    <div class="d-flex gap-3 justify-content-between align-items-start mb-4 flex-wrap">
                      <div class="pe-3">
                        <h6 class="text-danger mb-1">Delete Account</h6>
                        <p class="mb-0 small">This action is <strong>permanent</strong> and cannot be undone. Please
                          make sure you really want to delete your account.</p>
                      </div>
                      <form action="{{ route('deleteEmployee', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger waves-effect waves-light"
                          onclick="return confirm('Are you sure you want to delete your account? This action is permanent and cannot be undone.')">Delete
                          Account</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8 col-sm-12">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Change Information</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('updateProflie', Auth::user()->id)}}" method="POST">
                      @method('PUT')
                      @csrf
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label class="form-label">Full Name</label>
                          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label class="form-label">Phone</label>
                          <input type="tel" class="form-control" name="mobile" value="{{Auth::user()->mobile}}">
                        </div>
                      </div>
                      <div class="text-end">
                        <button type="submit"
                          onclick="return confirm('Are you sure you want to update your information?')"
                          class="btn btn-success waves-effect waves-light">Update</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-header">
                    <button type="submit" class="card-title">Change Password</button>
                  </div>
                  <div class="card-body">
                    <form action="{{route('changePassword', Auth::user()->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" value="{{old('pass')}}">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Confirm Password</label>
                          <input type="password" class="form-control" name="password_confirmation"
                            value="{{old('pass')}}">
                        </div>
                      </div>
                      <div class="text-end">
                        <button type="submit"
                          onclick="return confirm('Please confirm that you want to proceed with changing your password.')"
                          class="btn btn-success waves-effect waves-light">Change</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </main>
    {{-- Footer --}}
    @include('components.footer')
  </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<script src="{{ asset('assets/js/header.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>


</html>