<?php

use App\Http\Controllers\Api\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/testapi',[PaymentController::class, 'index' ]);
Route::post('/api-paypal-process-transaction', [PaymentController::class, 'processPaypalTransactionApi'])->name('apiPaypalProcessTransaction');
Route::get('/api-paypal-success-transaction', [PaymentController::class, 'successPaypalTransactionApi'])->name('apiPaypalSuccessTransaction');
Route::get('/api-paypal-cancel-transaction', [PaymentController::class, 'cancelPaypalTransactionApi'])->name('apiPaypalcancelTransaction');
// Route::get('/api-paypal-success', [PaymentController::class, 'success'])->name('success');
// Route::get('/api-paypal-cancel', [PaymentController::class, 'cancel'])->name('cancel');
