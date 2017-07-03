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
												<h1 class="text-light"><i class="fa fa-certificate fa-fw fa-2x text-accent-dark"> </i>{{ucfirst($cert->type)}} <strong class="text-accent-dark">Certificate</strong></h1>
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
												<address style="text-transform: uppercase;">
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
														<div class="pull-right"> {{$cert->approved ? $cert->serial_number : 'Not Processed'}} </div>
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
												<h3 class="text-light opacity-50">Groom's Details</h3>
													<table class="table table-sripped">
														<tbody>
															<tr>
																<th>Full Name</th>
																<td><strong>{{$cert->groom->fullname}}</strong></td>
																<th>Date of Birth</th>
																<td><strong>{{$cert->groom->dob}}</strong> </td>
																<th>ID No</th>
																<td>{{$cert->groom->id_no}}</td>
															</tr>
														</tbody>
													</table>
											</div>
											<div class="col-md-12">
												<h3 class="text-light opacity-50">Brides's Details</h3>
													<table class="table table-sripped">
														<tbody>
															<tr>
																<th>Full Name</th>
																<td><strong>{{$cert->bride->fullname}}</strong></td>
																<th>Date of Birth</th>
																<td><strong>{{$cert->bride->dob}}</strong> </td>
																<th>ID No</th>
																<td>{{$cert->bride->id_no}}</td>
															</tr>
														</tbody>
													</table>
											</div>
											<div class="col-md-12">
												<h3 class="text-light opacity-50">Witnesses</h3>
													<table class="table table-sripped">
														<tbody>
														@foreach($cert->witnesses as $witness)
															<tr>
																<th>Full Name</th>
																<td><strong>{{$witness->full_name}}</strong></td>
																<th>ID No</th>
																<td>{{$cert->groom->id_no}}</td>
															</tr>
														@endforeach
														</tbody>
													</table>
											</div>
											<div class="col-md-12">
												<table class="table">
													<tbody>
														<tr>
															<td colspan="3" rowspan="3">
																<h3 class="text-light opacity-50">Application notes</h3>
																<p><small>{!! !empty($cert->notes) ? $cert->notes: 'The applicant did not provide any notes' !!}</small></p>
															</td>
															<td class="text-right"><strong>Approval Status</strong></td>
															<td class="text-right">{{ucfirst($cert->status)}}</td>
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