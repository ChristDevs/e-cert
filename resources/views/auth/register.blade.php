@extends('layouts.app')

@section('content')
<section class="section-account">
    <div class="img-backdrop" style="background-image: url('{{asset('assets/img/bg-auth.jpg')}}')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="card-head card-head-sm style-primary">
                            <header>CREATE AN ACCOUNT</header>
                            <div class="tools">
                                <a class="btn btn-icon-toggle btn-close">
                                    <i class="md md-close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="col-md-10 col-md-offset-1">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                        <label for="name">Name</label>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        <label for="email">E-Mail Address</label>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>
                                        <label for="phone_number">Phone Number</label>
                                        @if ($errors->has('phone_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        <label for="password">Password</label>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        <label for="password-confirm">Confirm Password</label>
                                </div>

                                <div class="form-group">
                                    <a class="btn btn-link" href="{{ route('login') }}">Login here</a>
                                        <button type="submit" class="btn btn-primary ink-reaction pull-right">
                                            Register
                                        </button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
