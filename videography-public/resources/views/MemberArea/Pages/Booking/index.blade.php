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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('booking.all') }}">My Booking</a></li>
                            <li class="breadcrumb-item active">new</li>
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
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card text-left">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title"><b>Booking Title </b> </label>
                                        <input id="title" class="form-control  form-control-alternative" type="text"
                                            name="title" placeholder="Event Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_id"><b>Events </b> </label>
                                        <select class="form-control z-index show-tick select-option"
                                            data-live-search="true" name="event_id" id="select-event" required>
                                            @foreach ($events as $event)
                                            <option value="{{ $event->id }}">{!! $event->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="inp_date">Select Date</label>
                                        <input class="form-control form-control-alternative"
                                            autocomplete="off" onchange="dateAvailable()" id="inp_date" type="text"
                                            name="date" placeholder="Select Date" required>
                                        <sub id="date_text"></sub>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="inp_note">Note</label>
                                        <textarea class="form-control form-control-alternative" id="inp_note" type="text"
                                        name="note" placeholder="Enter Note about booking" cols="30" rows="5"></textarea>
                                    </div>

                                    <h2 class="text-center">
                                        <input type="hidden" name="customer_id" value="{{ Auth::id() }}">
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
</div>
@endsection

@push('cdnCss')
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="{{ asset('MemberArea/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />

<noscript>
    <link rel="stylesheet" href="{{ asset('MemberArea/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
</noscript>
@endpush

@push('css')
<style>
    .select-option {
        padding: 0px;
    }

</style>
@endpush

@section('js')
<script>
    $(document).ready(function () {
        $('#select-event').selectpicker();
        $('#select-event').selectpicker('refresh');
        $('#select-event').selectpicker().trigger('change');

        $(function () {
            $("#inp_date").datepicker({
                minDate: new Date()
            });
        });
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
                if (response == 1) {
                    $("#submit-btn").prop("disabled", false);
                    $('#date_text').removeClass('text-danger').addClass('text-success').html(
                        "Date is Available");
                } else {
                    $("#submit-btn").prop("disabled", true);
                    $('#date_text').addClass('text-danger').removeClass('text-success').html(
                        "Date is Unavailable");
                }
            }
        });
    }

</script>
@endsection
