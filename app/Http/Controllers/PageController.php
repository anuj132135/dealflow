<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerDetails;
use App\Models\CustomerFollowUp;
use App\Models\LeadFollowUp;
use App\Models\Lead;
use App\Models\LeadDetails;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    public function dashboard()
    {
        if (Gate::allows('isAdmin')) {
            $totalLeads = Lead::count();
            $totalCustomer = Customer::count();
            $todayLeads = Lead::whereDate('created_at', today())->count();
            $totalSale = Sale::count();
        } else {
            $totalLeads = Lead::where('assigned_employee', Auth::User()->id)->count();
            $totalCustomer = Customer::where('assigned_employee', Auth::User()->id)->count();
            $todayLeads = Lead::whereDate('created_at', today())->where('assigned_employee', Auth::User()->id)->count();
            $totalSale = Sale::where('employee_id', Auth::User()->id)->count();
        }

        return view('dashboard', compact('totalLeads', 'todayLeads', 'totalCustomer', 'totalSale'));
    }
    public function leads(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $leads = Lead::with('User')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('assigned'), function ($query) use ($request) {
                    $query->where('assigned_employee', $request->assigned);
                })
                ->when($request->date, function ($q, $date) {
                    match ($date) {
                        'today'  => $q->where('created_at', '>=', now()->startOfDay()),
                        '15 days' => $q->where('created_at', '>=', now()->subDays(15)),
                        '30 days' => $q->where('created_at', '>=', now()->subDays(30)),
                        default   => null,
                    };
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $q->where(function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request->search}%")
                            ->orWhere('email', 'like', "%{$request->search}%")
                            ->orWhere('phone', 'like', "%{$request->search}%");
                    });
                })

                ->orderBy('created_at', 'desc')->paginate(50)->withQueryString();
        } else (
            $leads = Lead::with('User')
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->filled('assigned'), function ($query) use ($request) {
                $query->where('assigned_employee', $request->assigned);
            })
            ->when($request->date, function ($q, $date) {
                match ($date) {
                    'today'  => $q->where('created_at', '>=', now()->startOfDay()),
                    '15 days' => $q->where('created_at', '>=', now()->subDays(15)),
                    '30 days' => $q->where('created_at', '>=', now()->subDays(30)),
                    default   => null,
                };
            })
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->search}%")
                        ->orWhere('email', 'like', "%{$request->search}%")
                        ->orWhere('phone', 'like', "%{$request->search}%");
                });
            })

            ->where('assigned_employee', Auth::id())->orderBy('created_at', 'desc')->paginate(50)->withQueryString()
        );

        if (Gate::allows('isAdmin')) {
            $users = User::all();
            $totalLead = Lead::count();
            $totalNew = Lead::where('status', 'new')->count();
            $totalWon = Lead::where('status', 'won')->count();
            $totalLost = Lead::where('status', 'lost')->count();
            $totalInprogress = Lead::where('status', 'in progress')->count();
        } else {
            $users = User::all();
            $totalLead = Lead::where('assigned_employee', Auth::id())->count();
            $totalWon = Lead::where('status', 'won')->where('assigned_employee', Auth::id())->count();
            $totalNew = Lead::where('status', 'new')->where('assigned_employee', Auth::id())->count();
            $totalLost = Lead::where('status', 'lost')->where('assigned_employee', Auth::id())->count();
            $totalInprogress = Lead::where('status', 'in progress')->where('assigned_employee', Auth::id())->count();
        }

        return view('leads', compact('leads', 'users', 'totalLead', 'totalNew', 'totalWon', 'totalLost', 'totalInprogress'));
    }

    public function deleteLead($id)
    {
        Lead::findOrFail($id)->delete();
        return redirect()->back()->with('deleteSuccess', 'Lead deleted successfully.');
    }

    public function leadEdit($name, $id)
    {
        $updateLead = Lead::with('user')->findOrFail($id);
        $users = User::all();

        return view('lead-update', compact('updateLead', 'users'));
    }

    public function leadEditSubmit(Request $req, $id)
    {
        $editSubmit = Lead::findOrFail($id);

        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:leads,email,' . $id,
            'phone' => 'required',
            'source' => 'required',
            'status' => 'required'
        ]);
        $assigned_emp = Gate::allows('isAdmin') ? $req->assigned : Auth::id();

        $editSubmit->update([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'source' => $req->source,
            'assigned_employee' => $assigned_emp,
            'status' => $req->status
        ]);

        if ($req->status === 'won') {
            $checkemail = Customer::where('email', $req->email)->exists();
            if (!$checkemail) {
                Customer::create([
                    'name' => $req->name,
                    'email' => $req->email,
                    'phone' => $req->phone,
                    'customer_since' => now(),
                    'assigned_employee' => $assigned_emp,
                ]);
            }
        }

        return redirect()->route('leads')
            ->with('success', 'Lead updated successfully!');
    }

    public function createLeadFollowup(Request $req)
    {
        $req->validate([
            'followup_date' => 'required',
            'followup_type' => 'required',
            'followup_status' => 'required',
        ]);

        LeadFollowUp::create([
            'lead_id' => $req->lead_id,
            'employee_id' => Auth::id(),
            'follow_up_date' => $req->followup_date,
            'type' => $req->followup_type,
            'status' => $req->followup_status
        ]);

        return redirect()->back()->with('crateFollowup', 'Craeted new Followup successfully!');
    }

    public function leadActivity($name, $id)
    {
        $lead = Lead::with('User')
            ->where('id', $id)
            ->firstOrFail();
        $followup = LeadFollowUp::with('Lead')
            ->where('lead_id', $id)->latest('follow_up_date')->first();
        $leadDetail = LeadDetails::with('Lead')->where('lead_id', '=', $id)->get();
        return view('leads-details', compact('lead', 'followup', 'leadDetail'));
    }

    public function createActivity(Request $req)
    {
        $req->validate([
            'message' => 'required',
            'source' => 'required',
            'status' => 'required',
        ]);

        LeadDetails::create([
            'lead_id' => $req->lead_id,
            'chat_text' => $req->message,
            'chat_source' => $req->source,
            'chat_status' => $req->status
        ]);

        return redirect()->back()->with('createdActivity', 'Craeted new activity successfully!');
    }

    public function deleteLeadActivity($id)
    {
        LeadDetails::findOrFail($id)->delete();
        return redirect()->back()->with('deleteActivity', 'Activity deleted successfully.');
    }

    public function leadsForm()
    {
        $users = User::all();
        return view("lead-add", compact('users'));
    }

    public function submitLead(Request $req)
    {
        $credentials = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:leads,email',
            'phone' => 'required',
            'source' => 'required',
            'status' => 'required'

        ]);
        $assigned_emp = Gate::allows('isAdmin') ? $req->assigned : Auth::id();

        Lead::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'source' => $req->source,
            'assigned_employee' => $assigned_emp,
            'status' => $req->status
        ]);

        if ($req->status === 'won') {

            Customer::create([
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'customer_since' => now(),
                'assigned_employee' => $assigned_emp,
            ]);
        }

        return redirect()->route('leadsForm')->with('success', 'New lead added successfully!');
    }

    public function customers(Request $request)
    {
        if (Gate::allows('isAdmin')) {

            $customers = Customer::with('User')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('assigned'), function ($query) use ($request) {
                    $query->where('assigned_employee', $request->assigned);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $q->where(function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request->search}%")
                            ->orWhere('email', 'like', "%{$request->search}%")
                            ->orWhere('phone', 'like', "%{$request->search}%");
                    });
                })
                ->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $totalCustomer = Customer::count();
            $totalActive = Customer::where('status', 'active')->count();
            $totalInactive = Customer::where('status', 'inactive')->count();
        } else {
            $customers = Customer::with('User')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('assigned'), function ($query) use ($request) {
                    $query->where('assigned_employee', $request->assigned);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $q->where(function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request->search}%")
                            ->orWhere('email', 'like', "%{$request->search}%")
                            ->orWhere('phone', 'like', "%{$request->search}%");
                    });
                })
                ->where('assigned_employee', Auth::id())->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $totalCustomer = Customer::where('assigned_employee', Auth::id())->count();
            $totalActive = Customer::where('status', 'active')->where('assigned_employee', Auth::id())->count();
            $totalInactive = Customer::where('status', 'inactive')->where('assigned_employee', Auth::id())->count();
        }

        return view('customers', compact('customers', 'totalCustomer', 'totalActive', 'totalInactive'));
    }

    public function editCustomer($name, $id)
    {
        $updateCustomer = Customer::with('user')->findOrFail($id);
        $users = User::all();

        return view('customer-update', compact('updateCustomer', 'users'));
    }

    public function customerEditSubmit(Request $req, $id)
    {
        $editSubmit = Customer::findOrFail($id);

        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:customers,email,' . $id,
            'phone' => 'required',
            'status' => 'required'
        ]);

        $assigned_emp = Gate::allows('isAdmin') ? $req->assigned : Auth::id();

        $editSubmit->update([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'customer_since' => now(),
            'assigned_employee' => $assigned_emp,
            'status' => $req->status
        ]);

        return redirect()->route('customers')
            ->with('success', 'Customer updated successfully!');
    }

    public function deleteCustomer($id)
    {
        Customer::findOrFail($id)->delete();
        return redirect()->back()->with('deleteSuccess', 'Customer deleted successfully.');
    }

    public function customersForm()
    {
        $users = User::all();
        return view("customer-add", compact('users'));
    }

    public function submitCustomer(Request $req)
    {
        $credentials = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:leads,email',
            'phone' => 'required',
            'status' => 'required'
        ]);

        $assigned_emp = Gate::allows('isAdmin') ? $req->assigned : Auth::id();

        Customer::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'customer_since' => now(),
            'assigned_employee' => $assigned_emp,
            'status' => $req->status
        ]);


        return redirect()->route('customersForm')->with('success', 'New customer added successfully!');
    }

    public function updateCustomerDetail(Request $req, $id)
    {
        $editSubmit = Customer::findOrFail($id);

        $req->validate([
            'last_transaction' => 'required',
            'price' => 'required',
            'total_revenue' => 'required'
        ]);

        $editSubmit->update([
            'last_transaction' => $req->last_transaction,
            'price' => $req->price,
            'total_revenue' => $req->total_revenue
        ]);

        return redirect()->back()
            ->with('updatedetailsuccess', 'Customer details updated successfully!');
    }

    public function customerActivity($name, $id)
    {
        $customer = Customer::with('User')
            ->where('id', $id)
            ->firstOrFail();
        $followup = CustomerFollowUp::with('Customer')
            ->where('customer_id', $id)->latest('follow_up_date')->first();
        $customerDetail = CustomerDetails::with('Customer')->where('customer_id', '=', $id)->get();

        return view('customers-details', compact('customer', 'followup', 'customerDetail'));
    }

    public function createCustomerActivity(Request $req)
    {
        $req->validate([
            'message' => 'required',
            'source' => 'required',
            'status' => 'required',
        ]);

        CustomerDetails::create([
            'customer_id' => $req->customer_id,
            'chat_text' => $req->message,
            'chat_source' => $req->source,
            'chat_status' => $req->status
        ]);

        return redirect()->back()->with('createdActivity', 'Craeted new activity successfully!');
    }

    public function deleteCustomerActivity($id)
    {
        CustomerDetails::findOrFail($id)->delete();
        return redirect()->back()->with('deleteActivity', 'Activity deleted successfully.');
    }

    public function createCustomerFollowup(Request $req)
    {
        $req->validate([
            'followup_date' => 'required',
            'followup_type' => 'required',
            'followup_status' => 'required',
        ]);

        CustomerFollowUp::create([
            'customer_id' => $req->customer_id,
            'employee_id' => $req->employee_id,
            'follow_up_date' => $req->followup_date,
            'type' => $req->followup_type,
            'status' => $req->followup_status
        ]);

        return redirect()->back()->with('crateFollowup', 'Craeted new Followup successfully!');
    }

    public function sales(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $sales = Sale::with('Customer')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('payment_status', $request->status);
                })
                ->when($request->filled('invoice'), function ($query) use ($request) {
                    $query->where('invoice', $request->invoice);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $q->where(function ($q) use ($request) {
                        $q->where('customer_id', 'like', "%{$request->search}%")
                            ->orWhereHas('customer', function ($q2) use ($request) {
                                $q2->where('name', 'like', "%{$request->search}%");
                            })
                            ->orWhere('lead_reference', 'like', "%{$request->search}%")
                            ->orWhere('deal_amount', 'like', "%{$request->search}%")
                            ->orWhere('deal_date', 'like', "%{$request->search}%")
                            ->orWhere('invoice_number', 'like', "%{$request->search}%");
                    });
                })
                ->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $customers = Customer::all();
            $totalSales = Sale::count();
            $totalPaid = Sale::where('payment_status', 'paid')->count();
            $totalUnpaid = Sale::where('payment_status', 'unpaid')->count();
            $totalPartial = Sale::where('payment_status', 'partial')->count();
            $totalRefunded = Sale::where('payment_status', 'refunded')->count();
            $totalRevenue = Sale::whereIn('payment_status', ['paid', 'partial'])->sum('deal_amount');
        } else {
            $sales = Sale::with('Customer')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('payment_status', $request->status);
                })
                ->when($request->filled('invoice'), function ($query) use ($request) {
                    $query->where('invoice', $request->invoice);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $q->where(function ($q) use ($request) {
                        $q->where('customer_id', 'like', "%{$request->search}%")
                            ->orWhereHas('customer', function ($q2) use ($request) {
                                $q2->where('name', 'like', "%{$request->search}%");
                            })
                            ->orWhere('lead_reference', 'like', "%{$request->search}%")
                            ->orWhere('deal_amount', 'like', "%{$request->search}%")
                            ->orWhere('deal_date', 'like', "%{$request->search}%")
                            ->orWhere('invoice_number', 'like', "%{$request->search}%");
                    });
                })
                ->where('employee_id', Auth::id())->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $customers = Customer::where('assigned_employee', Auth::id())->get();
            $totalSales = Sale::where('employee_id', Auth::id())->count();
            $totalPaid = Sale::where('payment_status', 'paid')->where('employee_id', Auth::id())->count();
            $totalUnpaid = Sale::where('payment_status', 'unpaid')->where('employee_id', Auth::id())->count();
            $totalPartial = Sale::where('payment_status', 'partial')->where('employee_id', Auth::id())->count();
            $totalRefunded = Sale::where('payment_status', 'refunded')->where('employee_id', Auth::id())->count();
            $totalRevenue = Sale::whereIn('payment_status', ['paid', 'partial'])->where('employee_id', Auth::id())->sum('deal_amount');
        }

        return view('sales', compact('sales', 'customers', 'totalSales', 'totalPaid', 'totalUnpaid', 'totalPartial', 'totalRefunded', 'totalRevenue'));
    }

    public function salesForm()
    {
        if (Gate::allows('isAdmin')) {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('assigned_employee', Auth::id())->get();
        }
        return view("sale-add", compact('customers'));
    }

    public function submitSale(Request $req)
    {
        $credentials = $req->validate([
            'customer_name' => 'required',
            'lead_reference' => 'required',
            'deal_amount' => 'required',
            'deal_date' => 'required',
            'payment_status' => 'required',
            'invoice_number' => 'required'
        ]);

        Sale::create([
            'customer_id' => $req->customer_name,
            'employee_id' => Auth::id(),
            'lead_reference' => $req->lead_reference,
            'deal_amount' => $req->deal_amount,
            'deal_date' => $req->deal_date,
            'payment_status' => $req->payment_status,
            'invoice_number' => $req->invoice_number
        ]);


        return redirect()->route('salesForm')->with('success', 'New Sale added successfully!');
    }

    public function deleteSale($id)
    {
        Sale::findOrFail($id)->delete();
        return redirect()->back()->with('deleteSuccess', 'Sale deleted successfully.');
    }

    public function editSale($name, $id)
    {
        $updateSale = Sale::with('Customer')->findOrFail($id);

        if (Gate::allows('isAdmin')) {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('assigned_employee', Auth::id())->get();
        }

        return view('sale-update', compact('updateSale', 'customers'));
    }

    public function saleEditSubmit(Request $req, $id)
    {
        $editSubmit = Sale::findOrFail($id);

        $req->validate([
            'customer_name' => 'required',
            'lead_reference' => 'required',
            'deal_amount' => 'required',
            'deal_date' => 'required',
            'payment_status' => 'required',
            'invoice_number' => 'required'
        ]);

        $editSubmit->update([
            'customer_id' => $req->customer_name,
            'lead_reference' => $req->lead_reference,
            'deal_amount' => $req->deal_amount,
            'deal_date' => $req->deal_date,
            'payment_status' => $req->payment_status,
            'invoice_number' => $req->invoice_number
        ]);

        return redirect()->route('sales')
            ->with('success', 'Sale updated successfully!');
    }

    public function leadsFollowup(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $leadFollowups = LeadFollowUp::with('Lead')->with('User')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('type'), function ($query) use ($request) {
                    $query->where('type', $request->type);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $search = $request->search;

                    $q->where(function ($query) use ($search) {
                        $query->where('lead_id', 'like', "%{$search}%")
                            ->orWhere('employee_id', 'like', "%{$search}%")
                            ->orWhere('follow_up_date', 'like', "%{$search}%")
                            ->orWhereHas('Lead', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            })
                            ->orWhereHas('User', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            });
                    });
                })
                ->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $users = User::all();
        } else {
            $leadFollowups = LeadFollowUp::with('Lead')->with('User')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('type'), function ($query) use ($request) {
                    $query->where('type', $request->type);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $search = $request->search;

                    $q->where(function ($query) use ($search) {
                        $query->where('lead_id', 'like', "%{$search}%")
                            ->orWhere('employee_id', 'like', "%{$search}%")
                            ->orWhere('follow_up_date', 'like', "%{$search}%")
                            ->orWhereHas('Lead', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            })
                            ->orWhereHas('User', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            });
                    });
                })
                ->where('employee_id', Auth::id())->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $users = User::all();
        }

        return view('leads-Followup', compact('leadFollowups', 'users'));
    }
    public function deleteLeadFollowup($id)
    {
        LeadFollowUp::findOrFail($id)->delete();
        return redirect()->back()->with('deleteSuccess', 'Lead Followup deleted successfully.');
    }
    public function customersFollowup(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $customerFollowups = CustomerFollowUp::with('Customer')->with('User')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('type'), function ($query) use ($request) {
                    $query->where('type', $request->type);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $search = $request->search;

                    $q->where(function ($query) use ($search) {
                        $query->where('customer_id', 'like', "%{$search}%")
                            ->orWhere('employee_id', 'like', "%{$search}%")
                            ->orWhere('follow_up_date', 'like', "%{$search}%")
                            ->orWhereHas('Customer', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            })
                            ->orWhereHas('User', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            });
                    });
                })
                ->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $users = User::all();
        } else {
            $customerFollowups = CustomerFollowUp::with('Customer')->with('User')
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('type'), function ($query) use ($request) {
                    $query->where('type', $request->type);
                })
                ->when($request->filled('search'), function ($q) use ($request) {
                    $search = $request->search;

                    $q->where(function ($query) use ($search) {
                        $query->where('customer_id', 'like', "%{$search}%")
                            ->orWhere('employee_id', 'like', "%{$search}%")
                            ->orWhere('follow_up_date', 'like', "%{$search}%")
                            ->orWhereHas('Customer', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            })
                            ->orWhereHas('User', function ($q2) use ($search) {
                                $q2->where('name', 'like', "%{$search}%");
                            });
                    });
                })
                ->where('employee_id', Auth::id())->orderBy('created_at', 'desc')->paginate(50)->withQueryString();

            $users = User::all();
        }

        return view('customers-followup', compact('customerFollowups', 'users'));
    }
    public function deleteCustomerFollowup($id)
    {
        CustomerFollowUp::findOrFail($id)->delete();
        return redirect()->back()->with('deleteSuccess', 'Customer Followup deleted successfully.');
    }

    public function employees()
    {
        $employees = User::where('role', 'employee')->orderBy('created_at', 'desc')->paginate(8)->withQueryString();
        return view('employees', compact('employees'));
    }

    public function addEmployeee(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|confirmed|min:6',
            'designation' => 'required',
            'department' => 'required',
            'status' => 'required'
        ]);

        $path = null;

        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('employees', 'public');
        }

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'image' => $path,
            'password' => $req->password,
            'designation' => $req->designation,
            'department' => $req->department,
            'status' => $req->status
        ]);

        return redirect()->route('employees')->with('success', 'Employee Added successfully!');
    }

    public function deleteEmployee($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('deleteSuccess', 'Employee deleted successfully.');
    }

    public function updateEmployee(Request $req, $id)
    {
        $editSubmit = User::findOrFail($id);

        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required | confirmed | min:6',
            'designation' => 'required',
            'department' => 'required',
            'status' => 'required'
        ]);

        $path = null;

        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('employees', 'public');
        }

        $editSubmit->update([
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'image' => $path,
            'password' => $req->password,
            'designation' => $req->designation,
            'department' => $req->department,
            'status' => $req->status
        ]);

        return redirect()->route('employees')
            ->with('success', 'Employee updated successfully!');
    }

    public function userProfile()
    {
        return view('profile');
    }

    public function changeImage(Request $req, $id)
    {
        $editSubmit = User::findOrFail($id);

        $req->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;

        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('employees', 'public');
        }

        $editSubmit->update([
            'image' => $path,
        ]);

        return redirect()->route('userProfile')
            ->with('success', 'Profile picture updated successfully!');
    }

    public function updateProfile(Request $req, $id)
    {
        $editSubmit = User::findOrFail($id);

        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10',
        ]);

        $editSubmit->update([
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
        ]);

        return redirect()->route('userProfile')
            ->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $req, $id)
    {
        $editSubmit = User::findOrFail($id);

        $req->validate([
            'password' => 'required | confirmed | min:6',
        ]);

        $editSubmit->update([
            'password' => $req->password,
        ]);
        return redirect()->route('userProfile')
            ->with('success', 'Password updated successfully!');
    }
}
