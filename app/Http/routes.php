
<?php

use Yajra\Datatables\Datatables;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/patients/serverSide', [
    'as'   => 'patients.serverSide',
    'uses' => function () {
        $patients = App\Patient::select(['id', 'firstname', 'payment_mode', 'amount_allocated']);

        return Datatables::of($patients)->make();
    }
]);
