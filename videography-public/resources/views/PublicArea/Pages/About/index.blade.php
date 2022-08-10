@extends('PublicArea.Layouts.app')

@section('content')

<section class="pt-8 mb-6 mb-lg-7" id=content>
    <div class=container>
        <div class="row no-gutters align-items-center">
            <div class="col-lg-7 order-lg-last posiion-relative z-index-1" data-aos=fade-left
                data-aos-delay=200>
                <div class="bg-primary text-white p-5 px-lg-7 py-lg-6 ml-lg-n5 z-index-1 position-relative">
                    <p class=lead> A Director of photography [DOP] also known as Cinematographer is a creative leader during a video production</p>
                    <p class=lead>It's a position full of responsibility, and the Director of Photography must have camera skills,</p>
                    <p class=lead> Lighting knowledge and the ability to work with the entire camera crew to create the aesthetics of the film.</p>

                </div>
            </div>
            <div class=col-lg data-aos=fade-right>
                <div class="img-shifted shift-left vh-75">
                    <div class="bg-image bg-cover"
                        style="background-image: url(assets/images/home/wick.jpg);" data-jarallax
                        data-speed=.8></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
