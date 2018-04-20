
@extends('layouts.doctor')

@section('header')
    Add New User
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
                    <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                        <span class="m-subheader__daterange-label">
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
                                                        Payment Mode 

                                                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow" data-dropdown-toggle="hover" aria-expanded="true">
											                <span class="m-dropdown__toggle btn btn-brand dropdown-toggle">
												                Select Payment
                                                        </span>
                                                            <div class="m-dropdown__wrapper">
                                                                <span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
                                                                <div class="m-dropdown__inner">
                                                                    <div class="m-dropdown__body">
                                                                        <div class="m-dropdown__content">
                                                                            <ul class="m-nav">
                                                                                <li class="m-nav__item">
                                                                                    <a href="" class="m-nav__link">
                                                                                        <i class="m-nav__link-icon fa fa-briefcase"></i>
                                                                                        <span class="m-nav__link-text">
                                                                                            Insurance
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="m-nav__item">
                                                                                    <span class="m-nav__link" data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                                                                        <i class="m-nav__link-icon fa fa-dollar"></i>
                                                                                        <span class="m-nav__link-text">
                                                                                            Cash
                                                                                        </span>
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
										                </div>
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
                                                    Amount Allocated
                                                </h3>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-brand">
                                                    +$17,800
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">
                                                    Amount Payable
                                                </h3>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-danger">
                                                    +1,800
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <div id="m_repeater_1">
											<div class="form-group  m-form__group row" id="m_repeater_1">
												
												<div data-repeater-list="" class="col-lg-10">
													<div data-repeater-item class="form-group m-form__group row align-items-center">
														<div class="col-md-12">
															<div class="m-form__group m-form__group--inline" >
																<div class="m-form__label m-nav__link-tex">
																	<label>
																		Amount:
																	</label>
																</div>
																<div class="m-form__control">
																	<input type="text" class="form-control m-input" placeholder="" >
																</div>
															</div>
                                                            <div class="d-md-none m--margin-bottom-10"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="m-form__group form-group row">
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-primary active m-btn m-btn--custom">
						                            Add Payment
					                            </button>
                                                </div>
												
											</div>
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
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
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
                                                Notes
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item m-portlet__nav-item--last">
                                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                                <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                                    <i class="la la-gear"></i>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    <li class="m-nav__section m-nav__section--first">
                                                                        <span class="m-nav__section-text">
                                                                            Quick Actions
                                                                        </span>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                                            <span class="m-nav__link-text">
                                                                                Create Post
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">
                                                                                Send Messages
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                            <span class="m-nav__link-text">
                                                                                Upload File
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__section">
                                                                        <span class="m-nav__section-text">
                                                                            Useful Links
                                                                        </span>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                                            <span class="m-nav__link-text">
                                                                                FAQ
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                            <span class="m-nav__link-text">
                                                                                Support
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                                    <li class="m-nav__item m--hide">
                                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                                            Submit
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <form class="m-form m-form--fit m-form--label-align-right">
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        1. Personal Details
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    First Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->firstname }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Middle Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->middle_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Last Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->lastname }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Sex
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->sex }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Insurance Provider
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->insurance_provider }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Occupation
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->occupation }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Date of Birth
                                                </label>
                                                <div class="col-7">
                                                    <input type="text" name="dob"  class="form-control" id="m_inputmask_1" value="{{ $patient->dob }}">
                                                    <span class="m-form__help">
                                                        Custom date format:
                                                        <code>
                                                            yyyy/mm/dd
                                                        </code>
                                                    </span>
                                            </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Phone No.
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->phone_number }}">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Email
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->email }}">
                                                </div>
                                            </div>


                                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        2. Address & Emergency Contacts
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Address
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->postal_address }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Emergency Contact Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->emergency_contact_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Emergency Contact Phone Number
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->emergency_contact_phone_number }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Emergency Contact Relationship
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="{{ $patient->emergency_contact_relationship }}">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-7">
                                                        <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">
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
                                <div class="tab-pane " id="m_user_profile_tab_2">
							    </div>
                                </div>
                                <div class="tab-pane " id="m_user_profile_tab_3"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
				</div>
			</div>
			<!-- end:: Body -->
@endsection

































