
@extends('layouts.admin')

@section('header')
    Edit Procedure
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Procedure
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
            @foreach($procedures as $procedure)
                <div class="row">
                                
                                
                    <div class="col-xl-12 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    {{--  <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                Update Profile
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                Medical History
                                            </a>
                                        </li>

                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                                Payment History
                                            </a>
                                        </li>
                                    </ul>  --}}

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
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-procedure/{{ $procedure->id }} ">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Procedure
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="procedure"  type="text" value="{{ $procedure->procedure }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Amount
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="amount"  type="text" value="{{ $procedure->amount }}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                            Save changes
                                                        </button>
                                                        &nbsp;&nbsp;
                                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane " id="m_user_profile_tab_2"><br>
                                    <div class="col-md-12">
                                <!--begin:: Widgets/Support Tickets -->
                                <div class=" ">
                                    <div class="m-portlet__body">
                                        <div class="m-widget3">
                                            <div class="m-widget3__item">
                                                <div class="m-widget3__header">
                                                    <div class="m-widget3__user-img">
                                                        <img class="m-widget3__img" src="../admin/assets/app/media/img/users/user1.jpg" alt="">
                                                    </div>
                                                    <div class="m-widget3__info">
                                                        <span class="m-widget3__username">
                                                            Dr 
                                                        </span>
                                                        <br>
                                                        <span class="m-widget3__time">
                                                            {{ $procedure->created_at }}
                                                        </span>
                                                    </div>
                                                    <span class="m-widget3__status m--font-info">
                                                        Pending
                                                    </span>
                                                </div>
                                                <div class="m-widget3__body">
                                                    <p class="m-widget3__text">
                                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Support Tickets -->
                            </div>
							    </div>





                                <div class="tab-pane " id="m_user_profile_tab_3">
                                    <div class="col-md-12">
                                        <!--begin:: Widgets/Sale Reports-->
                                        <div class="">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Payment Reports
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__head-tools">
                                                    <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
                                                                Last Month
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
                                                                All Time
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">
                                                <!--Begin::Tab Content-->
                                                <div class="tab-content">
                                                    <!--begin::tab 1 content-->
                                                    <div class="tab-pane active" id="m_widget11_tab1_content">
                                                        <!--begin::Widget 11-->
                                                        <div class="m-widget11">
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table">
                                                                    <!--begin::Thead-->
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="m-widget11__label">
                                                                                #
                                                                            </td>
                                                                            <td class="m-widget11__app">
                                                                                Application
                                                                            </td>
                                                                            <td class="m-widget11__sales">
                                                                                Sales
                                                                            </td>
                                                                            <td class="m-widget11__price">
                                                                                Avg Price
                                                                            </td>
                                                                            <td class="m-widget11__total m--align-right">
                                                                                Total
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <!--end::Thead-->
                                                                    <!--begin::Tbody-->
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                                                    <input type="checkbox">
                                                                                    <span></span>
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    Vertex 2.0
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    Vertex To By Again
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                19,200
                                                                            </td>
                                                                            <td>
                                                                                $63
                                                                            </td>
                                                                            <td class="m--align-right m--font-brand">
                                                                                $14,740
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <!--end::Tbody-->
                                                                </table>
                                                                <!--end::Table-->
                                                            </div>
                                                            
                                                        </div>
                                                        <!--end::Widget 11-->
                                                    </div>
                                                    <!--end::tab 1 content-->
                                                    <!--begin::tab 2 content-->
                                                    
                                                    <!--end::tab 2 content-->
                                                    <!--begin::tab 3 content-->
                                                    <div class="tab-pane" id="m_widget11_tab3_content"></div>
                                                    <!--end::tab 3 content-->
                                                </div>
                                                <!--End::Tab Content-->
                                            </div>
                                            <div class="m-portlet__foot">
                                                
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Sale Reports-->
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach

            <!--End::Section-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
        
@endsection

































