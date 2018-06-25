
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
		
		

        @foreach($payments as $payment)
        <div class="m-content">
			<!--begin::Portlet-->
				
				<div class="m-portlet">
					<div class="row">
                    <div class="col-md-12">
                        <form m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed method="POST" action="{{ url('new-receipt/'.$payment->patient_id) }}">
                            {{ csrf_field() }}
                            <div class="white-box printableArea">
                                <h3><b>Receipt</b> <span class="pull-right">#5669626</span></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left">
                                            <address>
                                                <h3> &nbsp;<b class="text-danger">Dental Access</b></h3>
                                                <p class="text-muted m-l-5">Access Plaza 2nd Floor,
                                                    <br> Moi Avenue Nairobi,
                                                    <br> access@gmail.com,
                                                    <br> 0718573435</p>
                                            </address>
                                        </div>
                                        <div class="pull-right text-right">
                                            <address>
                                                <h3>For,</h3>
                                                    @foreach($patients as $patient)
                                                        @if($patient->id == $payment->patient_id)
                                                            <h4 name"">{{ $patient->firstname . " " . $patient->lastname }}</h4>
                                                        @endif
                                                    

                                                        <p class="text-muted m-l-30">{{ $patient->postal_address }},
                                                        <br> {{ $patient->phone_number }},
                                                        <br> {{ $patient->email }}</p>
                                                    @endforeach
                                                        <p class="m-t-30"><b> Date :</b> <i class="fa fa-calendar"></i> {{ $payment->created_at }}</p>
                                                        {{-- <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{ $payment->created_at }}</p> --}}
                                                    
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive m-t-40" style="clear: both;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Procedure</th>
                                                        <th class="text-right">Quantity</th>
                                                        <th class="text-right">Unit Cost</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td name="procedure">{{ $payment->procedure }}</td>
                                                        <td class="text-right">{{ $payment->quantity }} </td>
                                                        <td class="text-right"> {{ $payment->procedure_cost }} </td>
                                                        <td class="text-right"> {{ $payment->procedure_cost }} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right m-t-30 text-right">
                                            <p>Sub - Total amount: {{ $payment->procedure_cost }}</p>
                                            <p>vat (16%) : {{ ($payment->procedure_cost) * 0.16 }} </p>
                                            <hr>
                                            <h3 name="total"><b>Total :</b> Ksh {{ $payment->procedure_cost }}</h3> </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="text-right">
                                            <button class="btn btn-danger" type="submit"> Process Receipt </button>
                                            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    </div>
				</div>
				<!--end::Portlet-->
			<!--End::Section-->
        </div>
        @endforeach
    </div>
</div>
<!-- end:: Body -->



@endsection

































