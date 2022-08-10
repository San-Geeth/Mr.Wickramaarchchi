@extends('MemberArea.Layouts.app')

@section('breadcrumb')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>Profile Information</h2>
                        <ul class="breadcrumb p-l-0 p-b-0 ">
                            <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row clearfix mb-5">
    @include('MemberArea.Pages.Profile.Components.info')
    <div class="col-lg-12">
        <form action="{{ route('customers.update.password') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-6 ml-auto mr-auto">
                    <label for="curr_password"><b>Enter your current password to verify</b> </label>
                    <div class="input-group">
                        <input type="password" name="curr_password" id="curr_password"
                            class="curr_password form-control form-control-alternative roboto-font">
                    </div>
                    <small id="curr_pass_msg" class="mb-3">

                    </small>
                    <br>
                    <span id="new_pass_section" class="d-none mt-3">
                        <label for="">New Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="inp_password" pattern="(?=.*[a-z]).{8,}"
                                class="form-control form-control-alternative password new_pass roboto-font">
                        </div>
                        <span id="passstrength"></span>
                        <small id="password_msg_stg">
                        </small>
                        <br>
                        <label for="">Confirm Password</label>
                        <div class="input-group mb-1">
                            <input type="password" name="confirm_pas" id="password-verify"
                                onkeyup="validatepasswordconf()"
                                class="form-control form-control-alternative password-confirm roboto-font">
                        </div>
                        <small id="conf_pass_msg"></small>
                        <div class="col-lg-12 text-center mt-4 pt-4 submitbtn text-left">
                            <button onmouseover="validatepasswordconf()" class="btn btn-gifter-red btn-round mb-3"
                                id="sumbit-btn" disabled type="submit">Update</button>
                        </div>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
@include('MemberArea.Pages.Profile.Library.styles')
@endpush

@push('js')
@include('MemberArea.Pages.Profile.Privacy.Library.scripts')
@endpush
