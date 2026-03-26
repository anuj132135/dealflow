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
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> {{session('error')}}
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

    {{-- Dashboard --}}
    <main class="p-10 dashboard">
      <p class="p-2"><a href="{{route('dashboard')}}">Home</a> > Dashboard</p>
      <div class="row">
        <div class="col-xxl-6 col-lg-8">
          <div class="row">
            {{-- Total Leads --}}
            <div class="col-xxl-6 col-md-6">
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
                  <div class="clearfix">
                    <h6>Total Leads</h6>
                  </div>

                </div>
                <div class="card-body py-0 d-flex align-items-start justify-content-between">
                  <div class="d-flex align-items-center gap-2">
                    <h2 class="mb-0">{{$totalLeads}}</h2>
                  </div>
                </div>
                <div class="card-footer border-0 pt-0 mt-n1">
                  <div class="border-top pb-2"></div>
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0">See More....</p>
                    <a href="{{route('leads')}}" class="btn-link">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                          d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                          fill="var(--bs-primary)" />
                        <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            {{-- Recent Leads --}}
            <div class="col-xxl-6 col-md-6">
              <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
                  <div class="clearfix">
                    <h6>Recent Leads <small class="text-gray-400">(today's)</small></h6>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <div class="d-flex align-items-center gap-2">
                    <h2 class="mb-0">{{$todayLeads}}</h2>

                  </div>
                </div>
                <div class="card-footer border-0 pt-0 mt-n1">
                  <div class="border-top pb-2"></div>
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0">See More....</p>
                    <a href="{{route('leads', 'date=today')}}" class="btn-link">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                          d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                          fill="var(--bs-primary)" />
                        <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            {{-- Active Customers --}}
            <div class="col-xxl-6 col-md-6">
              <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
                  <div class="clearfix">
                    <h6>Active Customers</h6>
                  </div>

                </div>
                <div class="card-body pt-0">
                  <div class="d-flex align-items-center gap-2">
                    <h2 class="mb-0">{{Gate::allows('isAdmin') ? DB::table('customers')->where('status', 'active')->count() : DB::table('customers')->where('status', 'active')->where('assigned_employee', Auth::id())->count()}}</h2>
                    <span class="badge badge-sm bg-success-subtle text-success">{{($totalCustomer > 0) ?
                      (Gate::allows('isAdmin') ? DB::table('customers')->where('status', 'active')->count() : DB::table('customers')->where('status', 'active')->where('assigned_employee', Auth::id())->count()) * 100 : 0}}%</span>

                  </div>
                </div>
                <div class="card-footer border-0 pt-0 mt-n1">
                  <div class="border-top pb-2"></div>
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0">See More....</p>
                    <a href="{{route('customers', 'status=active')}}" class="btn-link">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                          d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                          fill="var(--bs-primary)" />
                        <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            {{-- Won Deals --}}
            <div class="col-xxl-6 col-md-6">
              <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
                  <div class="clearfix">
                    <h6>Won Deals</h6>
                  </div>

                </div>
                <div class="card-body pt-0">
                  <div class="d-flex align-items-center gap-2">
                    <h2 class="mb-0">{{Gate::allows('isAdmin') ? DB::table('sales')->where('payment_status', 'paid')->count() : DB::table('sales')->where('payment_status', 'paid')->where('employee_id', Auth::id())->count()}}</h2>
                    <span class="badge badge-sm bg-success-subtle text-success">{{($totalSale > 0) ?
                      (Gate::allows('isAdmin') ? DB::table('sales')->where('payment_status', 'paid')->count() : DB::table('sales')->where('payment_status', 'paid')->where('employee_id', Auth::id())->count()) * 100 : 0}}%</span>


                  </div>
                </div>
                <div class="card-footer border-0 pt-0 mt-n1">
                  <div class="border-top pb-2"></div>
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0">See More....</p>
                    <a href="{{route('sales', 'status=paid')}}" class="btn-link">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                          d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                          fill="var(--bs-primary)" />
                        <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- Leads Status Overview --}}
        <div class="col-xxl-6 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                  <h6 class="mb-0">Leads Status Overview</h6>
                  <span class="text-2xs">Total Leads <span class="text-primary fw-semibold">{{$totalLeads}}</span>
                  </span>
                </div>
                <div class="d-flex gap-1 align-items-center py-1 mx-1">
                  <svg viewBox="0 0 24 24" fill="none" height="1rem" xmlns="http://www.w3.org/2000/svg"
                    stroke="#4641C2">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.53033 15.5303C6.31583 15.7448 5.99324 15.809 5.71299 15.6929C5.43273 15.5768 5.25 15.3033 5.25 15V6C5.25 5.58579 5.58579 5.25 6 5.25L15 5.25C15.3033 5.25 15.5768 5.43273 15.6929 5.71299C15.809 5.99324 15.7448 6.31583 15.5303 6.53033L6.53033 15.5303Z"
                        fill="#4641C2"></path>
                      <path opacity="0.5"
                        d="M18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2374 18.8232 17.7626 18.8232 17.4697 18.5303L10.5 11.5607L11.5607 10.5L18.5303 17.4697Z"
                        fill="#4641C2"></path>
                    </g>
                  </svg>
                  New
                  <span class="badge badge-sm bg-primary-subtle text-primary">{{($totalLeads > 0) ?
                    (DB::table('leads')->where('status', 'new')->count()/$totalLeads) * 100 : 0}}%</span>

                </div>
                <div class="progress progress-sm" role="progressbar" aria-label="Default striped example"
                  aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progress-bar-striped progress-bar-animated"
                    style="width: {{($totalLeads > 0) ? (DB::table('leads')->where('status', 'new')->count()/$totalLeads) * 100 : 0}}%">
                  </div>
                </div>
                <br>
                <div class="d-flex gap-1 align-items-center py-1 mx-1">
                  <svg viewBox="0 0 24 24" fill="none" height="1rem" xmlns="http://www.w3.org/2000/svg"
                    stroke="#4641C2">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.53033 15.5303C6.31583 15.7448 5.99324 15.809 5.71299 15.6929C5.43273 15.5768 5.25 15.3033 5.25 15V6C5.25 5.58579 5.58579 5.25 6 5.25L15 5.25C15.3033 5.25 15.5768 5.43273 15.6929 5.71299C15.809 5.99324 15.7448 6.31583 15.5303 6.53033L6.53033 15.5303Z"
                        fill="#4641C2"></path>
                      <path opacity="0.5"
                        d="M18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2374 18.8232 17.7626 18.8232 17.4697 18.5303L10.5 11.5607L11.5607 10.5L18.5303 17.4697Z"
                        fill="#4641C2"></path>
                    </g>
                  </svg>
                  Won
                  <span class="badge badge-sm bg-success-subtle text-success">{{($totalLeads > 0) ?
                    (DB::table('leads')->where('status', 'won')->count()/$totalLeads) * 100 : 0}}%</span>

                </div>
                <div class="progress progress-sm" role="progressbar" aria-label="Default striped example"
                  aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progress-bar-striped progress-bar-animated"
                    style="width: {{($totalLeads > 0 ) ? (DB::table('leads')->where('status', 'won')->count()/$totalLeads) * 100 : 0}}%">
                  </div>
                </div>
                <br>
                <div class="d-flex gap-1 align-items-center py-1 mx-1">
                  <svg viewBox="0 0 24 24" fill="none" height="1rem" xmlns="http://www.w3.org/2000/svg"
                    stroke="#4641C2">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.53033 15.5303C6.31583 15.7448 5.99324 15.809 5.71299 15.6929C5.43273 15.5768 5.25 15.3033 5.25 15V6C5.25 5.58579 5.58579 5.25 6 5.25L15 5.25C15.3033 5.25 15.5768 5.43273 15.6929 5.71299C15.809 5.99324 15.7448 6.31583 15.5303 6.53033L6.53033 15.5303Z"
                        fill="#4641C2"></path>
                      <path opacity="0.5"
                        d="M18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2374 18.8232 17.7626 18.8232 17.4697 18.5303L10.5 11.5607L11.5607 10.5L18.5303 17.4697Z"
                        fill="#4641C2"></path>
                    </g>
                  </svg>
                  In progress
                  <span class="badge badge-sm bg-warning-subtle text-warning">{{($totalLeads > 0) ?
                    (DB::table('leads')->where('status', 'in progress')->count()/$totalLeads) * 100 : 0}}%</span>

                </div>
                <div class="progress progress-sm" role="progressbar" aria-label="Default striped example"
                  aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progress-bar-striped progress-bar-animated"
                    style="width: {{($totalLeads > 0 ) ? (DB::table('leads')->where('status', 'in progress')->count()/$totalLeads) * 100 : 0}}%">
                  </div>
                </div>
                <br>
                <div class="d-flex gap-1 align-items-center py-1 mx-1">
                  <svg viewBox="0 0 24 24" fill="none" height="1rem" xmlns="http://www.w3.org/2000/svg"
                    stroke="#4641C2">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.53033 15.5303C6.31583 15.7448 5.99324 15.809 5.71299 15.6929C5.43273 15.5768 5.25 15.3033 5.25 15V6C5.25 5.58579 5.58579 5.25 6 5.25L15 5.25C15.3033 5.25 15.5768 5.43273 15.6929 5.71299C15.809 5.99324 15.7448 6.31583 15.5303 6.53033L6.53033 15.5303Z"
                        fill="#4641C2"></path>
                      <path opacity="0.5"
                        d="M18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2374 18.8232 17.7626 18.8232 17.4697 18.5303L10.5 11.5607L11.5607 10.5L18.5303 17.4697Z"
                        fill="#4641C2"></path>
                    </g>
                  </svg>
                  Lost
                  <span class="badge badge-sm bg-danger-subtle text-danger">{{($totalLeads > 0) ?
                    (DB::table('leads')->where('status', 'Lost')->count()/$totalLeads) * 100 : 0}}%</span>

                </div>
                <div class="progress progress-sm" role="progressbar" aria-label="Default striped example"
                  aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progress-bar-striped progress-bar-animated"
                    style="width: {{($totalLeads > 0 ) ? (DB::table('leads')->where('status', 'lost')->count()/$totalLeads) * 100 : 0}}%">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <p class="p-2">Follow-ups</p>
      <div class="row">
        {{-- Leads Follow-ups --}}
        <div class="col-xxl-6 col-md-6">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
              <div class="clearfix">
                <h6>Leads Follow ups</h6>
              </div>

            </div>
            <div class="card-body py-0 d-flex align-items-start justify-content-between">
              <div class="d-flex align-items-center gap-2">
                <h2 class="mb-0">{{Gate::allows('isAdmin') ? DB::table('lead_follow_ups')->count() : DB::table('lead_follow_ups')->where('employee_id', Auth::id())->count()}}</h2>

              </div>
              <div id="chartContacts" class="mb-n4 mt-n3"></div>
            </div>
            <div class="card-footer border-0 pt-0 mt-n1">
              <div class="border-top pb-2"></div>
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0">See More....</p>
                <a href="{{route('leadsFollowup')}}" class="btn-link">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                      d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                      fill="var(--bs-primary)" />
                    <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        {{-- Customers Follow-ups --}}
        <div class="col-xxl-6 col-md-6">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
              <div class="clearfix">
                <h6>Customers Folow ups</h6>
              </div>
            </div>
            <div class="card-body py-0 d-flex align-items-start justify-content-between">
              <div class="d-flex align-items-center gap-2">
                <h2 class="mb-0">{{Gate::allows('isAdmin') ? DB::table('customer_follow_ups')->count() : DB::table('customer_follow_ups')->where('employee_id', Auth::id())->count()}}</h2>
              </div>
              <div id="chartContacts" class="mb-n4 mt-n3"></div>
            </div>
            <div class="card-footer border-0 pt-0 mt-n1">
              <div class="border-top pb-2"></div>
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0">See More....</p>
                <a href="{{route('customersFollowup')}}" class="btn-link">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                      d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                      fill="var(--bs-primary)" />
                    <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="p-2">Sales Summary</p>
      <div class="row">
        {{--Total Revenue--}}
        <div class="col-xxl-6 col-md-6">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
              <div class="clearfix">
                <h6>Total Revenue</h6>
              </div>

            </div>
            <div class="card-body py-0 d-flex align-items-start justify-content-between">
              <div class="d-flex align-items-center gap-2">
                <h2 class="mb-0">{{Gate::allows('isAdmin') ? DB::table('sales')->where('deleted_at', null)->whereIn('payment_status',
                  ['paid', 'partial'])->sum('deal_amount') : DB::table('sales')->where('deleted_at', null)->whereIn('payment_status',
                  ['paid', 'partial'])->where('employee_id', Auth::id())->sum('deal_amount')}}</h2>
              </div>
              <div id="chartContacts" class="mb-n4 mt-n3"></div>
            </div>
            <div class="card-footer border-0 pt-0 mt-n1">
              <div class="border-top pb-2"></div>
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0">See More....</p>
                <a href="{{route('sales')}}" class="btn-link">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                      d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                      fill="var(--bs-primary)" />
                    <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        {{--Pending Revenue--}}
        <div class="col-xxl-6 col-md-6">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
              <div class="clearfix">
                <h6>Pending Revenue</h6>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="d-flex align-items-center gap-2">
                <h2 class="mb-0">{{Gate::allows('isAdmin') ? DB::table('sales')->where('deleted_at', null)->where('payment_status',
                  'unpaid')->sum('deal_amount') : DB::table('sales')->where('deleted_at', null)->where('payment_status',
                  'unpaid')->where('employee_id', Auth::id())->sum('deal_amount')}}</h2>
                <span class="badge badge-sm bg-danger-subtle text-danger">{{($totalSale > 0) ?
                  (Gate::allows('isAdmin') ? DB::table('sales')->where('payment_status', 'unpaid')->count()/$totalSale : DB::table('sales')->where('payment_status', 'unpaid')->where('employee_id', Auth::id())->count()/$totalSale) * 100 : 0}}%</span>
              </div>
            </div>
            <div class="card-footer border-0 pt-0">
              <div class="border-top pb-2"></div>
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0">See More....</p>
                <a href="{{route('sales', 'status=unpaid')}}" class="btn-link">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                      d="M3.33301 9.375C2.98783 9.375 2.70801 9.65483 2.70801 10C2.70801 10.3452 2.98783 10.625 3.33301 10.625V9.375ZM3.33301 10.625H16.6663V9.375H3.33301V10.625Z"
                      fill="var(--bs-primary)" />
                    <path d="M11.667 5L16.667 10L11.667 15" stroke="var(--bs-primary)" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
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