<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function()
 {
 Artisan::call('config:clear');
   //Artisan::call('cache:clear');
   
   /* Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');*/

    return "Cleared!";

});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-postdata', [LoginController::class, 'login_postdata'])->name('login-postdata');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::match(array('GET','POST'),'/view_model/{page_name}/{param2}', [AdminController::class, 'view_model'])->name('view_model');
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin-dashboard');




Route::get('/pincode-master', [AdminController::class, 'B2C'])->name('pincode-master');
Route::get('/B2C-list', [AdminController::class, 'B2C_list'])->name('B2C-list');
Route::post('B2C-add', [AdminController::class, 'B2C_add'])->name('B2C-add');
Route::post('B2C-edit', [AdminController::class, 'B2C_edit'])->name('B2C-edit');
Route::get('B2C-delete/{id}', [AdminController::class, 'B2C_delete'])->name('B2C-delete');


Route::get('/LTL-master', [AdminController::class, 'LTL'])->name('LTL-master');
Route::get('/LTL-list', [AdminController::class, 'LTL_list'])->name('LTL-list');
Route::post('LTL-add', [AdminController::class, 'LTL_add'])->name('LTL-add');
Route::post('LTL-edit', [AdminController::class, 'LTL_edit'])->name('LTL-edit');
Route::get('LTL-delete/{id}', [AdminController::class, 'LTL_delete'])->name('LTL-delete');

Route::get('/pickupboy-master', [AdminController::class, 'pickupboy'])->name('pickupboy-master');
Route::get('/pickup-list', [AdminController::class, 'pickup_list'])->name('pickup-list');
Route::post('pickupboy-add', [AdminController::class, 'pickupboy_add'])->name('pickupboy-add');
Route::post('pickupboy-edit', [AdminController::class, 'pickupboy_edit'])->name('pickupboy-edit');
Route::get('pickup-delete/{id}', [AdminController::class, 'pickup_delete'])->name('pickup-delete');


Route::get('/vendor-master', [AdminController::class, 'vendor'])->name('vendor-master');
Route::get('/vendor-list', [AdminController::class, 'vendor_list'])->name('vendor-list');
Route::post('vendor-add', [AdminController::class, 'vendor_add'])->name('vendor-add');
Route::post('vendor-edit', [AdminController::class, 'vendor_edit'])->name('vendor-edit');

Route::get('client-add', [AdminController::class, 'client_add'])->name('client-add');
Route::post('client-postdata', [AdminController::class, 'client_postdata'])->name('client-postdata');
Route::get('/client-list', [AdminController::class, 'client_list'])->name('client-list');
Route::get('/client-datatable', [AdminController::class, 'client_datatable'])->name('client-datatable');
Route::get('client-delete/{id}', [AdminController::class, 'client_delete'])->name('client-delete');
Route::get('client-edit/{id}', [AdminController::class, 'client_edit'])->name('client-edit');
Route::post('client-postdata-update', [AdminController::class, 'client_postdata_update'])->name('client-postdata-update');
Route::get('/all-pending-order', [AdminController::class, 'all_pending_order'])->name('all-pending-order');
Route::get('/all-pending-order-list', [AdminController::class, 'all_pending_order_list'])->name('all-pending-order-list');
Route::get('order-deatils/{id}', [AdminController::class, 'orderdeatils'])->name('order-deatils');

Route::get('clientpanel', [ClientController::class, 'clientpanel'])->name('clientpanel');
Route::post('/client-login-postdata', [ClientController::class, 'client_login_postdata'])->name('client-login-postdata');
Route::get('client-logout', [ClientController::class, 'clientlogout'])->name('client-logout');
Route::get('/client-dashboard', [ClientController::class, 'client_dashboard'])->name('client-dashboard');

Route::get('/pickup-location', [ClientController::class, 'pickup_location'])->name('pickup-location');
Route::get('/pickup-location-list', [ClientController::class, 'pickup_location_list'])->name('pickup-location-list');
Route::post('/pickuplocation-add', [ClientController::class, 'pickuplocation_add'])->name('pickuplocation-add');
Route::post('pickuplocation-edit', [ClientController::class, 'pickuplocation_edit'])->name('pickuplocation-edit');

