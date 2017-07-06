@extends('layouts.main')
    @section('content')
        <div class="section-body">
						<div class="row">
							<!-- BEGIN ADD CONTACTS FORM -->
							<div class="col-md-12">
								<div class="card">
									<div class="card-head style-danger">
										<header>Registration of Death</header>
									</div>
									<form class="form" role="form" action="{{route('death.store')}}" method="post">
                                        {{csrf_field()}}
										<!-- BEGIN DEFAULT FORM ITEMS -->
										<div class="card-body">
											<div class="row">
												<div class="col-xs-12">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'first_name')}}">
																<input value="{{old('first_name')}}" type="text" class="form-control input-lg" id="firstname" name="first_name">
																<label for="firstname">First name</label>
                                                                {!! error_msg($errors, 'first_name') !!}
															</div>
														</div><!--end .col -->
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'last_name')}}">
																<input value="{{old('last_name')}}" type="text" class="form-control input-lg" id="lastname" name="last_name">
																<label for="lastname">Last name</label>
                                                                {!! error_msg($errors, 'last_name') !!}
															</div>
														</div><!--end .col -->
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'sir_name')}}">
																<input value="{{old('sir_name')}}" type="text" class="form-control input-lg" id="company" name="sir_name">
																<label for="company">Sir Name</label>
                                                                {!! error_msg($errors, 'sir_name') !!}
															</div>
														</div><!--end .col -->
                                                    </div><!--end .row -->
                                                    <div class="row">
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'dob')}}">
																<input value="{{old('dob')}}" type="text" class="form-control date-picker" name="dob">
																<label for="functiontitle">Date Of Birth</label>
                                                                {!! error_msg($errors, 'dob') !!}
															</div>
														</div><!--end .col -->
                                                        <div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'id_no')}}">
																<input value="{{old('id_no')}}" type="text" class="form-control" id="functiontitle" name="id_no">
																<label for="functiontitle">ID Number</label>
                                                                {!! error_msg($errors, 'id_no') !!}
															</div>
														</div><!--end .col -->
                                                        <div class="col-md-4">
                                                            <div class="form-group {{error($errors, 'gender')}}">
                                                                <strong>Gender</strong></br>
                                                                <div class="radio-inline radio-styled">
                                                                    <label>
                                                                        <input type="radio" name="gender" value="male">
                                                                        <span>Male</span>
                                                                    </label>
                                                                </div>
                                                                &nbsp; &nbsp;
                                                                <div class="radio-inline radio-styled">
                                                                    <label>
                                                                        <input type="radio" name="gender" value="female">
                                                                        <span>Female</span>
                                                                    </label>
                                                                </div>
                                                                <center>{!! error_msg($errors, 'gender') !!}</center>
                                                            </div>
														</div><!--end .col -->
													</div><!--end .row -->
												</div><!--end .col -->
											</div><!--end .row -->
										</div><!--end .card-body -->
										<!-- END DEFAULT FORM ITEMS -->
										<!-- BEGIN FORM TABS -->
										<div class="card-head style-danger">
											<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
												<li class="active"><a href="#contact">CONTACT INFO</a></li>
												<li><a href="#health">Health and Medical</a></li>
											</ul>
										</div><!--end .card-head -->
										<!-- END FORM TABS -->

										<!-- BEGIN FORM TAB PANES -->
										<div class="card-body tab-content">
											<div class="tab-pane active" id="contact">
												<div class="row">
													<div class="col-md-8">
														<div class="form-group {{error($errors, 'residence')}}">
															<input value="{{old('residence')}}" type="text" class="form-control" id="residence" name="residence">
															<label for="residence">Residence</label>
                                                            {!! error_msg($errors, 'residence') !!}
														</div><!--end .form-group -->
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input value="{{old('street')}}" type="text" class="form-control" id="street" name="street">
																	<label for="street">Street</label>
                                                                    {!! error_msg($errors, 'street') !!}
																</div>
															</div><!--end .col -->
														</div><!--end .row -->
														<div class="row">
															<div class="col-md-8">
																<div class="form-group {{error($errors, 'city')}}">
																	<input value="{{old('city')}}" type="text" class="form-control" id="city" name="city">
																	<label for="city">City</label>
                                                                    {!! error_msg($errors, 'city') !!}
																</div>
															</div><!--end .col -->
															<div class="col-md-4">
																<div class="form-group {{error($errors, 'zip')}}">
																	<input value="{{old('zip')}}" type="text" class="form-control" id="zip" name="zip">
																	<label for="zip">Zip</label>
                                                                    {!! error_msg($errors, 'zip') !!}
																</div>
															</div><!--end .col -->
														</div><!--end .row -->
													</div><!--end .col -->
													<div class="col-md-4">
														<div class="form-group">
															
														</div>
													</div><!--end .col -->
												</div><!--end .row -->
											</div><!--end .tab-pane -->
											<div class="tab-pane" id="health">
												<div class="h4 text-light">
													MUST BE COMPLETED BY PERSON WHO PRONOUNCES OR CERTIFIES DEATH
												</div>
												<div class="form-group {{error($errors, 'event_location')}}">
													{!! Form::text('event_location', old('event_location'), ['class' => 'form-control', 'id' => 'location', 'placeholder' => 'Facility Name (If not institution, give street & number)']) !!}
													<label for="location">Place of Death</label>
													{!! error_msg($errors, 'event_location') !!}
												</div><!--end .form-group -->
												<div class="form-group {{error($errors, 'died_on')}}">
													{!! Form::text('died_on', old('died_on'), ['class' => 'form-control date-picker', 'id' => 'died_on', 'placeholder' => 'YYYY-MM-DD']) !!}
													<label for="died_on">Actual or Presume Date of Death</label>
													{!! error_msg($errors, 'died_on') !!}
												</div><!--end .form-group -->
												<div class="form-group {{error($errors, 'overseen_by')}}">
													{!! Form::text('overseen_by', old('overseen_by'), ['class' => 'form-control', 'id' => 'overseer', 'placeholder' => 'Name of the Informant']) !!}
													<label for="overseer">Informant's Name</label>
													{!! error_msg($errors, 'overseen_by') !!}
												</div><!--end .form-group -->

												<div class="form-group {{error($errors, 'cause_of_death')}}">
													<textarea id="summernote" name="cause_of_death" class="form-control control-4-rows" placeholder="Enter the chain of events diseases, injuries, or complications that directly caused the death" spellcheck="false">{{old('cause_of_death')}}</textarea>
													<label for="summernote">Cause of Death</label>
													{!! error_msg($errors, 'cause_of_death') !!}
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
										</div><!--end .card-body.tab-content -->
										<!-- END FORM TAB PANES -->

										<!-- BEGIN FORM FOOTER -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<a class="btn btn-flat" href="{{route('death.index')}}">CANCEL</a>
												<button type="submit" class="btn btn-accent">SUBMIT APPLICATION</button>
											</div><!--end .card-actionbar-row -->
										</div><!--end .card-actionbar -->
										<!-- END FORM FOOTER -->

									</form>
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ADD CONTACTS FORM -->

						</div><!--end .row -->
					</div><!--end .section-body -->
    @endsection
    @include('partials.formAssets')
    @push('scripts')
     <script src="{{asset('assets/core/demo/DemoPageContacts.js')}}"></script>>
    @endpush