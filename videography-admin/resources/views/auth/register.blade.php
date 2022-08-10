@extends('Layouts.log')
@section('title', 'Admin Login | MR. Wickramaarachchi Videography.lk')
@section('header')
<div class="header py-7 py-lg-8">
    <div class="container">
        <div class="text-center header-body mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">Welcome! MR. Wickramaarachchi Videography.lk</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container pb-5 mt--8">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="border-0 shadow card bg-secondary">
                <div class="card-body px-lg-5 py-lg-5">
                    <form role="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="mb-3 input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" placeholder="Name" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Email" type="email" name="email"
                                    :value="old('email')" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Password" type="password" name="password"
                                    required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Confirm Password" type="password"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="my-4 row">
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" name="terms" id="terms" type="checkbox">
                                    <label class="custom-control-label" for="terms">
                                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="mt-4 btn btn-primary">Create account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