Route::get('/company-deatils', [ClientController::class, 'company_deatils'])->name('company-deatils');

Route::get('/bank-deatils', [ClientController::class, 'bank_deatils'])->name('bank-deatils');
Route::post('bank-edit', [ClientController::class, 'bank_edit'])->name('bank-edit');

Route::get('/shipping-charges', [ClientController::class, 'shipping_charges'])->name('shipping-charges');
Route::get('/calculate-charges', [ClientController::class, 'calculate_charges'])->name('calculate-charges');
Route::post('/charges-calculate-post', [ClientController::class, 'charges_calculate_post'])->name('charges-calculate-post');

Route::get('/forward-order', [ClientController::class, 'forward_order'])->name('forward-order');
Route::post('/product-add-post', [ClientController::class, 'product_add_post'])->name('product-add-post');

Route::get('/serach-product', [ClientController::class, 'serach_product'])->name('serach-product');
Route::post('/product-row-post', [ClientController::class, 'product_row_post'])->name('product-row-post');
Route::post('/forwardorder-postdata', [ClientController::class, 'forwardorder_postdata'])->name('forwardorder-postdata');
Route::get('/pending-order', [ClientController::class, 'pending_order'])->name('pending-order');
Route::get('/pending-order-list', [ClientController::class, 'pending_order_list'])->name('pending-order-list');
Route::get('forwardorder-edit/{id}', [ClientController::class, 'forwardorder_edit'])->name('forwardorder-edit');
Route::post('forwardorder-update', [ClientController::class, 'forwardorder_update'])->name('forwardorder-update');
Route::get('invoice-print/{id}', [ClientController::class, 'invoice_print'])->name('invoice-print');
Route::post('/add-product-qty', [ClientController::class, 'add_product_qty'])->name('add-product-qty');
Route::post('/city-state-details', [ClientController::class, 'city_state_details'])->name('city-state-details');
Route::get('product-list', [ClientController::class, 'product_list'])->name('product-list');
Route::get('product-datatable', [ClientController::class, 'product_datatable'])->name('product-datatable');
Route::get('product-delete/{id}', [ClientController::class, 'product_delete'])->name('product-delete');
Route::post('/product-edit', [ClientController::class, 'product_edit'])->name('product-edit');



///service

Route::get('/service-master', [AdminController::class, 'pincode'])->name('service-master'); // View the list of services
Route::get('/service-list', [AdminController::class, 'pincode_list'])->name('service-list'); // Fetch service data
Route::get('/service-add', [AdminController::class, 'pincode_add'])->name('service-add'); // Add a new service
Route::post('/pincode-add', [AdminController::class, 'pincode_add'])->name('pincode-add'); // Post method for adding a new service
Route::get('/service-edit/{id}', [AdminController::class, 'pincode_edit'])->name('service-edit'); // Edit service details
Route::post('/pincode-edit', [AdminController::class, 'pincode_edit'])->name('pincode-edit'); // Post method for updating a service
Route::get('/pincode-delete/{id}', [AdminController::class, 'pincode_delete'])->name('pincode-delete'); // Delete a service
Route::get('/view-model/{page_name}/{param2}', [AdminController::class, 'view_model'])->name('view_model'); // View dynamic model


Route::get('product-master', [AdminController::class, 'B2B'])->name('product-master');
Route::get('B2B-list', [AdminController::class, 'B2B_list'])->name('B2B-list');
Route::post('/B2B-add', [AdminController::class, 'B2B_add'])->name('B2B-add');
Route::get('/B2B-add', [AdminController::class, 'getServices'])->name('get-services');

Route::post('B2B-edit', [AdminController::class, 'B2B_edit'])->name('B2B-edit');
Route::get('B2B-delete/{id}', [AdminController::class, 'B2B_delete'])->name('B2B-delete');



Route::get('/B2C-list', [AdminController::class, 'B2C_list'])->name('B2C-list');
Route::post('/B2C-add', [AdminController::class, 'B2C_add'])->name('B2C-add');
Route::post('/B2C-edit', [AdminController::class, 'B2C_edit'])->name('B2C-edit');
Route::get('/get-products-by-service', [AdminController::class, 'getProductsByService'])->name('get-products-by-service');


// Display the edit form for a product

// Update the product