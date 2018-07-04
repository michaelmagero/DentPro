
@extends('layouts.receptionist')

@section('header')
    Receipt
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Receipt
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
		
		

        @foreach($receipts as $receipt)
        <div class="m-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-portlet">
                            <div class="m-portlet__body m-portlet__body--no-padding">
                                <div class="m-invoice-2">
                                    <div class="m-invoice__wrapper">
                                        <div class="m-invoice__head" style="background-image: url(./assets/app/media/img//logos/bg-6.jpg);">
                                            <div class="m-invoice__container m-invoice__container--centered">
                                                <div class="m-invoice__logo">
                                                    <a href="#">
                                                        <h1>RECEIPT OF PAYMENT</h1>
                                                    </a>
                                                    <a href="#">
                                                        <img src="../images/logo.png" style="width:100px; height:100px;">
                                                    </a>
                                                </div>
                                                <span class="m-invoice__desc">
                                                <span>3rd Floor Cardinal Otunga Plaza. Cardinal Otunga Street</span>
                                                <span>P.O BOX 51215-00100 Nairobi Kenya</span>
                                                <span>info@danc.co.ke</span>
                                                <span>0798 040 111</span>
                                                
                                                </span>
                                                <div class="m-invoice__items">
                                                    <div class="m-invoice__item">
                                                        <span class="m-invoice__subtitle">DATE</span>
                                                        <span class="m-invoice__text">{{ $receipt->created_at->format('F j, Y') }}</span>
                                                    </div>
                                                    <div class="m-invoice__item">
                                                        <span class="m-invoice__subtitle">RECEIPT NO.</span>
                                                        <span class="m-invoice__text">{{ $receipt->id }}</span>
                                                    </div>
                                                    <div class="m-invoice__item">
                                                        <span class="m-invoice__subtitle">PAYMENT BY.</span>
                                                        <span class="m-invoice__text">
                                                            @foreach($patients as $patient)
                                                                @if($patient->id == $receipt->patient_id)
                                                                    {{ $patient->firstname . " " . $patient->lastname }}
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-invoice__body m-invoice__body--centered" >
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>PROCEDURE</th>
                                                            <th>TOTAL PRICE</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $receipt->procedure }}</td>
                                                            <td class="m--font-danger">{{ $receipt->amount }}</td>
                                                        </tr><br><br>


                                                        <tr>
                                                            <td></td>
                                                            <td>Amount Paid &nbsp;&nbsp; {{ $receipt->amount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Balance &nbsp;&nbsp; {{ $receipt->amount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><strong>Total </strong> &nbsp;&nbsp; {{ $receipt->total }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="m-invoice__footer" style="padding:40px 0 40px 100px !important;">
                                            <div class="row">
                                                <div class="col-md-8"></div>
                                                <div class="col-md-4">
                                                    <a href="{{ url('/all-payments') }}" class="btn m-btn--square  btn-primary"> Back </a>

                                                    <button type="button" class="btn m-btn--square  btn-danger"> <i class="fa fa-print"></i> &nbsp; Print </button>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- end:: Body -->



@endsection

































