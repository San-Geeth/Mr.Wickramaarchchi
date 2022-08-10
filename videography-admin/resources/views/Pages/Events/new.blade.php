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
                @if ($categories->isEmpty() || $packages->isEmpty())
                <h2>Please add Package and category before add Event</h2>
                @else
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Introduction</label>
                                    <textarea name="introduction" id="introduction" rows="2"
                                        class="form-control  form-control-alternative  " required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <textarea class="form-control form-control-alternative" type="text"
                                        name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror" cols="30"
                                        rows="10" required></textarea>
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
                                        value="">
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
                    <div class="pl-lg-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Price</label>
                                    <input type="number" min="0" id="price" name="price"
                                        class="form-control form-control-alternative @error('price') is-invalid @enderror"
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="pl-lg-1">
                        <div class="row ">
                            <div class="col-lg-12">
                                <label class="form-control-label">Package</label>
                                <select class="form-control select2 package-selector" name="package_id" required>
                                    <option value=""></option>
                                    @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}
                                    </option>
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
                    <div class="pl-lg-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class=" text-center">
                                        <input type="hidden" name="slug" id="slugvaluelast">
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
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $("#add_button").prop("disabled", true);
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
                $("#add_button").prop("disabled", true);
            } else {
                $.ajax({
                    url: "{{ route('events.check.slug') }}",
                    method: "GET",
                    data: {
                        slug: tempvalue
                    },
                    success: function (result) {
                        if (result == 0) {
                            sulg_msg.innerHTML = "Slug available";
                            sulg_msg.classList.remove("text-danger");
                            sulg_msg.classList.add("text-success");
                            $("#add_button").prop("disabled", false);

                        } else {
                            sulg_msg.innerHTML = "The slug already exists";
                            sulg_msg.classList.add("text-danger");
                            sulg_msg.classList.remove("text-success");
                            $("#add_button").prop("disabled", true);
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
                    $("#add_button").prop("disabled", true);
                } else {
                    $.ajax({
                        url: "{{ route('events.check.slug') }}",
                        method: "GET",
                        data: {
                            slug: tempvalue
                        },
                        success: function (result) {
                            if (result == 0) {
                                sulg_msg.innerHTML = "slug available";
                                sulg_msg.classList.remove("text-danger");
                                sulg_msg.classList.add("text-success");
                                $("#add_button").prop("disabled", false);

                            } else {
                                sulg_msg.innerHTML = "The slug already exists";
                                sulg_msg.classList.add("text-danger");
                                sulg_msg.classList.remove("text-success");
                                $("#add_button").prop("disabled", true);
                            }
                        }
                    })
                }
            });
        });
    });

    $('.category-selector').select2({
        placeholder: "Select Category",
        theme:'bootstrap'
    });

    $(".package-selector").select2({
        placeholder: "Select Package",
        theme:'bootstrap'
    });

    CKEDITOR.replace('description');
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
