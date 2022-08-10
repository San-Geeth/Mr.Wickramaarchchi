@extends('Layouts.app')
@section('title', "Home | Studio")
@section('header')
<div class="pb-6 header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="py-4 col align-items-center">
                <h6 class="mb-0 h2 text-dark d-inline-block">Dashboard</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-block ">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-0 card-title text-uppercase text-muted">Total Bookings</h5>
                        <span class="mb-0 h2 font-weight-bold">{{ $tc->totalCountOfBookings() }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="text-white shadow icon icon-shape rounded-circle" style="background: #4b6cb7;">
                            <i class="ni ni-chart-bar-32"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a class="mr-2 text-success" href="{{ route('booking.all') }}"><i
                            class="fas fa-arrow-circle-right"></i>
                        More info</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-0 card-title text-uppercase text-muted">Total Active Events</h5>
                        <span class="mb-0 h2 font-weight-bold"> {{ $tc->totalCountOfEvents() }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="text-white shadow icon icon-shape rounded-circle" style="background: #4b6cb7;">
                            <i class="ni ni-bulb-61"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a class="mr-2 text-success" href="{{ route('events.all') }}"><i
                            class="fas fa-arrow-circle-right"></i> More
                        info</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-0 card-title text-uppercase text-muted">Monthly Profit</h5>
                        <span class="mb-0 h2 font-weight-bold">Rs </span>
                    </div>
                    <div class="col-auto">
                        <div class="text-white shadow icon icon-shape rounded-circle" style="background: #4b6cb7;">
                            <i class="ni ni-money-coins"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a class="mr-2 text-success" href=""><i
                            class="fas fa-arrow-circle-right"></i> More
                        info</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-0 card-title text-uppercase text-muted">New Requests</h5>
                        <span class="mb-0 h2 font-weight-bold">{{ $tc->totalCountOfUnreadVisitorRequests() }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="text-white shadow icon icon-shape rounded-circle" style="background: #4b6cb7;">
                            <i class="ni ni-chat-round"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a class="mr-2 text-success" href="{{ route('requests.all') }}"><i
                            class="fas fa-arrow-circle-right"></i> More
                        info</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card bg-default">
            <div class="bg-transparent card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="mb-1 text-light text-uppercase ls-1">Overview</h6>
                        <h5 class="mb-0 text-white h3">Total Profit value</h5>
                    </div>
                    <div class="col">
                        <ul class="nav nav-pills justify-content-end">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                    <!-- Chart wrapper -->
                    <canvas id="chart-sales-dark1" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="bg-transparent card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="mb-1 text-uppercase text-muted ls-1">Performance</h6>
                        <h5 class="mb-0 h3">Total Booking</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                    <canvas id="chart-bars1" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="border-0 card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Most Booking Events</h3>
                    </div>
                    <div class="text-right col">
                        <a href="" class="btn btn-sm btn-primary">See all</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Name</th>
                            <th scope="col">Booking Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($popular as $popular_item)
                        <tr>
                            <td>
                                {!! $tc->allImage($popular_item->events->primaryImage?$popular_item->events->primaryImage->images:'') !!}
                            </td>
                            <td>
                                {{ $popular_item->events->name }}
                            </td>
                            <td>
                                {{ $popular_item->count }}
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
<script>


    var BarsChart = (function () {

        var $chart = $('#chart-bars1');

        // Init chart
        function initChart($chart) {
            // Create chart
            var ordersChart = new Chart($chart, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: 'Sales',
                        data: [{{ $bookingData['jan'] }}, {{ $bookingData['feb'] }}, {{ $bookingData['mar'] }}, {{ $bookingData['apr'] }}, {{ $bookingData['may'] }}, {{ $bookingData['jun'] }}, {{ $bookingData['jul'] }}, {{ $bookingData['aug'] }}, {{ $bookingData['sep'] }}, {{ $bookingData['oct'] }}, {{ $bookingData['nov'] }},
                    {{ $bookingData['dec'] }}]
                    }]
                }
            });
            // Save to jQuery object
            $chart.data('chart', ordersChart);
        }
        // Init chart
        if ($chart.length) {
            initChart($chart);
        }
    })();


</script>
@endpush
