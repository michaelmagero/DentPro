
@extends('layouts.receptionist')

@section('header')
    Medical History
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Medical History
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
            @foreach($patients as $patient)
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="m-portlet  ">
                            <div class="m-portlet__body">
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        Your Profile
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">
                                            <img src="../images/avatar.png" alt=""/ width="60" height="60">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                            {{ $patient->firstname }} {{ $patient->lastname }}
                                        </span>
                                        <a href="" class="m-card-profile__email m-link">
                                            {{ $patient->email }}
                                        </a>
                                    </div>
                                </div>
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-edit"></i>
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        File No - <span class="text-primary">{{ $patient->id }}</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-share"></i>
                                            <span class="m-nav__link-text">
                                                Date of Birth - <span class="text-primary">{{ $patient->dob }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-support"></i>
                                            <span class="m-nav__link-text">
                                                Phone No. - <span class="text-primary">{{ $patient->phone_number }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                            <span class="m-nav__link-text">
                                                Email - <span class="text-primary">{{ $patient->email }}</span>
                                            </span>
                                        </span>
                                    </li>
                                </ul>

                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>

                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        Payment History 
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    
                                </ul></br>
                                <div class="m-widget1 m-widget1--paddingless">
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">
                                                    Balance
                                                </h3>
                                            </div>
                                            <div class="col m--align-right">
                                                @foreach($payments as $payment)
                                                    <span class="m-widget1__number m--font-brand">
                                                        {{$payment->balance}}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <div id="m_repeater_1">
											
										</div>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                                
                                
                    <div class="col-xl-9 col-lg-8">
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
                                </div>
                                
                            </div>
                            @foreach($payments as $payment)
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <div class="col-md-12">
                                    <!--begin:: Widgets/Support Tickets -->
                                    <div class=" ">
                                        <div class="">
                                            <div class="m-portlet__body">
                                                <div class="m-widget3">
                                                    <div class="m-widget3__item">
                                                        <div class="m-widget3__header">
                                                            <div class="m-widget3__user-img">
                                                                <img class="m-widget3__img" src="../images/avatar.png" alt="">
                                                            </div>
                                                            <div class="m-widget3__info">
                                                                <span class="m-widget3__username">
                                                                    @if($payment->doctor_id == Auth::user()->id)
                                                                        Dr {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                                                                    @endif
                                                                </span>
                                                                <br>
                                                                <span class="m-widget3__time">
                                                                    {{ $payment->created_at }}
                                                                </span>
                                                            </div>
                                                            <span class="m-widget3__status m--font-info">
                                                                <div class="m-widget4__ext">
															        <a href="{{ url('payment-history-doc/'.$patient->id) }}" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">
																        Payment History
															        </a>
														        </div>
                                                            </span>
                                                        </div>
                                                        <div class="m-widget3__body mb-0">
                                                            <p class="m-widget3__text">
                                                                {{ $payment->notes }}
                                                            </p>
                                                        </div>
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
                            @endforeach
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

































