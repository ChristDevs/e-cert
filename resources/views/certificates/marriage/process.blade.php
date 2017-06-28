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
															<td class="text-right hidden-border">{{($cert->processed and $cert->approved) ? $cert->auth_on->format('d-m-Y') : 'Queued'}}</td>}}</td>
														</tr>
											@if($cert->status == 'pending' || $cert->status == 'declined' || $cert->status == 'processed' && Auth::user()->hasRole(['owner']))
														<tr>
															<td class="text-right" colspan="5">
															<h3 class="text-primary text-left opacity-50">Approval notes</h3>
																{!! Form::open(['url' => route('birth.update', $cert->id), 'method' => 'patch', 'class' => 'form']) !!}
																<div class="form-group"> 
																{!! Form::textarea('proccess_notes', $cert->process_notes, ['class' => 'form-control', 'rows' => '4', 'autofocus' => 'on', 'required' =>true]) !!}
																<label for="notes" class="control-label">Approval Notes</label>
																</div>
																<div class="form-group">
																	<div class="col-sm-4">
																		<label class="radio-inline radio-styled radio-success">
																			<input required type="radio" name="action" value="process" {{$cert->status =='processed' ? 'checked' : ''}}>
																			<span>Approve Application</span>
																		</label>
																	</div>
																	<div class="col-sm-4">
																	<label class="radio-inline radio-styled radio-danger">
																			<input required type="radio" name="action" value="decline" {{$cert->status =='declined' ? 'checked' : ''}}>
																			<span>Decline Application</span>
																		</label>
																	</div>
																</div>
																<div class="form-group">
																	<button class="btn btn-primary ink-reaction" type="submit">Submit</button>
																</div>
																{!! Form::close() !!}
															</td>
														</tr>
														@endif
														@if($cert->status == 'processed' && Auth::user()->hasRole(['officer']))
														<tr>
															<td class="text-right" colspan="5">
															<h3 class="text-primary text-left opacity-50">Registrar notes</h3>
																{!! Form::open(['url' => route('birth.update', $cert->id), 'method' => 'patch', 'class' => 'form']) !!}
																<div class="form-group"> 
																{!! Form::textarea('notes', $cert->approval_notes, ['class' => 'form-control', 'rows' => '4', 'autofocus' => 'on', 'required' =>true]) !!}
																<label for="notes" class="control-label">Registrar Notes</label>
																</div>
																<div class="form-group">
																	<div class="col-sm-4">
																		<label class="radio-inline radio-styled radio-success">
																			<input required type="radio" name="action" value="approve" {{$cert->status =='approved' ? 'checked' : ''}}>
																			<span>Issue Certificate</span>
																		</label>
																	</div>
																	<div class="col-sm-4">
																	<label class="radio-inline radio-styled radio-danger">
																			<input required type="radio" name="action" value="revoke" {{$cert->status =='declined' ||  $cert->status =='revoked'? 'checked' : ''}}>
																			<span>Revoke Application</span>
																		</label>
																	</div>
																</div>
																<div class="form-group">
																	<button class="btn btn-primary ink-reaction" type="submit">Submit</button>
																</div>
																{!! Form::close() !!}
															</td>
														</tr>
														@endif
														@if($cert->processed)
														<tr>
															<td class="text-right" colspan="5">
																<h3 class="text-left text-light opacity-50">Approval notes</h3>
																<p class="text-justify">{{$cert->process_notes}}</p>
															</td>
														</tr>
														@endif
														@if($cert->approved)
														<tr>
															<td class="text-right" colspan="5">
																<h3 class="text-left text-light opacity-50">Registrar notes</h3>
																<p class="text-justify">{{$cert->approval_notes}}</p>
															</td>
														</tr>
														@endif
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