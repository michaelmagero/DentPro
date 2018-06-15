
@extends('layouts.admin')

@section('header')
    Add Procedure
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Add Procedure
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
							<form class="m-form" method="POST" action="{{ url('create-procedure') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										
										
										<div class="m--margin-bottom-40"></div>
										<div id="m_repeater_1">
											<div class="form-group  m-form__group row" id="m_repeater_1">
												<label class="col-lg-2 col-form-label">
													
												</label>
												<div data-repeater-list="arrayName" class="col-lg-10">
													<div data-repeater-item="" class="form-group m-form__group row align-items-center">
														<div class="col-md-4">
															<div class="m-form__group m-form__group--inline">
																<div class="m-form__label">
																	<label>
																		Procedure:
																	</label>
																</div>
																<div class="m-form__control">
																	<input type="text" name="procedure" class="form-control m-input" >
																</div>
															</div>
															<div class="d-md-none m--margin-bottom-10"></div>
														</div>
														<div class="col-md-4">
															<div class="m-form__group m-form__group--inline">
																<div class="m-form__label">
																	<label class="m-label m-label--single">
																		Amount:
																	</label>
																</div>
																<div class="m-form__control">
																	<input type="text" name="amount" class="form-control m-input" >
																</div>
															</div>
															<div class="d-md-none m--margin-bottom-10"></div>
														</div>
														
														<div class="col-md-4">
															<div data-repeater-delete="" class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>
																		Delete
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="m-form__group form-group row">
												<label class="col-lg-2 col-form-label"></label>
												<div class="col-lg-4">
													<div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>
																Add
															</span>
														</span>
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

































