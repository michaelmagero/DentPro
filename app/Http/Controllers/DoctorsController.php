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

        //$patients = DB::select( DB::raw("SELECT * FROM dms_patients WHERE doctor = '$user_doc' "));
        
        return view('doctor.patients.show')
        ->with('patients', Patient::where('doctor', $user_doc)->orderBy('created_at','desc')->paginate(10))
;
    }

    public function show($id) {
        $patients = DB::select( DB::raw("SELECT * FROM dms_patients WHERE id = '$id' "));

            return view('doctor.patients.read')
            ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->paginate(1))
            ->with('payments', Payment::orderBy('created_at','desc')->paginate(1));
        
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

        return view('doctor.payments.show', compact('payments'))
            ->with('patients', Patient::orderBy('created_at','desc')->paginate(1))
            ->with('payments', Payment::where('doctor_id', $user_doc)->orderBy('created_at','desc')->paginate(10));

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
        $payment->procedure_cost = number_format($request->get('procedure_cost'),2);
        $payment->notes = $request->get('notes');

        $payment->save();

        $wait= DB::update(DB::raw("UPDATE dms_waitings set status = 'seen' where patient_id = $payment->patient_id "));
        
        Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        return redirect('all-waiting');
    }


    //APPOINTMENTS
    public function allappointments_doc() {
        return view('doctor.appointments.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(10))
        ->with('payments', Payment::where('doctor_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(10));
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
        Alert::success('Apppointment Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    public function delete_appointment($id) {
        $waiting = Appointment::findorFail($id);

        $wait= DB::update(DB::raw("UPDATE dms_appointments set appointment_status = 'Complete' where id = $waiting->patient_id "));

        $waiting->delete();

        Alert::success('Appointment Deleted Successfully', 'Deleted')->autoclose(2000);
        return back();
    }





    //WAITING LIST
    public function allwaiting_doc() {
        return view('doctor.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(10));
    }

    

    
}
