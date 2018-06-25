
@extends('layouts.admin')

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
					<!--begin::Form-->
					<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-patient-admin') }}">
						{{ csrf_field() }}
						<div class="m-portlet__body">
							<div class="form-group m-form__group row">
								<div class="col-lg-3">
									<label>
										Firstname:
									</label>
									<input type="text" name="firstname" class="form-control m-input" >
									
								</div>
								<div class="col-lg-3">
									<label class="">
										Middle Name:
									</label>
									<input type="text" name="middlename"  class="form-control m-input" >
									
								</div>
								<div class="col-lg-3">
									<label>
										Last Name:
									</label>
									<input type="text" name="lastname"  class="form-control m-input" >
									
								</div>
								<div class="col-lg-3">
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
							</div>
							<div class="form-group m-form__group row">
								
								<div class="col-lg-3">
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
								<div class="col-lg-3">
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
											@foreach($providers as $provider)
											<option value="{{ $provider->name }}">
												{{ $provider->name }}
											</option>
											@endforeach
										</optgroup>
										
										
									</select>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Amount Allocated: (for insurance holders)
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="amount_allocated" class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Occupation:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="occupation" class="form-control m-input" >
										
									</div>
									
								</div>
							</div>
							<div class="form-group m-form__group row">
								

								<div class="col-lg-3">
									<label class="">
										P.O Box:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="postal_address"  class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Email:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="email" name="email"  class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Phone No:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="phone_number" class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Emergency Contact Name:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_name"   class="form-control m-input" >
										
									</div>
									
								</div>

								
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-3">
									<label class="">
										Emergency Contact Phone No:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_phone_number"  class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Emergency Contact Relationship:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="emergency_contact_relationship"  class="form-control m-input" >
										
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Preferred Doctor:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<select name="doctor" id="input" class="form-control">
											<option value="">-- Select Doctor --</option>
											@foreach($users as $user)
												@if($user->role == 'doctor')
													
													<option value="{{ $user->name }}" > {{ $user->name }} </option>
												@endif
											@endforeach

										</select>
										
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Referred by:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="referred_by"  class="form-control m-input" >
										
									</div>
									
								</div>

								
							</div>

							<div class="form-group m-form__group row">
								

								<div class="col-lg-3">
									<label class="">
										Do you take Alcohol:
									</label>
									<div class="m-checkbox-inline">
										<label class="m-checkbox">
											<input type="checkbox" name="alcoholic" value="yes">
											Yes
											<span></span>
										</label>
										<label class="m-checkbox">
											<input type="checkbox" name="alcoholic" value="no">
											No
											<span></span>
										</label>
									</div>
									
								</div>

								<div class="col-lg-3">
									<label class="">
										Do you Smoke:
									</label>
									<div class="m-checkbox-inline">
										<label class="m-checkbox">
											<input type="checkbox" name="smoker" value="yes">
											Yes
											<span></span>
										</label>
										<label class="m-checkbox">
											<input type="checkbox" name="smoker" value="no">
											No
											<span></span>
										</label>
									</div>
									
								</div>

								<div class="col-lg-6">
									<label class="">
										Drugs/Medicine Allergic Reactions:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="text" name="allergic_reactions"  class="form-control m-input" >
										
									</div>
									
								</div>

								
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label class="">
										Disease History:
									</label>
									<div class="row">
										<div class="col-md-10">
											<div class="m-checkbox-inline">
												<label class="">
													<strong>HAVE</strong> &nbsp;&nbsp;
													<span></span>
												</label>
												<label class="">
													<strong>HAD</strong>
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Abnormal Bleeding">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Abnormal Bleeding">
													&nbsp; Abnormal Bleeding
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - AIDS or HIV infection">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - AIDS or HIV infection">
													&nbsp; AIDS or HIV infection
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Diabetes">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Diabetes">
													&nbsp; Diabetes
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Anemia">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Anemia">
													&nbsp; Anemia
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Ulcers">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Ulcers">
													&nbsp; Ulcers
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Athritis">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Athritis">
													&nbsp; Athritis
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Migraines">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Migraines">
													&nbsp; Migraines
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Persistent Dry mouth or lips">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Persistent Dry mouth or lips">
													&nbsp; Persistent Dry mouth or lips
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Eating Disorder">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Eating Disorder">
													&nbsp; Eating Disorder
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Respiratory Problems">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Respiratory Problems">
													&nbsp; Respiratory Problems
													<span></span>
												</label>
											</div>



										</div>
									</div>

									
								</div>


								<div class="col-lg-6">
									<label class="">
										<p></p>
									</label>
									<div class="row">
										<div class="col-md-10">
											<div class="m-checkbox-inline">
												<label class="">
													<strong>HAVE</strong> &nbsp;&nbsp;
													<span></span>
												</label>
												<label class="">
													<strong>HAD</strong>
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Mental Health Disorders">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Mental Health Disorders">
													&nbsp; Mental Health Disorders
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Neurological Disorders E.g Stroke">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Neurological Disorders E.g Stroke">
													&nbsp; Neurological Disorders E.g Stroke
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Rapid Weight Loss / Weight Gain">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Rapid Weight Loss / Weight Gain">
													&nbsp; Rapid Weight Loss / Weight Gain
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Kidney Diseases">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Kidney Diseases">
													&nbsp; Kidney Diseases
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Liver Diseases">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Liver Diseases">
													&nbsp; Liver Diseases
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Sexually Transmitted Diseases (STDs)">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Sexually Transmitted Diseases (STDs)">
													&nbsp; Sexually Transmitted Diseases (STDs)
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Epilepsy">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Epilepsy">
													&nbsp; Epilepsy
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Asthma">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Asthma">
													&nbsp; Asthma
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Cancer">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Cancer">
													&nbsp; Cancer
													<span></span>
												</label>
											</div>

											<div class="m-checkbox-inline">
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Have - Persistent Swollen Glands in Neck (Goiter)">
													&nbsp;
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="disease_history" value="Had - Persistent Swollen Glands in Neck (Goiter)">
													&nbsp; Persistent Swollen Glands in Neck (Goiter)
													<span></span>
												</label>
											</div>

										</div>
									</div>

									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label class="">
										Cardiovascular Disease (Select type below):
									</label>
									<div class="row">
										<div class="col-md-10">
											<div class="m-checkbox-list">
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Angina Recurrent infections">
													Angina Recurrent infections
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Arteriosclerosis">
													Arteriosclerosis
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Artificial Heart Valves">
													Artificial Heart Valves
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Coronary insufficiency">
													Coronary insufficiency
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Coronary occlusion">
													Coronary occlusion
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Damaged heart valves">
													Damaged heart valves
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Heart Attack">
													Heart Attack
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Heart murmur">
													Heart murmur
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"High blood pressure">
													High blood pressure
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Inborn heart defects">
													Inborn heart defects
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Mitral valve prolapses">
													Mitral valve prolapses
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Pacemaker">
													Pacemaker
													<span></span>
												</label>
												<label class="m-checkbox">
													<input type="checkbox" name="cardiovascular_disease" value"Rhumatic heart disease">
													Rhumatic heart disease
													<span></span>
												</label>
											</div>
										</div>
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

































