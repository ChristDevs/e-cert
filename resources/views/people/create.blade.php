@extends('layouts.main')
    @section('content')
        <div class="section-body contain-lg">
						<div class="row">

							<!-- BEGIN ADD CONTACTS FORM -->
							<div class="col-md-12">
								<div class="card">
									<div class="card-head style-primary">
										<header>Add a new person</header>
									</div>
									<form class="form" role="form" action="{{route('people.store')}}" method="post">
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
														<div class="col-md-6">
															<div class="form-group floating-label {{error($errors, 'dob')}}">
																<input value="{{old('dob')}}" type="text" class="form-control date-picker" name="dob">
																<label for="functiontitle">Date Of Birth</label>
                                                                {!! error_msg($errors, 'dob') !!}
															</div>
														</div><!--end .col -->
                                                        <div class="col-md-6">
															<div class="form-group floating-label {{error($errors, 'id_no')}}">
																<input value="{{old('id_no')}}" type="text" class="form-control" id="functiontitle" name="id_no">
																<label for="functiontitle">ID Number</label>
                                                                {!! error_msg($errors, 'id_no') !!}
															</div>
														</div><!--end .col -->
													</div><!--end .row -->
												</div><!--end .col -->
											</div><!--end .row -->
										</div><!--end .card-body -->
										<!-- END DEFAULT FORM ITEMS -->
										<!-- BEGIN FORM TABS -->
										<div class="card-head style-primary">
											<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
												<li class="active"><a href="#contact">CONTACT INFO</a></li>
												{{-- <li><a href="#experience">EXPERIENCE</a></li>
												<li><a href="#skills">SKILLS</a></li>
												<li><a href="#general">GENERAL</a></li> --}}
											</ul>
										</div><!--end .card-head -->
										<!-- END FORM TABS -->

										<!-- BEGIN FORM TAB PANES -->
										<div class="card-body tab-content">
											<div class="tab-pane active" id="contact">
												<div class="row">
													<div class="col-md-8">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group {{error($errors, 'mobile')}}">
																	<input value="{{old('mobile')}}" type="text" class="form-control" id="mobile" name="mobile" data-inputmask="'mask':'(999) 999-9999'">
																	<label for="mobile">Mobile</label>
                                                                    {!! error_msg($errors, 'mobile') !!}
																</div>
															</div><!--end .col -->
															<div class="col-md-6">
																<div class="form-group {{error($errors, 'phone')}}">
																	<input value="{{old('phone')}}" type="text" class="form-control" id="phone" name="phone" data-inputmask="'mask':'(999) 999-9999'">
																	<label for="phone">Alternative Phone</label>
                                                                    {!! error_msg($errors, 'phone') !!}
																</div>
															</div><!--end .col -->
														</div><!--end .row -->
														<div class="form-group {{error($errors, 'email')}}">
															<input value="{{old('email')}}" type="email" class="form-control" id="email" name="email">
															<label for="email">Email</label>
                                                            {!! error_msg($errors, 'email') !!}
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
															<div id="map-canvas" class="border-gray height-7"></div>
														</div>
													</div><!--end .col -->
												</div><!--end .row -->
											</div><!--end .tab-pane -->
											<div class="tab-pane" id="experience">
												<ul class="list-unstyled" id="experienceList"></ul>
												<div class="form-group">
													<a class="btn btn-raised btn-default-bright" data-duplicate="experienceTmpl" data-target="#experienceList">ADD NEW EXPERIENCE</a>
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
											<div class="tab-pane " id="skills">
												<ul class="list-unstyled" id="skillsList"></ul>
												<div class="form-group">
													<a class="btn btn-raised btn-default-bright" data-duplicate="skillTmpl" data-target="#skillsList">ADD NEW skill</a>
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
											<div class="tab-pane" id="general">
												<div class="form-group">
													<textarea id="summernote" name="message" class="form-control control-4-rows" placeholder="Enter note ..." spellcheck="false"></textarea>
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
										</div><!--end .card-body.tab-content -->
										<!-- END FORM TAB PANES -->

										<!-- BEGIN FORM FOOTER -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<a class="btn btn-flat" href="{{route('people.index')}}">CANCEL</a>
												<button type="submit" class="btn btn-accent">ADD THIS PERSON</button>
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