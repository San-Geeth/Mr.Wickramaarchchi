@extends('MemberArea.Layouts.app')
@section('breadcrumb')
<div class="row clearfix">
    <div class="col-lg-12 ">
        <div class="card">
            <div class="body block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>My Booking</h2>
                        <ul class="breadcrumb p-l-0 p-b-0 ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('booking.all') }}">My Booking</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"><span class="text-warning">Booking</span> Details</h3>
                <ul>
                    <li class=" d-flex justify-content-between align-items-center"><b>Booking id</b>
                    </li><br>
                    <li class=" d-flex justify-content-between align-items-center"><b>Booking Package</b>
                    </li><br>
                    <li class=" d-flex justify-content-between align-items-center"><b>Booking date</b>
                    </li><br>
                    <li class=" d-flex justify-content-between align-items-center"><b>Status</b>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
@include('MemberArea.Pages.Orders.Library.styles')
@endpush

@push('cdnJs')
<script defer src="{{ asset('MemberArea/js/pages/tables/jquery-datatable.js') }}"></script>
<script defer src="{{ asset('MemberArea/bundles/datatablescripts.bundle.js') }}"></script>
<script defer src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush

@push('cdnCss')
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

<noscript>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
</noscript>
@endpush
