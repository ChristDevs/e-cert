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
                        <h1 class="text-light"><i class="fa fa-certificate fa-fw fa-2x text-success"> </i>{{ucfirst($cert->type)}} <strong class="text-success">Certificate</strong></h1>
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
                        <table id="info">
                          <tr>
                            <th width="100">Name</th>
                            <td><strong>{{$cert->person->fullname}}</strong></td>
                          </tr>
                          <tr>
                            <th width="100">Where Born</th>
                            <td>{{$cert->person->birth_place}}</td>
                          </tr>
                          <tr>
                            <th width="100">Date of Birth</th>
                            <td>{{$cert->person->dob}}</td>
                          </tr>
                          <tr>
                            <th width="100">Gender</th>
                            <td>{{$cert->person->gender}}</td>
                          </tr>
                        </table>
                      </div><!--end .col -->
                      <div class="col-xs-4">
                        <table id="info">
                          <tr>
                            <th width="130">Name of Mother</th>
                            <td><strong>{{$cert->person->name_of_mother}}</strong></td>
                          </tr>
                          <tr>
                            <th width="130">Name of Father</th>
                            <td>{{$cert->person->name_of_father}}</td>
                          </tr>
                          <tr>
                            <th width="130">Province of Birth</th>
                            <td>{{$cert->person->province_of_birth}}</td>
                          </tr>
                          <tr>
                            <th width="130">Residence</th>
                            <td>{{$cert->person->residence}}</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-xs-4">
                        <div class="well">
                          <div class="clearfix">
                            <div class="pull-left"> CERTIFICATE NO : </div>
                            <div class="pull-right"> {{$cert->serial_number !=0 ?$cert->serial_number : 'Not Processed'}} </div>
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
                        <table class="table">
                          <tbody>
                            <tr class="">
                              <td class="text-center" colspan="5">
                                <p class="aspire title">
                                  This is to certify that <strong>{{$cert->person->fullname}}</strong> born on {{$cert->person->dob}} in {{$cert->person->birth_place}} to {{$cert->person->name_of_father}} and {{$cert->person->name_of_mother}} is hereby awarded Certificate of birth. The Registrar for {{$cert->person->county_of_birth}} County, hereby certify that this certificate is compiled from an entry/return in the Register of Births in the County. 
                                  </p> 
                              </td>
                            </tr>
                            
                            <tr>
                              <td colspan="3" rowspan="3">
                                <h3 class="text-light opacity-50">Given under the Principal Civil Registrar</h3>
                                <p><small>This certificate is issued undert the Birhts and Deaths Registration Act (CAP. 149) which provides that a certified copy of any entry in any register or return purpoting to be sealed or stamped with the seal of the Pricipal Registrar shall be received as evidence of the dates and facts therein contained without any or other proof of such</small></p>
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
                               <h3 class="text-light opacity-50"><strong>Note:</strong> A Certificate of Birth is not Proof of Citizenship</h3>
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
