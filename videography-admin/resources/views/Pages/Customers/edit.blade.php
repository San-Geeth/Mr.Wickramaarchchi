@extends('Layouts.app')
@section('title', 'Edit Customers | Studio')
@section('header')
<div class="pb-6 header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="py-4 row align-items-center">
                <div class="col-lg-8">
                    <h6 class="mb-0 h2 text-dark d-inline-block">Customer Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('customers.all') }}">
                                    Customer Management
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit
                                {{'#cus'.sprintf('%08d',  $customer->id) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="mt-4 row">
    <div class="col-xl-4">
        <div class="p-3 mr-3 rounded media bg-light-media" style="">
            <div class="media-left">
                @if ($customer->profileImage)
                <img src="{{ $customer->profileImage?config('images.access_path').'/crop/'.$customer->profileImage->name:asset('img/no.png') }}"
                    alt="Profile Image" class="media-object" style="width:60px">
                @else
                <img src="{{ asset('img/avatar.png')  }}" alt="Progile Image" class="media-object" style="width:60px">
                @endif
            </div>
            <div class="ml-3 media-body">
                <h4 class="media-heading">
                    {{ $customer->first_name }} {{ $customer->last_name }}<span class="font-weight-light">
                </h4>
                <p>
                    {{ $customer->email }}<span class="font-weight-light">
                </p>
            </div>
        </div>

        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column" id="tabs-icons-text" role="tablist">
                <li class="mb-2 nav-item">
                    <a class="nav-link active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1"
                        role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                        Personal Information</a>
                </li>
                <li class="mb-2 nav-item">
                    <a class="nav-link" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3"
                        role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                        Password
                    </a>
                </li>
                <li hidden></li>
            </ul>
        </div>

    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="shadow card ">
            <div class="card-body ">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel">
                        <form class="clearfix tab-wizard wizard-circle wizard"
                            action="{{ route('customers.update.personal') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                        <label for="name" class="form-control-label">First Name</label>
                                        <input type="text" value="{{ $customer->name }}"
                                            class="form-control form-control-alternative" id="name" name="name"
                                            placeholder="Enter Name Here" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nic" class="form-control-label">NIC</label>
                                        <input type="text" value="{{ $customer->nic }}"
                                            class="form-control form-control-alternative" id="nic" name="nic"
                                            placeholder="Enter NIC Here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input type="email" value="{{ $customer->email }}"
                                            class="form-control form-control-alternative" id="emailInput" name="email"
                                            required onkeyup="validateEmail()">
                                        <span class="invalid-feedback" id="email_msg">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inp_mobile_no" class="form-control-label">Mobile No</label>
                                        <input type="number" value="{{ $customer->mobile_no }}"
                                            class="form-control form-control-alternative" id="inp_mobile_no"
                                            name="mobile_no" placeholder="Enter Mobile NO" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inp_land_no" class="form-control-label">Land No</label>
                                        <input type="number" value="{{ $customer->land_no }}"
                                            class="form-control form-control-alternative" id="inp_land_no"
                                            name="land_no" placeholder="Enter Mobile NO">
                                    </div>
                                </div>
                                <div class=" col-lg-12">
                                    <h6 class="text-center ">
                                        <button class="btn btn-info" id="submit-btn" type="submit">Update</button>
                                    </h6>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade " id="tabs-icons-text-3" role="tabpanel"
                        aria-labelledby="tabs-icons-text-3-tab">
                        <form class="clearfix tab-wizard wizard-circle wizard"
                            action="{{ route('customers.update.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label for="Password" class="form-control-label">New Password&nbsp;|&nbsp;<a
                                            href="javascript:void(0)" id="passGen">Generate</a></label>
                                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                    <input type="password" name="password" id="new_pass"
                                        class="form-control form-control-alternative">
                                </div>
                                <div class="col-lg-12">
                                    <label for="Password" class="form-control-label">Confirm Password</label>
                                    <input type="password" onkeyup="validatepasswordconf()" name="confirm_password"
                                        id="confirm_pass" class="form-control form-control-alternative">
                                    <small id="conf_pass_msg"></small>
                                </div>
                                <div class="pt-4 mt-4 text-center col-lg-12">
                                    <button onmouseover="validatepasswordconf()" class="btn btn-info" id="sumbit-btn"
                                        disabled type="submit">Update</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#customer-menu').toggle();

    });

    $('#passGen').on('click', function () {
        var pass = Math.random().toString(36).slice(-8);
        $('#new_pass').attr('type', 'text');
        $('#confirm_pass').attr('type', 'text');
        $('#new_pass').val(pass);
        $('#confirm_pass').val(pass);
        validatepasswordconf();
    })

    function validatepasswordconf() {
        if ($('#new_pass').val() == $('#confirm_pass').val() && $('#new_pass').val() != '' && $('#confirm_pass')
            .val() != '') {
            $('#conf_pass_msg').addClass('text-success').removeClass('text-danger').html(
                '<i class="fa fa-check"></i>');
            $('#sumbit-btn').removeAttr('disabled');

        } else if ($('#new_pass').val() == '' && $('#confirm_pass').val() == '' || ($('#confirm_pass').val() == '' && $(
                '#new_pass').val() == '')) {
            $('#conf_pass_msg').addClass('text-danger').removeClass('text-success').html(
                '');
            $('#sumbit-btn').attr('disabled', true);
        } else {
            $('#conf_pass_msg').addClass('text-danger').removeClass('text-success').html(
                'The password and confirmation' +
                ' password do not match');
            $('#sumbit-btn').attr('disabled', true);
        }
    }

</script>
@endsection

@section('css')
<style>
    .bg-light-media {
        background-color: #fff !important;
    }

    .btn-link_edit {
        font-weight: 400 !important;
        color: #007bff !important;
        text-decoration: none;
        padding: 5px;
    }

    .alert-light {
        color: #697091;
        background-color: #ececec;
        border-color: #fdfdfe;
    }

    .close {
        float: right;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        opacity: .5;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #263396;
    }

    .select2-container .select2-selection--single {
        transition: box-shadow .15s ease;
        border: 0;
        height: auto;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }

    .select2-selection.select2-selection--multiple {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }

    .dropdown-menu-image {
        position: fixed !important;
    }

    .select2-container .select2-selection--single:focus {
        border: none;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .select2-selection.select2-selection--multiple:focus {
        border: none;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    label {
        display: block;
        margin-bottom: .5rem;
    }

</style>
@endsection
