@extends('layouts.app')

@section('content')
 <section class="section-account">
    <div class="img-backdrop" style="background-image: url('{{asset('assets/img/bg-auth.jpg')}}')"></div>
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                <div class="row">
                    <div class="card">
                        
                        <div class="card-body">
                        <span class="text-lg text-bold text-primary">Reset Password</span>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" autofocus="true" name="email" value="{{ old('email') }}" required>
                                    <label for="email">E-Mail Address</label>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
