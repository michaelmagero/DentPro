<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Payment;
use App\User;
use App\Appointment;
use App\Waiting;
use Alert;
use DB;
use Auth;

class DoctorsController extends Controller
{
    //
    //PATIENTS
    public function allpatients_doc() {
        $user_doc = Auth::user()->name;

        $patients = DB::select( DB::raw("SELECT * FROM dms_patients WHERE doctor = '$user_doc' "));
        
        return view('doctor.patients.show', compact('patients'));
    }

    public function show($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('doctor.patients.read')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->get())
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
        }
        else 
        {
            return view('doctor.patients.read');
        }
    }

    public function medical_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('doctor.patients.medical_history', compact('payments'))
        ->with('users', User::orderBy('created_at','desc')->get())
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->get());
    }

    public function payment_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('doctor.patients.payment_history', compact('payments'))
        ->with('users', User::orderBy('created_at','desc')->get())
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->get());
    }

    






    //PAYMENTS
    public function allpayments() {
        $user_doc = Auth::user()->id;

        $payments = DB::select( DB::raw("SELECT * FROM dms_payments WHERE doctor_id = '$user_doc' "));
        foreach ($payments as $payment) {
            return view('doctor.payments.show', compact('payments'))
            ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
        }
    }

    public function create_payment() {
        return view('doctor.payments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5));
    }

    public function create_payment_id($id) {
        $patient = Patient::findorFail($id);
        return view('doctor.payments.create')
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->paginate(5));
    }

    public function insert_payment(Request $request) {
        $payment = new Payment();
        $payment->doctor_id = Auth::user()->id;
        $payment->patient_id = $request->get('patient_id');
        $payment->procedure = $request->get('procedure');
        $payment->amount_due = $request->get('amount_due');
        $payment->notes = $request->get('notes');

        $payment->save();
        Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        return back();
    }


    //APPOINTMENTS
    public function allappointments_doc() {
        return view('doctor.appointments.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5));
    }

    public function new_appointment_doc() {
        return view('doctor.appointments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment_doc(Request $request) {
        $appointment = new Appointment();

        $appointment->firstname = $request->get('firstname');
        $appointment->lastname = $request->get('lastname');
        $appointment->phone = $request->get('phone');
        $appointment->doctor = $request->get('doctor');
        $appointment->appointment_date = $request->get('appointment_date');
        $appointment->appointment_status = $request->get('appointment_status');

        $appointment->save();
        \Session::flash('flash_message','Patient Added Successfully.');
        return back();
    }

    public function delete_appointment($id) {
        $appointment = Appointment::find($id);

        if($appointment) {
            Appointment::where('id', $id)->update(['appointment_status' => 'Complete']);
        }

        $appointment->delete();

        \Session::flash('flash_message','Appointments Cleared Successfully.');
        return back();
    }













    //WAITING LIST
    public function allwaiting_doc() {
        return view('doctor.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(5));
    }

    

    
}
