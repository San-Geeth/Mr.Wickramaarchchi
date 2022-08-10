@extends('Layouts.app')
@section('title', 'View Customers | Studio')
@section('header')
<div class="pb-6 header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="py-4 row align-items-center">
                <div class="col-lg-6">
                    <h6 class="mb-0 h2 text-dark d-inline-block">Customer Management </h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('customers.all') }}">
                                    Customer Management
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">View
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
                @if ($customer->profileimage)
                <img src="{{ $customer->profileimage?config('images.access_path').'/crop/'.$customer->profileimage->image_name:asset('img/avatar.png') }}"
                    alt="Profile Image" class="media-object" style="width:60px">
                @else
                <img src="{{ asset('img/avatar.png')  }}" alt="Progile Image" class="media-object" style="width:60px">
                @endif
            </div>
            <div class="ml-3 media-body">
                <h4 class="media-heading">
                    {{ $customer->name }}<span class="font-weight-light">
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
                    <a class="nav-link " id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5"
                        role="tab" aria-controls="tabs-icons-text-5" aria-selected="false">
                        {{ ucwords($customer->name) }}'s Orders</a>
                </li>
                <li hidden></li>
            </ul>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="shadow card ">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel">
                        <div class="row">
                            <div class="mb-20 col-6">
                                <div class="form-group">
                                    <strong>Name&nbsp;</strong>
                                    <p>{{ $customer->name }}</p>
                                </div>
                            </div>
                            <div class="mb-20 col-6">
                                <div class="form-group">
                                    <strong>Email&nbsp;</strong>
                                    <p>{{ $customer->email }}</p>
                                </div>
                            </div>
                            <div class="mb-20 col-6">
                                <div class="form-group">
                                    <strong>Mobile&nbsp;</strong>
                                    <p>{{ $customer->mobile_no }}</p>
                                </div>
                            </div>
                            <div class="mb-20 col-6">
                                <div class="form-group">
                                    <strong>Land NO&nbsp;</strong>
                                    <p>{{ $customer->land_no }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel"
                        aria-labelledby="tabs-icons-text-5-tab">
                        <div class="pt-4 col-lg-12 col-md-12">
                            @if ($tc->customerBookings($customer->id))
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush orders-table" id="orders-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Event</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($tc->customerBookings($customer->id) as $key => $booking)
                                        <tr class="ok">
                                            <td> {{'#bk'.sprintf('%08d',  $booking->id) }}</td>
                                            <td>{{ $booking->title }}</td>
                                            <td>
                                                {{ $booking->events?$booking->events->name:'Event Not Found' }}
                                            </td>
                                            <td>
                                                {!! $tc->getBookingStatus($booking->status) !!}
                                            </td>
                                            <td>{{ $booking->date }}</td>
                                            <td>
                                                <div class="mb-1 dropdown no-arrow">
                                                    <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-cog"></i> </a>
                                                    <div class="shadow dropdown-menu dropdown-menu-left animated--fade-in"
                                                        aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item show-product"
                                                            href="{{ route('booking.view', $booking->id) }}"
                                                            class="btn btn-danger text-danger" title=""><i
                                                                class="fa fa-eye "></i>&nbsp;View</a>

                                                        @if ($booking->status == 0)
                                                        <a class="dropdown-item show-product"
                                                            href="{{ route('booking.edit', $booking->id) }}"
                                                            class="btn btn-danger text-danger" title=""><i
                                                                class="fas fa-edit"></i>&nbsp;Edit</a>
                                                        <a class="dropdown-item delete-booking"
                                                            href="javascript:void(0)" class="btn btn-danger" title=""
                                                            onclick="approve('{{ route('booking.status',[$booking->id,'1']) }}','Do You Want To Change The Status As Approve')"><i
                                                                class="fas fa-money-bill-wave"></i> Approve </a>
                                                        <a class="dropdown-item delete-booking"
                                                            href="javascript:void(0)" class="btn btn-danger" title=""
                                                            onclick="decline('{{ route('booking.status',[$booking->id,'2']) }}','Do You Want To Change The Status As Cancel')"><i
                                                                class="fas fa-close"></i> Cancel </a>
                                                        @endif
                                                        <a class="dropdown-item delete-booking"
                                                            href="javascript:void(0)" class="btn btn-danger" title=""
                                                            onclick="delconf('{{ route('booking.delete',$booking->id) }}')"><i
                                                                class="far fa-trash-alt"></i>&nbsp;Delete</a>
                                                        <div class="dropdown-divider"></div>
                                                        @if ($booking->status == 1)
                                                        <a class="dropdown-item delete-booking"
                                                            href="javascript:void(0)" class="btn btn-danger" title=""
                                                            onclick="approve('{{ route('booking.status',[$booking->id,'3']) }}','Do You Want To Change The Status As Complete')"><i
                                                                class="fas fa-money-bill-wave"></i> Complete </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="text-center">
                                <br>
                                <h5 class="text-center text-muted">
                                    Oops! {{ ucwords($customer->first_name) }} did't made any order yet.
                                </h5>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('css')
<style>
    .card {
        position: relative;
        min-height: 350px;
    }

    .message {
        display: table;
    }

    .label {
        display: table-cell;
    }

    .text {
        display: table-cell;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #263396;
    }

    .bg-light-media {
        background-color: #fff !important;
    }

</style>

@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#customer-menu').toggle();
        $('#orders-table').dataTable({
            pageLength: 5,
            lengthMenu: [
                [5, -1],
                [5, "All"]
            ],
            "language": {
                "emptyTable": "No data available in the table",
                "paginate": {
                    "previous": '<i class="ni ni-bold-left"></i>',
                    "next": '<i class="ni ni-bold-right"></i>'
                },
            },
        });
    });

</script>
@endsection
