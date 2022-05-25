@extends('layouts.include')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row">
            <h3>Reset Password</h3>
            <div class="card">
                <form action="{{ route('ResetPasswordPost') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group mb-3">
                        <label for="email_address">E-Mail Address</label>
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <input type="password" id="password" class="form-control" name="password" required autofocus>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                            Password</label>
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation"
                            required autofocus>
                        @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection