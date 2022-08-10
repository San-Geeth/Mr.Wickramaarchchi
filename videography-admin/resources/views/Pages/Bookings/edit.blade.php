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
                            <li class="breadcrumb-item">
                                <a href="{{ route('booking.all') }}">
                                    Booking Management
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <form action="{{ route('booking.update',$booking->id) }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-xl-8 ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card text-left">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title"><b>Booking Title </b> </label>
                                    <input id="title" class="form-control  form-control-alternative" type="text" value="{{ $booking->title }}"
                                        name="title" placeholder="Event Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="customer_id"><b>Customer </b> </label>
                                    <select class="form-control select2" name="customer_id" id="select-customer"
                                        required>
                                        <option value=""></option>
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>{!! $customer->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customer_id"><b>Events </b> </label>
                                    <select class="form-control select2" name="event_id" id="select-event" required>
                                        <option value=""></option>
                                        @foreach ($events as $event)
                                        <option value="{{ $event->id }}" {{ $booking->event_id == $event->id ? 'selected' : '' }}>{!! $event->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="inp_date">Select Date</label>
                                    <input class="form-control form-control-alternative datepicker" autocomplete="off" value="{{ \carbon\Carbon::parse($booking->date)->format('m/d/Y') }}"
                                        onchange="dateAvailable()" id="inp_date" type="text" name="date"
                                        placeholder="Select Date" required>
                                    <sub id="date_text"></sub>
                                </div>

                                <h2 class="text-center">
                                    <button type="submit" id="submit-btn" class="btn btn-info" disabled>
                                        Booking Event <strong><i class="fa fa-angle-double-right"></i></strong>
                                    </button>
                                </h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#select-customer').select2({
            placeholder: "Select customer",
        });

        $('#select-event').select2({
            placeholder: "Select Event",
        });

        $(function () {
            $(".datepicker").datepicker({
                minDate: new Date()
            });
        });

        // dateAvailable();
    });

    function dateAvailable() {
        var date = $('#inp_date').val();

        var data = {
            date: date,
        };
        $.ajax({
            url: "{{ route('booking.check.date') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: '',
            data: data,
            success: function (response) {
                if(response == 1){
                    $("#submit-btn").prop("disabled", false);
                    $('#date_text').removeClass('text-danger').addClass('text-success').html("Date is Available");
                }else{
                    $("#submit-btn").prop("disabled", true);
                    $('#date_text').addClass('text-danger').removeClass('text-success').html("Date is Unavailable");
                }
            }
        });
    }

</script>
@endsection
