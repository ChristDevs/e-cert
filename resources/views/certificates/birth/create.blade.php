@extends('layouts.main')

@section('content')
<div class="section-header">
	<h3>Birth Certificate Application wizard</h3>	
</div>
					<div class="section-body contain-lg">


						<!-- BEGIN FORM WIZARD -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body ">
										<div id="rootwizard1" class="form-wizard form-wizard-horizontal">
											<form action="{{route('birth.store')}}" class="form form-validation" novalidate="novalidate" method="post" enctype="multpart/form-data">
												<div class="form-wizard-nav row">
													<div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
													<ul class="nav nav-justified">
														<li class="active"><a href="#tab1" data-toggle="tab"><span class="step">1</span> <span class="title">Basic Information</span></a></li>
														<li><a href="#tab2" data-toggle="tab"><span class="step">2</span> <span class="title">Location and Residence</span></a></li>
														<li><a href="#tab3" data-toggle="tab"><span class="step">3</span> <span class="title">Parents Information</span></a></li>
														<li><a href="#tab4" data-toggle="tab"><span class="step">4</span> <span class="title">Supporting Documents</span></a></li>
													</ul>
												</div><!--end .form-wizard-nav -->
												<div class="tab-content clearfix col-sm-10 col-sm-offset-1 row">
													<div class="tab-pane active" id="tab1">
														<br/><br/>
														{{csrf_field()}}
														<div class="form-group {{error($errors, 'first_name')}}">
															<input type="text" name="first_name" class="form-control" required="true">
															<label for="Address" class="control-label">First Name</label>
															{!! error_msg($errors, 'last_name') !!}
														</div>
														<div class="form-group {{error($errors, 'last_name')}}">
															<input type="text" name="last_name" class="form-control" required="true" >
															<label for="Address" class="control-label">Laste Name</label>
															{!! error_msg($errors, 'larst_name') !!}
														</div>
														<div class="form-group {{error($errors, 'dob')}}">
															<input type="text" name="dob" class="date-picker form-control" required="true" data-rule-date="true">
															<label class="control-label">Date Of Birth</label>
															{!! error_msg($errors, 'dob') !!}
														</div>
														<div class="row form-group {{error($errors, 'gender')}}">
															<div class="col-xs-3">
																<strong class="control-label">Gender</strong>
															</div>
															<div class="col-xs-3">
																<div class="radio radio-styled">
																	<label>
																		<input type="radio" name="gender" value="male" required>
																		<span>Male</span>
																	</label>
																</div>
															</div>
															<div class="col-xs-3">
																<div class="radio radio-styled">
																	<label>
																		<input type="radio" name="gender" value="female" required>
																		<span>Female</span>
																	</label>
																</div>
															</div>
															{!! error_msg($errors, 'gender') !!}
														</div>
														
													</div><!--end #tab1 -->
													<div class="tab-pane" id="tab2">
														<br/><br/>
														<div class="form-group {{error($errors, 'birth_place')}}">
															<input type="text" name="birth_place" class="form-control" required="true">
															<label for="birth_place" class="control-label">Place Of Birth</label>
															{!! error_msg($errors, 'birth_place') !!}
														</div>
														<div class="form-group {{error($errors, 'county_of_birth')}}">
															<input type="text" name="county_of_birth" class="form-control" required="true" >
															<label for="Address" class="control-label">County</label>
															{!! error_msg($errors, 'county_of_birth') !!}
														</div>
														<div class="form-group {{error($errors, 'province_of_birth')}}">
															<input type="text" name="province_of_birth" class="form-control" required="true">
															<label for="Address" class="control-label">Province</label>
															{!! error_msg($errors, 'province_of_birth') !!}
														</div>
														<div class="form-group {{error($errors, 'residence')}}">
															<input type="text" name="residence" class="form-control" required="true">
															<label for="residence" class="control-label">Current Residence</label>
															{!! error_msg($errors, 'residence') !!}
														</div>
													</div><!--end #tab2 -->
													<div class="tab-pane" id="tab3">
														<br/><br/>
														<div class="form-group {{error($errors, 'name_of_mother')}}">
															<input type="text" name="name_of_mother" class="form-control" required="true">
															<label for="birth_place" class="control-label">Name of Mother</label>
															{!! error_msg($errors, 'name_of_mother') !!}
														</div>
														<div class="form-group {{error($errors, 'name_of_father')}}">
															<input type="text" name="name_of_father" class="form-control" required="true" >
															<label for="Address" class="control-label">Name of Father</label>
															{!! error_msg($errors, 'name_of_father') !!}
														</div>
														<div class="form-group {{error($errors, 'overseen_by')}}">
															<input type="text" name="overseen_by" class="form-control" required="true" placeholder="Name of Mid-Wife, Nurse or Doctor" >
															<label class="control-label">Ths Birth was Overseen By</label>
															{!! error_msg($errors, 'overseen_by') !!}
														</div>
														<div class="form-group">
															
															<textarea name="notes" class="form-control" rows="3"></textarea>
															
															<label for="notes" class="control-label">Notes</label>
														</div>
														
													</div><!--end #tab3 -->
													<div class="tab-pane" id="tab4">
														<br/><br/>
														<div class="form-group {{error($errors, 'clinic_card')}}">
															<input type="file" name="documents[]" required="true">
															<label for="clinic_card" class="control-label">Clinic Card</label>
															{!! error_msg($errors, 'clinic_card') !!}
														</div>
														<div class="form-group {{error($errors, 'mothers_id')}}">
															<input type="file" name="documents[]" required="true">
															<label for="mothers_id" class="control-label">Copy of Mothers ID</label>
															{!! error_msg($errors, 'mothers_id') !!}
														</div>
														<div class="form-group {{error($errors, 'other')}}">
															<input type="file" name="documents[]">
															<label for="other" class="control-label">Any Other Supporting Document</label>
															{!! error_msg($errors, 'other') !!}
														</div>
														<div class="form-group {{error($errors, 'other')}}">
															<input type="file" name="documents[]">
															<label for="other" class="control-label">Any Other Supporting Document</label>
															{!! error_msg($errors, 'other') !!}
														</div>
														<div class="form-group">
															<button type="submit" class="btn btn-success pull-right">Submit Application</button>
														</div>
													</div><!--end #tab4 -->
												</div><!--end .tab-content -->
												<ul class="pager wizard col-xs-12 row">
													<li class="previous first"><a class="btn ink-reaction btn-success" href="javascript:void(0);"><i class="md md-fast-rewind"></i> &nbsp; First</a></li>
													<li class="previous"><a class="btn ink-reaction btn-info" href="javascript:void(0);"><i class="md md-skip-previous"></i> &nbsp; Previous</a></li>
													<li class="next last"><a class="btn-accent ink-reaction btn" href="javascript:void(0);"><i class="md md-fast-forward"></i> &nbsp; Last</a></li>
													<li class="next"><a class="btn-primary btn ink-reaction" href="javascript:void(0);"><i class="md md-skip-next"></i> &nbsp; Next</a></li>
												</ul>
											</form>
										</div><!--end #rootwizard -->
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Birth Certificate Application wizard</em>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END FORM WIZARD -->

                    </div>

@endsection
@include('partials.formAssets')