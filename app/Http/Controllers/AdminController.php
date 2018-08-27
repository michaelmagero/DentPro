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
use App\Procedure;
use App\Provider;
use DataTables;
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
    public function users(Request $request){   
          
        return View('admin.users.show')
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
        
    }

    public function create(Request $request){
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

        Alert::success('User Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }




    //PATIENTS

    public function allpatients(Request $request) {

        return view('admin.patients.show')
        ->with('patients', Patient::orderBy('created_at','desc')->get())
        ->with('users', User::orderBy('created_at','desc')->paginate(10));

    }


    public function create_patient() {
        return view('admin.patients.create')
        ->with('users', User::orderBy('created_at','desc')->get())
        ->with('providers', Provider::orderBy('created_at','desc')->get());
    }

    public function insert_patient(Request $request) {

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
        
        Alert::success('Patient Added Successfully!', 'Success')->autoclose(2500);
        return back();
    }

    

    public function edit_patient($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('admin.patients.edit')
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->get())
        ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->get())
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

    public function medical_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
        //$patient_doc = Patient::where('role', 'doctor')->get();
            
        //load form view
        return view('admin.patients.medical_history', compact('payments'))
        ->with('users', User::orderBy('created_at','desc')->paginate(1))
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(1))
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->paginate(1));
    }

    public function payment_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('admin.patients.payment_history', compact('payments'))
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
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5))
        ->with('patients', Patient::orderBy('created_at','desc')->get());
    }

    public function new_payment($id) {
        $patient = Patient::findorFail($id);

        return view('admin.payments.create-existing')
        ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->get())
        ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->paginate(1))
        ->with('waitings', Waiting::where('patient_id', $patient->id)->orderBy('created_at','desc')->get());
    }

    public function new_pay() {

        return view('admin.payments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->get())
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(1))
        ->with('waitings', Waiting::orderBy('created_at','desc')->get())
        ->with('procedures', Procedure::orderBy('created_at','desc')->get());
    }
    
    public function create_payment($id, Request $request) {


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
            
        
        Alert::success('Payment Added Successfully!', 'Success')->autoclose(2500);
        return redirect('all-payments-admin');
        
    }


    public function insert_payment(Request $request) {

        

        // $selected_procedure = $request->get('procedure');
        // $procedure = Procedure::where('procedure',$selected_procedure)->first();
        // //dd($procedure->amount);

        // if ($selected_procedure > 1) {
        //     # code...
        // }
        

        $payment = new Payment();
        $payment->doctor_id = Auth::user()->id;
        $payment->patient_id = $request->get('patient_id');
        $payment->procedure = $request->get('procedure');

        $procedures = $payment->procedure;

        for ($i=0; $i < $procedures; $i++) {
            dd($procedures[$i]);
        }

        // $payment->procedure = $procedures . "<br>";
        // $payment->notes = $request->get('notes');

        // $payment->save();
        // Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        // return redirect('all-payments-admin');

        // if (empty($request->get('description')) && empty($request->get('lab_name')) && empty($request->get('due_date'))) {
        //     return back();
        // }else {
        //     $labwork = new Labwork();
        //     $labwork->patient_id = $request->get('patient_id');
        //     $labwork->description = $request->get('description');
        //     $labwork->lab_name = $request->get('lab_name');
        //     $labwork->due_date = $request->get('due_date');
        //     $labwork->status = 'pending';

        //     $labwork->save();
        //     Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        //     return redirect('all-lablist-admin');
            
            
        // }

        
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
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(10))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(1));
    }

    public function new_appointment() {
        return view('admin.appointments.create')
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
        return view('admin.appointments.create-existing')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment_existing(Request $request) {

        $appointment = new Appointment();
        
        $pid = $request->get('patient_id');
        $patient = Patient::where('id',$pid)->first();
        
        $appointment->patient_id = $request->get('patient_id');
        $appointment->firstname = $patient->firstname;
        $appointment->middlename = $patient->middlename;
        $appointment->lastname = $patient->lastname;
        $appointment->phone_number = $patient->phone_number;
        $appointment->doctor = $patient->doctor;

        $date = $request->get('appointment_date');
        $appointment->appointment_date = date_format(date_create($date), 'Y-m-d');

        $appointment->appointment_status = $request->get('appointment_status');

        $appointment->save();

        Alert::success('Appointment Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    

    public function edit_appointment($id) {
        //get post data by id
        $app = Appointment::where('id',$id)->first();

        //load form view
        return view('admin.appointments.edit')
        ->with('appointments', Appointment::where('id', $id)->orderBy('created_at','desc')->get())
        ->with('patients', Patient::where('id', $app->patient_id)->orderBy('created_at','desc')->get())
        ->with('payments', Payment::where('patient_id', $app->patient_id)->orderBy('created_at','desc')->get())
        ->with('users', User::where('id', $id)->orderBy('created_at','desc')->get());
    }

    public function show_appointment($id) {
        $patient = Patient::where('id',$id)->first();

        if($patient)
        {
            return view('admin.appointments.read')
            ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->get())
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
        }
        else 
        {
            return view('admin.patients.read');
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
                return Redirect::to('edit-appointment-admin/' . $id)
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
        return view('admin.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->get())
        ->with('waitings', Waiting::orderBy('created_at','desc')->get())
        ->with('payments', Payment::orderBy('created_at','desc')->get());
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

    public function delete_waiting($id) {

        $waiting = Waiting::find( $id );
        
        $waiting->delete();

        Alert::success('Waiting Cleared Successfully', 'Success')->autoclose(2000);
        return back();
    }




    //INSURANCE PROVIDERS
    public function allproviders() {
        return view('admin.insurance_providers.show')
        ->with('providers', Provider::orderBy('created_at','desc')->paginate(10));
    }

    public function create_provider() {
        return view('admin.insurance_providers.create');
    }
    

    public function insert_provider(Request $request) {
        $array = $request->get('insurance_provider');

        
            foreach ($array as $key => $value) {
        
                switch ($value) {
                    
                    case "Jubilee Insurance":
                        $provider = new Provider();
                        $provider->name = 'Jubilee Insurance';
                        $provider->phone_one = '0718573435';
                        $provider->phone_two = '0718573435';
                        $provider->phone_three = '0718573435';
                        $provider->postal_address = '68117-00200 Nairobi';
                        $provider->email = 'jubileeinsurance@gmail.com';
                        $provider->physical_location = 'Jubilee Plaza Moi Avenue Nairobi';
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;
                        
                        
                        
                    case "UAP Insurance":

                        $provider = new Provider();
                        $provider->name = 'UAP Insurance';
                        $provider->phone_one = '0718573435';
                        $provider->phone_two = '0718573435';
                        $provider->phone_three = '0718573435';
                        $provider->postal_address = '68117-00200 Nairobi';
                        $provider->email = 'uapinsurance@gmail.com';
                        $provider->physical_location = 'UAP Plaza Kenyatta Avenue Nairobi';
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;
                        
                        

                    case "Madison Insurance":

                        $provider = new Provider();
                        $provider->name = 'Madison Insurance';
                        $provider->phone_one = '0718573435';
                        $provider->phone_two = '0718573435';
                        $provider->phone_three = '0718573435';
                        $provider->postal_address = '68117-00200 Nairobi';
                        $provider->email = 'madisoninsurance@gmail.com';
                        $provider->physical_location = 'UAP Plaza Kenyatta Avenue Nairobi';
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;
                        
                        

                    case "AON Insurance":
                        $provider = new Provider();
                        $provider->name = "AON Insurance";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "aoninsurance@gmail.com";
                        $provider->physical_location = "AON Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;
                        
                        

                    case "Britam":
                        $provider = new Provider();
                        $provider->name = "Britam";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "britam@gmail.com";
                        $provider->physical_location = "Britam Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;
                        

                    case "Sanlam":
                        $provider = new Provider();
                        $provider->name = "Sanlam Insurance";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "sanlaminsurance@gmail.com";
                        $provider->physical_location = "Sanlam Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "Pacific Insurance":
                        $provider = new Provider();
                        $provider->name = "Pacific Insurance";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "pacificinsurance@gmail.com";
                        $provider->physical_location = "Pacific Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "Saham":
                        $provider = new Provider();
                        $provider->name = "Saham";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "sahaminsurance@gmail.com";
                        $provider->physical_location = "Saham Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "Resolution Insurance":
                        $provider = new Provider();
                        $provider->name = "Resolution Insurance";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "resolutioninsurance@gmail.com";
                        $provider->physical_location = "Resolution Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "AAR":
                        $provider = new Provider();
                        $provider->name = "AAR";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "aarinsurance@gmail.com";
                        $provider->physical_location = "AAR Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "APA Insurance":
                        $provider = new Provider();
                        $provider->name = "APA Insurance";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "apainsurance@gmail.com";
                        $provider->physical_location = "APA Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "Liaison Insurance":
                        $provider = new Provider();
                        $provider->name = "Liaison Insurance";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "liaisoninsurance@gmail.com";
                        $provider->physical_location = "APA Plaza Kenyatta Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "KCB":
                        $provider = new Provider();
                        $provider->name = "KCB";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "kencominsurance@gmail.com";
                        $provider->physical_location = "Kencom Moi Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "Co-operative":
                        $provider = new Provider();
                        $provider->name = "Co-operative";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "coopinsurance@gmail.com";
                        $provider->physical_location = "Kencom Moi Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "First Assurance":
                        $provider = new Provider();
                        $provider->name = "First Assurance";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "firstinsurance@gmail.com";
                        $provider->physical_location = "Kencom Moi Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "Eagle Africa":
                        $provider = new Provider();
                        $provider->name = "Eagle Africa";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "eagleinsurance@gmail.com";
                        $provider->physical_location = "Kencom Moi Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        break;

                    case "Sedgwick":
                        $provider = new Provider();
                        $provider->name = "Sedgwick";
                        $provider->phone_one = "0718573435";
                        $provider->phone_two = "0718573435";
                        $provider->phone_three = "0718573435";
                        $provider->postal_address = "68117-00200 Nairobi";
                        $provider->email = "sedgwickinsurance@gmail.com";
                        $provider->physical_location = "Kencom Moi Avenue Nairobi";
                        $provider->save();
                        Alert::success('InsuranceProviders Added Successfully', 'Success')->autoclose(2000);
                        return back();
                        break;
                    
                    default:
                        Alert::error('No InsuranceProvider Selected', 'Error')->autoclose(2000);
                        return back();
                        break;
            
                }
            }
    }

    public function delete_provider($id) {
        $proc = Provider::where('id',$id)->first();

        $proc->delete();

        Alert::success('Provider Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }








    //PROCEDURES
    public function allprocedures() {
        return view('admin.procedures.show')
        ->with('procedures', Procedure::orderBy('created_at','desc')->paginate(10));
    }

    public function create_procedure() {
        return view('admin.procedures.create');
    }
    

    public function insert_procedure(Request $request) {

        $array = $request->get('arrayName');
        
        foreach ($array as $key => $value) {
            
            Procedure::create([
                'procedure' => $value['procedure'],
                'amount' => number_format($value['amount'], 2),
            ]);
        }

        Alert::success('Procedures Added Successfully', 'Success')->autoclose(2000);
        return redirect('all-procedures');
    }


    public function edit_procedure($id) {
        //get post data by id
        $payment = Procedure::where('id',$id)->first();
            
        //load form view
        return view('admin.procedures.edit')
        ->with('procedures', Procedure::where('id', $id)->orderBy('created_at','desc')->get());
    }

    // public function show_procedure($id) {
    //     $patient = Patient::where('id',$id)->first();

    //     if($patient)
    //     {
    //         return view('admin.procedures.read')
    //         ->with('patients', Patient::where('id', $patient->id)->orderBy('created_at','desc')->paginate(5)) 
    //         ->with('payments', Payment::where('patient_id', $patient->id)->orderBy('created_at','desc')->get()); 
    //     }
    //     else 
    //     {
    //         return view('admin.procedures.read');
    //     }
    // }


    public function update_procedure(Request $request, $id) {

        // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'procedure' => 'required',
                'amount' => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('edit-procedure/' . $id)
                    ->withErrors($validator);
            } else {
                // store
                $proc = Procedure::find($id);
                $proc->procedure = $request->get('procedure');
                $proc->amount = number_format($request->get('amount'),2);
                $proc->save();

                // redirect
                Alert::success('Successfully Updated', 'Success')->autoclose(2000);
                return back();
            }
    }



    public function delete_procedure($id) {
        $proc = Procedure::where('id',$id)->first();

        $proc->delete();

        Alert::success('Procedure Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }





    //LABORATORY
    public function allexpenses() {
        
        return view('admin.expenses.show')
        ->with('expenses', Expense::orderBy('created_at','desc')->paginate(10));
    }


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
        $expense = Expense::where('id',$id)->first();
            
        //load form view
        return view('admin.expenses.edit')
        ->with('expenses', Expense::where('id', $expense->id)->orderBy('created_at','desc')->get());
    }

    // public function show_expense($id) {

    //         return view('admin.expenses.read')
    //         ->with('expenses', Expense::orderBy('created_at','desc')->paginate(5))
    //         ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
    //         ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
    //         ->with('payments', Payment::orderBy('created_at','desc')->get());   
    // }

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
                return redirect('all-expenses-admin');
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


    public function create_labwork() {
        return view('admin.laboratory.create')
        ->with('users', User::orderBy('created_at','desc')->paginate(5))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10));
    }

    public function insert_labwork(Request $request) {

        $labwork = new Labwork();
        $labwork->patient_id = $request->get('patient_id');
        $labwork->description = $request->get('description');
        $labwork->lab_name = $request->get('labname');
        $labwork->due_date = $request->get('due_date');
        $labwork->status = $request->get('status');

        $labwork->save();

        // redirect
        Alert::success('Labwork Added Successfully', 'Success')->autoclose(2000);
        return redirect('all-labwork-admin');
    }

    public function edit_labwork($id) {

        $labwork = Labwork::where('id',$id)->first();
            
        //load form view
        return view('admin.laboratory.edit')
        ->with('labworks', Labwork::where('id', $labwork->id)->orderBy('created_at','desc')->get())
        ->with('patients', Patient::orderBy('created_at','desc')->get());
    }

    public function show_labwork($id) {

            return view('admin.laboratory.read')
            ->with('laboratory', Expense::orderBy('created_at','desc')->paginate(5))
            ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
            ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
            ->with('payments', Payment::orderBy('created_at','desc')->get());   
    }

    public function update_labwork(Request $request, $id) {
        // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'description'       => 'required',
                'labname'      => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('edit-labwork-admin/' . $id)
                    ->withErrors($validator);
            } else {
                // store
                $labwork = Labwork::find($id);
                $labwork->description = $request->get('description');
                $labwork->lab_name = $request->get('labname');
                $labwork->due_date = $request->get('due_date');
                $labwork->status = $request->get('status');
                $labwork->save();

                // redirect
                Alert::success('Successfully Updated', 'Success')->autoclose(2000);
                return redirect('all-labwork-admin');
            }
    }



    public function delete_labwork($id) {

        $labwork = Labwork::findorFail($id);

        $wait= DB::update(DB::raw("UPDATE dms_labworks set status = 'delivered' where id = $labwork->id "));

        //$waiting->delete();

        Alert::success('Labwork Cleared Successfully', 'Success')->autoclose(2000);
        return back();
    }


























































    
}
