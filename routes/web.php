<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestmasterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PrintRegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginAuthController;
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
    return view('layouts.master');
});

Route::get('testcategory', [TestmasterController::class, 'testCategory']);
Route::get('testsubcategory', [TestmasterController::class, 'testSubCategory']);


Route::post('testcategory/savedata', [TestmasterController::class, 'saveCategory']);
Route::get('testcategory',[TestmasterController::class, 'showCategory']);
Route::get('testcategory/edit/{id}', [TestmasterController::class, 'getDataCategory']);
Route::get('testcategory/delete/{id}', [TestmasterController::class, 'deleteDataCategory']);
//Route::get('testcategory', [testmasterController::class, 'testCategory']);

Route::get('testsubcategory',[TestmasterController::class,'getTestCategory']);
//Route::get('testsubcategory',[TestmasterController::class, 'showSubCategory']);
Route::post('testsubcategory/savedata', [TestmasterController::class, 'saveSubCategory']);
Route::get('testsubcategory/edit/{id}', [TestmasterController::class, 'getDataSubCategory']);
Route::get('testsubcategory/delete/{id}', [TestmasterController::class, 'deleteDataSubCategory']);


Route::post('testentry',[TestmasterController::class,'subCatFilter']);
Route::post('testentry/savedata', [TestmasterController::class, 'saveTestEntry']);
Route::get('testentry/edit/{id}', [TestmasterController::class, 'getDataTestEntry']);
Route::get('testentry/delete/{id}', [TestmasterController::class, 'deleteTestEntry']);
Route::get('testentry',[TestmasterController::class,'getTestData']);


Route::get('registration',[RegistrationController::class,'registraion']);
Route::post('registration/savedata',[RegistrationController::class,'saveRegistration']);
Route::post('registration/getsubcategory',[RegistrationController::class,'getSubcategory']);
Route::post('registration/gettestname',[RegistrationController::class,'getTestName']);
Route::post('registration/gettestprice', [RegistrationController::class, 'getTestPrice']);
Route::post('registration/showdata', [RegistrationController::class, 'showData']);


Route::get('printpage/printbill/{patid}', [PrintRegistrationController::class, 'PrintBill']);
Route::post('printpage/delete', [PrintRegistrationController::class, 'del']);
Route::post('printpage/update', [PrintRegistrationController::class, 'updateStatus']);
Route::post('printpage/removehold', [PrintRegistrationController::class, 'updateStatuspending']);


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('print/printval/{reg}', [DashboardController::class, 'printregn']);

Route::get('user', [UserController::class, 'index']);
Route::post('user/savedata', [UserController::class, 'saveUser']);
Route::get('user/edit/{id}', [UserController::class, 'getUser']);
Route::get('user/delete/{id}', [UserController::class, 'deleteUser']);


//Route::middleware('auth')->group(function () {
    // routes that require authentication
    //::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');
//});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add more authenticated routes here

// Your login route
// Route::get('/login', [LoginAuthController::class,'index'])->name('login');
// Route::post('/login', [LoginAuthController::class,'checkLogin'])->name('login.check');

Route::get('/login', [LoginAuthController::class, 'index']);
Route::post('/login', [LoginAuthController::class, 'checkLogin']);
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
