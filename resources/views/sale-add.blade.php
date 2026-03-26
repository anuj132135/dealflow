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
        {{-- Sales --}}
        <main class="p-10 leads-form">
            <p class="p-2"><a href="{{route('sales')}}">Sales</a> > Add Sale</p>
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Add Sale</h6>
                    </div>
                    <div class="card-body">
                        <form class="row" action="{{route('submitSale')}}" method="POST">
                            @csrf
                            <div class="col-md-4 mb-3">
                                <label for="customer" class="form-label">Customer Name</label>
                                <select id="customer" class="form-select" name="customer_name" required>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_name')==$customer->id ?
                                        'selected' :
                                        '' }}>
                                        {{ $customer->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dealAmount" class="form-label">Deal Amount</label>
                                <input type="number" class="form-control" id="dealAmount" name="deal_amount"
                                    value="{{old('deal_amount')}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dealDate" class="form-label">Deal Date</label>
                                <input type="datetime-local" class="form-control" id="dealDate" name="deal_date"
                                    value="{{old('deal_date')}}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="leadReference" class="form-label">Lead Reference</label>
                                <input type="text" class="form-control" id="leadReference" name="lead_reference"
                                    value="{{ old('lead_reference')}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="invoiceNumber" class="form-label">Invoice Number</label>
                                <input type="number" class="form-control" id="invoiceNumber" name="invoice_number"
                                    value="{{old('invoice_number')}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="paymentStatus" class="form-label">Payment Status</label>
                                <select id="paymentStatus" class="form-select" name="payment_status" required>
                                    <option value="paid" {{ old('payment_status')=='paid' ? 'selected' : '' }}>Paid
                                    </option>
                                    <option value="unpaid" {{ old('payment_status')=='unpaid' ? 'selected' : '' }}>
                                        Unpaid
                                    </option>
                                    <option value="partial" {{ old('payment_status')=='partial' ? 'selected' : '' }}>
                                        Partial
                                    </option>
                                    <option value="refunded" {{ old('payment_status')=='refunded' ? 'selected' : '' }}>
                                        Refunded
                                    </option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
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