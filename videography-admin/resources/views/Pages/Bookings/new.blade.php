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
                            <li class="breadcrumb-item active" aria-current="page">New</li>
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
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-xl-8 ">
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
                                    <label for="customer_id"><b>Customer </b> </label>
                                    <select class="form-control select2" name="customer_id" id="select-customer"
                                        required>
                                        <option value=""></option>
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{!! $customer->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customer_id"><b>Events </b> </label>
                                    <select class="form-control select2" name="event_id" id="select-event" required>
                                        <option value=""></option>
                                        @foreach ($events as $event)
                                        <option value="{{ $event->id }}">{!! $event->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="inp_date">Select Date</label>
                                    <input class="form-control form-control-alternative datepicker" autocomplete="off"
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

@section('css')
<style>
    .datepicker-container {
        z-index: 10000 !important;
    }

    @media screen and (max-width: 767px) {

        div.dataTables_wrapper div.dataTables_length,
        div.dataTables_wrapper div.dataTables_filter,
        div.dataTables_wrapper div.dataTables_info {
            text-align: left;
        }

        .dataTables_length {
            padding-left: 0.5rem;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            width: 80%;
        }

        .add-new {
            float: left !important;
        }

        .title-page {
            font-size: 1.34rem;
            margin-bottom: 10px !important;
        }

        div.dataTables_paginate {
            padding-left: 150px;
        }
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

</style>
@endsection
