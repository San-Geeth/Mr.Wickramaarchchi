@extends('Layouts.app')
@section('header')
<div class="header  pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8">
                    <h6 class="h2 text-dark d-inline-block mb-0">Portfolio Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('portfolios.all') }}">
                                    Portfolio Management
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
<div class="row justify-content-center">
    <div class="col-lg-8 ">
        <div class="card">
            <div class="card-body">
                @if ($categories->isEmpty())
                <h2>Please add category before add Portfolio</h2>
                @else
                <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Title</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-alternative  get-title @error('item_name') is-invalid @enderror"
                                        value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12  ">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="pl-lg-1">
                        <div class="row ">
                            <div class="col-lg-12">
                                <label class="form-control-label">Category</label>
                                <select class="form-control select2 category-selector" name="category_id" required>
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="pl-lg-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class=" text-center">
                                    <button type="submit" class="btn btn-info" id="add_button">Continue to Next Step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endif
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {

    });

    $('.category-selector').select2({
        placeholder: "Select Category",
        theme:'bootstrap'
    });
</script>
@endsection

@section('css')
    <style>
        .select2-container .select2-selection--single {
            transition: box-shadow .15s ease;
            border: 0;
            height: auto;
            box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
        }

    </style>
@endsection
