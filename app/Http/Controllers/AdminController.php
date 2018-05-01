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


class AdminController extends Controller
{
    //
    public function home(Request $request) {
      $user = $request->user();

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
        ->with('users', User::orderBy('created_at','desc')->paginate(5))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
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
              ->with('users', User::where('id',$user->id)->orderBy('created_at','desc')->paginate(10));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
            //get post data by id
            $user = User::findorFail($id);
            
            //load form view
            return view('admin.users.edit')
               ->with('users', User::where('role', 'author')->paginate(3));
        }

    public function update(Request $request)
      {
           $rules = [
           'name_first'            =>  'required',
           'name_last'             =>  'required',
           'email'                 =>  'unique:users,email,'.$id.'|required|email',
           'username'              =>  'unique:users,username,'.$id.'|required'
       ];

       $messages = [
           'name_first.required'   =>  'Your first name is required.',
           'name_last.required'    =>  'Your last name is required.',
           'email.required'        =>  'Your emails address is required.',
           'email.unique'          =>  'That email address is already in use.',
           'username.required'     =>  'Your username is required.',
           'username.unique'       =>  'That username is already in use.'
       ];

       $validator = Validator::make($request->all(), $rules, $messages);

       if($validator->fails())
       {
           return Redirect::to('admin/profile')
               ->withErrors($validator)
               ->withInput();
       }else{
           $user = User::find($id);
           $user->name_first = $request->input('name_first');
           $user->name_last = $request->input('name_last');
           if($user->email !== $request->input('email'))
           {
               $user->email = $request->input('email');
           }
           if($user->username !== $request->input('username'))
           {
               $user->username = $request->input('username');
           }
           $user->save();

           Session::flash('success', 'Your profile was updated.');
           return Redirect::to('admin/profile');
       }
       
      }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $user = User::find($id);
        if($user->role == 'author')
        {
            $user->delete();
            \Session::flash('flash_message','User Deleted Successfully.');
        }
        else 
        {
            \Session::flash('flash_message','Ensure you are admin to Delete Users.');
        }

        return redirect('/all-users');
    }
}
