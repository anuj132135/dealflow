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
    @if(session('deleteSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{session('deleteSuccess')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{session('success')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>
  {{-- Sidebar --}}
  <div class="float-left w-1/5">
    @include('components.sidebar')
  </div>
  <div class="float-right w-4/5">
    {{-- Header --}}
    @include('components.header')
    {{-- Sales --}}
    <main class="p-10 leads">
      <p class="p-2"><a href="{{route('dashboard')}}">Home</a> > Sales</p>
      <div class="col-xxl-12">
        <div class="my-5 flex align-items-center">
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-primary p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg fill="#635FD9" viewBox="0 0 1024 1024" height="3rem" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M136.948 908.811c5.657 0 10.24-4.583 10.24-10.24V610.755c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v287.816c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V610.755c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v287.816c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.96c5.657 0 10.24-4.583 10.24-10.24V551.322c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v347.249c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V551.322c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v347.249c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.342c5.657 0 10.24-4.583 10.24-10.24V492.497c0-5.651-4.588-10.24-10.24-10.24h-81.92c-5.652 0-10.24 4.589-10.24 10.24v406.692c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V492.497c0-28.271 22.924-51.2 51.2-51.2h81.92c28.276 0 51.2 22.929 51.2 51.2v406.692c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.958c5.657 0 10.24-4.583 10.24-10.24V441.299c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v457.892c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V441.299c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v457.892c0 28.278-22.922 51.2-51.2 51.2zm-6.205-841.902C677.379 271.088 355.268 367.011 19.245 387.336c-11.29.683-19.889 10.389-19.206 21.679s10.389 19.889 21.679 19.206c342.256-20.702 670.39-118.419 964.372-284.046 9.854-5.552 13.342-18.041 7.79-27.896s-18.041-13.342-27.896-7.79z"></path><path d="M901.21 112.64l102.39.154c11.311.017 20.494-9.138 20.511-20.449s-9.138-20.494-20.449-20.511l-102.39-.154c-11.311-.017-20.494 9.138-20.511 20.449s9.138 20.494 20.449 20.511z"></path><path d="M983.151 92.251l-.307 101.827c-.034 11.311 9.107 20.508 20.418 20.542s20.508-9.107 20.542-20.418l.307-101.827c.034-11.311-9.107-20.508-20.418-20.542s-20.508 9.107-20.542 20.418z"></path></g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Total Revenue</div>
                  <h3 class="mb-0 fw-bold">{{$totalRevenue}} ₹</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-info p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                 <svg fill="#8207CA" version="1.1" id="Capa_1" height="3rem" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 31.294 31.294" xml:space="preserve" stroke="#8207CA"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <circle cx="24.724" cy="3.235" r="3.235"></circle> <path d="M27.434,7.715l-2.71,3.74l-2.678-3.488L18.84,11.91l-2.572-2.285c-0.54-0.481-1.367-0.432-1.852,0.108 c-0.478,0.541-0.432,1.369,0.109,1.851l3.595,3.194c0.239,0.214,0.548,0.332,0.867,0.332c0.032,0,0.062-0.001,0.098-0.006 c0.354-0.028,0.686-0.201,0.913-0.478l1.423-1.769v4.872c0,0.61,0,1.181,0.325,1.668v10.617c0,0.727,0.66,1.28,1.385,1.28 s1.387-0.499,1.387-1.335h0.35c0,0.836,0.596,1.335,1.319,1.335c0.723,0,1.322-0.555,1.322-1.28V19.396 c0.325-0.49,0.325-1.058,0.325-1.668v-4.23c0.558,1.169,0.579,2.706,0.573,4.665c-0.001,0.726,0.667,1.341,1.394,1.341h0.001 c0.722,0,1.309-0.607,1.312-1.334C31.13,11.448,28.95,8.757,27.434,7.715z"></path> <path d="M26.232,6.808l-0.768,0.33C25.306,6.87,25.02,6.69,24.684,6.69c-0.337,0-0.624,0.183-0.778,0.454l-0.768-0.323 c-0.111-0.048-0.268-0.035-0.366,0.031c-0.103,0.068-0.188,0.181-0.188,0.304v0.96c0,0.115,0.078,0.224,0.17,0.292 c0.095,0.068,0.226,0.089,0.338,0.057c0.306-0.094,0.693-0.207,0.908-0.273c0.167,0.191,0.416,0.312,0.685,0.312 c0.284,0,0.534-0.13,0.703-0.33c0.213,0.065,0.586,0.179,0.888,0.271c0.11,0.032,0.19,0.012,0.284-0.056s0.114-0.176,0.114-0.292 V7.142c0-0.122-0.028-0.233-0.13-0.301C26.44,6.772,26.346,6.762,26.232,6.808z"></path> <path d="M11.773,12.094c-0.133-0.132-0.311-0.207-0.498-0.207c-0.186,0-0.366,0.075-0.497,0.207l-2.231,2.232 c-0.298,0.297-0.777,0.297-1.074,0L4.01,10.868c-0.106-0.108-0.167-0.254-0.167-0.405c0-0.151,0.061-0.297,0.167-0.404 l0.684-0.681c0.071-0.07,0.094-0.177,0.054-0.269C4.709,9.015,4.62,8.954,4.52,8.954H0.982c-0.216,0-0.421,0.087-0.571,0.24 C0.261,9.347,0.178,9.554,0.181,9.77l0.053,3.473c0.001,0.099,0.062,0.188,0.153,0.226c0.092,0.037,0.197,0.016,0.268-0.055 l0.805-0.806c0.105-0.108,0.253-0.167,0.402-0.167c0.153-0.001,0.299,0.06,0.407,0.167l5.205,5.205 c0.142,0.143,0.336,0.223,0.536,0.223c0.201,0,0.395-0.08,0.538-0.223l2.192-2.193c0.142-0.143,0.336-0.222,0.536-0.222 c0.202,0,0.394,0.08,0.537,0.222l4.023,4.021c0.275,0.275,0.723,0.275,0.997,0l0.748-0.746c0.132-0.133,0.207-0.312,0.207-0.498 c0-0.187-0.075-0.365-0.207-0.498L11.773,12.094z"></path> </g> </g> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Total Sales</div>
                  <h3 class="mb-0 fw-bold">{{$totalSales}}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-success p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg viewBox="0 0 24 24" fill="none" height="3rem" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z" stroke="#009966" stroke-width="1.5"></path> <path d="M16 6C16 4.11438 16 3.17157 15.4142 2.58579C14.8284 2 13.8856 2 12 2C10.1144 2 9.17157 2 8.58579 2.58579C8 3.17157 8 4.11438 8 6" stroke="#009966" stroke-width="1.5"></path> <path d="M12 17.3333C13.1046 17.3333 14 16.5871 14 15.6667C14 14.7462 13.1046 14 12 14C10.8954 14 10 13.2538 10 12.3333C10 11.4129 10.8954 10.6667 12 10.6667M12 17.3333C10.8954 17.3333 10 16.5871 10 15.6667M12 17.3333V18M12 10V10.6667M12 10.6667C13.1046 10.6667 14 11.4129 14 12.3333" stroke="#009966" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">paid</div>
                  <h3 class="mb-0 fw-bold">{{$totalPaid}}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-danger p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg viewBox="0 0 24 24" height="3rem" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V12L14.5 10.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#F83636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Unpaid</div>
                  <h3 class="mb-0 fw-bold">{{$totalUnpaid}}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="my-5 flex align-items-center">
           <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-warning p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg fill="#F5A70D" height="3rem" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294 294" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M120,230H30V64h90c8.284,0,15-6.716,15-15s-6.716-15-15-15H15C6.716,34,0,40.716,0,49v196c0,8.284,6.716,15,15,15h105 c8.284,0,15-6.716,15-15C135,236.716,128.284,230,120,230z"></path> <path d="M279,34H174c-8.284,0-15,6.716-15,15s6.716,15,15,15h90v166h-90c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15h105 c8.284,0,15-6.716,15-15V49C294,40.716,287.284,34,279,34z"></path> <path d="M211.539,170.438c2.357-7.941-2.169-16.291-10.11-18.649c-7.941-2.359-16.291,2.169-18.649,10.11 c-4.665,15.712-19.379,26.686-35.781,26.686c-16.401,0-31.113-10.974-35.778-26.686c-2.358-7.941-10.707-12.467-18.649-10.11 c-7.941,2.358-12.468,10.708-10.11,18.649c8.417,28.348,34.956,48.146,64.538,48.146 C176.582,218.584,203.122,198.785,211.539,170.438z"></path> <path d="M82.46,123.563c-2.357,7.942,2.169,16.291,10.11,18.649c7.948,2.356,16.291-2.17,18.649-10.11 c4.664-15.712,19.377-26.686,35.778-26.686c16.403,0,31.117,10.974,35.781,26.686c1.936,6.518,7.905,10.734,14.374,10.734 c1.413,0,2.851-0.201,4.275-0.624c7.941-2.358,12.468-10.707,10.11-18.649c-8.417-28.348-34.957-48.146-64.541-48.146 C117.415,75.416,90.876,95.215,82.46,123.563z"></path> </g> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Total Partial</div>
                  <h3 class="mb-0 fw-bold">{{$totalPartial}}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="m-1 col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-action action-border-dark p-1 position-relative">
              <div class="card-body d-flex gap-3 align-items-center p-3">
                <div class="clearfix pe-2 text-secondary">
                  <svg viewBox="0 0 24 24" height="3rem" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.96 9.96 0 0 1-6.383-2.302l-.244-.209.902-1.902a8 8 0 1 0-2.27-5.837l-.005.25h2.5l-2.706 5.716A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2zm1 4v2h2.5v2H10a.5.5 0 0 0-.09.992L10 11h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2H14a.5.5 0 0 0 .09-.992L14 13h-4a2.5 2.5 0 1 1 0-5h1V6h2z"></path> </g> </g></svg>
                </div>
                <div class="clearfix">
                  <div class="mb-1">Total Refunded</div>
                  <h3 class="mb-0 fw-bold">{{$totalRefunded}}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-header d-flex flex-wrap gap-3 align-items-center justify-content-between border-0 py-0 my-4">
          <h6 class="card-title mb-0">Sales List</h6>
          <div class="d-flex flex-wrap gap-2">
            <div id="dt_NewCustomers_Search"></div>
            <a href="{{route('salesForm')}}" class="text-light text-decoration-none">
              <button type="button" class="btn btn-sm btn-primary waves-effect">
                <i class="fi fi-rr-plus text-2xs me-1"></i> Add Sales
              </button>
            </a>
          </div>
        </div>

        <form action="{{route('sales')}}" method="GET" class="d-flex align-items-center justify-content-start my-4">
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
                <option value="paid" {{ request('status')=='paid' ? 'selected' : '' }}>Paid</option>
                <option value="unpaidUnpaid" {{ request('status')=='unpaidUnpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="partial" {{ request('status')=='partial' ? 'selected' : '' }}>Partial</option>
                <option value="refunded" {{ request('status')=='refunded' ? 'selected' : '' }}>Refunded</option>
              </select>
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
                  <th class="minw-200px">Customer Name</th>
                  <th class="minw-150px">Lead Reference</th>
                  <th class="minw-150px">Deal Amount</th>
                  <th class="minw-125px">Deal Date</th>
                  <th class="minw-125px">Invoice Number</th>
                  @if(Gate::allows('isAdmin'))
                  <th class="minw-125px">Assigned Employee</th>
                  @endif
                  <th>Payment Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($sales as $sale )
                <tr>
                  <td>{{$sales->firstItem() + $loop->index }}</td>
                  <td>
                    {{$sale->customer->name}}
                  </td>
                  <td>{{$sale->lead_reference}}</td>
                  <td>{{$sale->deal_amount}}</td>
                  <td>{{$sale->deal_date}}</td>
                  <td>{{$sale->invoice_number}}</td>
                  @if(Gate::allows('isAdmin'))
                  <td>{{$sale->user->name}}</td>
                  @endif
                  <td>
                    @switch($sale->payment_status)
                    @case('unpaid')
                    <span class="badge badge-lg bg-danger-subtle text-danger">{{$sale->payment_status}}</span>
                    @break
                    @case('paid')
                    <span class="badge badge-lg bg-success-subtle text-success">{{$sale->payment_status}}</span>
                    @break
                    @case('partial')
                    <span class="badge badge-lg bg-warning-subtle text-warning">{{$sale->payment_status}}</span>
                    @break
                    @case('refunded')
                    <span class="badge badge-lg bg-dark-subtle text-dark">{{$sale->payment_status}}</span>
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
                            href="{{route('editSale', ['name' => $sale->customer->name, 'id' => $sale->id])}}">Edit</a>
                        </li>
                        <li>
                          <form action="{{route('deleteSale', $sale->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this sale? This action cannot be undone.')">
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
                    No Sales found.
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="p-3">
        {{$sales->links()}}
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