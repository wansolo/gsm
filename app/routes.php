<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('login');
});

Route::group(array('before' => 'auth'), function(){
	Route::get('dashboard/', array('as' => 'home', 'uses' => 'DashboardController@index' ));
	Route::get('dashboard/users', array('as' => 'users', 'uses' => 'DashboardController@showUsers' ));
	Route::get('dashboard/addtocycle/{id?}', array('as' => 'addtocycleform', 'uses' => 'DashboardController@addtocycleform' ));

	Route::post('dashboard/additiontocycle', array('as' => 'additiontocycle', 'uses' => 'DashboardController@addtocycle' ));
	Route::get('dashboard/viewcycle/{id}', array('as' => 'viewcycle', 'uses' => 'DashboardController@viewcycle' ));

	Route::get('dashboard/addnewcycle/{id?}', array('as' => 'addnewcycleform', 'uses' => 'DashboardController@addnewcycleform'));
	Route::post('dashboard/addtonewcycle/{id?}', array('as' => 'addtonewcycle', 'uses' => 'DashboardController@addtonewcycle'));

	Route::get('dashboard/listactiveusers', array(' before' => 'auth' , 'as' => 'listactiveusers', 'uses' => 'AdminController@listactiveusers' ));
	Route::get('dashboard/listpendingusers', array(' before' => 'auth' , 'as' => 'listpendingusers', 'uses' => 'AdminController@listpendingusers' ));
	Route::get('dashboard/activateuser/{id}', array(' before' => 'auth' , 'as' => 'activate', 'uses' => 'AdminController@activateuser' ));
	Route::get('dashboard/pending-payment', array('as' => 'payment', 'uses' => 'AdminController@pendingpayments'));
	Route::get('dashboard/all-payment', array('as' => 'all-payment', 'uses' => 'AdminController@allpayments'));
	
	Route::get('dashboard/dismiss/{id}', array('as' => 'dismiss', 'uses' => 'DashboardController@dismiss'));
	Route::get('dashboard/viewmessages', array('as' => 'viewmessages', 'uses' => 'DashboardController@viewmessages'));
	Route::get('dashboard/viewaccounts', array('as' => 'viewaccounts', 'uses' => 'DashboardController@viewaccounts'));
	Route::get('dashboard/viewrefferals', array('as' => 'viewrefferals', 'uses' => 'DashboardController@viewrefferals'));

	Route::get('dashboard/payment/{id}', array('as' => 'confirm-payment', 'uses' => 'AdminController@confirmpayment'));
	
	

});


Route::get('register', array('as' => 'register', 'uses' => 'UserController@create' ));
Route::post('register', array('as' => 'register', 'uses' => 'UserController@store' ));
Route::get('login', array('as' => 'login', 'uses' => 'UserController@index' ))->before('guest');
Route::post('login', array('as' => 'login', 'uses' => 'UserController@login' ));
Route::get('logout', array('as' => 'logout', function () {
	Auth::logout();
    return Redirect::route('login')->with('flash_notice', 'You are successfully logged out.');
}))->before('auth');



Route::post('password/forgotpassword', array('uses' => 'UserController@forgotpassword', 'as' => 'forgotpassword' ));
Route::get('password/forgotpassword', array('uses' => 'UserController@resetpassword','as' => 'resetpassword'));
Route::get('password/resetpassword/{id}', array('uses' => 'UserController@changepassword','as' => 'newpassword'));
Route::post('password/newpassword/{id}', array('uses' => 'UserController@newpassword','as' => 'changepassword'));
