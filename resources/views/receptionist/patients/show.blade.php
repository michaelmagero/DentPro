
@extends('layouts.receptionist')

@section('header')
    All Patients
@endsection

@section('content')

     <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Patients
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
								<div class="col-xl-4 order-1 order-xl-2 m--align-right">
									<a href="{{ url('new-patient') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
										<span>
											<i class="la la-user"></i>
											<span>
												New Patient
											</span>
										</span>
									</a>
									<div class="m-separator m-separator--dashed d-xl-none"></div>
								</div>
							</div>
						</div>
						<!--end: Search Form -->

						<!--begin: Datatable -->
						<table class="m-datatable" id="html_table">
							<thead>
								<tr class="m_datatable__row">
									
									<th class="file_no">
										File No
									</th>
									<th>
										Patient Name
									</th>
									<th>
										Insurance Provider
									</th>
									<th>
										Amount Allocated
									</th>
									<th>
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($patients as $patient)
									<tr>
										<td style="width:20px !important;">{{ $patient->id }}</td>
										<td>{{ $patient->firstname ." ".$patient->lastname  }}</td>
										<td>
											@if($patient->payment_mode == 'Cash')
												{{ "N/A" }}
											@elseif($patient->payment_mode != 'Cash')
												{{ $patient->payment_mode }}
											@endif
										</td>
										<td>{{ $patient->amount_allocated }}</td>
										<td>
											
											<a href="{{ url('show-patient/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
												<i class="fa fa-eye"></i>
											</a>

											<a href="{{ url('edit-patient/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
												<i class="fa fa-edit"></i>
											</a>
											
											<a href="{{ url('patient-history/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Medical History ">
												<i class="fa fa-user-md"></i>
											</a>

											<a href="{{ url('payment-history/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Payment History ">
												<i class="fa fa-credit-card"></i>
											</a>

											<a href="{{ url('new-waiting/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add To Waiting List ">
												<i class="fa fa-plus text-primary"></i>
											</a>

											<a href="{{ url('delete-patient/'.$patient->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Delete ">
												<i class="fa fa-trash"></i>
											</a>
											
										</button>
										</td>
									</tr>
                           		@endforeach
							</tbody>
						</table>
						<!--end: Datatable -->
					</div>

					<div class="m-portlet__foot">
								<div class="m-datatable__pager m-datatable--paging-loaded clearfix ">
									<div class="row">
										<div class="col-md-12">
											{{ $patients->links() }}
										</div>
									</div>
										
								</div>
							</div>
					</div>
					
					</div>

					
				</div>
			</div>

			
		<!-- end:: Body -->
					

@endsection

































