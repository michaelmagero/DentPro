<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Payment;
use App\User;
use Alert;

class DoctorsController extends Controller
{
    //
    //PATIENTS
    public function allpatients_doc() {
        return view('doctor.patients.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
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



    //PAYMENTS
    public function allpayments() {
        return view('doctor.payments.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }

    public function create_payment() {
        return view('doctor.payments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }

    public function insert_payment(Request $request) {
        $payment = new Payment();
        $payment->patient_id = $request->get('patient_id');
        $payment->procedure = $request->get('procedure');
        $payment->amount_due = $request->get('amount_due');
        $payment->notes = $request->get('notes');

        $payment->save();
        Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        return back();
    }


    //APPOINTMENTS
    public function allappointments() {
        return view('doctor.appointments.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function new_appointment_doc() {
        return view('doctor.appointments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment_doc(Request $request) {
        $patient = new Patient();
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


    //WAITING LIST
    public function allwaiting_doc() {
        return view('doctor.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }
}
