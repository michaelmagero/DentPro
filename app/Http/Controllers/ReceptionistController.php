<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Payment;
use App\Appointment;
use Hash;
use DB;

class ReceptionistController extends Controller
{
    //PATIENTS
    public function allpatients() {
        return view('receptionist.patients.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10));
    }

    public function create() {
        return view('receptionist.patients.create');
    }

    public function create_patient(Request $request) {
        $patient = new Patient();

        $patient->firstname = $request->get('firstname');
        $patient->middlename = $request->get('middlename');
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
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));   
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
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5));
    }

    public function new_payment() {
        return view('receptionist.payments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }


    //$orders = DB::table('job_titles')->where('title', '=', '$title')->get();
    public function create_payment(Request $request) {

        $payment = new Payment();

        $payment->firstname = $request->get('firstname');
        $payment->middle_name = $request->get('middle_name');
        $payment->lastname = $request->get('lastname');
        $payment->sex = $request->get('sex');
        $payment->dob = $request->get('dob');
        $payment->insurance_provider = $request->get('insurance_provider');
        $payment->occupation = $request->get('occupation');
        $payment->postal_address = $request->get('postal_address');
        $payment->email = $request->get('email');
        $payment->phone_number = $request->get('phone_number');
        $payment->emergency_contact_name = $request->get('emergency_contact_name');
        $payment->emergency_contact_phone_number = $request->get('emergency_contact_phone_number');
        $payment->emergency_contact_relationship = $request->get('emergency_contact_relationship');

        $payment->save();
        \Session::flash('flash_message','Patient Added Successfully.');
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
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
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
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
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
