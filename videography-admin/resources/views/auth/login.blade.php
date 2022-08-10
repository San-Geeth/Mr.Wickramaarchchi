@extends('Layouts.log')
@section('title', 'Admin Login | MR. Wickramaarachchi Videography.lk')
@section('header')
<div class="header py-7 py-lg-8">
    <div class="container">
        <div class="text-center header-body mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">MR. Wickramaarachchi Videography</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container mt--8">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="border-0 shadow card bg-secondary">
                <div class="card-body px-lg-5 py-lg-5">
                    <form method="POST" action="{{ route('login') }}" role="form">
                        @csrf
                        <div class="mb-3 form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Email" type="email" name="email"
                                    :value="old('email')" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Password" type="password" id="password"
                                    name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="remember_me" name="remember">
                            <label class="custom-control-label" for="remember_me">
                                <span class="text-muted">Remember me</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="my-4 btn btn-primary">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
