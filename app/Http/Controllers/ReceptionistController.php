<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Payment;
use App\Appointment;
use App\Waiting;
use Hash;
use DB;
use Alert;
use DateTime;
use Carbon\Carbon;


class ReceptionistController extends Controller
{
    //PATIENTS
    public function allpatients() {
        return view('receptionist.patients.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10));
    }

    public function create() {
        return view('receptionist.patients.create')
        ->with('users', User::orderBy('created_at','desc')->get());
    }

    public function create_patient(Request $request) {
        $patient = new Patient;
        $patient->firstname = $request->get('firstname');
        $patient->middlename = $request->get('middlename');
        $patient->lastname = $request->get('lastname');
        $patient->sex = $request->get('sex');
        $patient->dob = $request->get('dob');
        $patient->payment_mode = $request->get('payment_mode');
        $patient->amount_allocated = $request->get('amount_allocated');
        $patient->occupation = $request->get('occupation');
        $patient->postal_address = $request->get('postal_address');
        $patient->email = $request->get('email');
        $patient->phone_number = $request->get('phone_number');
        $patient->emergency_contact_name = $request->get('emergency_contact_name');
        $patient->emergency_contact_phone_number = $request->get('emergency_contact_phone_number');
        $patient->emergency_contact_relationship = $request->get('emergency_contact_relationship');
        $patient->doctor = $request->get('doctor');

        $patient->save();

        Alert::success('Patient Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    

    public function edit($id) {
        //get post data by id
        $user = User::findorFail($id);
            
        //load form view
        return view('receptionist.patients.edit', compact('patients'))
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));
    }

    public function show($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('receptionist.patients.edit')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->get())
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
        }
        else 
        {
            return view('receptionist.patients.edit');
        }
    }

    public function update() {
        //UPDATE `dms_patients` SET `id` = '2029' WHERE `dms_patients`.`id` = 1;
    }


    //PAYMENTS
    public function allpayments() {
        return view('receptionist.payments.show')
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(10));
    }

    public function new_payment($id) {
        $patient = Patient::findorFail($id);
        return view('receptionist.payments.create')
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->get())
        ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->get());
    }


    
    public function create_payment($patient_id, Request $request) {
        

        $date = $request->get('next_appointment');
        $next_appointment = date_format(date_create($date), 'Y-m-d');

        
        $amount_paid = $request->get('amount_paid');
        
        $amountdue = DB::select( DB::raw("SELECT amount_due FROM dms_payments WHERE patient_id = '$patient_id'") );
        $patient = Patient::findorFail($patient_id);
        // $amountdue = $patient->amount_due;
        foreach ($amountdue as $patient_due) {
            $final_due = $patient_due->amount_due;
            $balance = (float) $final_due - $amount_paid;
        }
        
    
        $amount_due = DB::select( DB::raw("UPDATE dms_payments SET next_appointment = '$next_appointment', amount_paid = '$amount_paid', balance = '$balance' WHERE patient_id = '$patient_id'") );

        Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
            return back();
        



    }

    public function edit_payment($id) {
        //get post data by id
        $user = User::findorFail($id);
            
        //load form view
        return view('receptionist.patients.edit', compact('patients'))
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));
    }

    public function show_payment($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('receptionist.patients.edit')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));   
        }
        else 
        {
            return view('receptionist.patients.edit');
        }
    }


    //APPOINTMENTS
    public function allappointments() {
        return view('receptionist.appointments.show')
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5));
    }

    public function new_appointment() {
        return view('receptionist.appointments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment(Request $request) {
        $patient = new Appointment();
        $patient->firstname = $request->get('firstname');
        $patient->middle_name = $request->get('middle_name');
        $patient->lastname = $request->get('lastname');
        $patient->sex = $request->get('sex');
        $patient->dob = $request->get('dob');
        $patient->insurance_provider = $request->get('insurance_provider');
        $patient->occupation = $request->get('occupation');
        $patient->postal_address = $request->get('postal_address');
        $patient->email = $request->get('email');
        $patient->phone_number = $request->get('phone_number');
        $patient->emergency_contact_name = $request->get('emergency_contact_name');
        $patient->emergency_contact_phone_number = $request->get('emergency_contact_phone_number');
        $patient->emergency_contact_relationship = $request->get('emergency_contact_relationship');

        $patient->save();
        \Session::flash('flash_message','Patient Added Successfully.');
        return back();
    }

    public function edit_appointment($id) {
        //get post data by id
        $user = User::findorFail($id);
            
        //load form view
        return view('receptionist.appointments.edit', compact('patients'))
        ->with('appointments', Appointment::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));
    }

    public function show_appointment($id) {
        $patient = Appointment::where('id',$id)->first();

        if($patient)
        {
            return view('receptionist.appointments.edit')
            ->with('appointments', Appointment::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));   
        }
        else 
        {
            return view('receptionist.patients.edit');
        }
    }


    //WAITING LIST
    public function allwaiting() {
        return view('receptionist.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(5));
    }

    public function new_waiting() {
        return view('receptionist.waitinglist.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }

    public function create_waiting(Request $request) {
        $patient = new Waiting();
        $patient->firstname = $request->get('firstname');
        $patient->middle_name = $request->get('middle_name');
        $patient->lastname = $request->get('lastname');
        $patient->sex = $request->get('sex');
        $patient->dob = $request->get('dob');
        $patient->insurance_provider = $request->get('insurance_provider');
        $patient->occupation = $request->get('occupation');
        $patient->postal_address = $request->get('postal_address');
        $patient->email = $request->get('email');
        $patient->phone_number = $request->get('phone_number');
        $patient->emergency_contact_name = $request->get('emergency_contact_name');
        $patient->emergency_contact_phone_number = $request->get('emergency_contact_phone_number');
        $patient->emergency_contact_relationship = $request->get('emergency_contact_relationship');

        $patient->save();
        \Session::flash('flash_message','Patient Added Successfully.');
        return back();
    }

    public function edit_waiting($id) {
        //get post data by id
        $user = User::findorFail($id);
            
        //load form view
        return view('receptionist.waitinglist.edit', compact('patients'))
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));
    }

    public function show_waiting($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('receptionist.waitinglist.edit')
            ->with('appointments', Appointment::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));   
        }
        else 
        {
            return view('receptionist.patients.edit');
        }
    }
















}
