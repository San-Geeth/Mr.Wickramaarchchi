@extends('Layouts.app')
@section('title', 'New Customer | Studio')
@section('header')
<div class="header  pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8">
                    <h6 class="h2 text-dark d-inline-block mb-0">Customer Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('customers.all') }}">
                                    Customer Management
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">New</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-lg-10 ml-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="name"><b>Name </b> </label>
                            <input id="name" class="form-control form-control-alternative" type="text"
                                name="name" required>
                            <span class="invalid-feedback" id="name_msg">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="email"><b>Email </b> </label>
                            <input id="inp_email" onkeyup="validateEmail()"
                                class="form-control form-control-alternative" type="email" name="email" required>
                            <span class="invalid-feedback" id="email_msg">
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-5 ">
                        <div class="form-group ">
                            <label><b>New Password</b></label><a href="javascript:void(0)"
                                id="passGen">&nbsp;Generate</a>
                            <input id="password" minlength="8" type="password" onkeyup="conf_rule_validator()"
                                class="responsive-moblile form-control  form-control-alternative @error('password') is-invalid @enderror"
                                name="password" autocomplete="new-password" required>
                            @error('password')
                            <span class="invalid-feedback responsive-moblile" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5 ">
                        <div class="form-group">
                            <label><b>{{ __('Confirm Password') }}<sup class="text-danger"></sup></b></label>
                            <i id="eye" onclick="showPassword()" class="far fa-eye"></i>
                            <input id="password-confirm" minlength="8" type="password"
                                class="responsive-moblile form-control form-control-alternative"
                                name="password_confirmation" onkeyup="conf_rule_validator()" autocomplete="new-password"
                                required>
                            <span class="invalid-feedback text-danger" id="conf_password_msg" style="display:block;">
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h6 class="text-center responsive-moblile">
                                <button id="submit-btn" type="submit" class="btn btn-info di"
                                    onmouseover="validateEmail()">
                                    Create User
                                </button>
                            </h6>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#customer-menu').toggle();
        $('#submit-btn').prop('disabled', true);

        $('#settlements').DataTable({
            language: {
                paginate: {
                    next: '<i class="ni ni-bold-right"></i>',
                    previous: '<i class="ni ni-bold-left"></i>'
                }
            },
        });
    });
    $('#passGen').on('click', function () {
        var pass = Math.random().toString(36).slice(-8);
        $('#password').val(pass);
        $('#password-confirm').val(pass);
        conf_rule_validator();
        validsubmit();
    });

    function validateEmail() {
        $.ajax({
            url: "{{ route('customers.check.email') }}?email=" + $('#inp_email').val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function (response) {
                if (response['status'] == 1) {
                    $('#inp_email').addClass("is-valid").removeClass("is-invalid");
                    email_valid = true;
                    $('#valid_email').val(1);
                    validsubmit();
                } else {
                    email_valid = false;
                    $('#inp_email').addClass("is-invalid").removeClass("is-valid");
                    $('#email_msg').html(
                        "<strong class='text-danger'>" +
                        response['msg'] +
                        " </strong> ");
                    $('#valid_email').val(0);
                    validsubmit();
                }
            }
        });
    }

    var password;
    var password2;
    var conf_password_valid = false;
    var email_valid, fist_name_valid, last_namevalid = false;

    function conf_rule_validator() {
        password = $('#password');
        password2 = $('#password-confirm');
        if (!password.val() || !password2.val()) {
            $('#conf_password_msg').html('');
            conf_password_valid = false;
            $('#password-confirm').removeClass("is-invalid").removeClass("is-valid");
        } else if (((password.val() != password2.val()))) {
            $('#password-confirm').addClass("is-invalid").removeClass("is-valid");
            $('#conf_password_msg').html("<strong>Password Mismatch</strong>");
            $('#conf_valid_password').val(0);
            conf_password_valid = false;
        } else if (password.val() == password2.val()) {
            $('#password-confirm').addClass("is-valid").removeClass("is-invalid");
            $('#conf_password_msg').html("");
            conf_password_valid = true;
            $('#conf_valid_password').val(1);
        }
        validsubmit();
    };

    function showPassword() {
        var type = $('#password').attr('type')
        if (type == 'password') {
            $('#password').attr('type', 'text');
            $('#password-confirm').attr('type', 'text');
            $('#eye').removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            $('#password').attr('type', 'password');
            $('#password-confirm').attr('type', 'password');
            $('#eye').removeClass("fa-eye-slash").addClass("fa-eye");
        }
    }

    function validsubmit() {
        if (!$('#inp_email').val()) {
            $('#inp_email').addClass("is-invalid").removeClass("is-valid");
            $('#email_msg').html("<strong class='text-danger'>Email is required</strong>");
            email_valid = false;
        }
        if (!$('#name').val()) {
            $('#name').addClass("is-invalid").removeClass("is-valid");
            $('#name_msg').html("<strong class='text-danger'>Name is required</strong>");
            name_valid = false;
        } else {
            $('#name').addClass("is-valid").removeClass("is-invalid");
            name_valid = true;
        }

        if (conf_password_valid == true && email_valid == true && name_valid == true) {
            $('#submit-btn').prop('disabled', false);
        } else {
            $('#submit-btn').prop('disabled', true);
        }
    }

</script>
@endsection

@section('css')
<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        border: #f0fafa;
        border-radius: .375rem;
        background-color: #fff;
        background-clip: border-box;
    }

</style>
@endsection
