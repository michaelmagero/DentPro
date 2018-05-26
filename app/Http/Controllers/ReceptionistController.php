<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Payment;
use App\Appointment;
use App\Waiting;
use App\Expense;
use Hash;
use DB;
use Alert;
use DateTime;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;


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
        
        $patient = new Patient();
            
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
        $patient->referred_by = $request->get('referred_by');
        $patient->alcoholic = $request->get('alcoholic');
        $patient->smoker = $request->get('smoker');
        $patient->allergic_reactions = $request->get('allergic_reactions');
        $patient->disease_history = $request->get('disease_history');
        $patient->cardiovascular_disease = $request->get('cardiovascular_diseas;');
            
        $patient->save();

        Waiting::create([
            'patient_id' => $patient->id,
            'firstname' => $request->get('firstname'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'payment_mode' => $request->get('payment_mode'),
            'amount_allocated' => $request->get('amount_allocated'),
            'doctor' => $request->get('doctor'),
        ]);
        
        Alert::success('Patient Added Successfully', 'Success')->autoclose(2000);
        return redirect('all-waiting');
    }

    

    public function edit($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('receptionist.patients.edit', compact('patients'))
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(1))
        ->with('users', User::orderBy('created_at','desc')->get());
    }

    public function show($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('receptionist.patients.read')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->paginate(1))
            ->with('payments', Payment::orderBy('created_at','desc')->paginate(1));   
        }
        else 
        {
            return view('receptionist.patients.edit');
        }
    }

    public function medical_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
        //$patient_doc = Patient::where('role', 'doctor')->get();
            
        //load form view
        return view('receptionist.patients.medical_history', compact('payments'))
        ->with('users', User::orderBy('created_at','desc')->paginate(1))
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(1))
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->paginate(1));
    }

    public function payment_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('receptionist.patients.payment_history', compact('payments'))
        ->with('users', User::orderBy('created_at','desc')->get())
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->get());
    }

    public function update_patient(Request $request, $id) {
        // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'firstname'       => 'required',
                'middlename'      => 'required',
                'lastname'      => 'required',
                'email'      => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('edit-patient/' . $id)
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $patient = Patient::find($id);
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
                $patient->referred_by = $request->get('referred_by');
                $patient->alcoholic = $request->get('alcoholic');
                $patient->smoker = $request->get('smoker');
                $patient->allergic_reactions = $request->get('allergic_reactions');
                $patient->disease_history = $request->get('disease_history');
                $patient->cardiovascular_disease = $request->get('cardiovascular_diseas;');
                $patient->save();


                Waiting::where('patient_id', $id)->update(array('firstname' => $request->get('firstname'), 'middlename' => $request->get('middlename'),'lastname' => $request->get('lastname'), 'payment_mode' => $request->get('payment_mode'), 'amount_allocated' => $request->get('amount_allocated'), 'doctor' => $request->get('doctor') ));
                

                // redirect
                Alert::success('Successfully Updated!', 'Success')->autoclose(2500);
                return back();
            }
    }

    public function delete_patient($id) {
        $patient = Patient::where('id',$id)->first();

        $patient->delete();

        Alert::success('Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }












    //PAYMENTS
    public function allpayments() {
        return view('receptionist.payments.show')
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(10))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(1));
    }

    public function new_payment($id) {
        $patient = Patient::findorFail($id);

        return view('receptionist.payments.create', compact('payments'))
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->get())
        ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->get())
        ->with('waitings', Waiting::where('patient_id', $patient->id)->orderBy('created_at','desc')->get());
    }


    
    public function create_payment($id, Request $request) {

        // $balance = "GET BALANCE FROM your ACCOUNT";
        // if ($balance < $amount_being_paid) {
        //     charge_huge_overdraft_fees();
        // }
        // $balance = $balance - $amount_being paid;
        // UPDATE your ACCOUNT SET BALANCE = $balance;

        // $balance = "GET BALANCE FROM receiver ACCOUNT"
        // charge_insane_transaction_fee();
        // $balance = $balance + $amount_being_paid
        // UPDATE receiver ACCOUNT SET BALANCE = $balance

        //get appointment date
        $date = $request->get('next_appointment');
        $next_appointment = date_format(date_create($date), 'Y-m-d');
        
        //get amount paid
        $amount_paid = number_format($request->get('amount_paid'),2);

        //dd(number_format($amount_paid,2));

        $patient = Patient::find($id);
        $pid = $patient->id;
               
        $procedure_cost = DB::select(DB::raw("SELECT procedure_cost FROM dms_payments WHERE patient_id ='$pid' "));

        $cost = $procedure_cost[0]->procedure_cost;

        $balance = (double)str_replace(',','',$cost) - (double)str_replace(',','',$amount_paid);

        $final_balance = number_format($balance,2);

        $pay = new Payment();
        $pay = Payment::where('patient_id',$id)->first();

        $pay->amount_paid = $amount_paid;
        $pay->balance = $final_balance;
        $pay->next_appointment = $next_appointment;
        $pay->save();
            
        
        Alert::success('User Registered Successfully!', 'Success')->autoclose(2500);
        return redirect('all-payments');
        
    }

    public function edit_payment($patient_id) {
        //get post data by id
        $payment = Payment::where('id',$patient_id)->first();
            
        //load form view
        return view('receptionist.payments.edit', compact('payments'))
        ->with('patients', Patient::where('id', $patient_id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $patient_id)->orderBy('created_at','desc')->get());
    }

    public function show_payment($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('receptionist.payments.read')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5)) 
            ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->get()); 
        }
        else 
        {
            return view('receptionist.payments.read');
        }
    }


    public function update_payment(Request $request, $id) {


        
        $procedure = $request->get('procedure');
        $amount_due = $request->get('amount_due');
        $amount_paid = $request->get('amount_paid');
        
        $balance = (float) $amount_due - $amount_paid;

        $next_appointment = $request->get('next_appointment');
        $notes = $request->get('notes');

        Payment::where('patient_id', $id)->update(array('procedure' => $procedure, 'amount_due' => $amount_due,'amount_paid' => $amount_paid, 'balance' => $balance, 'next_appointment' => $next_appointment, 'notes' => $notes ));

        Alert::success('Update Successfull', 'Success')->autoclose(2000);
        return back();
    }



    public function delete_payment($id) {
        $payment = Payment::where('id',$id)->first();

        $payment->delete();

        Alert::success('Appointment Cleared', 'Success')->autoclose(2000);
        return back();
    }








    //APPOINTMENTS
    public function allappointments() {

        return view('receptionist.appointments.show')
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(10))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(1));
    }

    public function new_appointment() {
        return view('receptionist.appointments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment(Request $request) {
        

        $appointment = new Appointment();

        $appointment->firstname = $request->get('firstname');
        $appointment->middlename = $request->get('middlename');
        $appointment->lastname = $request->get('lastname');
        $appointment->phone_number = $request->get('phone_number');
        $appointment->doctor = $request->get('doctor');

        $date = $request->get('appointment_date');
        $appointment->appointment_date = date_format(date_create($date), 'Y-m-d');

        $appointment->appointment_status = $request->get('appointment_status');

        $appointment->save();

        Alert::success('Appointment Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    public function new_appointment_existing() {
        return view('receptionist.appointments.create-existing')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment_existing(Request $request) {

        $appointment = new Appointment();

        $appointment->patient_id = $request->get('patient_id');
        $appointment->firstname = $request->get('firstname');
        $appointment->middlename = $request->get('middlename');
        $appointment->lastname = $request->get('lastname');
        $appointment->phone_number = $request->get('phone_number');
        $appointment->doctor = $request->get('doctor');

        $date = $request->get('appointment_date');
        $appointment->appointment_date = date_format(date_create($date), 'Y-m-d');

        $appointment->appointment_status = $request->get('appointment_status');

        $appointment->save();

        Alert::success('Appointment Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    

    public function edit_appointment($id) {
            
        //load form view
        return view('receptionist.appointments.edit', compact('appointments'))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->get())
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function show_appointment($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('receptionist.appointments.read')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->get())
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
        }
        else 
        {
            return view('doctor.patients.read');
        }
    }

    public function update_appointment(Request $request, $id) {
        // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'firstname'       => 'required',
                'lastname'      => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('edit-appointment/' . $id)
                    ->withErrors($validator);
            } else {
                // store
                $appointment = Appointment::find($id);
                $appointment->firstname = $request->get('firstname');
                $appointment->lastname = $request->get('middlename');
                $appointment->lastname = $request->get('lastname');
                $appointment->phone_number = $request->get('phone_number');
                $appointment->doctor = $request->get('doctor');
                $appointment->appointment_date = $request->get('appointment_date');
                $appointment->appointment_status = $request->get('appointment_status');
                $appointment->save();

                // redirect
                Alert::success('Update Successfull', 'Success')->autoclose(2000);
                return back();
            }
    }


    public function delete_appointment($id) {
        $appointment = Appointment::findorFail($id);

        $app= DB::update(DB::raw("UPDATE dms_appointments set appointment_status = 'Complete' where id = $appointment->id "));

        Alert::success('Appointment Cleared Successfully', 'Success')->autoclose(2000);
        return back();
    }



    


    //WAITING LIST
    public function allwaiting() {
        return view('receptionist.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(1))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(10));
    }

    //insert waiting without ID - mainly for appointments from patients not registered with the clinic
    public function create_waiting($id) {
        $appointment = Appointment::find($id);

        $appointment = Waiting::create([
            'patient_id' => $appointment->patient_id,
            'firstname' => $appointment->firstname,
            'middlename' => $appointment->middlename,
            'lastname' => $appointment->lastname,
            'payment_mode' => $appointment->payment_mode,
            'amount_allocated' => $appointment->amount_allocated,
            'doctor' => $appointment->doctor,
            'doctor' => $appointment->doctor,
        ]);
        
        Alert::success('Patient Added to Waiting List', 'Success')->autoclose(2000);
        return back();
    }

    public function insert_waiting($id) {
        $patient = Patient::find($id);

        $patient = Waiting::create([
            'patient_id' => $patient->id,
            'firstname' => $patient->firstname,
            'middlename' => $patient->middlename,
            'lastname' => $patient->lastname,
            'payment_mode' => $patient->payment_mode,
            'amount_allocated' => $patient->amount_allocated,
            'doctor' => $patient->doctor,
            'status' => 'Waiting',
        ]);
        
        Alert::success('Patient Added to Waiting List', 'Success')->autoclose(2000);
        return back();
    }

    public function delete_waiting($patient_id) {

        $waiting = Waiting::findorFail($patient_id);

        $wait= DB::update(DB::raw("UPDATE dms_waitings set status = 'seen' where patient_id = $waiting->patient_id "));

        //$waiting->delete();

        Alert::success('Patient Cleared Successfully', 'Success')->autoclose(2000);
        return back();
    }


    //EXPENSES
    public function allexpenses() {
        return view('receptionist.expenses.show')
        ->with('expenses', Expense::orderBy('created_at','desc')->paginate(10));
    }

    //insert waiting without ID - mainly for appointments from patients not registered with the clinic
    public function create_expense() {
        return view('receptionist.expenses.create')
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function insert_expense(Request $request) {

        $expense = new Expense();

        $expense->description = $request->get('description');
        $expense->amount = number_format($request->get('amount'),2);

        $expense->save();
        
        Alert::success('Expense Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    
















}
