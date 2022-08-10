@extends('Layouts.app')
@section('header')
<div class="header  pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8">
                    <h6 class="h2 text-dark d-inline-block mb-0">Booking Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Booking Management
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-4 text-right">
                    <a href="{{ route('booking.new') }}" class="btn btn-sm btn-neutral float-right">
                        <i class="fa fa-plus-circle"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card bbooking-0 shadow">
    <div class="table-responsive py-4">
        <table id="bookings" class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Customer</th>
                    <th>Event</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($bookings as $key=>$booking)
                <tr class="ok">
                    <td> {{'#bk'.sprintf('%08d',  $booking->id) }}</td>
                    <td>{{ $booking->title }}</td>
                    <td>{{ $booking->customers?$booking->customers->name:'Customer Not Found' }}<br>
                        <span class="badge badge-info">
                            {{ $booking->customers?$booking->customers->email:'Customer Not Found' }} </span>
                    </td>
                    <td>
                        {{ $booking->events?$booking->events->name:'Event Not Found' }}
                    </td>
                    <td>
                        {!! $tc->getBookingStatus($booking->status) !!}
                    </td>
                    <td>{{ $booking->date }}</td>
                    <td>
                        <div class="dropdown no-arrow mb-1">
                            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> </a>
                            <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item show-product" href="{{ route('booking.view', $booking->id) }}"
                                    class="btn btn-danger text-danger" title=""><i class="fa fa-eye "></i>&nbsp;View</a>

                                @if ($booking->status == 0)
                                <a class="dropdown-item show-product" href="{{ route('booking.edit', $booking->id) }}"
                                    class="btn btn-danger text-danger" title=""><i
                                        class="fas fa-edit"></i>&nbsp;Edit</a>
                                <a class="dropdown-item delete-booking" href="javascript:void(0)" class="btn btn-danger"
                                    title=""
                                    onclick="approve('{{ route('booking.status',[$booking->id,'1']) }}','Do You Want To Change The Status As Approve')"><i
                                        class="fas fa-money-bill-wave"></i> Approve </a>
                                <a class="dropdown-item delete-booking" href="javascript:void(0)" class="btn btn-danger"
                                    title=""
                                    onclick="decline('{{ route('booking.status',[$booking->id,'2']) }}','Do You Want To Change The Status As Cancel')"><i
                                        class="fas fa-close"></i> Cancel </a>
                                @endif
                                <a class="dropdown-item delete-booking" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="delconf('{{ route('booking.delete',$booking->id) }}')"><i
                                        class="far fa-trash-alt"></i>&nbsp;Delete</a>
                                <div class="dropdown-divider"></div>
                                @if ($booking->status == 1)
                                <a class="dropdown-item delete-booking" href="javascript:void(0)" class="btn btn-danger"
                                    title=""
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
</div>
@endsection

@push('css')

@endpush

@push('js')
<script>
    $(document).ready(function () {
        $('#bookings').dataTable({
            "booking": [
                [0, "desc"]
            ],
            "language": {
                "emptyTable": "No data available in the table",
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-dark"></i>',
                    "next": '<i class="fas fa-chevron-right text-dark"></i>'
                },
                "sEmptyTable": "No data available in the table"
            }

        });

        $(function () {
            $(".datepicker").datepicker({
                maxDate: new Date()
            });
        });
    });

</script>
@endpush
