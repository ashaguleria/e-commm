@extends('layouts.include')

@section('content')
<style>
.cotainer {
    padding: 111px;
}
</style>
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

                    <div class="form-group mb-3">
                        <label for="email_address">E-Mail Address</label>
                        <input type="text" id="email_address" class="form-control" name="email" autofocus>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

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