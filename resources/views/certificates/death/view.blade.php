@extends('layouts.main')
  @section('content')
        <link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}}" type="text/css" charset="utf-8" />
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
                        <h3 class="text-dark">Republic of Kenya</h3>
                      </div>
                    </div><!--end .row -->
                    <!-- END INVOICE HEADER -->

                    <br/>

                    <!-- BEGIN INVOICE DESCRIPTION -->
                    <div class="row">
                      <div class="col-xs-4">
                      <h3 class="text-dark">Decedent's Details</h3>
                        <table id="info">
                          <tr>
                            <th width="100">Name</th>
                            <td><strong>{{$cert->person->fullname}}</strong></td>
                          </tr>
                          <tr>
                            <th width="100">ID No</th>
                            <td>{{$cert->person->id_no}}</td>
                          </tr>
                          <tr>
                            <th width="100">Born on</th>
                            <td>{{$cert->person->dob}}</td>
                          </tr>
                        </table>
                      </div><!--end .col -->
                      <div class="col-xs-4">
                       <h3 class="text-dark">-</h3>
                        <table id="info">
                          <tr>
                            <th width="100">Died on</th>
                            <td><strong>{{$cert->person->died_on}}</strong></td>
                          </tr>
                          <tr>
                            <th width="100">Place of Death</th>
                            <td>{{$cert->event_location}}</td>
                          </tr>
                          <tr>
                            <th width="100">Reported By</th>
                            <td>{{$cert->overseen_by}}</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-xs-4">
                        <div class="well">
                          <div class="clearfix">
                            <div class="pull-left"> CERTIFICATE NO : </div>
                            <div class="pull-right"> {{$cert->serial_number ?? 'Not Processed'}} </div>
                          </div>
                          <div class="clearfix">
                            <div class="pull-left"> ISSUED ON : </div>
                            <div class="pull-right"> {{$cert->auth_on->format('d-m-Y')}} </div>
                          </div>
                        </div>
                      </div><!--end .col -->
                    </div><!--end .row -->
                    <!-- END INVOICE DESCRIPTION -->

                    <br/>

                    <!-- BEGIN INVOICE PRODUCTS -->
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table">
                          <tbody>
                            <tr class="">
                              <td class="text-center" colspan="5">
                                <p class="aspire title h4" style="line-height: 35px;">
                                  This is to hereby certify that I <strong>{{$cert->overseen_by}}</strong> do declare that <strong>{{$cert->person->fullname}}</strong> died on <strong>{{$cert->person->died_on}}</strong> at <strong>{{$cert->event_location}}</strong> due to {{$cert->person->cause_of_death}}
                                  </p> 
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" rowspan="3">
                                <h3 class="text-light"><small>This certificate is issued undert the Births and Deaths Registration Act (CAP. 149) which provides that a certified copy of any entry in any register or return purpoting to be sealed or stamped with the seal of the Pricipal Registrar shall be received as evidence of the dates and facts therein contained without any or other proof of such</small></p>
                              </td>
                              <td width="150"><strong>Date of Issue</strong></td>
                              <td width="150">{{$cert->auth_on->format('d-m-Y')}}</td>
                            </tr>
                            <tr>
                              <td width="150"><strong>Registering Officer</strong></td>
                              <td width="150">{{$cert->authBy->name}}</td>
                            </tr>
                             <tr>
                              <td width="150"><strong>Signature</strong></td>
                              <td width="150"><strong>______________</strong></td>
                            </tr>
                            <tr>
                              <td class="text-left" colspan="5">
                               <h3 class="text-light opacity-50">{{-- <strong>Note:</strong> A Certificate of Birth is not Proof of Citizenship --}}</h3>
                              </td>
                            </tr>
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
