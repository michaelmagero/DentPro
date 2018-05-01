@extends('layouts.receptionist')

@section('header')
    Receptionist Dashboard
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Dashboard
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
                    <span class="m-subheader__daterange" >
                        <span class="m-subheader__daterange-label">
							<strong> {{ date('M d Y  h:i a') }} </strong>
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date  m--font-brand"></span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
		<!-- END: Subheader -->
		
		


         <div class="m-content">
			<!--begin:: Widgets/Stats-->
						<div class="m-portlet ">
							<div class="m-portlet__body  m-portlet__body--no-padding">
								<div class="row m-row--no-padding m-row--col-separator-xl">
									<div class="col-md-12 col-lg-6 col-xl-3">
										
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Patients
												</h4>
												<br>
												<span class="m-widget24__stats m--font-brand">
													{{ $patients->count() }}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
										<!--end::Total Profit-->
									</div>


									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Feedbacks-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Payments
												</h4>
												<br>
												<span class="m-widget24__stats m--font-info">
													{{ $payments->count() }}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
										<!--end::New Feedbacks-->
									</div>


									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Orders-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Appointments
												</h4>
												<br>
												<span class="m-widget24__stats m--font-danger">
													{{ $appointments->count()  }}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
										<!--end::New Orders-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Users-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Waiting List
												</h4>
												<br>
												<span class="m-widget24__stats m--font-success">
													{{ $waitings->count() }}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-success" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													
												</span>
												<span class="m-widget24__number">
													
												</span>
											</div>
										</div>
										<!--end::New Users-->
									</div>
								</div>
							</div>


						</div>
						<!--end:: Widgets/Stats--> 

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Waiting List
										</h3>
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
											<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-user"></i>
													<span>
														New Patient
													</span>
												</span>
											</a>
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div> -->
									</div>
								</div>
								<!--end: Search Form -->
						<table class="m-datatable" id="html_table" width="100%">
									<thead>
										<tr class="m_datatable__row">
											
											<th title="Field #2">
												File No
											</th>
											<th title="Field #3">
												Firstname
											</th>
											<th title="Field #4">
												Lastname
											</th>
											<th title="Field #5">
												Doctor
											</th>
											<th title="Field #8">
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach($patients as $patient)
											<tr>
												<td>{{ $patient->id }}</td>
												<td>{{ $patient->firstname }}</td>
												<td>{{ $patient->lastname }}</td>
												<td>{{ $patient->doctor }}</td>
												<td>
													
													<a href="{{ url('show-patient/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
														<i class="fa fa-eye"></i>
													</a>

													<a href="{{ url('edit-patient/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
														<i class="fa fa-edit"></i>
													</a>

													<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Delete ">
														<i class="fa fa-trash"></i>
													</a>

													<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add Payment ">
														<i class="fa fa-plus text-primary"></i>
													</a>
													
												</button>
												</td>
											</tr>
                                   		@endforeach
									</tbody>
								</table>
							</div>
						</div>
						
						<!--End::Section-->
                    </div>
                </div>
			</div>
            <!-- end:: Body -->


@endsection


