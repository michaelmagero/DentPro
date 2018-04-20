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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', function () {
    return redirect('/admin-dash');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin-dash', 'AdminController@home');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@login');


Route::group(['/middleware' => ['auth', 'web']], function() {
	//USER ROUTES (ADMIN)
	Route::get('all-users','AdminController@users');

	Route::get('new-user','AdminController@create');

	Route::post('new-user','AdminController@create_user');

	Route::get('/edit-user/{id}','AdminController@edit');

	Route::post('update-user','AdminController@update');

	Route::get('/delete-user/{id}','AdminController@destroy');



	/* LOGIC FROM RECEPTIONIST CONTROLLER */



	//PATIENT ROUTES (RECEPTIONIST)
	Route::get('all-patients','ReceptionistController@allpatients');

	Route::get('new-patient','ReceptionistController@create');

	Route::post('new-patient','ReceptionistController@create_patient');

	Route::get('/show-patient/{id}','ReceptionistController@show');

	Route::get('/edit-patient/{id}','ReceptionistController@edit');

	Route::post('update-patient','ReceptionistController@update');

	Route::get('/delete-patient/{id}','ReceptionistController@delete');



	//PAYMENT ROUTES (RECEPTIONIST)
	Route::get('all-payments','ReceptionistController@allpayments');

	Route::get('new-payment','ReceptionistController@new_payment');

	Route::post('new-payment','ReceptionistController@create_payment');

	Route::get('all-invoices','ReceptionistController@invoices');

	Route::get('new-invoice','ReceptionistController@create_invoice');

	Route::post('new-invoice','ReceptionistController@insert_invoice');

	Route::get('/show-payment/{id}','ReceptionistController@show_payment');

	Route::get('/show-invoice/{id}','ReceptionistController@show_invoice');

	Route::get('/delete-invoice/{id}','ReceptionistController@delete_invoice');


	//APPOINTMENT ROUTES (RECEPTIONIST)
	Route::get('all-appointments','ReceptionistController@allappointments');

	Route::get('new-appointment','ReceptionistController@new_appointment');

	Route::post('new-appointment','ReceptionistController@insert_appointment');

	Route::get('/show-appointment/{id}','ReceptionistController@show_appointment');

	Route::get('/edit-appointment/{id}','ReceptionistController@edit_appointment');

	Route::post('update-appointment','ReceptionistController@update_appointment');

	Route::get('/delete-appointment/{id}','ReceptionistController@delete_appointment');


	//WAITING ROUTES (RECEPTIONIST)
	Route::get('all-waiting','ReceptionistController@allwaiting');

	Route::get('new-waiting','ReceptionistController@new_waiting');

	Route::post('new-waiting','ReceptionistController@insert_waiting');

	Route::get('/show-waiting/{id}','ReceptionistController@show_waiting');

	Route::get('/edit-waiting/{id}','ReceptionistController@edit_waiting');

	Route::post('update-waiting','ReceptionistController@update_waiting');

	Route::get('/delete-waiting/{id}','ReceptionistController@delete_waiting');






	/* LOGIC FROM DOCTORS CONTROLLER */


	//PATIENT ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-patients-doc','DoctorsController@allpatients_doc');

	// Route::get('new-doc-patient','DoctorController@create');

	// Route::post('new-doc-patient','DoctorController@insert');

	// Route::get('/show-patient/{id}','DoctorController@show');

	// Route::get('/edit-patient/{id}','DoctorController@edit');

	// Route::post('update-patient','DoctorController@update');

	// Route::get('/delete-patient/{id}','DoctorController@delete');



	//PAYMENTS ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-payments-doc','DoctorsController@allpayments');

	// Route::get('new-doc-appointment','DoctorsController@create_appointment');

	// Route::post('new-doc-appointment','DoctorsController@insert_appointment');

	// Route::get('/show-appointment/{id}','DoctorsController@show_appointment');

	// Route::get('/edit-appointment/{id}','DoctorsController@edit_appointment');

	// Route::post('update-appointment','DoctorsController@update_appointment');

	// Route::get('/delete-appointment/{id}','DoctorsController@delete_appointment');



	//APPOINTMENTS ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-appointments-doc','DoctorsController@allappointments');

	Route::get('new-appointment-doc','DoctorsController@new_appointment_doc');

	Route::post('new-appointment-doc','DoctorsController@create_appointment_doc');

	// Route::get('/show-appointment/{id}','DoctorsController@show_appointment');

	// Route::get('/edit-appointment/{id}','DoctorsController@edit_appointment');

	// Route::post('update-appointment','DoctorsController@update_appointment');

	// Route::get('/delete-appointment/{id}','DoctorsController@delete_appointment');





	//WAITING ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-waiting-doc','DoctorsController@allwaiting_doc');

	// Route::get('/show-appointment/{id}','DoctorsController@show_appointment');

	// Route::get('/edit-appointment/{id}','DoctorsController@edit_appointment');

	// Route::post('update-appointment','DoctorsController@update_appointment');

	// Route::get('/delete-appointment/{id}','DoctorsController@delete_appointment');




	
	});
