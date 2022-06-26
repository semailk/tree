<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CertificateController::class, 'index'])->name('certificate.index');

Route::prefix('certificates/')->group(function (){
    Route::post('store', [CertificateController::class, 'store'])->name('certificate.store');
    Route::get('activates', [CertificateController::class, 'activates'])->name('certificate.activate');
    Route::post('status', [CertificateController::class, 'certificateActivate'])->name('status');
    Route::get('delete/{id}', [CertificateController::class, 'softDelete'])->name('certificate.delete');
});

Route::post('add-balance', [User::class, 'addBalance'])->name('add-balance');

Auth::routes();

Route::get('/balance', [HomeController::class, 'getBalancePage'])->name('balance');
