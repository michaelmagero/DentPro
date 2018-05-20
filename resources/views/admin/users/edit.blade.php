
@extends('layouts.admin')

@section('header')
    User Profile
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        User Profile
                    </h3>
                </div>
                <div>
                    <span class="m-subheader__daterange" >
                        <span class="m-subheader__daterange-label">
                            <strong> Hello {{ Auth::user()->name }} </strong>
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date  m--font-brand"></span>
                        </span>
                    </span>
                </div>&nbsp;&nbsp;&nbsp;
                <div>
                    <span class="m-subheader__daterange">
                        <span class="m-subheader__daterange-label">
                            <strong>{{ date('d M Y h:i a') }}</strong>
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date  m--font-brand"></span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
		<!-- END: Subheader -->
		
		


        <div class="m-content">
            @foreach($users as $user)
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="m-portlet  ">
                            <div class="m-portlet__body">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="la la-gear"></i>
                                            </span>

                                            <!-- <button type="button" class="btn btn-success m-btn m-btn--custom" id="m_sweetalert_demo_6">
                                                Show me
                                            </button> -->


                                            
                                            <span class="text-center">
                                                <br>
                                                <div class="col-md-12 ">
                                                    
                                                    <script src="../js/sweetalert2.all.js"></script>

                                                    <!-- Include this after the sweet alert js file -->
                                                    @if (Session::has('sweet_alert.alert'))
                                                        <script>
                                                            swal({!! Session::get('sweet_alert.alert') !!});
                                                        </script>
                                                    @endif
                                                </div>
                                            </span>
                                        </div>
                                    </div>
					            </div>
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        Your Profile
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">
                                            <img src="../images/avatar.png" alt=""/ width="60" height="60">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                            {{ $user->name }} {{ $user->lastname }}
                                        </span>
                                        <a href="" class="m-card-profile__email m-link">
                                            {{ $user->email }}
                                        </a>
                                    </div>
                                </div>
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-edit"></i>
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        File No - <span class="text-primary">{{ $user->id }}</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-share"></i>
                                            <span class="m-nav__link-text">
                                                Date of Birth - <span class="text-primary">{{ $user->dob }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-support"></i>
                                            <span class="m-nav__link-text">
                                                Phone No. - <span class="text-primary">{{ $user->phone_number }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                            <span class="m-nav__link-text">
                                                Email - <span class="text-primary">{{ $user->email }}</span>
                                            </span>
                                        </span>
                                    </li>
                                </ul>

                                
                            </div>
                        </div>
                    </div>
                                
                                
                    <div class="col-xl-9 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        {{-- <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                 Profile
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                Change Password
                                            </a>
                                        </li> --}}

                                        {{-- <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                                Payment History
                                            </a>
                                        </li> --}}

                                        <script src="../js/sweetalert2.all.js"></script>

                                        <!-- Include this after the sweet alert js file -->
                                        @if (Session::has('sweet_alert.alert'))
                                            <script>
                                                swal({!! Session::get('sweet_alert.alert') !!});
                                            </script>
                                        @endif
                                    </ul>
                                </div>
                                
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-user/{{ $user->id }}">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Personal Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Firstname
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="name"  type="text" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Lastname
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input"  name="lastname"  type="text" value="{{ $user->lastname }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Email
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input"  name="email"  type="text" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Role
                                                </label>
                                                <div class="col-7">
                                                    <select name="role" class="form-control" id="m_notify_state">
                                                        <option value='{{ $user->role }}' selected="selected">
                                                            {{ $user->role }}
                                                        </option>
                                                        <option value="doctor">
                                                            Doctor
                                                        </option>
                                                        <option value="receptionist">
                                                            Receptionist
                                                        </option>
                                                        <!-- <option value="marketing_manager">
                                                            Marketing Manager
                                                        </option>
                                                        <option value="ass_marketing_manager">
                                                            Ass. Marketing Manager
                                                        </option>
                                                        <option value="inventory_nurse">
                                                            Nurse (Inventory)
                                                        </option>
                                                        <option value="followup_nurse">
                                                            Nurse (Follow-up)
                                                        </option>
                                                        <option value="shopping_nurse">
                                                            Nurse (Shoopping)
                                                        </option> -->
                                                    </select>

                                                </div>
                                            </div><br>


                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Change Password
                                                    </h3>
                                                </div>
                                            </div>

                                            {{-- <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Current Password
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input"  name="lastname"  type="text" value="">
                                                </div>
                                            </div> --}}

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Password
                                                </label>

                                                <div class="col-md-7">
                                                    <input id="password" type="password" class="form-control" name="password">

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Confirm Password
                                                </label>

                                                <div class="col-md-7">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                                </div>
                                            </div>

                                            {{-- <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    New Password
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input"  name="password"  type="text" value="">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Confirm Password
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input"  name="password"  type="text" value="">
                                                </div>
                                            </div> --}}
                                            
                                            
                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-primary m-btn m-btn--air m-btn--custom">
                                                            Save Changes
                                                        </button>
                                                        &nbsp;&nbsp;
                                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane " id="m_user_profile_tab_2"><br>
                                    
							    </div>

                                <div class="tab-pane " id="m_user_profile_tab_3">
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach

            <!--End::Section-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
        
@endsection

































