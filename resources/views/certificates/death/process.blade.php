@extends('layouts.main')
	@section('content')
				<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="card card-printable style-default-light">
									<div class="card-head">
										<div class="tools">
											<div class="btn-group">
												<a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
											</div>
										</div>
									</div><!--end .card-head -->
									<div class="card-body style-default-bright">

										<!-- BEGIN INVOICE HEADER -->
										<div class="row">
											<div class="col-xs-8">
												<h1 class="text-light"><i class="fa fa-certificate fa-fw fa-2x text-danger"> </i>{{ucfirst($cert->type)}} <strong class="text-danger">Certificate</strong></h1>
											</div>
											<div class="col-xs-4 text-right">
												<h1 class="text-light text-default-light"></h1>
											</div>
										</div><!--end .row -->
										<!-- END INVOICE HEADER -->

										<br/>

										<!-- BEGIN INVOICE DESCRIPTION -->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Requested by</h4>
												<address style="">
													<strong>{{$cert->createdBy->name}}</strong><br>
													{{$cert->createdBy->email}}<br>
													<abbr title="Phone">P:</abbr> {{$cert->createdBy->phone_number}}
												</address>
											</div><!--end .col -->
											<div class="col-xs-4">
												
											</div><!--end .col -->
											<div class="col-xs-4">
												<div class="well">
													<div class="clearfix">
														<div class="pull-left"> CERTIFICATE NO : </div>
														<div class="pull-right"> {{$cert->serial_number ? $cert->serial_number : 'Not Processed'}} </div>
													</div>
													<div class="clearfix">
														<div class="pull-left"> REQUESTED DATE : </div>
														<div class="pull-right"> {{$cert->created_at->format('d-m-Y')}} </div>
													</div>
												</div>
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END INVOICE DESCRIPTION -->

										<br/>

										<!-- BEGIN INVOICE PRODUCTS -->
										<div class="row">

											<div class="col-md-12">
												<h3 class="text-light opacity-50">Decedent's Details</h3>
													<table class="table table-sripped">
														<tbody>
															<tr>
																<th>Full Name</th>
																<td><strong>{{$cert->person->fullname}}</strong></td>
																<th>Date of Birth</th>
																<td><strong>{{$cert->person->dob}}</strong> </td>
																<th>Gender</th>
																<td>{{ucfirst($cert->person->gender)}}</td>
															</tr>
															<tr>
																<th>Residence</th>
																<td><strong>{{$cert->person->residence}}</strong></td>
																<th>Town or City</th>
																<td>{{$cert->person->city}}</td>
																<th>Street</th>
																<td>{{$cert->person->street}}</td>
															</tr>
														</tbody>
													</table>
													<div class="h4 text-primary">
														<strong> {{$cert->person->fullname}} </strong> was as born on <strong> {{$cert->person->dob}}</strong>  died on <strong>{{$cert->person->died_on}}</strong> at <strong>{{$cert->event_location}}</strong> this death was reported by <strong>{{$cert->overseen_by}}</strong>
													</div>
											</div>
											<div class="col-md-12">
												<table class="table">
													<tbody>
														<tr>
															<td colspan="2" rowspan="3">
																<h3 class="text-light opacity-50">Cause of Death</h3>
																<p><small>{!! $cert->person->cause_of_death ?? 'The applicant did not provide any explanation' !!}</small></p>
															</td>
															<td width="120" class="text-right"><strong>Approval Status</strong></td>
															<td width="120" class="text-right">{{ucfirst($cert->status)}}</td>
														</tr>
														<tr>
															<td class="text-right hidden-border"><strong>Processed On</strong></td>
															<td class="text-right hidden-border">{{$cert->processed ? $cert->proccessed_on->format('d-m-Y') : 'Queued'}}</td>
														</tr>
														<tr>
															<td class="text-right hidden-border"><strong>Approved On</strong></td>
															<td class="text-right hidden-border">{{($cert->processed and $cert->approved) ? $cert->auth_on->format('d-m-Y') : 'Queued'}}</td>
														</tr>
														@include('certificates.partials.process')
													</tbody>
												</table>
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END INVOICE PRODUCTS -->
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div>
					</div>
	@endsection