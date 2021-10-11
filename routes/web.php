<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*
Route::resource('types', App\Http\Controllers\TypeController::class)->middleware('auth');
Route::resource('clients', App\Http\Controllers\ClientController::class)->middleware('auth');
Route::resource('accounts', App\Http\Controllers\AccountController::class)->middleware('auth');

Route::resource('registrations', App\Http\Controllers\RegistrationController::class)->middleware('auth');

Route::get('transactions/createthird',[TransactionController::class,'createthird'])->name('transactions.createthird')->middleware('auth');
Route::get('transactions/status',[TransactionController::class,'status'])->name('transactions.status')->middleware('auth');

Route::resource('transactions', App\Http\Controllers\TransactionController::class)->middleware('auth');
Route::post('transactions/showstatus',[TransactionController::class,'showstatus'])->name('transactions.showstatus')->middleware('auth');
*/
/*Route::get('transactions/create',[TransactionController::class,'create'])->name('transactions.create')->middleware('auth');
Route::get('transactions',[TransactionController::class,'index'])->name('transactions.index')->middleware('auth');
Route::post('transactions',[TransactionController::class,'store'])->name('transactions.store')->middleware('auth');
Route::get('transactions/{transaction}',[TransactionController::class,'show'])->name('transactions.show')->middleware('auth');
Route::get('transactions/{transaction}/edit',[TransactionController::class,'edit'])->name('transactions.edit')->middleware('auth');
*/
//Route::put('transactions/{transaction}/update',[TransactionController::class,'update'])->name('transactions.update');
//Route::delete('transactions/{transaction}',[TransactionController::class,'destroy'])->name('transactions.destroy');

Route::middleware('auth')->group( callback: function () {

    Route::resource('types', App\Http\Controllers\TypeController::class);
    Route::resource('clients', App\Http\Controllers\ClientController::class);
    Route::resource('accounts', App\Http\Controllers\AccountController::class);

    Route::resource('registrations', App\Http\Controllers\RegistrationController::class);

    Route::get('transactions/createthird',[TransactionController::class,'createthird'])->name('transactions.createthird');
    Route::get('transactions/status',[TransactionController::class,'status'])->name('transactions.status');

    Route::resource('transactions', App\Http\Controllers\TransactionController::class);
    Route::post('transactions/showstatus',[TransactionController::class,'showstatus'])->name('transactions.showstatus');
 
 });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::get('/home', function () {
    $user=Auth::user();
    if(Auth::user()->isCashier()){
    //if(true){ 
        echo "Es cajero";
    }else{
        echo "Es cliente";
    }
    return view('welcome');
});
*/
