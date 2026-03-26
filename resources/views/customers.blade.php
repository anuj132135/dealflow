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
  <link rel="stylesheet" href="{{ asset('/assets/css/leads.css') }}">
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
    {{-- Customers --}}
    <main class="p-10 leads">
      <p class="p-2"><a href="{{route('dashboard')}}">Home</a> > Customers</p>
      <div class="col-xxl-12">
        <div class="my-5 flex align-items-center">
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-warning p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg viewBox="0 0 16 16" fill="none" height="3rem" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 3.5C8 4.88071 6.88071 6 5.5 6C4.11929 6 3 4.88071 3 3.5C3 2.11929 4.11929 1 5.5 1C6.88071 1 8 2.11929 8 3.5Z" fill="#F5A70D"></path> <path d="M3 8C1.34315 8 0 9.34315 0 11V15H8V8H3Z" fill="#F5A70D"></path> <path d="M13 8H10V15H16V11C16 9.34315 14.6569 8 13 8Z" fill="#F5A70D"></path> <path d="M12 6C13.1046 6 14 5.10457 14 4C14 2.89543 13.1046 2 12 2C10.8954 2 10 2.89543 10 4C10 5.10457 10.8954 6 12 6Z" fill="#F5A70D"></path> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Total Customers</div>
                  <h3 class="mb-0 fw-bold">{{$totalCustomer}}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-success p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg viewBox="0 0 24 24" fill="none" height="3rem" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.9999 15.2547C13.8661 14.4638 12.4872 14 10.9999 14C7.40399 14 4.44136 16.7114 4.04498 20.2013C4.01693 20.4483 4.0029 20.5718 4.05221 20.6911C4.09256 20.7886 4.1799 20.8864 4.2723 20.9375C4.38522 21 4.52346 21 4.79992 21H9.94465M13.9999 19.2857L15.7999 21L19.9999 17M14.9999 7C14.9999 9.20914 13.2091 11 10.9999 11C8.79078 11 6.99992 9.20914 6.99992 7C6.99992 4.79086 8.79078 3 10.9999 3C13.2091 3 14.9999 4.79086 14.9999 7Z" stroke="#009966" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Active</div>
                  <h3 class="mb-0 fw-bold">{{$totalActive}}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-danger p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg viewBox="0 0 24 24" fill="none" height="3rem" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 16L20 21M20 16L15 21M11 14C7.13401 14 4 17.134 4 21H11M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#F83636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Inactive</div>
                  <h3 class="mb-0 fw-bold">{{$totalInactive}}</h3>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-header d-flex flex-wrap gap-3 align-items-center justify-content-between border-0 py-0 my-4">
          <h6 class="card-title mb-0">Customers List</h6>
          <div class="d-flex flex-wrap gap-2">
            <div id="dt_NewCustomers_Search"></div>
            <a href="{{route('customersForm')}}" class="text-light text-decoration-none">
              <button type="button" class="btn btn-sm btn-primary waves-effect">
                <i class="fi fi-rr-plus text-2xs me-1"></i> Add Customer
              </button>
            </a>
          </div>
        </div>

        <form action="{{route('customers')}}" method="GET" class="d-flex align-items-center justify-content-start my-4">
          <div class="btn-group ">
            <button class="btn border dropdown-toggle" type="button" data-bs-toggle="dropdown"
              data-bs-auto-close="outside" aria-expanded="false"
              style="background-color: var(--primary-color); color: var(--secondary-color)">
              Filter
            </button>
            <ul class="dropdown-menu filter">
              <li>Status</li>
              <select name="status" class="dropdown-item">
                <option value="">All</option>
                <option value="active" {{ request('status')=='active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
              </select>
              @if(Gate::allows('isAdmin'))
              <li>Assigned user</li>
              <select name="assigned" class="dropdown-item">
                <option value="">All</option>
                @foreach ($customers->pluck('user.id', 'user.name') as $name => $id)
                <option value="{{ $id }}" {{ request('assigned')==$id ? 'selected' : '' }}>
                  {{ $name }}
                </option>
                @endforeach
              </select>
              @endif

              <button class="btn btn-primary m-2" type="submit">Filter</button>

            </ul>
          </div>
          <div class="messageBox mx-2">
            <input name="search" placeholder="Search..." type="text" id="messageInput" value="{{request('search')}}" />
            <button id="sendButton" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 664 663">
                <path fill="none"
                  d="M646.293 331.888L17.7538 17.6187L155.245 331.888M646.293 331.888L17.753 646.157L155.245 331.888M646.293 331.888L318.735 330.228L155.245 331.888">
                </path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="33.67" stroke="#6c6c6c"
                  d="M646.293 331.888L17.7538 17.6187L155.245 331.888M646.293 331.888L17.753 646.157L155.245 331.888M646.293 331.888L318.735 330.228L155.245 331.888">
                </path>
              </svg>
            </button>
          </div>
        </form>
        
        <div class="card scroll">
          <div class="card-body px-1 pt-2 pb-2  ">
            <table id="dt_NewCustomers" class="table table-sm display table-row-rounded data-row-checkbox">
              <thead class="table-light ">
                <tr>
                  <th class="minw-60px">S. No.</th>
                  <th class="minw-200px">Name</th>
                  <th class="minw-150px">Email</th>
                  <th class="minw-150px">Phone</th>
                  <th class="minw-125px">Customer Since</th>
                  @if(Gate::allows('isAdmin'))
                  <th class="minw-125px">assigned Employee</th>
                  @endif
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($customers as $customer )
                <tr>
                  <td>{{$customers->firstItem() + $loop->index }}</td>
                  <td id="lead_name">
                    <a href={{route('CustomersDetail',['name'=> $customer->name, 'id' =>
                      $customer->id])}}>{{$customer->name}}</a>
                  </td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->phone}}</td>
                  <td>{{$customer->customer_since}}</td>
                  @if(Gate::allows('isAdmin'))
                  <td>{{$customer->user->name}}</td>
                  @endif
                  <td>
                    @switch($customer->status)
                    @case('active')
                    <span class="badge badge-lg bg-success-subtle text-success">{{$customer->status}}</span>
                    @break
                    @case('inactive')
                    <span class="badge badge-lg bg-danger-subtle text-danger">{{$customer->status}}</span>
                    @break
                    @endswitch
                  </td>
                  <td>
                    <div class="btn-group float-end">
                      <button class="btn btn-subtle-primary btn-sm btn-shadow btn-icon waves-effect dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg fill="#4744A7" height="1rem" viewBox="0 0 32 32" enable-background="new 0 0 32 32"
                          id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                          <g id="SVGRepo_iconCarrier">
                            <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z"
                              id="XMLID_287_"></path>
                            <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_">
                            </path>
                            <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z"
                              id="XMLID_291_"></path>
                          </g>
                        </svg>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item"
                            href="{{route('editCustomer', ['name' => $customer->name,'id' => $customer->id])}}">Edit</a>
                        </li>
                        <li>
                          <form action="{{ route('deleteCustomer', $customer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this customer? This action cannot be undone.')">
                              Delete
                            </button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center text-muted py-4">
                    No customers found.
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="p-3">
        {{$customers->links()}}
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