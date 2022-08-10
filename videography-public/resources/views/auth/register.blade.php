@extends('PublicArea.Layouts.app')
@section('title', 'Register | MR. Wickramaarachchi Videography')
@section('content')

<section class="main-contact-area ptb-70" style="background-color: #071112;">
    <div class="pt-5 text-center">
        <h2 class="sans-font text-warning">Register <span class="text-white">Now</span></h2>
    </div>
    <div class="row mt-3 justify-content-center row-content">
        <div class="col-xl-3 col-lg-4 col-sm-12">
            <div class="card" style="background-color: #071112;">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register-form"
                        class="default-form auth-form ">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> {{ implode('', $errors->all(':message')) }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-white">Name <span class="text-danger">*</span></label>
                                    <input id="inp_name" type="text" class="text-dark form-control"
                                        placeholder="Enter Full Name" name="name" value="{{ old('name') }}" autofocus
                                        autocomplete="name">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-white">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="text-dark form-control" name="email" id="inp_email"
                                        placeholder="Enter Email" autofocus>
                                    <span class="help-block ">
                                        <strong class="text-danger" id="email_msg"></strong>
                                    </span>

                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-white">Password <span class="text-danger">*</span></label>
                                    <input id="inp_password" aria-describedby="helpId" type="password"
                                        placeholder="Enter Password" class="text-dark form-control" name="password"
                                        autofocus autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label class="text-white">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input id="inp_password" aria-describedby="helpId" type="password"
                                        placeholder="Enter Confirm Password" class="text-dark form-control"
                                        name="password_confirmation" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 mt-5">
                                <button id="register-btn" class="btn btn-warning btn-block register" type="submit"
                                    name="submit-form">
                                    Register
                                </button>

                            </div>
                            <div class="col-lg-12 col-sm-12 mt-5">
                                <p class="text-secondary">Already have an account? <a class="text-white"
                                        href="{{ route('login') }}">Login Now!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .row-content {
        margin-right: 0px;
        margin-left: 0px;
    }

    @media screen and (max-width: 768px) {
        .header-banner {
            height: 29vh;
        }
    }

</style>
@endpush

@push('js')
<script>
    $('#inp_email').on('keyup', function () {
        $.ajax({
            url: "{{ route('customers.check.email') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            data: {
                email: $(this).val()
            },
            success: function (response) {
                if (response == 0) {
                    $('#email_msg').addClass('text-success').removeClass(
                        'text-danger').html('Email is' +
                        ' Available');
                    $("#register-btn").prop("disabled", false);
                } else {
                    $('#email_msg').addClass('text-danger').removeClass(
                        'text-success').html('Email is' +
                        ' Already Registered');
                    $("#register-btn").prop("disabled", true);
                }
            }
        });
    })

</script>
@endpush
