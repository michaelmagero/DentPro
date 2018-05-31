
@extends('layouts.admin')

@section('header')
    Waiting List
@endsection

@section('content')

     <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Waiting List
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
											<!-- <a href="{{ url('new-waiting') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-user"></i>
													<span>
														New Waiting Patient
													</span>
												</span>
											</a> -->
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div>
									</div>
								</div>
								<!--end: Search Form -->
								<!--begin: Datatable -->
								<table class="m-datatable " id="html_table" width="100%">
									<thead>
										<tr class="m_datatable__row">
											
											<th title="Field #2" class="file_no">
												File No
											</th>
											<th title="Field #3">
												Patient Name
											</th>
											<th title="Field #5">
												Payment Mode
											</th>
											<th title="Field #6">
												Amount Allocated
											</th>
											<th title="Field #6">
												Doctor
											</th>
											<th title="Field #7">
												Status
											</th>
											<th title="Field #7">
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach($waitings as $waiting)
											<tr>
												<td>{{ $waiting->patient_id }}</td>
												<td>{{ $waiting->firstname . " " . $waiting->lastname }}</td>
												<td>{{ $waiting->payment_mode }}</td>
												<td>{{ $waiting->amount_allocated }}</td>
												<td>{{ $waiting->doctor }}</td>
												@if($waiting->status == 'waiting')
													<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--warning m-badge--wide">{{ $waiting->status }}</span></span></td>
												@elseif($waiting->status == 'seen')
													<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">{{ $waiting->status }}</span></span></td>
												@else
													<td></td>
												@endif
												<td>

												
													<a href="{{ url('new-payment-admin/'.$waiting->patient_id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add Payment ">
														<i class="fa fa-plus text-primary"></i>
													</a>

													<a href="{{ url('delete-waiting/'.$waiting->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Clear from List ">
														<i class="flaticon-circle"></i>
													</a>

													
													
												</button>
												</td>
											</tr>
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

































