@extends('Layouts.app')
@section('header')
<div class="header  pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8">
                    <h6 class="h2 text-dark d-inline-block mb-0">Booking {{ '#ord' . sprintf('%05d', $booking->id) }}
                    </h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('booking.all') }}">
                                    Booking Management
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">booking
                                {{ '#ord' . sprintf('%05d', $booking->id) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow mt-5">
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Booking Activities &nbsp;|
                    <div class="dropdown no-arrow mb-1">
                        <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i> </a>
                        <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                            aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                            style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                            @if ($booking->status == 0)
                            <a class="dropdown-item delete-booking" href="javascript:void(0)" class="btn btn-danger"
                                title=""
                                onclick="approve('{{ route('booking.status',[$booking->id,'1']) }}','Do You Want To Change The Status As Approve')"><i
                                    class="fas fa-money-bill-wave"></i> Approve </a>
                            <a class="dropdown-item delete-booking" href="javascript:void(0)" class="btn btn-danger"
                                title=""
                                onclick="decline('{{ route('booking.status',[$booking->id,'2']) }}','Do You Want To Change The Status As Cancel')"><i
                                    class="fas fa-close"></i> Cancel </a>
                            @endif
                            @if ($booking->status == 1)
                            <a class="dropdown-item delete-booking" href="javascript:void(0)" class="btn btn-danger"
                                title=""
                                onclick="approve('{{ route('booking.status',[$booking->id,'3']) }}','Do You Want To Change The Status As Complete')"><i
                                    class="fas fa-money-bill-wave"></i> Complete </a>
                            @endif

                        </div>
                    </div>
                </h6>

                <div class="row">
                    <div class="col-md-12 lg_view">
                        <div class="md-stepper-horizontal orange">
                            <div class="md-step active">
                                <div class="md-step-circle pending"><span class="fas fa-question"></span></div>
                                <div class="md-step-title">Pending</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            @if ($booking->status == 2)
                            <div class="md-step active">
                                <div class="md-step-circle shipping"><span class="fas fa-dolly-flatbed"></span>
                                </div>
                                <div class="md-step-title">Cancel</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            @else
                            <div class="md-step {{ in_array($booking->status, ['1', '3']) ? 'active' : '' }}">
                                <div class="md-step-circle paid"><span class="fas fa-dollar-sign"></span></div>
                                <div class="md-step-title">Approve</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            <div class="md-step {{ in_array($booking->status, ['3']) ? 'active' : '' }}">
                                <div class="md-step-circle deliverd"><span class="fas fa-truck"></span></div>
                                <div class="md-step-title">Complete</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-lg-12 col-12">
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Booking Information</h6>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>booking ID :</strong>
                                    <p>{{ '#obk' . sprintf('%05d', $booking->id) }}</p>
                                </div>
                                <div class="form-group">
                                    <strong>Current Status :</strong>
                                    <p>
                                        {!! $tc->getBookingStatus($booking->status) !!}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <strong>Total Price :</strong>
                                    <p>
                                        Rs. {!! $tc->priceFormat($booking->total) !!}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <strong>Total Balance :</strong>
                                    <p>
                                        Rs. {!! $tc->priceFormat($booking->balance) !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Invoice Number :</strong>
                                    <p>{{ $booking->title }}</p>
                                </div>
                                <div class="form-group">
                                    <strong>Booking Date :</strong>
                                    <p>{{ $booking->date}}</p>
                                </div>
                                <div class="form-group">
                                    <strong>Total Paid :</strong>
                                    <p>
                                        Rs. {!! $tc->priceFormat($booking->pay) !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Special Note :</strong>
                                    <p>
                                        {!! $booking->note !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($booking->customers)
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Customer Information</h6>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Customer Name :</strong>
                                    <p>{{ $booking->customers->name }}</p>
                                </div>
                                <div class="form-group">
                                    <strong>Email :</strong>
                                    <p>{{ $booking->customers->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Mobile No :</strong>
                                    <p>{{ $booking->customers->mobile_no }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Address :</strong>
                                    <br>
                                    @if ($booking->customers->billingAddress)
                                    <span class="text-dark">
                                        {{ $booking->customers->billingAddress->street_address }}</span>,
                                    <br>
                                    <span class="text-dark"> {{ $booking->customers->billingAddress->city }}</span>,
                                    <br>
                                    @if ($booking->customers->billingAddress->line2)
                                    <span class="text-dark"> {{ $booking->ShippingAddresses->line2 }}</span>, <br>
                                    @endif
                                    <span class="text-dark"> {{ $booking->customers->billingAddress->zip_code }}</span>,
                                    <span class="text-dark"> {{ $booking->customers->billingAddress->district }}</span>,
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
@section('css')
<style>
    .total {
        bbooking-bottom: 1px solid black;
    }

    table .tr1 {
        bbooking: 0;
    }

    /* .card-title1 {
            font-size: 17px;
        } */

    .card-body {
        font-family: inherit;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: .5rem;

        color: #32325d;
    }


    .mobile_view {
        display: none;
    }

    .md-stepper-horizontal {
        display: table;
        width: 100%;
        margin: 0 auto;
    }

    .md-stepper-horizontal .md-step {
        display: table-cell;
        position: relative;
        padding: 24px;
    }

    .md-stepper-horizontal .md-step:active {
        bbooking-radius: 15% / 75%;
    }

    .md-stepper-horizontal .md-step:first-child:active {
        bbooking-top-left-radius: 0;
        bbooking-bottom-left-radius: 0;
    }

    .md-stepper-horizontal .md-step:last-child:active {
        bbooking-top-right-radius: 0;
        bbooking-bottom-right-radius: 0;
    }

    .md-stepper-horizontal .md-step:hover .md-step-circle {
        background-color: #757575;
    }

    .md-stepper-horizontal .md-step:first-child .md-step-bar-left,
    .md-stepper-horizontal .md-step:last-child .md-step-bar-right {
        display: none;
    }

    .md-stepper-horizontal .md-step .md-step-circle {
        width: 40px;
        height: 40px;
        margin: 0 auto;
        background-color: #999999;
        bbooking-radius: 50%;
        text-align: center;
        line-height: 40px;
        font-size: 16px;
        font-weight: 600;
        color: #FFFFFF;
    }


    .md-stepper-horizontal.orange .md-step.active .md-step-circle.pending {
        background-color: #dc3545;
    }

    .md-stepper-horizontal.orange .md-step.active .md-step-circle.paid {
        background-color: #007bff;
    }

    .md-stepper-horizontal.orange .md-step.active .md-step-circle.shipping {
        background-color: #17a2b8;
    }

    .md-stepper-horizontal.orange .md-step.active .md-step-circle.deliverd {
        background-color: #28a745;
    }

    .md-stepper-horizontal.orange .md-step.active .md-step-circle.review {
        background-color: #343a40;
    }

    .md-stepper-horizontal .md-step.done .md-step-circle:before {
        font-family: 'FontAwesome';
        font-weight: 100;
        content: "\f00c";
    }

    .md-stepper-horizontal .md-step.done .md-step-circle *,
    .md-stepper-horizontal .md-step.editable .md-step-circle * {
        display: none;
    }

    .md-stepper-horizontal .md-step.editable .md-step-circle {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }

    .md-stepper-horizontal .md-step.editable .md-step-circle:before {
        font-family: 'FontAwesome';
        font-weight: 100;
        content: "\f040";
    }

    .md-stepper-horizontal .md-step .md-step-title {
        margin-top: 16px;
        font-size: 16px;
        font-weight: 600;
    }

    .md-stepper-horizontal .md-step .md-step-title,
    .md-stepper-horizontal .md-step .md-step-optional {
        text-align: center;
        color: rgba(0, 0, 0, .26);
    }

    .md-stepper-horizontal .md-step.active .md-step-title {
        font-weight: 600;
        color: rgba(0, 0, 0, .87);
    }

    .md-stepper-horizontal .md-step.active.done .md-step-title,
    .md-stepper-horizontal .md-step.active.editable .md-step-title {
        font-weight: 600;
    }

    .md-stepper-horizontal .md-step .md-step-optional {
        font-size: 12px;
    }

    .md-stepper-horizontal .md-step .md-step-bar-left,
    .md-stepper-horizontal .md-step .md-step-bar-right {
        position: absolute;
        top: 36px;
        height: 1px;
        bbooking-top: 1px solid #DDDDDD;
    }

    .md-stepper-horizontal .md-step .md-step-bar-right {
        right: 0;
        left: 50%;
        margin-left: 20px;
    }

    .md-stepper-horizontal .md-step .md-step-bar-left {
        left: 0;
        right: 50%;
        margin-right: 20px;
    }

    hr {
        background-color: #b2beb5;
        height: 1px;
        bbooking: 0;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .bg-pending {
        color: #fff;
        background-color: #dc3545;
    }

    .bg-paid {
        color: #fff;
        background-color: #007bff;
    }

    .bg-shipping {
        color: #fff;
        background-color: #17a2b8;
    }

    .bg-deliverd {
        color: #fff;
        background-color: #28a745;
    }

    .bg-reviewed {
        color: #fff;
        background-color: #343a40;
    }

    @media screen and (max-width: 600px) {
        .lg_view {
            display: none;
        }

        .mobile_view {
            display: block;
        }
    }

</style>
@endsection
@section('js')

@endsection
