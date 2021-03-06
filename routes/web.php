<?php

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
/** DEFAULT ROUTE */
Route::get('/', function () {return view('welcome');});

if ( file_exists( app_path( 'Http/Controllers/LocalizationController.php') ) ) 
{
  Route::get('lang/{locale}', 'LocalizationController@lang');
}

/** HOME ROUTE */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');    

/** COMPANY ROUTE */
Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('/company/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('/company/destroy', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');
Route::post('/company/update/{id}',[App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::get('/company/edit/{id}',[App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');

/** EMPLOYEE ROUTE */
Route::get('/employe', [App\Http\Controllers\EmployeController::class, 'index'])->name('employe');
Route::get('/employe/create', [App\Http\Controllers\EmployeController::class, 'create'])->name('employe.create');
Route::post('/employe/store', [App\Http\Controllers\EmployeController::class, 'store'])->name('employe.store');
Route::get('/employe/destroy', [App\Http\Controllers\EmployeController::class, 'destroy'])->name('employe.destroy');
Route::post('/employe/update/{id}',[App\Http\Controllers\EmployeController::class, 'update'])->name('employe.update');
Route::get('/employe/edit/{id}',[App\Http\Controllers\EmployeController::class, 'edit'])->name('employe.edit');



