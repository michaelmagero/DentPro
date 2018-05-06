<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Payment;
use App\Appointment;
use App\Invoice;
use App\Waiting;
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
        ->with('users', User::orderBy('created_at','desc')->paginate(5))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(5))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::orderBy('created_at','desc')->paginate(5))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(5));

      } elseif ($user->role == 'receptionist') {
        return View('receptionist.receptionist_index')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
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
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(5));
      }
    }



    public function login() {
      return view('admin.auth.login');
    }

    //USER MANAGEMENT
    public function users(Request $request)
    {   
        $user = $request->user();

        if ($user->role == 'admin') {
          Alert::success('Login Successfully', 'Success')->autoclose(2000);
          return View('admin.users.show')
              ->with('users', User::orderBy('created_at','desc')->paginate(5));
        } else {
          Alert::error('Login Failed, Check credential before Login', 'Error')->autoclose(2000);
          return View('admin.users.show')
              ->with('users', User::where('id',$user->id)->orderBy('created_at','asc')->paginate(10));
        }
        
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
         Alert::error('User Exists', 'Error')->autoclose(2000);
          return back();
       } else {
          $user->save();
          
          Alert::success('User Creted Successfully', 'Success')->autoclose(2000);
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
                \Session::flash('message', 'Successfully updated!');
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

        $user->delete();

        \Session::flash('flash_message','User Deleted Successfully.');
        return back();
    }
}
