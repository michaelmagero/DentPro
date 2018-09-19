
@extends('layouts.doctor')

@section('header')
    Patient 
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Patient
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
            @foreach($patients as $patient)
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
                                            <img src="/images/avatar.png" alt=""/ width="60" height="60">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                            {{ $patient->firstname }} {{ $patient->middlename }} {{ $patient->lastname }}
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
                                            <i class="m-nav__link-icon flaticon-calendar-1"></i>
                                            <span class="m-nav__link-text">
                                                File No - <span class="text-primary">{{ $patient->id }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-calendar-1"></i>
                                            <span class="m-nav__link-text">
                                                Sex - <span class="text-primary">{{ $patient->sex }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-calendar"></i>
                                            <span class="m-nav__link-text">
                                                Date of Birth. - <span class="text-primary">{{ Carbon\Carbon::parse($patient->dob)->format('d-m-Y') }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-chat"></i>
                                            <span class="m-nav__link-text">
                                                Email. - <span class="text-primary">{{ $patient->email }}</span>
                                            </span>
                                        </span>
                                    </li>
                                </ul>

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
                                                        <span class="m-widget1__number m--font-brand">
                                                            {{ $payment->balance }}
                                                        </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                                
                                
                    <div class="col-xl-9 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                 Patient Information
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            {{-- <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                Change Password
                                            </a> --}}
                                        </li>

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
                                    
                                    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-patient-admin/{{ $patient->id }}">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h5 class="m-form__section">
                                                        Patient Information
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Phone
                                                </label>
                                                <div class="col-7">
                                                    <h5 class="text-success"> {{ $patient->phone_number }} </h5>
                                                </div>
                                            </div>

                                            

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Insurance Provider
                                                </label>
                                                <div class="col-7">
                                                    <h5>
                                                        @if ($patient->payment_mode == 'Cash')
                                                            N/A
                                                        @elseif($patient->payment_mode != 'Cash')
                                                            {{ $patient->payment_mode  }}
                                                        @else

                                                        @endif 
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Amount Allocated
                                                </label>
                                                <div class="col-7">
                                                    <h5 class="text-success"> {{ $patient->amount_allocated }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Occupation
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->occupation }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Doctor
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->doctor }} </h5>
                                                </div>
                                            </div><br>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h5 class="m-form__section">
                                                        Medical Information
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Alcoholic
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->alcoholic }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Smoker
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->smoker }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Allergic Reactions
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->allergic_reactions }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Disease History
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->disease_history }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Cardio-Vascular Disease
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->cardiovascular_disease }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h5 class="m-form__section">
                                                        Address & Contact Information
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Postal Address
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->postal_address }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Emergency Contact Name
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->emergency_contact_name }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Emergency Contanct Phone
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->emergency_contact_phone_number }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Emergency Contanct Relationship
                                                </label>
                                                <div class="col-7">
                                                    <h5> {{ $patient->emergency_contact_relationship }} </h5>
                                                </div>
                                            </div>

                                            
                                            
                                            
                                        </div>
                                    </form>
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

































