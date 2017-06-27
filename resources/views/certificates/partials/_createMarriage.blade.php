		<div class="form-wizard-nav row">
			<div class="progress">
				<div class="progress-bar progress-bar-primary">
					
				</div>
			</div>
			<ul class="nav nav-justified">
				<li class="active">
					<a href="#tab1" data-toggle="tab">
						<span class="step">1</span> 
						<span class="title">Groom's Information</span>
					</a>
				</li>
				<li>
					<a href="#tab2" data-toggle="tab">
						<span class="step">2</span>
						<span class="title">Bride's Information</span>
					</a>
				</li>
				<li>
					<a href="#tab3" data-toggle="tab">
						<span class="step">3</span>
						<span class="title">Additional Information</span>
					</a>
				</li>
				<li>
					<a href="#tab4" data-toggle="tab">
						<span class="step">4</span>
						<span class="title">Witnesses</span>
					</a>
				</li>
			</ul>
		</div>
		<!--end .form-wizard-nav -->
		<div class="tab-content clearfix col-sm-10 col-sm-offset-1 row">
			<div class="tab-pane active" id="tab1"><br/><br/>
				{{csrf_field()}}
				<div class="form-group {{error($errors, 'groom_first_name')}}">
					{!! Form::text('groom_first_name', old('groom_first_name'), ['class' => 'form-control', 'required' => 'true']) !!}
					<label class="control-label">First Name <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'groom_first_name') !!}
				</div>
				<div class="form-group {{error($errors, 'groom_last_name')}}">
					{!! Form::text('groom_last_name', old('groom_last_name'), ['class' => 'form-control', 'required' => 'true']) !!}
					<label class="control-label">Last Name <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'groom_last_name') !!}
				</div>
				<div class="form-group {{error($errors, 'groom_dob')}}">
					{!! Form::text('groom_dob', old('groom_dob'), ['class' => 'form-control date-picker', 'data-rule-date' => 'true', 'required' => 'true']) !!}
					<label class="control-label">Date Of Birth <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'groom_dob') !!}
				</div>
				{!! Form::hidden('groom_gender', 'male') !!}
				<div class="form-group {{error($errors, 'groom_id_no')}}">
					{!! Form::text('groom_id_no', old('groom_id_no'), ['class' => 'form-control', 'required' => 'true']) !!}
					<label class="control-label">ID Number <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'groom_id_no') !!}
				</div>
				<div class="form-group {{error($errors, 'groom_email')}}">
					{!! Form::text('groom_email', old('groom_email'), ['class' => 'form-control']) !!}
					<label class="control-label">Email</label>
					{!! error_msg($errors, 'groom_email') !!}
				</div>
			</div>

			<!--end #tab1 -->
			<div class="tab-pane" id="tab2"><br/><br/>
				<div class="form-group {{error($errors, 'bride_first_name')}}">
					{!! Form::text('bride_first_name', old('bride_first_name'), ['class' => 'form-control', 'required' => 'true']) !!}
					<label class="control-label">First Name <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'bride_first_name') !!}
				</div>
				<div class="form-group {{error($errors, 'bride_last_name')}}">
					{!! Form::text('bride_last_name', old('bride_last_name'), ['class' => 'form-control', 'required' => 'true']) !!}
					<label class="control-label">Last Name <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'bride_last_name') !!}
				</div>
				<div class="form-group {{error($errors, 'bride_dob')}}">
					{!! Form::text('bride_dob', old('bride_dob'), ['class' => 'form-control date-picker', 'data-rule-date' => 'true', 'required' => 'true']) !!}
					<label class="control-label">Date Of Birth <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'bride_dob') !!}
				</div>
				{!! Form::hidden('bride_gender', 'female') !!}
				<div class="form-group {{error($errors, 'bride_id_no')}}">
					{!! Form::text('bride_id_no', old('bride_id_no'), ['class' => 'form-control', 'required' => 'true']) !!}
					<label class="control-label">ID Number <span class="text-danger">*</span> </label>
					{!! error_msg($errors, 'bride_id_no') !!}
				</div>
				<div class="form-group {{error($errors, 'bride_email')}}">
					{!! Form::text('bride_email', old('bride_email'), ['class' => 'form-control']) !!}
					<label class="control-label">Email</label>
					{!! error_msg($errors, 'bride_email') !!}
				</div>
			</div>
			<!--end #tab2 -->
			<div class="tab-pane" id="tab3"><br/><br/>
				<div class="form-group {{error($errors, 'overseen_by')}}">
					{!! Form::text('overseen_by', old('overseen_by'), ['class' => 'form-control','placeholder' => "Name of a Spiritual Leader or Government Officer" , 'required' => 'true']) !!}
					<label class="control-label">This marriage was Overseen by</label>
					{!! error_msg($errors, 'overseen_by') !!}
				</div>
				<div class="form-group">
					{!! Form::textarea('notes', old('notes'), ['class' => 'form-control', 'rows' => 3]) !!}															
					<label for="notes" class="control-label">Notes</label>
				</div>													
			</div><!--end #tab3 -->
			<div class="tab-pane" id="tab4"><br/><br/>
				<div class="col-sm-12">
					<div class="row">
						<h3>Witness 1</h3>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness1_name')}}">
							{!! Form::text('witness1_name', old('witness1_name'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>Full Name</label>
							{!! error_msg($errors, 'witness1_name') !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness1_id_no')}}">
							{!! Form::text('witness1_id_no', old('witness1_id_no'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>ID Number</label>
							{!! error_msg($errors, 'witness1_id_no') !!}
						</div>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="row">
						<h3>Witness 2</h3>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness2_name')}}">
							{!! Form::text('witness2_name', old('witness2_name'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>Full Name</label>
							{!! error_msg($errors, 'witness2_name') !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness2_id_no')}}">
							{!! Form::text('witness2_id_no', old('witness2_id_no'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>ID Number</label>
							{!! error_msg($errors, 'witness2_id_no') !!}
						</div>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="row">
						<h3>Witness 3</h3>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness3_name')}}">
							{!! Form::text('witness3_name', old('witness3_name'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>Full Name</label>
							{!! error_msg($errors, 'witness3_name') !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness3_id_no')}}">
							{!! Form::text('witness3_id_no', old('witness3_id_no'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>ID Number</label>
							{!! error_msg($errors, 'witness3_id_no') !!}
						</div>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="row">
						<h3>Witness 4</h3>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness4_name')}}">
							{!! Form::text('witness4_name', old('witness4_name'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>Full Name</label>
							{!! error_msg($errors, 'witness4_name') !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness4_id_no')}}">
							{!! Form::text('witness4_id_no', old('witness4_id_no'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>ID Number</label>
							{!! error_msg($errors, 'witness4_id_no') !!}
						</div>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="row">
						<h3>Witness 5</h3>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness5_name')}}">
							{!! Form::text('witness5_name', old('witness5_name'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>Full Name</label>
							{!! error_msg($errors, 'witness5_name') !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group {{error($errors, 'witness5_id_no')}}">
							{!! Form::text('witness5_id_no', old('witness5_id_no'), ['class' => 'form-control', 'required' => 'true']) !!}
							<label>ID Number</label>
							{!! error_msg($errors, 'witness5_id_no') !!}
						</div>
					</div>
				</div>											
				<div class="form-group">
					<button type="submit" class="btn btn-success pull-right">Submit Application</button>
				</div>
			</div><!--end #tab4 -->
		</div><!--end .tab-content -->
		<ul class="pager wizard col-xs-12 row">
			<li class="previous first">
				<a class="btn ink-reaction btn-success" href="javascript:void(0);">
					<i class="md md-fast-rewind"></i> 
					&nbsp; First
				</a>
			</li>
			<li class="previous">
				<a class="btn ink-reaction btn-info" href="javascript:void(0);">
					<i class="md md-skip-previous"></i> 
					&nbsp; Previous
				</a>
			</li>
			<li class="next last">
				<a class="btn-accent ink-reaction btn" href="javascript:void(0);">
					<i class="md md-fast-forward"></i>
					&nbsp; Last
				</a>
			</li>
			<li class="next">
				<a class="btn-primary btn ink-reaction" href="javascript:void(0);">
					<i class="md md-skip-next"></i> 
					&nbsp; Next
				</a>
			</li>
		</ul>