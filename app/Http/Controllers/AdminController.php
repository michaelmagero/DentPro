<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Payment;
use App\Appointment;
use App\Invoice;
use App\Waiting;
use App\Expense;
use App\Labwork;
use Hash;
use Alert;
use DB;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;


class AdminController extends Controller
{
    //
    public function home(Request $request) {
      $user = $request->user();

      //Get the current logged in user(doctor)
      $cur_user = Auth::user()->name;

      //Get list of patients where preffered doctor is the current logged in user(doctor)
      $pref_doc = DB::select( DB::raw("SELECT * FROM dms_patients WHERE doctor = '$cur_user' "));

      //Get list of patients where preffered doctor is the current logged in user(doctor) and appointment is today
      $waitlist = DB::select( DB::raw("SELECT * FROM dms_patients WHERE doctor = '$cur_user' AND DATE(created_at) = '".date('Y-m-d')."'"));


      if ($user->role == 'admin') {
        return View('admin.index')
        ->with('users', User::orderBy('created_at','desc')->paginate(1))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(5));
        

      } elseif ($user->role == 'receptionist') {

        return View('receptionist.receptionist_index')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(1))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5))
        ->with('invoices', Invoice::orderBy('created_at','desc')->paginate(5))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(5));
        

      } elseif ($user->role == 'doctor') {

        return View('doctor.doctor_index')
        ->with('waitlist', $waitlist)
        ->with('patients', $pref_doc)
        ->with('users', User::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5))
        ->with('invoices', Invoice::orderBy('created_at','desc')->paginate(5))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
        ->with('waitings', Waiting::where('doctor', $cur_user)->orderBy('created_at','desc')->paginate(5));
        
      }
    }



    public function login() {
      return view('admin.auth.login');
    }

    //USER MANAGEMENT
    public function users(Request $request)
    {   
          
        return View('admin.users.show')
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
        
    }

    public function create(Request $request)
    {
        // 
        if($request->user()->is_admin())
        {   

            return view('admin.users.create');
        }   
        else 
        {
            return redirect('/')->withErrors('You have not sufficient permissions to perform this function');
        }
    }

    public function create_user(Request $request) {
       $user = new User();
       $user->name = $request->get('name');
       $user->lastname = $request->get('lastname');
       $user->email = $request->get('email');
       $user->password = Hash::make($request->get('password'));
       $user->role = $request->get('role');

       $mail = DB::select( DB::raw("SELECT * FROM users WHERE email = '$user->email'") );

       if ($mail) {
           Alert::error('User Already Exists!', 'Error')->autoclose(2500);
           return back();
       } else {
          $user->save();
          Alert::success('User Registered Successfully!', 'Success')->autoclose(2500);
          return back();
       }

       
       
    }

    public function show($id) {
        $user = User::where('id',$id)->first();

        if($user)
        {
            return view('admin.users.read')
            ->with('users', User::where('id', $user->id)->orderBy('created_at','desc')->paginate(10))
            ->with('patients', Patient::orderBy('created_at','desc')->get())
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
        }
        else 
        {
            return view('admin.users.read');
        }
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        //get post data by id
        $user = User::find($id);
        
        //load form view
        return view('admin.users.edit')
            ->with('users', User::where('id', $id)->get());
    }

    public function update(Request $request, $id) {  
        
            // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'name'       => 'required',
                'lastname'      => 'required',
                'email'      => 'required',
                'role'      => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('edit-user/' . $id)
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $user = User::find($id);
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->role = $request->get('role');
                $user->password = bcrypt($request->get('password'));


                $user->role = $request->get('role');
                $user->save();

                // redirect
                Alert::success('Successfully Updated!', 'Success')->autoclose(2500);
                return back();
            }
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id) {
        //
        $user = User::where('id',$id)->first();

        //Alert::warning('Are you sure You want to Delete this?', 'Caution')->persistent('Close');

        $user->delete();

        
        return back();
    }




    //PATIENTS
    public function allpatients() {
        return view('admin.patients.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10))
        ->with('users', User::orderBy('created_at','desc')->paginate(10));
    }

    public function create_patient() {
        return view('admin.patients.create')
        ->with('users', User::orderBy('created_at','desc')->get());
    }

    public function insert_patient(Request $request) {

        $patient = Patient::create([

        'firstname' => $request->get('firstname'),
        'middlename' => $request->get('middlename'),
        'lastname' => $request->get('lastname'),
        'sex' => $request->get('sex'),
        'dob' => $request->get('dob'),
        'payment_mode' => $request->get('payment_mode'),
        'amount_allocated' => $request->get('amount_allocated'),
        'occupation' => $request->get('occupation'),
        'postal_address' => $request->get('postal_address'),
        'email' => $request->get('email'),
        'phone_number' => $request->get('phone_number'),
        'emergency_contact_name' => $request->get('emergency_contact_name'),
        'emergency_contact_phone_number' => $request->get('emergency_contact_phone_number'),
        'emergency_contact_relationship' => $request->get('emergency_contact_relationship'),
        'doctor' => $request->get('doctor'),
            
        ]);

        Waiting::create([
            'patient_id' => $patient->id,
            'firstname' => $request->get('firstname'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'payment_mode' => $request->get('payment_mode'),
            'amount_allocated' => $request->get('amount_allocated'),
            'doctor' => $request->get('doctor'),
        ]);
        
        Alert::success('Patient Added Successfully!', 'Success')->autoclose(2500);
        return back();
    }

    

    public function edit_patient($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('admin.patients.edit', compact('patients'))
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
        ->with('payments', Payment::orderBy('created_at','desc')->get())
        ->with('users', User::orderBy('created_at','desc')->get());
    }

    public function show_patient($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('admin.patients.read')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->get())
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
        }
        else 
        {
            return view('admin.patients.edit');
        }
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
                $patient->save();
                

                // redirect
                Alert::success('Successfully Updated', 'Success')->autoclose(2000);
                return back();
            }
    }

    public function delete_patient($id) {
        $patient = Patient::where('id',$id)->first();

        $patient->delete();

        Alert::success('Post Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }




    //PAYMENTS
    public function allpayments() {
        return view('admin.payments.show')
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(10));
    }

    public function create_payment() {
        return view('admin.payments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5));
    }

    public function create_payment_id($id) {
        $patient = Patient::findorFail($id);
        return view('admin.payments.create')
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

        $labwork = new Labwork();
        $labwork->patient_id = $request->get('patient_id');
        $labwork->description = $request->get('description');
        $labwork->lab_name = $request->get('lab_name');
        $labwork->due_date = $request->get('due_date');
        $labwork->status = 'pending';

        $labwork->save();
        
        Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        return redirect('all-lablist-admin');
    }


    public function edit_payment($patient_id) {
        //get post data by id
        $payment = Payment::where('id',$patient_id)->first();
            
        //load form view
        return view('admin.payments.edit', compact('payments'))
        ->with('patients', Patient::where('id', $patient_id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $patient_id)->orderBy('created_at','desc')->get());
    }

    public function show_payment($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('admin.payments.read')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5)) 
            ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->get()); 
        }
        else 
        {
            return view('admin.payments.read');
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

        // redirect
        Alert::success('Successfully Updated', 'Success')->autoclose(2000);
        return back();
    }



    public function delete_payment($id) {
        $payment = Payment::where('id',$id)->first();

        $payment->delete();

        Alert::success('Payment Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }


    

    //APPOINTMENTS
    public function allappointments() {
        return view('admin.appointments.show')
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(1));
    }

    public function new_appointment() {
        return view('admin.appointments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment(Request $request) {

        $appointment = new Appointment();

        $appointment->firstname = $request->get('firstname');
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
        return view('admin.appointments.edit')
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(1))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(1))
        ->with('payments', Payment::orderBy('created_at','desc')->get())
        ->with('users', User::orderBy('created_at','desc')->paginate(1));
    }

    public function show_appointment($id) {

            return view('admin.appointments.read')
            ->with('patients', Patient::orderBy('created_at','desc')->paginate(1))
            ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(1))
            ->with('payments', Payment::orderBy('created_at','desc')->paginate(1));   
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
                $appointment->lastname = $request->get('lastname');
                $appointment->phone_number = $request->get('phone_number');
                $appointment->doctor = $request->get('doctor');
                $appointment->appointment_date = $request->get('appointment_date');
                $appointment->appointment_status = $request->get('appointment_status');
                $appointment->save();

                // redirect
                Alert::success('Successfully Updated', 'Success')->autoclose(2000);
                return back();
            }
    }



    public function delete_appointment($id) {
        $appointment = Appointment::where('id',$id)->first();

        $appointment->delete();

        Alert::success('Appointment Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }



    


    //WAITING LIST
    public function allwaiting() {
        return view('admin.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->get())
        ->with('waitings', Waiting::orderBy('created_at','desc')->get())
        ->with('payments', Payment::orderBy('created_at','desc')->get());
    }

    public function delete_waiting($id) {

        $waiting = Waiting::find( $id );
        
        $waiting->delete();

        Alert::success('Waiting Cleared Successfully', 'Success')->autoclose(2000);
        return back();
    }





    //EXPENSES
    public function allexpenses() {
        
        return view('admin.expenses.show')
        ->with('expenses', Expense::orderBy('created_at','desc')->paginate(10));
    }

    //insert waiting without ID - mainly for appointments from patients not registered with the clinic
    public function create_expense() {
        return view('admin.expenses.create')
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

    public function edit_expense($id) {
            
        //load form view
        return view('admin.expenses.edit', compact('expenses'))
        ->with('expenses', Expense::orderBy('created_at','desc')->paginate(5))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->get())
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function show_expense($id) {

            return view('admin.expenses.read')
            ->with('expenses', Expense::orderBy('created_at','desc')->paginate(5))
            ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
            ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
    }

    public function update_expense(Request $request, $id) {
        // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'description'       => 'required',
                'amount'      => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('edit-expense/' . $id)
                    ->withErrors($validator);
            } else {
                // store
                $expense = Expense::find($id);
                $expense->description = $request->get('description');
                $expense->amount = number_format($request->get('amount'),2);
                $expense->save();

                // redirect
                Alert::success('Successfully Updated', 'Success')->autoclose(2000);
                return back();
            }
    }



    public function delete_expense($id) {
        $expense = Expense::where('id',$id)->first();

        $expense->delete();

        Alert::success('Expense Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }


    //LAB LIST
    public function all_lab_list() {
        return view('admin.laboratory.show')
        ->with('labworks', Labwork::orderBy('created_at','desc')->paginate(10))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10));
    }


























































    
}
