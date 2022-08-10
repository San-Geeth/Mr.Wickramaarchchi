@extends('PublicArea.Layouts.app')

@section('content')
<!-- Start slider -->
<div class="slider-area">
    <div class="slider-item-active">
        <!-- Single -->
        <div class="slider-item">
            <div class="slider-bg1 slider-height hero-overly slider-bg1 d-flex align-items-center ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10">
                            <div class="slide-content">
                                <h1>Pricing</h1>
                                {{-- <img src="PublicArea/img/icon/signature.png" alt=""> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="slider-caption2">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-7 col-sm-8">
                <div class="slide-content2">
                    <h4>
                        <dd class="text-warning">MR.Wickramaarachchi</dd><span>Videography</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!--? Pricing Card Start -->
@foreach ($categories as $category)
<section class="pricing-card-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-tittle mb-60 text-center">
                    <h2><span class="text-warning">{{ $category->name }}</span> plan</h2>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($category->events as $event)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                <div class="single-card text-center mb-30">
                    <div class="card-top">
                        <img src="{{ config('images.access_path') . '/' . $event->primaryImage->images->name }}" alt="">
                        <h4>{{ $event->package->name }}</h4>
                        <p>{{ $event->name }}</p>
                    </div>
                    <div class="card-mid">
                        <h4>{{ $event->price }}</h4>
                    </div>
                    <div class="card-bottom">
                        {!! $event->description !!}
                        <a href="{{ route('booking') }}" class="border-btn get-btn">Get Started</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach

@endsection
