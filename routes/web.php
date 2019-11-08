<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin-home');
});

Route::post('/generalSettings', 'GeneralSettingController@updateInfo')->name('general.settings');
Route::get('/generalSettings', 'GeneralSettingController@index')->name('general.settings.index');

Route::post('/setWorkingDays', 'SetWorkingDaysController@updateInfo')->name('set.working.days');
Route::get('/setWorkingDays', 'SetWorkingDaysController@index')->name('get.working.days');

Route::resource('setHolidays', 'SetHolidayController')->except([
    'create', 'show','edit'
]);
Route::get('findHoliday', 'SetHolidayController@searchHoliday');

Route::resource('department', 'DepartmentController')->except([
    'create', 'show','edit'
]);;



Route::get('/admin/{vue_capture?}', function () {return view('admin');})->where('vue_capture', '[\/\w\.-]*');
Route::get('/{path}', 'HomeController@index')->where('path','.*');