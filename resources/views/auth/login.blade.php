@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 py-5">
            <div class="card">
                <article class="card-body">
                    <a href="{{route('register')}}" class="float-right btn btn-outline-primary">Register</a>
                    <h4 class="card-title mb-4 mt-1">Log in</h4>
                    <p>
                        <a href="{{route('login.github')}}" class="btn btn-block btn-outline-info"> <i class="fab fa-github"></i>   Login via Github</a>
                    </p>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input class="form-control" placeholder="Email or login" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <input class="form-control" placeholder="******" type="password" name="password" required autocomplete="current-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="small" href="#">Forgot password?</a>
                            </div>
                        </div> <!-- .row// -->
                    </form>
                </article>
            </div> <!-- card.// -->

        </div>
    </div>
</div>
@endsection