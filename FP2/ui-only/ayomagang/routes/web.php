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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware'=>['auth','Housingofficer']],function(){
//    Route::get('/dashboard', function () {
//        return view('Housingofficer.dashboard');
//    });
//    Route::get('/viewresidences','Housingofficer\DashboardController@viewresidences');
//    Route::get('/editresidences{residenceID}','Housingofficer\DashboardController@editresidences');
//    Route::put('/updateresidences{residenceID}','Housingofficer\DashboardController@updateresidences');
//    Route::get('/addresidences','Housingofficer\DashboardController@addresidences');
//    Route::post('/addresidences','Housingofficer\DashboardController@store')->name('addedData');
//    
//    Route::get('/viewapplications','Housingofficer\DashboardController@viewapplication');
//    Route::get('/editapplication{applicationID}','Housingofficer\DashboardController@editapplication');
//    Route::put('/updateapplication{applicationID}','Housingofficer\DashboardController@updateapplication');
//    Route::get('/deleteapplication{applicationID}','Housingofficer\DashboardController@deleteapplication');
//    
//    Route::get('/viewallocation','Housingofficer\DashboardController@viewallocation');
//    Route::get('/allocatehousing{applicationID}','Housingofficer\DashboardController@allocatehousing');
//    Route::get('/confirmallocate/{applicationID}/{unitNo}','Housingofficer\DashboardController@confirmallocate');
//    Route::post('/allocate','Housingofficer\DashboardController@storeallocate');
//    Route::get('/deleteallocation{unitNo}','Housingofficer\DashboardController@deleteallocate');
//    
//    Route::get('/viewapplicant','Housingofficer\DashboardController@viewapplicant');
//    Route::get('/viewhousingofficer','Housingofficer\DashboardController@viewhousingofficer');
//    
//    Route::get('/editapplicant{id}','Housingofficer\DashboardController@editapplicant');
//    Route::put('/updateapplicant{id}','Housingofficer\DashboardController@updateapplicant');
//    Route::get('/deleteapplicant{id}','Housingofficer\DashboardController@deleteapplicant');
//    
//    Route::put('/updatehousingofficer{id}','Housingofficer\DashboardController@updatehousingofficer');
//    Route::get('/edithousingofficer{id}','Housingofficer\DashboardController@edithousingofficer');
//    Route::get('/deletehousingofficer{id}','Housingofficer\DashboardController@deletehousingofficer');
//});
//
//Route::group(['middleware'=>['auth','Applicant']],function(){
//    Route::get('/dashboard_user', function () {
//        return view('Applicant.dashboard_user');
//    });
//    Route::get('/dashboard_user','ApplicantController@ViewApplication');
//    Route::get('/ViewResidence','ApplicantController@ViewResidence');
//    Route::get('/SubmitApplication/{residenceID}','ApplicantController@SubmitApplication');
//    Route::post('/store','ApplicantController@store');
//});
