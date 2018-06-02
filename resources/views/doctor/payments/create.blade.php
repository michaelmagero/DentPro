
@extends('layouts.doctor')

@section('header')
    Add New Payment
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Add Payment
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
		
		

		@foreach($patients as $patient)
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
					<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-doc-payment') }}">
						{{ csrf_field() }}
						<div class="m-portlet__body">							
							<div class="form-group m-form__group row">
								<div class="col-lg-4 col-md-9 col-sm-12">
									<label class="">
										Patient FileNo:
									</label>
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="patient_id">
											@foreach($patients as $patient)
											<option value='{{ $patient->id }}'>
												{{ $patient->id }}
											</option>
											@endforeach
										</select>
									<span class="m-form__help">
										Search user by searching File No.
									</span>
								</div>

								<div class="col-lg-4">
									<label>
										Payment For
									</label>
									<select class="form-control m-select2" id="m_select2_procedure" name="procedure" multiple="multiple">
										<optgroup >
											
											<option value="Consultation">
												Consultation
											</option>
											<option value="Full Mouth Scaling and Polishing">
												Full Mouth Scaling and Polishing
											</option>
											<option value="Root Canal">
												Root Canal
											</option>
											<option value="Permanent Filling">
												Permanent Filling
											</option>
											<option value="Open Surgical Disimpaction">
												Open Surgical Disimpaction
											</option>
											<option value="Closed Surgical Disimpaction">
												Closed Surgical Disimpaction
											</option>
											<option value="Operculectomy">
												Operculectomy
											</option>
											<option value="Curettage">
												Curettage
											</option>
											<option value="Whitening">
												Whitening
											</option>
											<option value="Masking">
												Masking
											</option>
											<option value="Dental Bridges">
												Dental Bridges
											</option>
											<option value="Dental Implants">
												Dental Implants
											</option>
											<option value="Dentures">
												Dentures
											</option>
											<option value="Braces">
												Braces
											</option>
										</optgroup>
									</select>
									
								</div>


								<div class="col-lg-4">
									<label>
										Amount:
									</label>
									<input type="text" name="procedure_cost"  class="form-control m-input" >
									
								</div>


							</div>
							

							<div class="form-group m-form__group row">
								

								<div class="col-lg-6">
									<label>
										Notes
									</label>
									<div>
										<textarea name="notes" id="textarea" class="form-control" cols="15" rows="10" required="required"></textarea>
									</div>
									
								</div>

								<div class="col-lg-6">
									<label>
										Description:
									</label>
									<input type="text" name="description"  class="form-control m-input" ><br>


									<label>
										Lab Name:
									</label>
									<input type="text" name="lab_name"  class="form-control m-input" ><br>

									<label>
										Due Date:
									</label>
									<div class="input-group date" >
										<input class="flatpickr flatpickr-input form-control input active" placeholder="Select Date..." tabindex="0" type="text" readonly="readonly" name="due_date">
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

						</div>
						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-8">
										<button type="submit" class="btn btn-primary m-btn m-btn--custom">
											Add Payment
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
					@endforeach
                </div>
			</div>
            <!-- end:: Body -->



@endsection

































