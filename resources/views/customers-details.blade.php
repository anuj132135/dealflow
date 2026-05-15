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
        @if(session('createdActivity'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('createdActivity')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="error fixed-top">
        @if(session('updatedetailsuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('updatedetailsuccess')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="error fixed-top">
        @if(session('createFollowup'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('createFollowup')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="error fixed-top">
        @if(session('deleteActivity'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('deleteActivity')}}
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
        {{-- Customers details --}}
        <main class="p-10">
            <p class="p-2"><a href="{{route('dashboard')}}">Home</a> > Customers</p>
            <div class="leadprofile flex justify-content-between text-align-center">
                <div class="leadprofile shadow-none">
                    <div><img src={{asset('assets/images/default_profile_icon.webp')}} alt=""></div>
                    <div style="padding: 1rem">
                        <h3>{{$customer->name}}</h3>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height='1rem'>
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 9.00005L10.2 13.65C11.2667 14.45 12.7333 14.45 13.8 13.65L20 9"
                                    stroke="#696981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M3 9.17681C3 8.45047 3.39378 7.78123 4.02871 7.42849L11.0287 3.5396C11.6328 3.20402 12.3672 3.20402 12.9713 3.5396L19.9713 7.42849C20.6062 7.78123 21 8.45047 21 9.17681V17C21 18.1046 20.1046 19 19 19H5C3.89543 19 3 18.1046 3 17V9.17681Z"
                                    stroke="#696981" stroke-width="2" stroke-linecap="round"></path>
                            </g>
                        </svg>
                        <small>{{$customer->email}}</small>
                        <br>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height='1rem'>
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16.1007 13.359L15.5719 12.8272H15.5719L16.1007 13.359ZM16.5562 12.9062L17.085 13.438H17.085L16.5562 12.9062ZM18.9728 12.5894L18.6146 13.2483L18.9728 12.5894ZM20.8833 13.628L20.5251 14.2869L20.8833 13.628ZM21.4217 16.883L21.9505 17.4148L21.4217 16.883ZM20.0011 18.2954L19.4723 17.7636L20.0011 18.2954ZM18.6763 18.9651L18.7459 19.7119H18.7459L18.6763 18.9651ZM8.81536 14.7266L9.34418 14.1947L8.81536 14.7266ZM4.00289 5.74561L3.2541 5.78816L3.2541 5.78816L4.00289 5.74561ZM10.4775 7.19738L11.0063 7.72922H11.0063L10.4775 7.19738ZM10.6342 4.54348L11.2346 4.09401L10.6342 4.54348ZM9.37326 2.85908L8.77286 3.30855V3.30855L9.37326 2.85908ZM6.26145 2.57483L6.79027 3.10667H6.79027L6.26145 2.57483ZM4.69185 4.13552L4.16303 3.60368H4.16303L4.69185 4.13552ZM12.0631 11.4972L12.5919 10.9654L12.0631 11.4972ZM16.6295 13.8909L17.085 13.438L16.0273 12.3743L15.5719 12.8272L16.6295 13.8909ZM18.6146 13.2483L20.5251 14.2869L21.2415 12.9691L19.331 11.9305L18.6146 13.2483ZM20.8929 16.3511L19.4723 17.7636L20.5299 18.8273L21.9505 17.4148L20.8929 16.3511ZM18.6067 18.2184C17.1568 18.3535 13.4056 18.2331 9.34418 14.1947L8.28654 15.2584C12.7186 19.6653 16.9369 19.8805 18.7459 19.7119L18.6067 18.2184ZM9.34418 14.1947C5.4728 10.3453 4.83151 7.10765 4.75168 5.70305L3.2541 5.78816C3.35456 7.55599 4.14863 11.144 8.28654 15.2584L9.34418 14.1947ZM10.7195 8.01441L11.0063 7.72922L9.9487 6.66555L9.66189 6.95073L10.7195 8.01441ZM11.2346 4.09401L9.97365 2.40961L8.77286 3.30855L10.0338 4.99296L11.2346 4.09401ZM5.73263 2.04299L4.16303 3.60368L5.22067 4.66736L6.79027 3.10667L5.73263 2.04299ZM10.1907 7.48257C9.66189 6.95073 9.66117 6.95144 9.66045 6.95216C9.66021 6.9524 9.65949 6.95313 9.659 6.95362C9.65802 6.95461 9.65702 6.95561 9.65601 6.95664C9.65398 6.95871 9.65188 6.96086 9.64972 6.9631C9.64539 6.96759 9.64081 6.97245 9.63599 6.97769C9.62634 6.98816 9.61575 7.00014 9.60441 7.01367C9.58174 7.04072 9.55605 7.07403 9.52905 7.11388C9.47492 7.19377 9.41594 7.2994 9.36589 7.43224C9.26376 7.70329 9.20901 8.0606 9.27765 8.50305C9.41189 9.36833 10.0078 10.5113 11.5343 12.0291L12.5919 10.9654C11.1634 9.54499 10.8231 8.68059 10.7599 8.27309C10.7298 8.07916 10.761 7.98371 10.7696 7.96111C10.7748 7.94713 10.7773 7.9457 10.7709 7.95525C10.7677 7.95992 10.7624 7.96723 10.7541 7.97708C10.75 7.98201 10.7451 7.98759 10.7394 7.99381C10.7365 7.99692 10.7335 8.00019 10.7301 8.00362C10.7285 8.00534 10.7268 8.00709 10.725 8.00889C10.7241 8.00979 10.7232 8.0107 10.7223 8.01162C10.7219 8.01208 10.7212 8.01278 10.7209 8.01301C10.7202 8.01371 10.7195 8.01441 10.1907 7.48257ZM11.5343 12.0291C13.0613 13.5474 14.2096 14.1383 15.0763 14.2713C15.5192 14.3392 15.8763 14.285 16.1472 14.1841C16.28 14.1346 16.3858 14.0763 16.4658 14.0227C16.5058 13.9959 16.5392 13.9704 16.5663 13.9479C16.5799 13.9367 16.5919 13.9262 16.6024 13.9166C16.6077 13.9118 16.6126 13.9073 16.6171 13.903C16.6194 13.9008 16.6215 13.8987 16.6236 13.8967C16.6246 13.8957 16.6256 13.8947 16.6266 13.8937C16.6271 13.8932 16.6279 13.8925 16.6281 13.8923C16.6288 13.8916 16.6295 13.8909 16.1007 13.359C15.5719 12.8272 15.5726 12.8265 15.5733 12.8258C15.5735 12.8256 15.5742 12.8249 15.5747 12.8244C15.5756 12.8235 15.5765 12.8226 15.5774 12.8217C15.5793 12.82 15.581 12.8183 15.5827 12.8166C15.5862 12.8133 15.5895 12.8103 15.5926 12.8074C15.5988 12.8018 15.6044 12.7969 15.6094 12.7929C15.6192 12.7847 15.6265 12.7795 15.631 12.7764C15.6403 12.7702 15.6384 12.773 15.6236 12.7785C15.5991 12.7876 15.501 12.8189 15.3038 12.7886C14.8905 12.7253 14.02 12.3853 12.5919 10.9654L11.5343 12.0291ZM9.97365 2.40961C8.95434 1.04802 6.94996 0.83257 5.73263 2.04299L6.79027 3.10667C7.32195 2.578 8.26623 2.63181 8.77286 3.30855L9.97365 2.40961ZM4.75168 5.70305C4.73201 5.35694 4.89075 4.9954 5.22067 4.66736L4.16303 3.60368C3.62571 4.13795 3.20329 4.89425 3.2541 5.78816L4.75168 5.70305ZM19.4723 17.7636C19.1975 18.0369 18.9029 18.1908 18.6067 18.2184L18.7459 19.7119C19.4805 19.6434 20.0824 19.2723 20.5299 18.8273L19.4723 17.7636ZM11.0063 7.72922C11.9908 6.7503 12.064 5.2019 11.2346 4.09401L10.0338 4.99295C10.4373 5.53193 10.3773 6.23938 9.9487 6.66555L11.0063 7.72922ZM20.5251 14.2869C21.3429 14.7315 21.4703 15.7769 20.8929 16.3511L21.9505 17.4148C23.2908 16.0821 22.8775 13.8584 21.2415 12.9691L20.5251 14.2869ZM17.085 13.438C17.469 13.0562 18.0871 12.9616 18.6146 13.2483L19.331 11.9305C18.2474 11.3414 16.9026 11.5041 16.0273 12.3743L17.085 13.438Z"
                                    fill="#696981"></path>
                            </g>
                        </svg>
                        <small>{{$customer->phone}}</small>
                    </div>
                </div>
                <button type="button" class=" btn btn-primary text-light text-decoration-underline waves-effect waves-light"
                    data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                    Update
                </button>
                <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1"
                    aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Customer Information
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{route('updateCustomerDetail', $customer->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-sm-4 text-sm-end">
                                            <label class="col-form-label" for="last-transaction">Last Transaction
                                                :</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="datetime-local" class="form-control" id="last-transaction"
                                                name="last_transaction" value="{{old('last_transaction')}}">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-sm-4 text-sm-end">
                                            <label class="col-form-label" for="price">Price
                                                :</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="price"
                                                name="price" value="{{old('price')}}">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-sm-4 text-sm-end">
                                            <label class="col-form-label" for="total-revenue">Total Revenue
                                                :</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="total-revenue"
                                                name="total_revenue" value="{{old('total_revenue')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect waves-light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="leadinfo">
                    <div class="flex justify-content-between align-items-center">
                        <h5 class="my-3">Customer Informations</h5>
                    </div>
                    <div class="flex justify-content-between">
                        <ul>
                            <li>Status</li>
                            @if(Gate::allows('isAdmin'))
                            <li>Assigned Employee</li>
                            @endif
                            <li>Last Transaction</li>
                            <li>Price</li>
                            <li>Total Revenue</li>
                            <li>Service</li>
                            <li>Customer Since</li>
                        </ul>
                        <ul class="text-right">
                            <li>
                                @switch($customer->status)
                                @case('active')
                                <span class=" badge-lg bg-success-subtle text-success">{{$customer->status}}</span>
                                @break
                                @case('inactive')
                                <span class=" badge-lg bg-danger-subtle text-danger">{{$customer->status}}</span>
                                @break
                                @endswitch
                            </li>
                            @if(Gate::allows('isAdmin'))
                            <li>{{$customer->User->name}}</li>
                            @endif
                            <li>{{$customer?->last_transaction ?? '-'}}</li>
                            <li>{{$customer->price}} ₹</li>
                            <li>{{$customer->total_revenue}} ₹</li>
                            <li>{{$customer->service}}</li>
                            <li>{{$customer->customer_since}}</li>
                        </ul>
                    </div>
                    <div class="flex justify-content-between align-items-center">
                        <h5 class="my-3">Follow Up</h5>
                        <button type="button"
                            class="text-primary text-decoration-underline waves-effect waves-light p-1"
                            data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollablefollowup">
                            Follow up
                        </button>
                        <div class="modal fade" id="exampleModalCenteredScrollablefollowup" tabindex="-1"
                            aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Follow up
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('createCustomerFollowup')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-sm-4 text-sm-end">
                                                    <label class="col-form-label" for="followup-date">Follow up date
                                                        :</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="datetime-local" class="form-control" id="followup-date"
                                                        name="followup_date" value="{{old('followup_date')}}">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-sm-4 text-sm-end">
                                                    <label class="col-form-label" for="followup-type">Follow up type
                                                        :</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <select class="form-select form-control" id="followup-type"
                                                        name="followup_type">
                                                        <option value="call" {{ old('followup_type')=='call'
                                                            ? 'selected' : '' }}>
                                                            Call
                                                        </option>
                                                        <option value="whatsapp" {{ old('followup_type')=='whatsapp'
                                                            ? 'selected' : '' }}>
                                                            Whatsapp
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-sm-4 text-sm-end">
                                                    <label class="col-form-label" for="followup-status">Follow up
                                                        status :</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <select class="form-select form-control" id="followup-status"
                                                        name="followup_status">
                                                        <option value="done" {{ old('followup_status')=='done'
                                                            ? 'selected' : '' }}>
                                                            Done
                                                        </option>
                                                        <option value="pending" {{ old('followup_status')=='pending'
                                                            ? 'selected' : '' }}>
                                                            Pending
                                                        </option>
                                                        <option value="missed" {{ old('followup_status')=='missed'
                                                            ? 'selected' : '' }}>
                                                            Missed
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                            <input type="hidden" name="employee_id" value="{{$customer->User->id}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect waves-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-content-between">
                        <ul>
                            <li>Follow up</li>
                            <li>Follow up Type</li>
                            <li>Follow up Status</li>
                        </ul>
                        <ul class="text-right">
                            <li>{{$followup?->follow_up_date ?? '-'}}</li>
                            <li>{{$followup?->type ?? '-'}}</li>
                            <li class="capitalize">{{$followup?->status?? '-'}}</li>
                        </ul>
                    </div>
                    <h5 class="my-3">Contact</h5>
                    <div>
                        <ul class="flex justify-content-around align-items-center">
                            <a target="_blank" href="https://wa.me/{{$customer->phone}}">

                                <li class="btn p-2 text-light" style="background-color: #25D366">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        height='1rem'>
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M6.014 8.00613C6.12827 7.1024 7.30277 5.87414 8.23488 6.01043L8.23339 6.00894C9.14051 6.18132 9.85859 7.74261 10.2635 8.44465C10.5504 8.95402 10.3641 9.4701 10.0965 9.68787C9.7355 9.97883 9.17099 10.3803 9.28943 10.7834C9.5 11.5 12 14 13.2296 14.7107C13.695 14.9797 14.0325 14.2702 14.3207 13.9067C14.5301 13.6271 15.0466 13.46 15.5548 13.736C16.3138 14.178 17.0288 14.6917 17.69 15.27C18.0202 15.546 18.0977 15.9539 17.8689 16.385C17.4659 17.1443 16.3003 18.1456 15.4542 17.9421C13.9764 17.5868 8 15.27 6.08033 8.55801C5.97237 8.24048 5.99955 8.12044 6.014 8.00613Z"
                                                fill="#ffffff"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 23C10.7764 23 10.0994 22.8687 9 22.5L6.89443 23.5528C5.56462 24.2177 4 23.2507 4 21.7639V19.5C1.84655 17.492 1 15.1767 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23ZM6 18.6303L5.36395 18.0372C3.69087 16.4772 3 14.7331 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C11.0143 21 10.552 20.911 9.63595 20.6038L8.84847 20.3397L6 21.7639V18.6303Z"
                                                fill="#ffffff"></path>
                                        </g>
                                    </svg>
                                    Whatsapp
                                </li>
                            </a>
                            <a target="_blank" href="mailto:{{$customer->email}}">
                                <li class="btn p-2 text-light" style="background-color: #0d6efd">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        height="1rem">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7"
                                                stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <rect x="3" y="5" width="18" height="14" rx="2" stroke="#ffffff"
                                                stroke-width="2" stroke-linecap="round"></rect>
                                        </g>
                                    </svg>
                                    Email
                                </li>
                            </a>
                            <a target="_blank" href="tel:{{$customer->phone}}">
                                <li class="btn p-2 text-light bg-success">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        height="1rem">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M20 4.00002L16 8M16 4L20 7.99998" stroke="#ffffff"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M4.00655 7.93309C3.93421 9.84122 4.41713 13.0817 7.6677 16.3323C8.45191 17.1165 9.23553 17.7396 10 18.2327M5.53781 4.93723C6.93076 3.54428 9.15317 3.73144 10.0376 5.31617L10.6866 6.4791C11.2723 7.52858 11.0372 8.90532 10.1147 9.8278C10.1147 9.8278 10.1147 9.8278 10.1147 9.8278C10.1146 9.82792 8.99588 10.9468 11.0245 12.9755C13.0525 15.0035 14.1714 13.8861 14.1722 13.8853C14.1722 13.8853 14.1722 13.8853 14.1722 13.8853C15.0947 12.9628 16.4714 12.7277 17.5209 13.3134L18.6838 13.9624C20.2686 14.8468 20.4557 17.0692 19.0628 18.4622C18.2258 19.2992 17.2004 19.9505 16.0669 19.9934C15.2529 20.0243 14.1963 19.9541 13 19.6111"
                                                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg>
                                    Call
                                </li>
                            </a>
                        </ul>

                    </div>
                    <h5 class="my-3">Other Information</h5>
                    <div class="flex justify-content-between">
                        <ul>
                            <li>Created Date</li>
                            <li>Updated Date</li>
                        </ul>
                        <ul class="text-right">
                            <li>{{$customer->created_at}}</li>
                            <li>{{$customer->updated_at}}</li>
                        </ul>
                    </div>
                </div>
                <div class="activity">
                    <div class="col-lg-12">
                        <div class="clearfix">
                            <div class="card">
                                <div class="card-header flex justify-content-between border">
                                    <ul class="nav nav-underline card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="call-tab" data-bs-toggle="tab"
                                                data-bs-target="#call" type="button" role="tab" aria-controls="call"
                                                aria-selected="true">Activity</button>
                                        </li>
                                    </ul>
                                    <a class="text-light text-decoration-none">
                                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="fi fi-rr-plus text-2xs me-1">Create activity</i>
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalCenterTitle">
                                                            Activity</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="{{route('createCustomerActivity')}}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="message-text"
                                                                    class="col-form-label">Message:</label>
                                                                <textarea class="form-control" id="message-text"
                                                                    name="message"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="source-name"
                                                                    class="col-form-label">Source:</label>
                                                                <select class="form-select form-control"
                                                                    id="source-name" name="source">
                                                                    <option value="call" {{ old('source')=='call'
                                                                        ? 'selected' : '' }}>Call
                                                                    </option>
                                                                    <option value="email" {{ old('source')=='email'
                                                                        ? 'selected' : '' }}>Email
                                                                    </option>
                                                                    <option value="whatsapp" {{
                                                                        old('source')=='whatsapp' ? 'selected' : '' }}>
                                                                        Whatsapp
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status-name"
                                                                    class="col-form-label">Status:</label>
                                                                <select class="form-select form-control"
                                                                    id="status-name" name="status">
                                                                    <option value="busy" {{ old('status')=='busy'
                                                                        ? 'selected' : '' }}>Busy
                                                                    </option>
                                                                    <option value="no answer" {{
                                                                        old('status')=='no answer' ? 'selected' : '' }}>
                                                                        No answer
                                                                    </option>
                                                                    <option value="unavailable" {{
                                                                        old('status')=='unavailable' ? 'selected' : ''
                                                                        }}>Unavailable
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="customer_id"
                                                                value="{{ $customer->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-light waves-effect waves-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">
                                                            Create</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="call" role="tabpanel"
                                            aria-labelledby="call-tab" tabindex="0">
                                            @forelse ($customerDetail as $activity)
                                            <div class="my-2 border border-2 rounded p-3">
                                                <div class="my-2 flex align-items-start justify-between">
                                                    <div class="flex">
                                                        <span><svg viewBox="0 0 24 24" height='3rem' fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                                                        stroke="#ffffff" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <div class="p-2 pt-0">
                                                            <h6>{{$activity->created_at}}</h6>
                                                            <div class=" my-auto">{{$activity->chat_source}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        @switch($activity->chat_status)
                                                        @case('busy')
                                                        <div class=" badge-lg bg-warning-subtle text-warning">
                                                            {{$activity->chat_status}}</div>
                                                        @break
                                                        @case('no answer')
                                                        <div class=" badge-lg bg-warning-subtle text-warning">
                                                            {{$activity->chat_status}}</div>
                                                        @break
                                                        @case('unavailable')
                                                        <div class=" badge-lg bg-danger-subtle text-danger">
                                                            {{$activity->chat_status}}</div>
                                                        @break
                                                        @endswitch
                                                        <div class="btn-group">
                                                            <button
                                                                class="btn btn-white btn-shadow btn-icon waves-effect waves-light dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                data-bs-auto-close="false" aria-expanded="false">
                                                                <svg fill="#000000" height="1rem" viewBox="0 0 32 32"
                                                                    enable-background="new 0 0 32 32" id="Glyph"
                                                                    version="1.1" xml:space="preserve"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path
                                                                            d="M13,16c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,14.346,13,16z"
                                                                            id="XMLID_294_"></path>
                                                                        <path
                                                                            d="M13,26c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,24.346,13,26z"
                                                                            id="XMLID_295_"></path>
                                                                        <path
                                                                            d="M13,6c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,4.346,13,6z"
                                                                            id="XMLID_297_"></path>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <form
                                                                        action="{{ route('deleteCustomerActivity', $activity->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="card-text">{{$activity->chat_text}}</p>
                                            </div>
                                            @empty
                                            <p class="text-center text-muted py-4">
                                                No Activity found.
                                            </p>
                                            @endforelse
                                        </div>
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