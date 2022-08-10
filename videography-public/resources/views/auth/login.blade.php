@extends('PublicArea.Layouts.app')
@section('title', 'Login | MR. Wickramaarachchi Videography')
@section('content')


<section class="main-contact-area ptb-70" style="background-color: #071112;">
    <div class=" text-center pt-5">
        <h2 class="sans-font text-white">Log<span class="text-warning">in</span></h2>
        <p class="text-white">Welcome to MR. Wickramaarchchi Videography</p>
    </div>
    <div class="row mt-3 justify-content-center row-content">
        <div class="col-xl-4 col-lg-6 col-sm-12">
            <div class="card" style="background-color: #071112;">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> {{ implode('', $errors->all(':message')) }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label class="text-white" for=""><b class="text-white">E-mail Address</b></label>
                                    <input type="email" name="email" placeholder="E-mail"
                                        class="form-control text-dark">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-white"><b class="text-white">Password</b></label>
                                    <input class="form-control text-dark" type="password" placeholder="Password"
                                        name="password" required autocomplete="current-password">
                                </div>
                            <div class="col-12 text-center mt-4">
                                <button id="sign-btn" class="btn btn-warning btn-block"
                                    type="submit" name="submit-form" id="submit-btn">
                                    Sign in
                                </button>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="login-action text-center ">
                                    <span class="log-rem text-white">
                                        <input id="remember" type="checkbox" class="form-checkbox" name="remember">
                                        <label for="remember">Remember me!</label>
                                    </span><br>
                                    <span class="forgot-login mr-2 mr-md-0 ">
                                        <a class="text-white" href="#">Forgot your
                                                password?</a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <a class="mt-2 mt-md-0  text-warning" href="{{ route('register') }}">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .row-content {
        margin-right: 0px;
        margin-left: 0px;
    }

    @media screen and (max-width: 768px) {
        .header-banner {
            height: 29vh;
        }
    }
</style>
@endpush
