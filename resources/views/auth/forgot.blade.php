@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="fs-4 text-shadow text-center">“The fruit of the righteous is a tree of life; and he that winneth souls is wise.”</div>
            <div class="text-center">
                <img src="{{asset('img/logo.jpg')}}">
            </div>
            <div>
                <form method="POST" id="form_forgot">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-pill" name="email" value="{{ old('email') }}" required autocomplete="email">

                            
                                <span class="invalid-feedback" role="alert" id="warn_nouser">
                                    <strong>These credentials do not match our records.</strong>
                                </span>
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-3 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-pill" id="password" name="password" required autocomplete="new-password">

                            
                                <span class="invalid-feedback" role="alert" id="password_length">
                                    <strong>The password must be at least 8 characters.</strong>
                                </span>
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-3 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control rounded-pill" id="repassword" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <span class="invalid-feedback" role="alert" id="password_match">
                            <strong>The password confirmation does not match.</strong>
                        </span>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-3 text-center">
                            <button type="submit" class="btn btn-primary rounded-pill" id="submitforgot">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('contentscript')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $("#submitforgot").click(function (e) {
            e.preventDefault();
            $("#warn_nouser").hide();
            $("#password_match").hide();
            $("#password_length").hide();
            // console.log("here" , $("#password").val());
            if($("#password").val().length<8)
            {
                $("#password_length").show();
                return;
            }
            // console.log($("#password").val() , $("#repassword").val())
            if($("#password").val()!=$("#repassword").val())
            {
                $("#password_match").show();
                return;
            }
            
            var numberarray = [];
            var i=0;
            var ele = document.getElementById("form_forgot");
            var chk_status = ele.checkValidity();
            var submitresult;
            ele.reportValidity();
            if(chk_status)
            {  
                var email = $("#email").val();
                var password = $("#password").val();
                // console.log("here" );
                $.ajax({
                    type:"POST",
                    url:"/forgotpassword",
                    data:{
                        email:email,
                        password:password
                    },
                    error: function(err) {
                    
                    },
                    success: function(response) {
                        if(response=="nouser")
                        {
                            $("#warn_nouser").show();
                        }
                        if(response == "success")
                        {
                            window.location.href = "/login";
                        }
                    }
                })
            }
        });
    });
</script>
@endsection
