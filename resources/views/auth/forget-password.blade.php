@extends('layouts.include')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row">
            <h4 class="card-header">Reset Password</h4>


            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('ForgetPasswordPost') }}" method="POST">
                    @csrf
                    <!-- <div class="form-group mb-3">
                        <label for="name">name</label>
                        <input type="text" id="name" class="form-control" name="name" required autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div> -->
                    <div class="form-group mb-3">
                        <label for="email_address">E-Mail Address</label>
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <!-- <div class="form-group mb-3">
                        <label for="password">Old Password</label>
                        <input type="text" id="password" class="form-control" name="password" required autofocus>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div> -->
                    <div class="btn">
                        <button type="submit" class="btn btn-danger">
                            Send Reset Password Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection