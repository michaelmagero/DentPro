<table class="m-datatable" id="html_table">
							{{-- <thead>
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
							</tbody> --}}
						</table>