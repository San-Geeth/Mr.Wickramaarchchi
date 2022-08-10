@extends('Layouts.app')
@section('header')
<div class="header  pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8">
                    <h6 class="h2 text-dark d-inline-block mb-0">Event Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('events.all') }}">
                                    Event Management
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit
                                {{'#Evt-'.sprintf('%08d',  $event->id) }}</li>
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
    <form role="form" action="{{route('events.update',$event->id)}}" id="updateItemForm" method="POST"
        enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">Event Information</h6>
                            <div class="pl-lg-1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Title</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-alternative  get-title @error('name') is-invalid @enderror"
                                                value="{{$event['name']}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Introduction</label>
                                            <textarea name="introduction" id="introduction" rows="2"
                                                class="form-control  form-control-alternative"
                                                required>{{$event['introduction']}}</textarea>
                                            @error('introduction')
                                            <div class="alert alert-danger"></div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Description</label>
                                            <textarea class="form-control form-control-alternative" name="description"
                                                id="description" cols="30" rows="10"
                                                required>{{$event['description']}}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger"></div>
                                            @enderror
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
                                            <label class="form-control-label" for="input-name">Price</label>
                                            <input type="number" min="0" step="50" id="buy_price" name="buy_price"
                                                class="form-control form-control-alternative   @error('price') is-invalid @enderror"
                                                value="{{ number_format((float)$event['price'], 2, '.', '')  }}"
                                                required>
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
                                        @if ($event->primaryImage != null)
                                        <div class="item">
                                            <div class="container"
                                                data-bgimgslide="{{config('images.access_path').'/thumb/960x960/'.$event->primaryImage->images->name}}"
                                                style="height: 20vh;">
                                                <img src="">
                                                <div class="top-left-Primary mr-5">Primary</div>
                                            </div>
                                        </div>
                                        @endif
                                        @foreach ($event->secondaryImages as $event_image)
                                        <div class="item">
                                            <div class="container"
                                                data-bgimgslide="{{config('images.access_path').'/thumb/960x960/'.$event_image->images->name}}"
                                                style="height: 20vh;">
                                                <img src="">
                                            </div>
                                            <div class="dropdown no-arrow dropdown-items top-left-Primary ml-5"
                                                style="background: rgba(0, 0, 0, 0.384)">
                                                <a class="btn btn-sm btn-icon-only text-dark mx-auto text-center"
                                                    href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-image  dropdown-menu-left shadow animated--fade-in mt-5"
                                                    aria-labelledby="dropdownMenuButton" x-placement="bottom-start">
                                                    <a class="dropdown-item show-product" href="{{ route('events.image.status',[$event_image->id,'1']) }}"><i class="fa fa-check "></i>
                                                        Primary</a>
                                                    @if ($event_image->status=="3")
                                                    <a class="dropdown-item edit-product" href="{{ route('events.image.status',[$event_image->id,'2']) }}">
                                                        <i class="fas fa-upload"> </i> Active
                                                    </a>
                                                    @endif
                                                    @if ($event_image->status=="2")
                                                    <a class="dropdown-item edit-product" href="{{ route('events.image.status',[$event_image->id,'3']) }}">
                                                        <i class="fas fa-times"></i> Disable
                                                    </a>
                                                    @endif
                                                    @if ($event_image->status!="1")
                                                    <a class="dropdown-item delete-image" href="{{ route('events.image.delete',$event_image->id) }}"><i
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
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12  ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pl-lg-1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Slug</label>
                                            <input type="text" id="slugvalue"
                                                class="form-control form-control-alternative get-slug @error('slug') is-invalid @enderror"
                                                value="{{ $event['slug'] }}">
                                            <input type="hidden" name="slug" id="slugvaluelast"
                                                value="{{ $event['slug'] }}">
                                            <input type="hidden" name="rmslug" id="rmslug" value="#">
                                            <h5 id="sulg_msg" class="text-center"></h5>
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
                            <div class="1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-control-label">Category</label>
                                        <select class="form-control select2 category-selector" name="category_id"
                                            required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-control-label">Event</label>
                                        <select class="form-control select2 event-selector" name="event_id" required>
                                            @foreach ($packages as $package)
                                            <option value="{{ $package->id }}"
                                                {{ $event->package_id == $package->id ? 'selected' : '' }}>
                                                {{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="position: sticky; top:80%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="pl-lg-1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class=" text-center">
                                                <input type="hidden" id="item_id" name="item_id"
                                                    value="{{ $event['id'] }}">
                                                <button type="submit" class="btn btn-info mb-2"
                                                    id="update_button">Update Item</button>
                                                <a href="{{  route('events.all') }}"
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
                        <form action="{{route('events.store.image')}}" enctype="multipart/form-data" method="post">
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
                                <input type="hidden" name="id" value="{{ $event['id'] }}">
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

    CKEDITOR.replace('description');

    $(document).ready(function () {
        $('.loader').hide();

        $('.dropify').dropify();

        var owl = $("#owl-demo");
        var owlRelated = $("#owl-related");
        owl.owlCarousel();
        owlRelated.owlCarousel();

        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
        var tempvalue = null;
        $('.get-title').on('keyup', function () {
            var new_title = document.getElementById("name").value;
            var slag_temp = document.getElementById("slagv");
            var slugvalue = document.getElementById("slugvalue");
            var sulg_msg = document.getElementById("sulg_msg");
            var slugvaluelast = document.getElementById("slugvaluelast");
            var tempvaluelast = null;
            var tempvalueset = null;
            var i;
            new_title = new_title.toLowerCase();
            tempvalue = new_title.replace(/[&\/\\#, +()$~%.'"|:*?<>{}]/g, '-');
            tempvalueset = new_title.replace(/[&\/\\#, +()$~%.'"|:*?<>{}]/g, '-');
            tempvaluelast = tempvalue.charAt(tempvalue.length - 1);
            if (tempvaluelast == '-') {
                tempvalue = tempvalue.substring(0, tempvalue.length - 1);
            }
            for (i = 0; i < new_title.length; i++) {
                var n = tempvalue.lastIndexOf("-");
                var n1 = tempvalue.length;
                if (n == (n1 - 1)) {
                    tempvalue = tempvalue.substring(0, tempvalue.length - 1);
                }
            }
            if (tempvalue.length < 4) {
                sulg_msg.innerHTML = "Add more than 4 character";
                sulg_msg.classList.add("text-danger");
                sulg_msg.classList.remove("text-success");
                $("#update_button").prop("disabled", true);
            } else {
                $.ajax({
                    url: "{{ route('events.check.slug') }}",
                    method: "GET",
                    data: {
                        slug: tempvalue
                    },
                    success: function (result) {
                        if (result == 'unique') {
                            sulg_msg.innerHTML = "Slug available";
                            sulg_msg.classList.remove("text-danger");
                            sulg_msg.classList.add("text-success");
                            $("#update_button").prop("disabled", false);
                        } else {
                            sulg_msg.innerHTML = "The slug already exists";
                            sulg_msg.classList.add("text-danger");
                            sulg_msg.classList.remove("text-success");
                            $("#update_button").prop("disabled", true);
                        }
                    }
                })
            }
            slugvalue.innerHTML = tempvalue;
            slugvaluelast.value = tempvalue;
            slugvalue.value = tempvalue;
            $('.get-slug').on('keyup', function () {
                var slugvaluenew = $("#slugvalue").val();
                slugvaluenew = slugvaluenew.toLowerCase();
                tempvalue = slugvaluenew.replace(/[&\/\\#, +()$~%.'"|:*?<>{}]/g, '-');
                tempvalueset = slugvaluenew.replace(/[&\/\\#, +()$~%.'"|:*?<>{}]/g, '-');
                tempvaluelast = tempvalue.charAt(tempvalue.length - 1);
                if (tempvaluelast == '-') {
                    tempvalue = tempvalue.substring(0, tempvalue.length - 1);
                }
                for (i = 0; i < slugvaluenew.length; i++) {
                    var n = tempvalue.lastIndexOf("-");
                    var n1 = tempvalue.length;
                    if (n == (n1 - 1)) {
                        tempvalue = tempvalue.substring(0, tempvalue.length - 1);
                    }
                }
                slugvalue.innerHTML = tempvalue;
                slugvaluelast.value = tempvalue;
                if (tempvalue.length < 4) {
                    sulg_msg.innerHTML = "Add more than 4 character";
                    sulg_msg.classList.add("text-danger");
                    sulg_msg.classList.remove("text-success");
                    $("#update_button").prop("disabled", true);
                } else {
                    $.ajax({
                        url: "{{ route('events.check.slug') }}",
                        method: "GET",
                        data: {
                            slug: tempvalue
                        },
                        success: function (result) {
                            if (result == 'unique') {
                                sulg_msg.innerHTML = "slug available";
                                sulg_msg.classList.remove("text-danger");
                                sulg_msg.classList.add("text-success");
                                $("#update_button").prop("disabled", false);
                            } else {
                                sulg_msg.innerHTML = "The slug already exists";
                                sulg_msg.classList.add("text-danger");
                                sulg_msg.classList.remove("text-success");
                                $("#update_button").prop("disabled", true);
                            }
                        }
                    })
                }
            });
        });
    });

    $('.category-selector').select2({
        placeholder: "Select A Category",
    });
    $(".tag-selector").select2({
        placeholder: "Select Tags",
    });
    $(".item-selector").select2({
        placeholder: "Select items",
        dropdownParent: $('#addRelatedModal')
    });
    $(".event-selector").select2({
        placeholder: "Select event",
    });
</script>
@endsection
