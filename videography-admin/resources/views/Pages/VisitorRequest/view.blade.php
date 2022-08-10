@extends('Layouts.app')
@section('header')
<div class="header  pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8">
                    <h6 class="h2 text-dark d-inline-block mb-0">Request Management </h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('requests.all') }}">
                                    Request Management
                                </a>
                            </li>
                            @if ($visitors != null)
                            <li class="breadcrumb-item active" aria-current="page">
                                {{'#rqm-'.sprintf('%08d',  $visitors->id) }}</li>
                            @else
                            <li class="breadcrumb-item active" aria-current="page">view</li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mt-5">
            <div class="card-body">
                @if ($visitors != null)
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-6 mb-20">
                            <div class="form-group">
                                <strong>Name&nbsp;</strong>
                                <p>{{ $visitors->name }}</p>
                            </div>
                        </div>
                        <div class="col-6 mb-20">
                            <div class="form-group">
                                <strong>Email</strong>
                                <p>{{ $visitors->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-20">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Subject&nbsp;</strong>
                                <p>{{ $visitors->subject }}</p>
                            </div>
                        </div>
                        <div class="col-6 mb-20">
                            <div class="form-group">
                                <strong>Date&nbsp;</strong>
                                <p>{{ $visitors->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <strong>Message&nbsp;</strong>
                    <p>{{ $visitors->message }}</p>
                </div>
                @else
                <div class="col-12 text-center">
                    <strong><h2>Visitor Request Not Found</h2></strong>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    .card {
        position: relative;
        min-height: 300px;
        width: 900px;
    }
</style>

@endsection