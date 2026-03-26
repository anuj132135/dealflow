<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Signup Page
// Route::get('/',[AuthController::class,'register'])->name('register');
// Route::post('/submit_register',[AuthController::class,'submitRegister'])->name('submit_register');

// Login Page
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/submit_login',[AuthController::class,'submitLogin'])->name('submit_login');

// Logout Page
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Dashboard Page
Route::get('/dashboard',[PageController::class,'dashboard'])->name('dashboard')->middleware(AuthMiddleware::class);

// Lead Page
Route::get('/leads',[PageController::class,'leads'])->name('leads')->middleware(AuthMiddleware::class);
Route::delete('/leads/delete/{id}',[PageController::class,'deleteLead'])->name('deleteLead')->middleware(AuthMiddleware::class);
Route::get('/leads/leads-form',[PageController::class,'leadsForm'])->name('leadsForm')->middleware(AuthMiddleware::class);
Route::post('/leads/submit-lead',[PageController::class,'submitLead'])->name('submit_lead');
Route::get('/leads/edit/{name}/{id}',[PageController::class,'leadEdit'])->name('leadEdit')->middleware(AuthMiddleware::class);
Route::put('/leads/updatesubmit/{id}',[PageController::class,'leadEditSubmit'])->name('leadEditSubmit')->middleware(AuthMiddleware::class);

// Lead Detail Page
Route::get('/leads/{name}/{id}',[PageController::class,'leadActivity'])->name('leadsDetail')->middleware(AuthMiddleware::class);
Route::post('/leads/leads-activity/create',[PageController::class,'createActivity'])->name('createActivity')->middleware(AuthMiddleware::class);
Route::delete('/leads/leads-activity/delete/{id}',[PageController::class,'deleteLeadActivity'])->name('deleteLeadActivity')->middleware(AuthMiddleware::class);

// Leads FollowUp Page
Route::get('/leads/followup',[PageController::class,'leadsFollowup'])->name('leadsFollowup')->middleware(AuthMiddleware::class);
Route::delete('/leads/followup/delete/{id}',[PageController::class,'deleteLeadFollowup'])->name('deleteLeadFollowup')->middleware(AuthMiddleware::class);
Route::post('/leads/followup/create',[PageController::class,'createLeadFollowup'])->name('createLeadFollowup')->middleware(AuthMiddleware::class);

// Customers FollowUp Page
Route::get('/customers/followup',[PageController::class,'customersFollowup'])->name('customersFollowup')->middleware(AuthMiddleware::class);
Route::delete('/customers/followup/delete/{id}',[PageController::class,'deleteCustomerFollowup'])->name('deleteCustomerFollowup')->middleware(AuthMiddleware::class);
Route::post('/customers/followup/create',[PageController::class,'createCustomerFollowup'])->name('createCustomerFollowup')->middleware(AuthMiddleware::class);

// Customers Page
Route::get('/customers',[PageController::class,'customers'])->name('customers')->middleware(AuthMiddleware::class);
Route::get('/customers/edit/{name}/{id}',[PageController::class,'editCustomer'])->name('editCustomer')->middleware(AuthMiddleware::class);
Route::put('/customers/updatesubmit/{id}',[PageController::class,'customerEditSubmit'])->name('customerEditSubmit')->middleware(AuthMiddleware::class);
Route::delete('/customers/delete/{id}',[PageController::class,'deleteCustomer'])->name('deleteCustomer')->middleware(AuthMiddleware::class);
Route::get('/customers/customer-form',[PageController::class,'customersForm'])->name('customersForm')->middleware(AuthMiddleware::class);
Route::post('/customers/submit-customer',[PageController::class,'submitCustomer'])->name('submit_customer');
Route::put('/customers/customer-detail/update/{id}',[PageController::class,'updateCustomerDetail'])->name('updateCustomerDetail')->middleware(AuthMiddleware::class);

// Customer Detail Page
Route::get('/customers/{name}/{id}',[PageController::class,'customerActivity'])->name('CustomersDetail')->middleware(AuthMiddleware::class);
Route::post('/customers/customers-activity/create',[PageController::class,'createCustomerActivity'])->name('createCustomerActivity')->middleware(AuthMiddleware::class);
Route::delete('/customers/customers-activity/delete/{id}',[PageController::class,'deleteCustomerActivity'])->name('deleteCustomerActivity')->middleware(AuthMiddleware::class);

// Sales Page
Route::get('/sales',[PageController::class,'sales'])->name('sales')->middleware(AuthMiddleware::class);
Route::get('/sales/sales-form',[PageController::class,'salesForm'])->name('salesForm')->middleware(AuthMiddleware::class);
Route::post('/sales/submit-sale',[PageController::class,'submitSale'])->name('submitSale');
Route::delete('/sales/delete/{id}',[PageController::class,'deleteSale'])->name('deleteSale')->middleware(AuthMiddleware::class);
Route::get('/sales/edit/{name}/{id}',[PageController::class,'editSale'])->name('editSale')->middleware(AuthMiddleware::class);
Route::put('/sales/updatesubmit/{id}',[PageController::class,'saleEditSubmit'])->name('saleEditSubmit')->middleware(AuthMiddleware::class);

// Employee Page
Route::get('/employees',[PageController::class,'employees'])->name('employees')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class);
Route::post('/employees/add',[PageController::class,'addEmployeee'])->name('addemployee')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class);
Route::delete('/employees/delete/{id}',[PageController::class,'deleteEmployee'])->name('deleteEmployee')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class);
Route::put('/employees/updatesubmit/{id}',[PageController::class,'updateEmployee'])->name('updateEmployee')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class);

// User Profile
Route::get('/profile',[PageController::class,'userProfile'])->name('userProfile')->middleware(AuthMiddleware::class);
Route::put('/profile/updateimagesubmit/{id}',[PageController::class,'changeImage'])->name('changeImage')->middleware(AuthMiddleware::class);
Route::put('/profile/updateprofilesubmit/{id}',[PageController::class,'updateProfile'])->name('updateProflie')->middleware(AuthMiddleware::class);
Route::put('/profile/updatepasswordsubmit/{id}',[PageController::class,'changePassword'])->name('changePassword')->middleware(AuthMiddleware::class);
