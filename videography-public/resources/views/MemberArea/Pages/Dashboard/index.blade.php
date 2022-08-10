@extends('MemberArea.Layouts.app')
@section('breadcrumb')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>My Dashboard</h2>
                        <ul class="breadcrumb p-l-0 p-b-0 ">
                            <li class="breadcrumb-item"><a href="#"><i
                                        class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="row ">
 <div class="col-12">
         <div class="text-center">
             <h2>Hi <span class="text-warning"> {{ Auth::user()->name }}</span></h2>
             <h2><span class="text-warning"> Welcome</span> to your dashbord</h2>
         </div>

     </div>
 </div>
@endsection



@push('css')
@include('MemberArea.Pages.Dashboard.Library.styles')
@endpush

@push('cdnJs')
<script defer src="{{ asset('MemberArea/js/pages/tables/jquery-datatable.js') }}"></script>
<script defer src="{{ asset('MemberArea/bundles/datatablescripts.bundle.js') }}"></script>
@endpush

@push('cdnCss')
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

<noscript>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
</noscript>
@endpush
