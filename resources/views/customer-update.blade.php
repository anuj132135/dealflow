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
        @elseif(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> {{session('success')}}
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
        {{-- Leads --}}
        <main class="p-10 leads-form">
            <p class="p-2"><a href="{{route('customers')}}">Customer</a> > Update Customer</p>
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Update Customer</h6>
                    </div>
                    <div class="card-body">
                        <form class="row" action="{{route('customerEditSubmit', $updateCustomer->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-12 mb-3">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name"
                                    value="{{ old('name', $updateCustomer->name ?? '')}}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    value="{{old('email', $updateCustomer->email ?? '')}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="inputPhone" name="phone"
                                    value="{{old('phone', $updateCustomer->phone ?? '')}}">
                            </div>
                            @if(Gate::allows('isAdmin'))
                            <div class="col-md-4 mb-3">
                                <label for="inputAssigned" class="form-label">Assigned Employee</label>
                                <select id="inputAssigned" class="form-select" name="assigned" required>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('assigned', $updateCustomer->assigned_employee ?? '')==$user->id ? 'selected' :
                                        '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="col-md-4 mb-3">
                                <label for="inputStatus" class="form-label">Status</label>
                                <select id="inputStatus" class="form-select" name="status" required>
                                    <option value="active" {{ old('status', $updateCustomer->status ?? '')=='active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status', $updateCustomer->status ?? '')=='inactive' ? 'selected' : ''
                                        }}>Inactive
                                    </option>
                                   
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>
                        </form>
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