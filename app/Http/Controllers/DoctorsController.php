<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User;

class DoctorsController extends Controller
{
    //
    //PATIENTS
    public function allpatients_doc() {
        return view('doctor.patients.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }

    public function new_patient_doc() {
        return view('doctor.patients.create');
    }

    public function create_patient_doc(Request $request) {
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

    public function edit($id) {
        //get post data by id
        $user = User::findorFail($id);
            
        //load form view
        return view('doctor.patients.edit', compact('patients'))
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));
    }

    public function show($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('doctor.patients.edit')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5));   
        }
        else 
        {
            return view('doctor.patients.edit');
        }
    }




    //PAYMENTS
    public function allpayments() {
        return view('doctor.payments.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }


    //APPOINTMENTS
    public function allappointments() {
        return view('doctor.appointments.show')
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function new_appointment_doc() {
        return view('doctor.appointments.create');
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
