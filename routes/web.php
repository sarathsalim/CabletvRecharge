<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageChannelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CustomerloginController;
use App\Http\Controllers\ViewChannelController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactFormController;


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

Route::get('/', function () {
    return redirect()->route('guesthome');  // Redirects to the admin login page
}); 
Route::get('adminhome', [AdminController::class, 'adminhome'])->name('adminhome');
Route::get('/adminlogin_process',[LoginController::class,'adminlogin_process']);
Route::post('/adminlogin_process',[LoginController::class,'adminlogin_process'])->name('adminlogin_process');
Route::get('loginadmin', [LoginController::class, 'AdminLogin'])->name('AdminLogin');

Route::get('/addchannel', [ChannelController::class, 'addchannel'])->name('addchannel');
Route::post('/channelinsert', [ChannelController::class, 'channel_insert'])->name('channel_insert');
Route::get('/channelview', [ChannelController::class, 'channelview'])->name('channelview');

Route::get('packageinsert', [PackageController::class, 'insert'])->name('packages.insert');
Route::post('packageinsert', [PackageController::class, 'store'])->name('packages.store');
Route::get('/packages', [PackageController::class, 'index'])->name('index');
// Route to edit a package
Route::get('/packages/{packageid}/edit', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/packages/{packageid}', [PackageController::class, 'update'])->name('packages.update');
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');


// Route to delete a package
Route::get('/delete_package/{packageid}', [PackageController::class, 'delete_package'])->name('delete_package');


Route::get('/packagechannels', [PackageChannelController::class, 'create'])->name('packagechannel_create');

// Route to fetch channels for a selected package
Route::get('/getChannels/{packageid}', [PackageChannelController::class, 'getChannels']);

// Route to assign a channel to a package
Route::post('/packagechannel_insert', [PackageChannelController::class, 'store'])->name('packagechannel_insert');
Route::get('/delete_packagechannel/{packageid}/{channelid}', [PackageChannelController::class, 'delete_packagechannel'])->name('delete_packagechannel');
//Route::get('/packagechannelview/{packageid}', [PackageChannelController::class, 'show'])->name('packagechannelview');
Route::get('/packages-channels', [PackageChannelController::class, 'showAllPackagesWithChannels'])->name('showAllPackagesWithChannels');
// Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
// Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('guesthome', [GuestController::class, 'guesthome'])->name('guesthome');
Route::get('customer_register', [CustomerController::class, 'customer_register'])->name('customer_register');
Route::post('/customer_insert', [CustomerController::class, 'customer_insert'])->name('customer_insert');
Route::get('/guesthome', [CustomerController::class, 'guesthome'])->name('guesthome');
Route::get('/customerlogin_process',[CustomerloginController::class,'customerlogin_process']);
Route::post('/customerlogin_process',[CustomerloginController::class,'customerlogin_process'])->name('customerlogin_process');
Route::get('customerlogin', [CustomerloginController::class, 'customerlogin'])->name('customerlogin');
Route::get('customerhome', [CustomerController::class, 'customerhome'])->name('Customer.customerhome');
Route::post('/complaint/register', [CustomerController::class, 'complaint_register'])->name('complaint.register');
// Route::get('/customerpackages', [PackageController::class, 'showPackages'])->name('Customer.customerhome');
Route::get('customerpack', [CustomerController::class, 'showpackages'])->name('showpackages');
// Route to show channels for a specific package
Route::get('/packages/{packageid}/viewchannels', [ViewChannelController::class, 'showChannels'])->name('packages.viewchannels');
Route::get('/recharge/{packageid}', [RechargeController::class, 'create'])->name('recharge.create');
Route::post('/recharge/store', [RechargeController::class, 'store'])->name('recharge.store');


// Route to show payment form
Route::get('/payment/{rechargeid}', [PaymentController::class, 'showPaymentForm'])->name('Customer.payment');

// Route to process payment
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

// Route for payment success page
Route::get('/paymentsuccess/success', [PaymentController::class, 'paymentSuccess'])->name('paymentsuccess.success');
Route::get('/rechargeview', [RechargeController::class, 'rechargeview'])->name('Admin.rechargeview');
Route::put('/payments/{paymentid}/updateStatus', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');
Route::get('/payments/{paymentid}/editStatus', [PaymentController::class, 'editStatus'])->name('payments.editStatus');
Route::get('/payments', [PaymentController::class, 'viewPayments'])->name('payments.view');

Route::get('/invoice/download/{rechargeid}', [PaymentController::class, 'downloadInvoice'])->name('invoice.download');
Route::get('/customer/recharge-history', [RechargeController::class, 'history'])->name('recharge.history');
Route::get('/complaint/create', [ComplaintController::class, 'showComplaintForm'])->name('complaint.create');
Route::post('/complaint/submit', [ComplaintController::class, 'submitComplaint'])->name('complaint.submit');
Route::get('/complaints', [ComplaintController::class, 'viewComplaints'])->name('complaints.view');
Route::get('/complaint-confirmation', [ComplaintController::class, 'showConfirmation'])->name('complaint.confirmation');

Route::get('/complaints/{complaintid}/email', [ComplaintController::class, 'sendComplaintProcessingMail'])->name('complaints.email');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
Route::get('/reports/pie-chart', [ReportController::class, 'packageCustomerReport'])->name('packageCustomerReport');
Route::get('/date-range-report', [ReportController::class, 'dateRangeReport'])->name('dateRangeReport');
Route::get('/customer-list/{packageid}/{from_date}/{to_date}', [ReportController::class, 'customerList'])->name('customerList');
Route::get('/reports/revenue', [ReportController::class, 'revenueReport'])->name('revenueReport');
Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactFormController::class, 'storeForm'])->name('contact.store');
Route::get('/contacts', [ContactFormController::class, 'viewSubmissions'])->name('contacts.view');

// Delete a submission
Route::delete('/contacts/{id}', [ContactFormController::class, 'deleteSubmission'])->name('contacts.delete');
Route::get('/rechargesearch', [RechargeController::class, 'searchRecharges'])->name('Admin.rechargesearch');




