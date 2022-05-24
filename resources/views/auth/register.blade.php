<style>
label.error {
    color: red;
}

div#confirmpassword {
    color: red;
}

div#passwordvalidation {
    color: red;
}

div#emailvalidation {
    color: red;
}

div#namevalidation {
    color: red;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@extends('layouts.include')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
            </div>
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" name="regform">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div id="namevalidation"></div>
                                @error('name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div id="emailvalidation" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                <div id="passwordvalidation"></div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" name="confirm_password"
                                    class="form-control" />
                                <div id="confirmpassword"></div>
                               {!!$errors->first("confirm_password", "<span
                                    class='text-danger'><strong>:message</strong></span>")!!}
                            </div>
                        </div> -->
                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSubmit"
                                    onclick="return validateEmail()">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- javascript validation -->
<script type="text/javascript">
$(function() {
    $("#btnSubmit").click(function() {
        var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();
        if (name == null | name == "") {
            document.getElementById("namevalidation").innerHTML = "Please enter Name!";
            return false;
        }
        if (!reg.test(email.value)) {
            if (email == null | email == "") {
                document.getElementById("emailvalidation").innerHTML = "Please enter  Email!";
                return false
            }
            document.getElementById('emailvalidation').innerHTML = 'Please enter valid Email!';
            return false;
        }
        if (password == null | password == "") {
            document.getElementById("passwordvalidation").innerHTML = "Please enter password!";
            return false;
        }
        if (password != confirmPassword) {
            if (confirmPassword == null | confirmPassword == "") {
                document.getElementById('confirmpassword').innerHTML = 'invalid confirm password';
                return false;
            }
            document.getElementById('confirmpassword').innerHTML = 'wrong confirm password';
            return false;
        }
        return true;
    });
});
</script>