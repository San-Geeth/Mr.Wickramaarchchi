@extends('Layouts.app')
@section('title', 'All packages | MR. Wickramaarachchi Videography')
@section('header')
<div class="pb-6 header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="py-4 row align-items-center">
                <div class="col-lg-8">
                    <h6 class="mb-0 h2 text-dark d-inline-block">Package Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Package Management
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="text-right col-lg-4">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#new-package"
                        class="float-right  btn btn-sm btn-neutral">
                        <i class="fa fa-plus-circle"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="border-0 shadow card">
    <div class="py-4 table-responsive">
        <table id="packages" class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($packages as $key=>$package)
                <tr>
                    <td>{{'#cat'.sprintf('%08d',  $package->id) }}</td>
                    <td>
                        {{ $package->name }}
                    </td>

                    <td>
                        {!! $tc->getStatus($package->status) !!}
                    </td>
                    <td>
                        <div class="mb-1 dropdown no-arrow">
                            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </a>
                            <div class="shadow dropdown-menu dropdown-menu-left animated--fade-in"
                                aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item edit-product" href="javascript:void(0)"
                                    onclick="packageEditModel('{{ $package->id }}')" class="btn btn-warning" title="">
                                    <i class="fas fa-edit"></i>&nbsp;Edit
                                </a>
                                <a class="dropdown-item delete-product" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="delconf('{{ route('packages.delete',$package->id) }}')"><i
                                        class="far fa-trash-alt"></i>&nbsp;Delete</a>
                                @if ($package->status == 1)
                                <a class="dropdown-item change-status" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="decline('{{ route('packages.status.change',$package->id) }}')"><i
                                        class="fas fa-times-circle"></i>&nbsp;Draft</a>
                                @else
                                <a class="dropdown-item change-status" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="approve('{{ route('packages.status.change',$package->id) }}')"><i
                                        class="far fa-check-square"></i>&nbsp;Publish</a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" id="new-package" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inp_name"><b>Name</b> </label>
                                <input id="inp_name" class="form-control form-control-alternative" type="text"
                                    placeholder="Enter package Name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <h6 class="text-center responsive-mobile">
                                    <button id="submit-btn" type="submit" class="btn btn-info">
                                        Create package
                                    </button>
                                </h6>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" id="packageEdit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit package</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="packageEditContent">

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#packages').dataTable({
            "language": {
                "emptyTable": "No data available in the table",
                "paginate": {
                    "previous": '<i class="ni ni-bold-left"></i>',
                    "next": '<i class="ni ni-bold-right"></i>'
                },
                "sEmptyTable": "No data available in the table"
            }

        });
    });

    function packageEditModel(element) {
        var package_id = element;
        var data = {
            package_id: package_id,
        };
        $.ajax({
            url: "{{ route('packages.edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: '',
            data: data,
            success: function (response) {
                $('#packageEdit').modal('show');
                $('#packageEditContent').html(response);

            }
        });
    }

</script>
@endsection
