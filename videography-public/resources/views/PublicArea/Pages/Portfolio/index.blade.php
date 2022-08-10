@extends('PublicArea.Layouts.app')

@section('content')
<section class="slider-area slider-area2 slider-height2 d-flex align-items-center  hero-overly">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-11 col-md-12">
                <div class="hero__caption hero__caption2 text-left">
                    <h2>Portfolio</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="gallery-area section-padding40">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <div class="section-tittle mb-60">
                    <p>Photography is a way of feeling, of touching, of loving. What you have caught on film is captured
                        forever… It remembers little things, long after you have forgotten everything.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-tittle mb-50">
                    <h2>With my camera, I capture your <span class="text-warning">life</span></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            @foreach ($portfolio_images as $image)
            @if ($image->portfolios->status == 1)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="box snake mb-30">
                    <div class="gallery-img small-img "
                        style="background-image: url('{{ config('images.access_path') . '/' . $image->images->name }}');"></div>
                    <figcaption>{{ $image->portfolios->category->name }}</figcaption>
                    <div class="overlay">
                        <div class="overlay-content">
                            <a href="{{ config('images.access_path') . '/' . $image->images->name }}" class="img-pop-up"><i class="ti-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
@push("css")
<style>
    .icon-colour {
        color: #c2c2a3;
    }

</style>
@endpush
