
@extends('layouts.receptionist')

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
								
								<span class="text-center">
									<br>
									<div class="col-md-12 ">
										@if(Session::has('flash_message'))
										<button type="button" class="btn btn-success m-btn m-btn--custom" id="m_sweetalert_demo_3_3">
										{!! session('flash_message') !!}
										</button>
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
								<div class="col-lg-4 col-md-9 col-sm-12">
									<label class="">
										Patient:
									</label>
									<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
										<option>
											-- Search and select Patient --
										</option>
										@foreach($patients as $patient)
										  <option value='{{ $patient->id }}'>{{ $patient->name }} {{ $patient->lastname }}</option>
										@endforeach
									</select>
									<span class="m-form__help">
										Search user by using names
									</span>
								</div>

								<div class="col-lg-4">
									<label>
										Payment Type:
									</label>
									<select name="insurance_provider" class="form-control" id="m_notify_state">
										<option value="">
											Select One
										</option>
										<option value="Jubilee">
											Cash
										</option>
										<option value="UAP">
											Insurance
										</option>
										
									</select>
									
								</div>
								<div class="col-lg-4">
									<label>
										Payment For
									</label>
									<input type="text" name="amount"  class="form-control m-input" >
									
								</div>


							</div>
							

							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label>
										Amount (Cash):
									</label>
									<input type="text" name="lastname"  class="form-control m-input" >
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label>
										Invoice To:
									</label>
									<input type="text" name="lastname"  class="form-control m-input" >
									
								</div>
								<div class="col-lg-4">
									<label>
										Invoice For:
									</label>
									<input type="text" name="lastname"  class="form-control m-input" >
									
								</div>
								<div class="col-lg-4">
									<label>
										Invoice Amount:
									</label>
									<input type="text" name="amount"  class="form-control m-input" >
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label>
										Invoice Date:
									</label>
									<div class="input-group date">
										<input type="text" class="form-control m-input" readonly="" value="05/20/2017" id="m_datepicker_3">
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar"></i>
											</span>
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
										<button type="submit" class="btn btn-primary">
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
                </div>
			</div>
            <!-- end:: Body -->



@endsection

































