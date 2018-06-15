
@extends('layouts.admin')

@section('header')
    Edit Appointment
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        My Profile
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
            @foreach($appointments as $appointment)
                    
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="m-portlet  ">
                                    <div class="m-portlet__body">
                                        @foreach($patients as $patient)
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
                                                        {{ $patient->firstname }} {{ $patient->lastname }}
                                                    </span>
                                                    <a href="" class="m-card-profile__email m-link">
                                                        {{ $patient->email }}
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
                                                                    File No - <span class="text-primary">{{ $patient->id }}</span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </li>
                                                <li class="m-nav__item">
                                                    <span class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-share"></i>
                                                        <span class="m-nav__link-text">
                                                            Date of Birth - <span class="text-primary">{{ $patient->dob }}</span>
                                                        </span>
                                                    </span>
                                                </li>
                                                <li class="m-nav__item">
                                                    <span class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-support"></i>
                                                        <span class="m-nav__link-text">
                                                            Phone No. - <span class="text-primary">{{ $patient->phone_number }}</span>
                                                        </span>
                                                    </span>
                                                </li>
                                                <li class="m-nav__item">
                                                    <span class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                        <span class="m-nav__link-text">
                                                            Email - <span class="text-primary">{{ $patient->email }}</span>
                                                        </span>
                                                    </span>
                                                </li>
                                            </ul>
                                        @endforeach

                                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                            <li class="m-nav__separator m-nav__separator--fit"></li>
                                            <li class="m-nav__section m--hide">
                                                <span class="m-nav__section-text">
                                                    Section
                                                </span>
                                            </li>

                                            <li class="m-nav__item">
                                                <span class="m-nav__link">
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                Payment History 
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            
                                        </ul></br>
                                        <div class="m-widget1 m-widget1--paddingless">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Balance
                                                        </h3>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        @foreach($payments as $payment)
                                                            @if($payment->patient_id == $appointment->patient_id)
                                                                <span class="m-widget1__number m--font-brand">
                                                                    {{ $payment->balance }}
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                            
                                            <li class="m-nav__item">
                                                <span class="m-nav__link">
                                                    <div id="m_repeater_1">
                                                    
                                                </div>
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
                                            {{--  <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                        <i class="flaticon-share m--hide"></i>
                                                        Update Profile
                                                    </a>
                                                </li>
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                        Medical History
                                                    </a>
                                                </li>

                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                                        Payment History
                                                    </a>
                                                </li>
                                            </ul>  --}}
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="m_user_profile_tab_1">
                                            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-appointment-admin/{{ $appointment->id }}">
                                                {{ csrf_field() }}
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                        <div class="alert m-alert m-alert--default" role="alert">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-10 ml-auto">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            FirstName
                                                        </label>
                                                        <div class="col-7">
                                                            <input class="form-control m-input" name="firstname"  type="text" value="{{ $appointment->firstname }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            LastName
                                                        </label>
                                                        <div class="col-7">
                                                            <input class="form-control m-input" name="lastname"  type="text" value="{{ $appointment->lastname }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            Phone
                                                        </label>
                                                        <div class="col-7">
                                                            <input class="form-control m-input" name="phone_number"  type="text" value="{{ $appointment->phone_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            Doctor
                                                        </label>
                                                        <div class="col-7">
                                                            <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="doctor">
                                                    
                                                                <option value='{{ $appointment->doctor }}'>
                                                                    {{ $appointment->doctor }}
                                                                </option>

                                                                <optgroup label="Doctors">
                                                                    @foreach($users as $user)
                                                                        @if($user->role == 'doctor')
                                                                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            Appointment Date
                                                        </label>
                                                        <div class="col-7">
                                                            <div class="input-group date" >
                                                                <input class="flatpickr flatpickr-input form-control input active" value="{{ $appointment->appointment_date }}" tabindex="0" type="text" readonly="readonly" name="appointment_date">
                                                                <script>
                                                                    flatpickr(".flatpickr", {
                                                                        enableTime: false,
                                                                        altInput: true,
                                                                        altFormat: "Y-m-d",
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">
                                                            Appointment Status
                                                        </label>
                                                        <div class="col-7">
                                                            <select name="appointment_status" class="form-control" id="m_notify_state">
                                                                <option value="{{ $appointment->appointment_status }}">
                                                                    {{ $appointment->appointment_status }}
                                                                </option>
                                                                <option value="Pending">
                                                                    Pending
                                                                </option>
                                                                <option value="Complete">
                                                                    Complete
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            
                                                </div>

                                                <div class="m-portlet__foot m-portlet__foot--fit">
                                                    <div class="m-form__actions">
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-7">
                                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                                    Save changes
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

































