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
  </div>
  {{-- Sidebar --}}
  <div class="float-left w-1/5">
    @include('components.sidebar')
  </div>
  <div class="float-right w-4/5">
    {{-- Header --}}
    @include('components.header')
    {{-- Customer Followup --}}
    <main class="p-10 leads">
      <p class="p-2"><a href="{{route('dashboard')}}">Home</a> > Customers Follow-up</p>
      <div class="col-xxl-12">
        <div class="card-header d-flex flex-wrap gap-3 align-items-center justify-content-between border-0 py-0 my-4">
          <h6 class="card-title mb-0">Customers Follow-up list</h6>
        </div>

        <form action="{{route('leadsFollowup')}}" method="GET" class="d-flex align-items-center justify-content-start my-4">
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
                <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending
                </option>
                <option value="done" {{ request('status')=='done' ? 'selected' : '' }}>Done</option>
                <option value="missed" {{ request('status')=='missed' ? 'selected' : '' }}>Missed</option>
              </select>
              <li>Follow-up Type</li>
              <select name="type" class="dropdown-item">
                <option value="">All</option>
                <option value="call" {{ request('status')=='call' ? 'selected' : '' }}>Call
                </option>
                <option value="Whatsapp" {{ request('status')=='whatsapp' ? 'selected' : '' }}>Whatsapp</option>
              </select>
              @if(Gate::allows('isAdmin'))
              <li>Assigned Employee</li>
              <select name="assigned" class="dropdown-item">
                <option value="">All</option>
                @foreach ($users as $users)
                <option value="{{ $users->id }}" {{ request('assigned')==$users->id ? 'selected' : '' }}>
                  {{ $users->name }}
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
                  <th class="minw-200px">Lead Name</th>
                  @if(Gate::allows('isAdmin'))
                  <th class="minw-200px">Assigned Employee</th>
                  @endif
                  <th class="minw-150px">Followup Date</th>
                  <th class="minw-125px">Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($customerFollowups as $customerFollowup )
                <tr>
                  <td>{{ $customerFollowups->firstItem() + $loop->index }}</td>
                  <td id="lead_name">{{$customerFollowup->Customer->name}}</td>
                  @if(Gate::allows('isAdmin'))
                  <td>{{$customerFollowup->User->name}}</td>
                  @endif
                  <td>{{$customerFollowup->follow_up_date}}</td>

                  <td>
                    @switch($customerFollowup->type)
                    @case('call')
                    {{$customerFollowup->type}}
                    @break
                    @case('whatsapp')
                    {{$customerFollowup->type}}
                    @break
                    @endswitch
                  </td>
                  <td>
                    @switch($customerFollowup->status)
                    @case('done')
                    <span class="badge badge-lg bg-success-subtle text-success">{{$customerFollowup->status}}</span>
                    @break
                    @case('pending')
                    <span class="badge badge-lg bg-warning-subtle text-warning">{{$customerFollowup->status}}</span>
                    @break
                    @case('missed')
                    <span class="badge badge-lg bg-danger-subtle text-danger">{{$customerFollowup->status}}</span>
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
                          <form action="{{route('deleteLeadFollowup', $customerFollowup->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
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
                    No Follow-Up found.
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="p-3">
        {{$customerFollowups->links()}}
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