@extends('MemberArea.Layouts.app')
@section('title', 'Profile | MR.Wickramaarachchi Videography')

@section('breadcrumb')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>Basic Information</h2>
                        <ul class="breadcrumb p-l-0 p-b-0 ">
                            <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                            <li class="breadcrumb-item active">Basic Information</li>
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
        <form action="{{ route('customers.update.personal') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="first_name"><b>Name</b></label>
                        <input type="text" value="{{ Auth::user()->name }}"
                            class="form-control  form-control-alternative" id="inp_first_name" name="first_name"
                            placeholder="Enter First Name Here" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="email" value="{{ Auth::user()->email }}"
                            class="form-control  form-control-alternative" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mobile_no"><b>Mobile No</b></label>
                        <input type="text" value="{{ Auth::user()->mobile_no }}"
                            class="form-control  form-control-alternative" id="inp_mobile_no"
                            placeholder="Enter Mobile Number" name="mobile_no">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="land_no"><b>Land No</b></label>
                        <input type="text" value="{{ Auth::user()->land_no }}"
                            class="form-control  form-control-alternative" id="land_no" placeholder="Enter Land Number"
                            name="land_no">
                    </div>
                </div>
                <div class="col-lg-12  mt-4 dashboard-box">
                    <h6 class="text-center">
                        <button class="btn btn-gifter-black btn-round" type="reset">Cancel</button>
                        <button class="btn btn-gifter-red btn-round" type="submit">Update</button>
                    </h6>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
@include('MemberArea.Pages.Profile.Library.styles')
@endpush

@push('cdnJs')
<script defer src="https://unpkg.com/jquery-input-mask-phone-number@1.0.14/dist/jquery-input-mask-phone-number.js">
</script>
@endpush
@push('js')
<script>
    $(document).ready(function () {
        $('#land_no').usPhoneFormat({
            format: '(xxx) xxx-xxxx',
        });

        $('#inp_mobile_no').usPhoneFormat({
            format: '(xxx) xxx-xxxx',
        });
    });

</script>
@endpush
