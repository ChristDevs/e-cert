
@extends('layouts.main')
	@section('content')
	<div class="section-header">
		<h3>Marriage Certificate Application wizard</h3>	
	</div>
						<div class="section-body contain-lg">
							<!-- BEGIN FORM WIZARD -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body ">
											<div id="rootwizard1" class="form-wizard form-wizard-horizontal">
												{!! Form::open(['url' => route('marriage.store'), 'files' => true, 'class' => "form form-validation", 'novalidate' => "novalidate", 'method' => 'post']) !!}
													@include('certificates.partials._createMarriage')
												{!! Form::close() !!}
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