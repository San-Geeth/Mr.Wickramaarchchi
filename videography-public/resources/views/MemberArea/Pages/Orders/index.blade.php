@extends('MemberArea.Layouts.app')
@section('breadcrumb')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>My Booking</h2>
                        <ul class="breadcrumb p-l-0 p-b-0 ">
                            <li class="breadcrumb-item"><a href="{{ route('booking.all') }}"><i
                                        class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">My Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card user-account">
            <div class="header">
                <h2><strong>Recent Booking</strong></h2>
            </div>
            <div class="body">
                @if (Auth::user()->bookings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Event</th>
                                <th>Booking Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->bookings as $key => $booking)
                            <tr class="ok">
                                <td> {{'#bk'.sprintf('%08d',  $booking->id) }}</td>
                                <td>{{ $booking->title }}</td>
                                <td>
                                    {{ $booking->events?$booking->events->name:'Event Not Found' }}
                                </td>
                                <td>{{ $booking->date }}</td>
                                <td>
                                    @switch($booking->status)
                                    @case(0)
                                    <span class="badge badge-primary">Pending</span>
                                    @break
                                    @case(1)
                                    <span class="badge badge-success">Approve</span>
                                    @break
                                    @case(2)
                                    <span class="badge badge-danger">Cancel</span>
                                    @break
                                    @case(3)
                                    <span class="badge badge-light">Done</span>
                                    @break
                                    @default
                                    @endswitch
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center">
                    <img src="{{ asset('img/no-product.png')  }}" alt="Progile Image" class="oops-img" width="200px">
                    <br>
                    <h5 class="text-center text-muted mt-5">
                        Oops! You did't made any Booking yet. Let's create <a href="{{ route('booking') }}"
                            class="text-primary">New
                            Booking</a>
                    </h5>
                </div>
                @endif

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
@endpush

@push('cdnCss')
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

<noscript>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
</noscript>
@endpush
