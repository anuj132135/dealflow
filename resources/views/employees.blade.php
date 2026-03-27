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

    {{-- Employees --}}
    <main class="p-10 dashboard">
      <p class="p-2"><a href="{{route('dashboard')}}">Home</a> > Employees</p>
      <button type="button" class="text-primary my-4 mx-2" data-bs-toggle="modal"
        data-bs-target="#exampleModalCenteredScrollableadd">
        Add Employee
      </button>
      <div class="modal fade" id="exampleModalCenteredScrollableadd" tabindex="-1"
        aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Add Employee
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('addemployee')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="name">Name
                      :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="email">Email
                      :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="mobile">Moble No
                      :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="tel" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}">
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="image">Image
                      :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="password">Password
                      :</label>
                  </div>
                  <div class="col-sm-8 relative">
                    <input type="Password" class="form-control password" id="password" name="password"
                      value="{{old('password')}}">
                    <span class="show_password mx-2">
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
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="Cpassword">Confirm Password
                      :</label>
                  </div>
                  <div class="col-sm-8 relative">
                    <input type="Password" class="form-control Cpassword" id="Cpassword" name="password_confirmation"
                      value="{{old('password_confirmation')}}">
                    <span class="show_confirm_password  mx-2">
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
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="designation">Designation
                      :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="designation" name="designation"
                      value="{{old('designation')}}">
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="department">Department
                      :</label>
                  </div>
                  <div class="col-sm-8">
                    <select class="form-select form-control" id="department" name="department">
                      <option value="HR (Human Resource)" {{ old('department')=='HR (Human Resource)' ? 'selected' : ''
                        }}>
                        HR (Human Resource)
                      </option>
                      <option value="Finance" {{ old('department')=='Finance' ? 'selected' : '' }}>
                        Finance
                      </option>
                      <option value="Marketing" {{ old('department')=='Marketing' ? 'selected' : '' }}>
                        Marketing
                      </option>
                      <option value="Sales" {{ old('department')=='Sales' ? 'selected' : '' }}>
                        Sales
                      </option>
                      <option value="IT (Information Technology)" {{ old('department')=='IT (Information Technology)'
                        ? 'selected' : '' }}>
                        IT (Information Technology)
                      </option>
                      <option value="Customer Support" {{ old('department')=='Customer Support' ? 'selected' : '' }}>
                        Customer Support
                      </option>
                    </select>
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-sm-4 text-sm-end">
                    <label class="col-form-label" for="status">Status
                      :</label>
                  </div>
                  <div class="col-sm-8">
                    <select class="form-select form-control" id="status" name="status">
                      <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>
                        Active
                      </option>
                      <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>
                        Inactive
                      </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect waves-light"
                  data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Add
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        @forelse ($employees as $employee )
        <div class="col-xxl-3 col-lg-4 col-md-6">
          <div class="card bg-{{($employee->status == 'active') ? 'success' : 'danger'}}-subtle border-0">
            <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
              <span
                class="badge bg-{{($employee->status == 'active') ? 'success' : 'danger'}}-subtle text-{{($employee->status == 'active') ? 'success' : 'danger'}}">{{$employee->status}}</span>
              <div class="clearfix">
                <div class="btn-group">
                  <button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button"
                    data-bs-toggle="dropdown">
                    <svg fill="" height="1rem" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph"
                      version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                      <g id="SVGRepo_iconCarrier">
                        <path d="M13,16c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,14.346,13,16z" id="XMLID_294_">
                        </path>
                        <path d="M13,26c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,24.346,13,26z" id="XMLID_295_">
                        </path>
                        <path d="M13,6c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,4.346,13,6z" id="XMLID_297_">
                        </path>
                      </g>
                    </svg>
                  </button>

                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenteredScrollableupdate{{$employee->id}}">
                        Edit
                      </button>
                    </li>
                    <li>
                      <form action="{{ route('deleteEmployee', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item"
                          onclick="return confirm('Are you sure you want to delete this employee? This action cannot be undone.')">
                          Delete
                        </button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body p-2 pt-0">
              <div class="text-center mb-3">
                @php
                  $colors = ['warning', 'primary', 'danger', 'secondary', 'info', 'success', 'dark'];
                  $color =  $colors[array_rand($colors)];
                @endphp
                <div class="avatar avatar-xxl rounded-4 mx-auto mb-3 bg-{{$color}}-subtle text-{{$color}} border">
                  @if(!empty($employee->image))
                  <img src="{{asset('storage/'.$employee->image)}}" alt="Image">
                  @else
                  {{ strtoupper(mb_substr($employee->name, 0, 1)) }}
                  @endif
                    
                </div>
                <h5 class="mb-0 fw-bold">{{$employee->name}}</h5>
                <p class="text-primary mb-0">{{$employee->designation}}</p>
              </div>
              <div class="p-3 bg-body rounded" style="min-height: 12rem">
                <div class="d-flex gap-3">
                  <div class="w-50">
                    <span class="text-1xs">Department</span>
                    <h6 class="mb-0">{{$employee->department}}</h6>
                  </div>
                  <div class="w-50">
                    <span class="text-1xs">Hired Date</span>
                    <h6 class="mb-0">{{$employee->created_at->format('d-m-Y')}}</h6>
                  </div>
                </div>
                <hr class="border-dashed">
                <div class="d-grid gap-2">
                  <span>
                    <i class="fi fi-rr-envelope me-2 text-primary"></i>{{$employee->email}}
                  </span>
                  <span>
                    <i class="fi fi-rr-phone-call me-2 text-primary"></i>{{$employee->mobile}}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModalCenteredScrollableupdate{{$employee->id}}" tabindex="-1"
          aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Edit Employee
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{route('updateEmployee', $employee->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="name">Name
                        :</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name" name="name"
                        value="{{old('name', $employee->name)}}">
                    </div>
                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="email">Email
                        :</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="email" name="email"
                        value="{{old('email', $employee->email ?? '')}}">
                    </div>
                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="mobile">Moble No
                        :</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="tel" class="form-control" id="mobile" name="mobile"
                        value="{{old('mobile', $employee->mobile ?? '')}}">
                    </div>
                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="image">Image
                        :</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                    </div>
                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="password">Password
                        :</label>
                    </div>
                    <div class="col-sm-8 relative">
                      <input type="Password" class="form-control password" id="password" name="password"
                        value="{{old('password')}}">
                    </div>
                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="Cpassword">Confirm Password
                        :</label>
                    </div>
                    <div class="col-sm-8 relative">
                      <input type="Password" class="form-control Cpassword" id="Cpassword" name="password_confirmation"
                        value="{{old('password_confirmation')}}">
                    </div>
                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="designation">Designation
                        :</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="designation" name="designation"
                        value="{{old('designation', $employee->designation ?? '')}}">
                    </div>
                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="department">Department
                        :</label>
                    </div>
                    <div class="col-sm-8">
                      <select class="form-select form-control" id="department" name="department">
                        <option value="HR (Human Resource)" {{ old('department', $employee->department ??
                          '')=='HR (Human Resource)'
                          ? 'selected' : '' }}>
                          HR (Human Resource)
                        </option>
                        <option value="Finance" {{ old('department', $employee->department ??
                          '')=='Finance' ? 'selected' : '' }}>
                          Finance
                        </option>
                        <option value="Marketing" {{ old('department', $employee->department ??
                          '')=='Marketing' ? 'selected' : '' }}>
                          Marketing
                        </option>
                        <option value="Sales" {{ old('department', $employee->department ?? '')=='Sales' ?
                          'selected' : '' }}>
                          Sales
                        </option>
                        <option value="IT (Information Technology)" {{ old('department', $employee->
                          department ?? '')=='IT (Information Technology)' ? 'selected' : '' }}>
                          IT (Information Technology)
                        </option>
                        <option value="Customer Support" {{ old('department', $employee->department ??
                          '')=='Customer Support'
                          ? 'selected' : '' }}>
                          Customer Support
                        </option>
                      </select>
                    </div>

                  </div>
                  <div class="row align-items-center mb-3">
                    <div class="col-sm-4 text-sm-end">
                      <label class="col-form-label" for="status">Status
                        :</label>
                    </div>
                    <div class="col-sm-8">
                      <select class="form-select form-control" id="status" name="status">
                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>
                          Active
                        </option>
                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>
                          Inactive
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light waves-effect waves-light"
                    data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary waves-effect waves-light">Add
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @empty
        <div>
          <div colspan="9" class="text-center text-muted py-4">
            No Employee found.
          </div>
        </div>
        @endforelse

      </div>
      <div class="p-3">
        {{$employees->links()}}
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
<script>
  document.querySelector(".show_password").onclick = () =>{
  const togglebtn1 = document.querySelector(".password");
   if(togglebtn1.type === "password"){
     togglebtn1.type = "text";
    }else{
    togglebtn1.type = "password";
    
   }
}
document.querySelector(".show_confirm_password").onclick = () =>{
  const togglebtn2 = document.querySelector(".Cpassword");
   if(togglebtn2.type === "password"){
     togglebtn2.type = "text";
    }else{
    togglebtn2.type = "password";
    
   }
}
</script>

</html>