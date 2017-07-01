@extends('layouts.main')
    @section('content')
        <div class="section-body contain-lg">
						<div class="row">

							<!-- BEGIN ADD CONTACTS FORM -->
							<div class="col-md-12">
								<div class="card">
									<div class="card-head card-bordered style-primary">
										<header>ADD A NEW USER</header>
										<div class="tools">
											<a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
										</div>
									</div>
									<form class="form" role="form" action="{{route('users.store')}}" method="post">
                                        {{csrf_field()}}
										<!-- BEGIN DEFAULT FORM ITEMS -->
										<div class="card-body style-default-bright">
											<div class="row">
												<div class="col-xs-12">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'name')}}">
																<input value="{{old('name')}}" type="text" class="form-control" id="firstname" name="name">
																<label for="name">Full name</label>
                                                                {!! error_msg($errors, 'name') !!}
															</div>
														</div><!--end .col -->
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'email')}}">
																<input value="{{old('email')}}" type="text" class="form-control" id="email" name="email">
																<label for="lastname">Email</label>
                                                                {!! error_msg($errors, 'email') !!}
															</div>
														</div><!--end .col -->
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'phone_number')}}">
																<input value="{{old('phone_number')}}" type="text" class="form-control" id="company" name="phone_number">
																<label for="company">Phone Number</label>
                                                                {!! error_msg($errors, 'phone_number') !!}
															</div>
														</div><!--end .col -->
                                                    </div><!--end .row -->
                                                    <div class="row">
														<div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'roles')}}">
																<select name="roles[]" multiple class="select-input form-control" >
																<optgroup label="User Roles">
																@foreach($roles as $role)
																<option value="{{$role->id}}">{{$role->display_name}}</option>
																@endforeach
																</optgroup>
																</select>
																<label>User Role</label>
                                                                {!! error_msg($errors, 'roles') !!}
															</div>
														</div><!--end .col -->
                                                        <div class="col-md-4">
															<div class="form-group floating-label {{error($errors, 'password')}}">
																<input type="password" class="form-control" name="password">
																<label >Password</label>
                                                                {!! error_msg($errors, 'password') !!}
															</div>
														</div><!--end .col -->
                                                        <div class="col-md-4">
                                                            <div class="form-group floating-label {{error($errors, 'password')}}">
																<input type="password" class="form-control" name="password_confirmation">
																<label >Confirm it again</label>
	                                                            {!! error_msg($errors, 'password') !!}
															</div>
														</div><!--end .col -->
													</div><!--end .row -->
												</div><!--end .col -->
											</div><!--end .row -->
										</div><!--end .card-body -->
										<!-- END DEFAULT FORM ITEMS -->
										<!-- BEGIN FORM TABS -->
										<!-- END FORM TABS -->

										<!-- BEGIN FORM FOOTER -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-accent">ADD THIS USER</button>
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
     <script src="{{asset('assets/core/demo/DemoPageContacts.js')}}"></script>
     <script src="{{asset('assets/libs/select2/select2.js')}}"></script>
     <script type="text/javascript">
     	$('.select-input').select2();
     </script>
    @endpush
    <@push('css')
    	<link type="text/css" rel="stylesheet" href="{{asset('assets/theme-default/libs/select2/select2.css')}}" />
    @endpush