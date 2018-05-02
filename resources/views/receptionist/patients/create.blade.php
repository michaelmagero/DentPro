
@extends('layouts.receptionist')

@section('header')
    Add New Patient
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
			<!--begin::Portlet-->
				<div class="m-portlet">
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
										<!-- @if(Session::has('flash_message'))
											<div class="alert alert-success" role="alert" ><em> {!! session('flash_message') !!}</em></div>
										@endif -->

										<script src="../admin/assets/demo/default/custom/components/base/sweetalert2.js" type="text/javascript"></script>

                                        <!-- Include this after the sweet alert js file -->
                                        @include('sweet::alert')
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
									<input type="text" name="middlename"  class="form-control m-input" >
									
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
												Year/Month/Date
											</code>
										</span>
									</div>
									
								</div>
								<div class="col-lg-4">
									<label>
										Payment Mode:
									</label>
									

									<select class="form-control m-select2" id="m_select2_4" name="payment_mode">
										<option></option>
										<optgroup>
											<option value="Cash">
												Cash
											</option>
										</optgroup>

										<optgroup label="Insurance Providers">
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
											<option value="Resolution">
												Resolution
											</option>
											<option value="AAR">
												AAR
											</option>
											<option value="APA">
												APA
											</option>
											<option value="Liaison">
												Liaison
											</option>
											<option value="KCB">
												KCB
											</option>
											<option value="Co-operative">
												Co-operative
											</option>
											<option value="First Assurance">
												First Assurance
											</option>
											<option value="Eagle Africa">
												Eagle Africa
											</option>
											<option value="Sedwick">
												Sedwick
											</option>

										</optgroup>
										
									</select>
									
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Amount Allocated: (for insurance holders)
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="amount_allocated" class="form-control m-input" >
										
									</div>
									
								</div>

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

								
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Email:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="email" name="email"  class="form-control m-input" >
										
									</div>
									
								</div>

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
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">
										Emergency Contact Phone No:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_phone_number"  class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-4">
									<label class="">
										Emergency Contact Relationship:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_relationship"  class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-4">
									<label class="">
										Preferred Doctor:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<select name="doctor" id="input" class="form-control">
												
											@foreach($users as $user)
												@if($user->role == 'doctor')
													<option value="{{ $user->name }}" > {{ $user->name }} </option>
												@endif
											@endforeach

										</select>
										
									</div>
									
								</div>

								
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-8">
										<button type="submit" class="btn btn-primary m-btn m-btn--custom" >
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

































