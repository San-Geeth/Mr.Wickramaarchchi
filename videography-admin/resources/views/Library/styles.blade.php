{{-- <link rel="stylesheet" href="{{ asset('css/argon-dashboard.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/argon-dashboard.css.map') }}" type="text/css"> --}}
<link rel="stylesheet" href="{{ asset('css/argonpro.css') }}" type="text/css">


<!-- Favicon -->
<link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="{{ asset('js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
<link href="{{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
<!-- CSS Files -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
    integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ=="
    crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css">

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css"
    integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ=="
    crossorigin="anonymous" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />

<style>
    .breadcrumb-dark .breadcrumb-item a {
        color: #263396;
    }

    .breadcrumb-dark .breadcrumb-item a:hover {
        color: #263396;
    }

    .breadcrumb-dark .breadcrumb-item.active {
        color: #263396;
    }

    .breadcrumb-dark .breadcrumb-item+.breadcrumb-item::before {
        color: #263396;
    }

    .breadcrumb-dark .breadcrumb-item a {
        color: #263396;
    }

    .breadcrumb-dark .breadcrumb-item a:hover {
        color: rgb(10, 10, 10);
    }

    .breadcrumb-dark .breadcrumb-item.active {
        color: #263396;
    }

    .breadcrumb-dark .breadcrumb-item+.breadcrumb-item::before {
        color: #263396;
    }

    .breadcrumb-dark i {
        color: #263396;
    }


    .navbar-light .navbar-nav .nav-link i {
        color: #263396;
    }

    .bg-primary {
        background-color: #263396;
    }

    .btn-neutral {
        color: #263396;
    }


    .btn-info {
        color: #fff;
        border-color: #263396;
        background-color: #263396;
    }

    .btn-info.disabled,
    .btn-info:disabled {
        color: #fff;
        border-color: rgb(81, 129, 118);
        background-color: rgb(90, 145, 132);
    }

    .btn-info:hover {
        color: #fff;
        border-color: rgb(81, 129, 118);
        background-color: rgb(75, 190, 164);
    }

    .btn-group-sm>.btn,
    .btn-sm {
        margin-right: 10px;
    }

    .nav-link {
        color: white;
    }

    .nav-link:hover {
        color: black;
    }

    .navbar-vertical.navbar-expand-xs .navbar-nav>.nav-item>.nav-link.active {
        margin-right: .5rem;
        margin-left: .5rem;
        padding-right: 1rem;
        padding-left: 1rem;
        border-radius: .375rem;
        background: #f6f9fc;
    }

    .sidenav-header .text-primary p {
        color: black !important;
        font-size: 0.8rem;
    }

    .sidenav-header .text-primary img {
        max-height: 3rem;
    }

    .sidenav-header .text-primary p:hover {
        color: #263396;
         !important;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        border-color: #263396;
        background-color: #263396;
    }

    .modal-dialog {
        max-width: 700px;

    }

    .modal-header {
        background-color: #263396;
    }

    .modal-title {
        color: white;
    }

    .modal-body-image {
        text-align-last: center;
    }

    .modal-body-image img {
        width: 300px;
        height: auto;
        margin-right: 10px;
    }

    .carousel-inner img {
        width: 100%;
        height: auto;
    }

    .product_d_right {
        font-size: 15px;
    }

    .product_details .product_d_left img {
        width: 800px;
    }

    .sidenav-header .text-primary img {
        max-height: 6.5rem;
    }

    .dixVh63 {
        min-height: 63vh;
    }

    .select2-container .select2-selection--single {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }

    .select2-selection.select2-selection--multiple {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }


    .select2-container .select2-selection--single:focus {
        border: none;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .select2-selection.select2-selection--multiple:focus {
        border: none;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #000000;
        background-color: #ffffff;
        border: 2px #000000 solid;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected],
    .select2-container--default .select2-results__option[aria-selected=true] {
        color: #16181b;
        background-color: #ddd;
    }

    .select2-results__option:focus,
    .select2-results__option:hover {
        text-decoration: none;
        color: #16181b;
        background-color: rgb(4, 194, 150) !important;
    }

    .bg-pending {
        color: #fff;
        background-color: #dc3545;
    }

    .bg-paid {
        color: #fff;
        background-color: #007bff;
    }

    .bg-shipping {
        color: #fff;
        background-color: #17a2b8;
    }

    .bg-delivered {
        color: #fff;
        background-color: #28a745;
    }

    .bg-reviewed {
        color: #fff;
        background-color: #343a40;
    }

    .bg-shop {
        color: #fff;
        background-color: #010e1b;
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

</style>

@yield('css')
