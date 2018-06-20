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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['/middleware' => ['auth', 'web']], function() {
	//USER ROUTES (ADMIN)
	Route::get('all-users','AdminController@users');

	Route::get('new-user','AdminController@create');

	Route::post('new-user','AdminController@create_user');

	Route::get('/show-user/{id}','AdminController@show');

	Route::get('/edit-user/{id}','AdminController@edit');

	Route::post('/update-user/{id}','AdminController@update');

	Route::get('/delete-user/{id}','AdminController@destroy');




	//PATIENTS (ADMIN)
	Route::get('all-patients-admin','AdminController@allpatients');

	Route::get('new-patient-admin','AdminController@create_patient');

	Route::post('new-patient-admin','AdminController@insert_patient');

	Route::get('/show-patient-admin/{id}','AdminController@show_patient');

	Route::get('/patient-history-admin/{id}','AdminController@medical_history');

	Route::get('/payment-history-admin/{id}','AdminController@payment_history');

	Route::get('/edit-patient-admin/{id}','AdminController@edit_patient');

	Route::post('update-patient-admin/{id}','AdminController@update_patient');

	Route::get('/delete-patient-admin/{id}','AdminController@delete_patient');



	//PAYMENT ROUTES
	Route::get('all-payments-admin','AdminController@allpayments');

	Route::get('new-payment-admin/{id}','AdminController@new_payment');

	Route::post('new-payment-admin','AdminController@insert_payment');

	Route::post('new-payment-admin/{id}','AdminController@create_payment');

	Route::get('show-payment-admin/{id}','AdminController@show_payment');

	Route::get('edit-payment-admin/{id}','AdminController@edit_payment');

	Route::post('update-payment-admin/{id}','AdminController@update_payment');

	Route::get('/delete-payment-admin/{id}','AdminController@delete_payment');

	


	//APPOINTMENT ROUTES
	Route::get('all-appointments-admin','AdminController@allappointments');

	Route::get('new-appointment-admin','AdminController@new_appointment');

	Route::post('new-appointment-admin','AdminController@create_appointment');

	Route::get('new-appointment-existing-admin','AdminController@new_appointment_existing');

	Route::post('new-appointment-existing-admin','AdminController@create_appointment_existing');

	Route::get('/show-appointment-admin/{id}','AdminController@show_appointment');

	Route::get('/edit-appointment-admin/{id}','AdminController@edit_appointment');

	Route::post('update-appointment-admin/{id}','AdminController@update_appointment');

	Route::get('/delete-appointment-admin/{id}','AdminController@delete_appointment');





	//WAITING ROUTES
	Route::get('all-waiting-admin','AdminController@allwaiting');

	Route::get('new-waiting-appointment-admin/{id}','AdminController@create_waiting');

	Route::get('new-waiting-admin/{id}', 'AdminController@insert_waiting');

	Route::get('new-waiting-admin','AdminController@new_waiting');

	Route::post('new-waiting-admin','AdminController@insert_waiting');

	Route::get('/show-waiting-admin/{id}','AdminController@show_waiting');

	Route::get('/edit-waiting-admin/{id}','AdminController@edit_waiting');

	Route::post('update-waiting-admin','AdminController@update_waiting');

	Route::get('/delete-waiting-admin/{id}','AdminController@delete_waiting');





	//PROCEDURES ROUTES
	Route::get('all-procedures','AdminController@allprocedures');

	Route::get('new-procedure','AdminController@create_procedure');

	Route::post('create-procedure','AdminController@insert_procedure');

	//Route::get('/show-waiting-admin/{id}','AdminController@show_waiting');

	Route::get('/edit-procedure/{id}','AdminController@edit_procedure');

	Route::post('update-procedure/{id}','AdminController@update_procedure');

	Route::get('/delete-procedure/{id}','AdminController@delete_procedure');




	//INSURANCE PROVIDER
	Route::get('all-providers','AdminController@allproviders');

	Route::get('new-provider','AdminController@create_provider');

	Route::post('create-provider','AdminController@insert_provider');

	//Route::get('/show-waiting-admin/{id}','AdminController@show_waiting');

	Route::get('/edit-provider/{id}','AdminController@edit_provider');

	Route::post('update-provider/{id}','AdminController@update_provider');

	Route::get('/delete-provider/{id}','AdminController@delete_provider');






	//EXPENSES ROUTES
	Route::get('all-expenses-admin','AdminController@allexpenses');

	Route::get('new-expense-admin','AdminController@create_expense');

	Route::post('new-expense-admin','AdminController@insert_expense');

	Route::get('show-expense-admin/{id}','AdminController@show_expense');

	Route::get('edit-expense-admin/{id}','AdminController@edit_expense');

	Route::post('update-expense-admin/{id}','AdminController@update_expense');

	Route::get('/delete-expense-admin/{id}','AdminController@delete_expense');

	

	//LABWORK ROUTES
	Route::get('all-labwork-admin','AdminController@all_lab_list');

	Route::get('new-labwork-admin','AdminController@create_labwork');

	Route::post('new-labwork-admin','AdminController@insert_labwork');

	Route::get('show-labwork-admin/{id}','AdminController@show_labwork');

	Route::get('edit-labwork-admin/{id}','AdminController@edit_labwork');

	Route::post('update-labwork-admin/{id}','AdminController@update_labwork');

	Route::get('delete-labwork-admin/{id}','AdminController@delete_labwork');

	










	/* LOGIC FROM RECEPTIONIST CONTROLLER */



	//PATIENT ROUTES (RECEPTIONIST)
	Route::get('all-patients','ReceptionistController@allpatients');

	Route::get('new-patient','ReceptionistController@create');

	Route::post('new-patient','ReceptionistController@create_patient');

	Route::get('/show-patient/{id}','ReceptionistController@show');

	Route::get('/patient-history/{id}','ReceptionistController@medical_history');

	Route::get('/payment-history/{id}','ReceptionistController@payment_history');

	Route::get('/edit-patient/{id}','ReceptionistController@edit');

	Route::post('update-patient/{id}','ReceptionistController@update_patient');

	Route::get('/delete-patient/{id}','ReceptionistController@delete_patient');



	//PAYMENT ROUTES (RECEPTIONIST)
	Route::get('all-payments','ReceptionistController@allpayments');

	Route::get('new-payment/{id}','ReceptionistController@new_payment');

	Route::post('new-payment/{id}','ReceptionistController@create_payment');
		//INVOICE AND RECEIPTS [BEGIN]
	Route::get('new-receipt/{id}','ReceptionistController@new_receipt');

	Route::get('new-invoice/{id}','ReceptionistController@new_invoice');

		//INVOICE AND RECEIPTS [END]

	Route::get('show-payment/{id}','ReceptionistController@show_payment');

	Route::get('edit-payment/{id}','ReceptionistController@edit_payment');

	Route::post('update-payment/{id}','ReceptionistController@update_payment');

	Route::get('/delete-payment/{id}','ReceptionistController@delete_payment');

	


	//APPOINTMENT ROUTES (RECEPTIONIST)
	Route::get('all-appointments','ReceptionistController@allappointments');

	Route::get('new-appointment','ReceptionistController@new_appointment');

	Route::post('new-appointment','ReceptionistController@create_appointment');

	Route::get('new-appointment-existing','ReceptionistController@new_appointment_existing');

	Route::post('new-appointment-existing','ReceptionistController@create_appointment_existing');

	Route::get('/show-appointment/{id}','ReceptionistController@show_appointment');

	Route::get('/edit-appointment/{id}','ReceptionistController@edit_appointment');

	Route::post('update-appointment/{id}','ReceptionistController@update_appointment');

	Route::get('/delete-appointment/{id}','ReceptionistController@delete_appointment');


	//WAITING ROUTES (RECEPTIONIST)
	Route::get('all-waiting','ReceptionistController@allwaiting');

	Route::get('new-waiting-appointment/{id}','ReceptionistController@create_waiting');

	Route::get('new-waiting/{id}', 'ReceptionistController@insert_waiting');

	Route::get('/show-waiting/{id}','ReceptionistController@show_waiting');

	Route::get('/edit-waiting/{id}','ReceptionistController@edit_waiting');

	Route::post('update-waiting','ReceptionistController@update_waiting');

	Route::get('/delete-waiting/{id}','ReceptionistController@delete_waiting');

	
	//EXPENSES ROUTES
	Route::get('all-expenses','ReceptionistController@allexpenses');

	Route::get('new-expense','ReceptionistController@create_expense');

	Route::post('new-expense','ReceptionistController@insert_expense');


	//LABWORK ROUTES
	Route::get('all-labwork','ReceptionistController@all_lab_list');

	// Route::get('new-labwork','ReceptionistController@create_labwork');

	// Route::post('new-labwork','ReceptionistController@insert_labwork');

	Route::get('show-labwork/{id}','ReceptionistController@show_labwork');

	Route::get('edit-labwork/{id}','ReceptionistController@edit_labwork');

	Route::post('update-labwork/{id}','ReceptionistController@update_labwork');

	Route::get('delete-labwork/{id}','ReceptionistController@delete_labwork');








	/* LOGIC FROM DOCTORS CONTROLLER */


	//PATIENT ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-patients-doc','DoctorsController@allpatients_doc');

	// Route::get('new-doc-patient','DoctorsController@create');

	// Route::post('new-doc-patient','DoctorsController@insert');

	Route::get('/show-doc-patient/{id}','DoctorsController@show');

	Route::get('/patient-history-doc/{id}','DoctorsController@medical_history');

	Route::get('/payment-history-doc/{id}','DoctorsController@payment_history');

	// Route::get('/edit-doc-patient/{id}','DoctorsController@edit');

	// Route::post('update-patient','DoctorsController@update');

	// Route::get('/delete-patient/{patient_id}','DoctorsController@delete');








	//PAYMENTS ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-payments-doc','DoctorsController@allpayments');

	Route::get('new-doc-payment','DoctorsController@create_payment');

	Route::post('new-doc-payment','DoctorsController@insert_payment');

	Route::get('new-doc-payment/{id}','DoctorsController@create_payment_id');

	Route::get('/show-doc-payment/{id}','DoctorsController@show_payment');

	Route::get('/edit-doc-payment/{id}','DoctorsController@edit_payment');

	Route::post('update-payment','DoctorsController@update_payment');

	Route::get('/delete-payment/{id}','DoctorsController@delete_payment');



	//APPOINTMENTS ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-appointments-doc','DoctorsController@allappointments_doc');

	Route::get('new-appointment-doc','DoctorsController@new_appointment_doc');

	Route::post('new-appointment-doc','DoctorsController@create_appointment_doc');

	// Route::get('/show-appointment/{id}','DoctorsController@show_appointment');

	// Route::get('/edit-appointment/{id}','DoctorsController@edit_appointment');

	// Route::post('update-appointment','DoctorsController@update_appointment');

	Route::get('/delete-appointment-doc/{id}','DoctorsController@delete_appointment');





	//WAITING ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-waiting-doc','DoctorsController@allwaiting_doc');

	// Route::get('/show-appointment/{id}','DoctorsController@show_appointment');

	// Route::get('/edit-appointment/{id}','DoctorsController@edit_appointment');

	// Route::post('update-appointment','DoctorsController@update_appointment');

	// Route::get('/delete-appointment/{id}','DoctorsController@delete_appointment');


	//LABWORK ROUTES (LOGIC FROM DOCTOR CONTROLLER)
	Route::get('all-lablist-doc','DoctorsController@all_lab_list');

	// Route::get('/show-appointment/{id}','DoctorsController@show_appointment');

	// Route::get('/edit-appointment/{id}','DoctorsController@edit_appointment');

	// Route::post('update-appointment','DoctorsController@update_appointment');

	// Route::get('/delete-appointment/{id}','DoctorsController@delete_appointment');




	
	});
