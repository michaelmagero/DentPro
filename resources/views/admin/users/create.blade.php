
@extends('layouts.admin')

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
                        Add New User
                    </h3>
                </div>
                <div>
                    <span class="m-subheader__daterange">
                        <span class="m-subheader__daterange-label">
							<strong> {{ date('M d Y h:i a') }} </strong>
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date  m--font-brand"></span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
		<!-- END: Subheader -->
		
		


        <div class="m-content">
			<!--begin::Portlet-->
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption" style="margin: 0 0 0 300px !important;">
											<div class="col-lg-6 col-lg-offset-3">
                                                <span class="text-center">
                                                        @if(Session::has('flash_message'))
                                                            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
                                                        @endif
                                                </span>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-user') }}">
                                         {{ csrf_field() }}
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Firstname:
												</label>
												<div class="col-lg-3">
													<input type="text" name="name"  class="form-control m-input" placeholder="">
                                                </div>
                                                
												<label class="col-lg-2 col-form-label">
													Lastname:
												</label>
												<div class="col-lg-3">
													<input type="text" name="lastname" class="form-control m-input" placeholder="">
                                                </div>
                                                
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Email:
												</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="email" name="email" class="form-control m-input" placeholder="">
														
													</div>
                                                </div>
                                                
												<label class="col-lg-2 col-form-label">
													Password:
												</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="password" name="password" class="form-control m-input" placeholder="">
														
													</div>
                                                </div>
                                                
											</div>
											<div class="form-group m-form__group row">


												<label class="col-lg-2 col-form-label">
													Role:
												</label>
												<div class="col-lg-3">
													<select name="role" class="form-control" id="m_notify_state">
                                                        <option value="">
                                                            Select One
                                                        </option>
                                                        <option value="doctor">
                                                            Doctor
                                                        </option>
                                                        <option value="receptionist">
                                                            Receptionist
                                                        </option>
                                                        <option value="marketing_manager">
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
                                                        </option>
											        </select>
                                                </div>
                                                
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-10">
														<button type="submit" class="btn btn-primary">
															Submit
														</button>
														<button type="reset" class="btn btn-secondary">
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->

						
						
						
						
						<!--End::Section-->
                    </div>
                </div>
			</div>
            <!-- end:: Body -->



@endsection

































