
@extends('layouts.doctor')

@section('header')
    All Appointments
@endsection

@section('content')

     <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Appointments
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

		<!-- END: Subheader -->
					<div class="m-content">

						
						
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<script src="../js/sweetalert2.all.js"></script>

										<!-- Include this after the sweet alert js file -->
										@if (Session::has('sweet_alert.alert'))
											<script>
												swal({!! Session::get('sweet_alert.alert') !!});
											</script>
										@endif
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								
								<!--begin: Search Form -->
								<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
									<div class="row align-items-center">
										<div class="col-xl-8 order-2 order-xl-1">
											<div class="form-group m-form__group row align-items-center">
												<div class="col-md-4">
													<div class="m-input-icon m-input-icon--left">
														<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
														<span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<!-- <div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<a href="{{ url('new-appointment-doc') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-user"></i>
													<span>
														New Appointment
													</span>
												</span>
											</a>
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div> -->
									</div>
								</div>
								<!--end: Search Form -->
								<!--begin: Datatable -->
								<table class="m-datatable" id="html_table" width="100%">
									<thead>
										<tr class="m_datatable__row">
											
											<th title="Field #2">
												File No
											</th>
											<th title="Field #3">
												Patient
											</th>
											<th title="Field #5">
												Appointment Date
											</th>
											<th title="Field #6">
												Appointment Status
											</th>
											<th title="Field #6">
												Action
											</th>

										</tr>
									</thead>
									<tbody>
										@foreach($payments as $payment)
											@if($payment->doctor_id == Auth::user()->id)
												<tr>
													<td>{{ $payment->patient_id }}</td>
												
													@foreach($patients as $patient)
														@if($patient->id == $payment->patient_id)
															<td>{{ $patient->firstname . " ". $patient->lastname }}</td>
														@endif
													@endforeach
													
													<td>{{ $payment->next_appointment }}</td>

													<td>
													@foreach($appointments as $appointment)
														@if($appointment->patient_id == $patient->id)
																<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--warning m-badge--wide">{{ $appointment->appointment_status }}</span></span></td>
														
																{{--  <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">{{ $appointment->appointment_status }}</span></span></td>  --}}
															
														@endif
													@endforeach
													</td>
													
													<td>
														<a href="{{ url('show-doc-patient/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
															<i class="fa fa-eye"></i>
														</a>

														<a href="{{ url('patient-history-doc/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Medical History ">
															<i class="fa fa-user-md"></i>
														</a>

														<a href="{{ url('payment-history-doc/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Payment History ">
															<i class="fa fa-credit-card"></i>
														</a>

														<a href="{{ url('delete-waiting/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Clear from List ">
															<i class="flaticon-circle"></i>
														</a>
													</td>


												</tr>
											@endif
                                   		@endforeach
									</tbody>
								</table>
								<!--end: Datatable -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
					

						
						
						
						
						




@endsection

































