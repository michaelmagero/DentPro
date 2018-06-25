
@extends('layouts.admin')

@section('header')
    Add Provider
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Insurance Providers
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
										<h3 class="m-portlet__head-text">
											<script src="../js/sweetalert2.all.js"></script>

											<!-- Include this after the sweet alert js file -->
											@if (Session::has('sweet_alert.alert'))
												<script>
													swal({!! Session::get('sweet_alert.alert') !!});
												</script>
											@endif

										</h3>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="m-form" method="POST" action="{{ url('create-provider') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="m--margin-bottom-10"></div>
										<div class="form-group m-form__group row">
											<div class="col-lg-1"></div>
											<div class="col-lg-5">
												<label for="">
													Select Your Clinics Insurance Providers
												</label>
												<div class="m--margin-bottom-40"></div>

												<div class="m-checkbox-list m-checkbox-multiple">
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Jubilee Insurance">
														Jubilee Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="UAP Insurance">
														UAP Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Madison Insurance">
														Madison Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="AON Insurance">
														AON Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Britam">
														Britam
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Sanlam">
														Sanlam
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Pacific Insurance">
														Pacific Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Saham">
														Saham
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Resolution Insurance">
														Resolution Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="AAR">
														AAR
														<span></span>
													</label>
												</div>
											
											</div>

											<div class="col-lg-5">
												<div class="m--margin-bottom-70"></div>
												<div class="m-checkbox-list">
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="APA Insurance">
														APA Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Liaison Insurance">
														Liaison Insurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="KCB">
														KCB
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Co-operative">
														Co-operative
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="First Assurance">
														First Assurance
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Eagle Africa">
														Eagle Africa
														<span></span>
													</label>
													<label class="m-checkbox">
														<input type="checkbox" name="insurance_provider[]" value="Sedgwick">
														Sedgwick
														<span></span>
													</label>
												</div>
											
											</div>
										</div>
										<div class="m--margin-bottom-10"></div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions--solid">
										<div class="row">
											<div class="col-lg-4"></div>
											<div class="col-lg-8">
												<button type="submit" class="btn btn-primary m-btn m-btn--custom" >
													Add Providers
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

































