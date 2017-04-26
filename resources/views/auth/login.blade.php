@extends('layouts.app')

@section('content')
<!-- BEGIN LOGIN SECTION -->
        <section class="section-account">
            <div class="img-backdrop" style="background-image: url('{{asset('assets/img/bg-auth.jpg')}}')"></div>
            <div class="spacer"></div>
            <br>
            <div class="card contain-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <br/>
                            <span class="text-lg text-bold text-primary">{{config('app.name')}}</span>
                            <br/><br/>
                            <form class="form" action="{{ route('login') }}" accept-charset="utf-8" method="post">
                                {{csrf_field()}}
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input value="{{old('email')}}" type="text" class="form-control" id="username" name="email">
                                    <label for="username">Email</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="password">Password</label>
                                     @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-6 text-left">
                                        <div class="checkbox checkbox-inline checkbox-styled">
                                            <label>
                                                <input name="remember" {{old('remember') ? 'checked' : ''}} type="checkbox"> <span>Remember me</span>
                                            </label>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-xs-6 text-right">
                                        <button class="btn btn-success btn-raised" type="submit"><i class="fa fa-fw fa-unlock"></i> &nbsp; Login</button>
                                    </div><!--end .col -->
                                </div><!--end .row -->
                            </form>
                        </div><!--end .col -->
                        <div class="col-sm-5 col-sm-offset-1 text-center">
                            <br><br>
                                <h3 class="text-light">
                                    No account yet?
                                </h3>
                                <a class="btn btn-block btn-raised btn-primary" href="{{ route('register') }}">Sign up here</a>
                                <br>
                                <h4>or</h4> <br>
                                <p class="h5"><a class="btn btn-link" href="password/reset">Reset Password?</a></p>
                                </div><!--end .col -->
                            </div><!--end .row -->
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </section>
                <!-- END LOGIN SECTION -->

@endsection
