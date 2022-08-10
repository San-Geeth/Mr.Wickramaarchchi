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
                            <li class="breadcrumb-item active" aria-current="page">Edit
                                {{'#Evt-'.sprintf('%08d',  $portfolio->id) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <form role="form" action="{{route('portfolios.update',$portfolio->id)}}" id="updateItemForm" method="POST"
        enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">portfolio Information</h6>
                            <div class="pl-lg-1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Title</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-alternative  get-title @error('name') is-invalid @enderror"
                                                value="{{$portfolio['name']}}" required>
                                        </div>
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
                            <div class="1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-control-label">Category</label>
                                        <select class="form-control select2 category-selector" name="category_id"
                                            required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $portfolio->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
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
                    <div class="card-body" style="overflow: auto !important;">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="card-title form-control-label">Active Image
                                    &nbsp;|&nbsp;
                                    <a href="#" data-toggle="modal" data-target="#imageAddModal"><i class="fa fa-plus"></i></a>
                                </h2>
                            </div>
                            <div class="col-lg-12 ">
                                <div id="owl-demo">
                                    @if ($portfolio->primaryImage != null)
                                    <div class="item">
                                        <div class="container">
                                            <img src="{{config('images.access_path').'/'.$portfolio->primaryImage->images->name}}" class="portfolio_image">
                                            <div class="top-left-Primary mr-5">Primary</div>
                                        </div>
                                    </div>
                                    @endif
                                    @foreach ($portfolio->secondaryImages as $portfolio_image)
                                    <div class="item">
                                        <div class="container">
                                            <img src="{{config('images.access_path').'/'.$portfolio_image->images->name}}" class="portfolio_image">
                                        </div>
                                        <div class="dropdown no-arrow dropdown-items top-left-Primary ml-5"
                                            style="background: rgba(0, 0, 0, 0.384)">
                                            <a class="btn btn-sm btn-icon-only text-dark mx-auto text-center"
                                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-image  dropdown-menu-left shadow animated--fade-in mt-5"
                                                aria-labelledby="dropdownMenuButton" x-placement="bottom-start">
                                                <a class="dropdown-item show-product" href="{{ route('portfolios.image.status',[$portfolio_image->id,'1']) }}"><i class="fa fa-check "></i>
                                                    Primary</a>
                                                @if ($portfolio_image->status=="3")
                                                <a class="dropdown-item edit-product" href="{{ route('portfolios.image.status',[$portfolio_image->id,'2']) }}">
                                                    <i class="fas fa-upload"> </i> Active
                                                </a>
                                                @endif
                                                @if ($portfolio_image->status=="2")
                                                <a class="dropdown-item edit-product" href="{{ route('portfolios.image.status',[$portfolio_image->id,'3']) }}">
                                                    <i class="fas fa-times"></i> Disable
                                                </a>
                                                @endif
                                                @if ($portfolio_image->status!="1")
                                                <a class="dropdown-item delete-image" href="{{ route('portfolios.image.delete',$portfolio_image->id) }}"><i
                                                        class="far fa-trash-alt"></i>&nbsp;Delete</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
                                            <button type="submit" class="btn btn-info mb-2"
                                                id="update_button">Update Item</button>
                                            <a href="{{  route('portfolios.all') }}"
                                                class="btn btn-outline-danger mb-2">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="imageAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card text-white">
                    <div class="card-body">
                        <form action="{{route('portfolios.store.image')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row  mb-3">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <label class="form-control-label">Image</label>
                                        <input type="file" class="form-control form-control-alternative dropify"
                                            name="image" id="inp_image" accept="image/jpg, image/jpeg, image/png"
                                            required>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $portfolio['id'] }}">
                                <input type="hidden" name="status" value="3">
                            </div>
                            <div class="form-group">
                                <button type="submit" id="add-new-image-btn" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
<style>
    .portfolio_image{

    }
    #owl-demo .item {
        margin: 3px;
    }

    #owl-demo .item img {
        right: 16px;
        display: block;
        width: 100%;
        height: auto;
    }

    .customNavigation {
        text-align: center;
    }

    .actionBtn .btn {
        /* font-size: .875rem !important; */
        line-height: 0.5 !important;
        color: #b9b9b9;
    }

    .customNavigation .btn {
        font-size: .875rem !important;
        line-height: 0.5 !important;
    }

    .customNavigation a {
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: rgb(252, 252, 252);
        background: #5abd5a;
    }

    .top-left-Primary {
        position: absolute;
        top: 8px;
        right: 16px;
        font-size: 10px;
        font-weight: 600;
        color: rgb(1, 138, 58);
        background: #ffffff;
        padding: 2px;
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

    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
        margin-left: 40%;
        margin-top: 3vh;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #related_item_image {
        width: 85% !important;
    }

    .badge-primary {
        color: black;
    }

</style>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script>
    $('[data-bgimgslide]').each(function () {
        var bgImgUrl = $(this).data('bgimgslide');
        $(this).css({
            'background-image': 'linear-gradient(rgba(27, 27, 27, 0.16), rgba(5, 5, 5, 0.19)),url(' +
                bgImgUrl + ')',
            "background-size": "auto",
            "background-position": "center",
            "background-size": "cover"
        });
    });

    $(document).ready(function () {
        $('.loader').hide();

        $('.dropify').dropify();

        var owl = $("#owl-demo");
        var owlRelated = $("#owl-related");
        owl.owlCarousel();
        owlRelated.owlCarousel();

        // Custom Navigation portfolios
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
    });

    $('.category-selector').select2({
        placeholder: "Select A Category",
    });
</script>
@endsection
