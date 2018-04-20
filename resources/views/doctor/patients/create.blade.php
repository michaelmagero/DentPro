
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
                        Add Patient
                    </h3>
                </div>
                <div>
                    <span class="m-subheader__daterange">
                        <span class="m-subheader__daterange-label">
							{{ date('d M Y h:i a') }}
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
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								
								<span class="text-center">
									<br>
									<div class="col-md-12 ">
										@if(Session::has('flash_message'))
											<div class="alert alert-success" role="alert"><em> {!! session('flash_message') !!}</em></div>
										@endif
									</div>
								</span>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-patient') }}">
						{{ csrf_field() }}
						<div class="m-portlet__body">
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label>
										Firstname:
									</label>
									<input type="text" name="firstname" class="form-control m-input" >
									
								</div>
								<div class="col-lg-4">
									<label class="">
										Middle Name:
									</label>
									<input type="text" name="middle_name"  class="form-control m-input" >
									
								</div>
								<div class="col-lg-4">
									<label>
										Last Name:
									</label>
									<input type="text" name="lastname"  class="form-control m-input" >
									
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Sex:
									</label>
									<div class="m-radio-inline">
										<label class="m-radio m-radio--solid">
											<input type="radio" name="sex" value="male">
											Male
											<span></span>
										</label>
										<label class="m-radio m-radio--solid">
											<input type="radio" name="sex" value="female">
											Female
											<span></span>
										</label>
									</div>
									
								</div>
								<div class="col-lg-4">
									<label class="">
										Date of Birth:
									</label>
									<div class="col-lg-12 col-md-9 col-sm-12">
										<input type="text" name="dob"  class="form-control" id="m_inputmask_1">
										<span class="m-form__help">
											Custom date format:
											<code>
												yyyy/mm/dd
											</code>
										</span>
									</div>
									
								</div>
								<div class="col-lg-4">
									<label>
										Insurance Provider:
									</label>
									<select name="insurance_provider" class="form-control" id="m_notify_state">
										<option value="">
											Select One
										</option>
										<option value="Jubilee">
											Jubilee
										</option>
										<option value="UAP">
											UAP
										</option>
										<option value="Madison">
											Madison
										</option>
										<option value="AON">
											AON
										</option>
										<option value="Britam">
											Britam
										</option>
										<option value="Sanlam">
											Sanlam
										</option>
										<option value="Pacific">
											Pacific
										</option>
										<option value="Saham">
											Saham
										</option>
									</select>
									
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Occupation:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="occupation" class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-4">
									<label class="">
										P.O Box:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="postal_address"  class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-4">
									<label class="">
										Email:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="email" name="email"  class="form-control m-input" >
										
									</div>
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Phone No:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="phone_number" class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-4">
									<label class="">
										Emergency Contact Name:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_name"   class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-4">
									<label class="">
										Emergency Contact Phone No:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_phone_number"  class="form-control m-input" >
										
									</div>
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Emergency Contact Relationship:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_relationship"  class="form-control m-input" >
										
									</div>
									
								</div>

								
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-8">
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

































