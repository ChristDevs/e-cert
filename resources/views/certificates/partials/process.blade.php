@if(($cert->status == 'pending' || $cert->status == 'declined' || $cert->status == 'processed') && Auth::user()->hasRole(['owner']))
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