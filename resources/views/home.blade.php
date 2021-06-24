@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 py-5">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br />
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    @if(!$user->password)
                    <form method="POST" action="{{ route('newpassword') }}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" placeholder="******" type="password" name="password" required autocomplete="new-password" />
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <input class="form-control" placeholder="******" type="password" name="confirm-password" required autocomplete="new-password" />
                        </div> <!-- form-group// -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> New Password </button>
                                </div> <!-- form-group// -->
                            </div>
                        </div> <!-- .row// -->
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection