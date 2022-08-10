@extends('Layouts.app')
@section('title', 'All Customers | Studio')
@section('header')
<div class="header  pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8">
                    <h6 class="h2 text-dark d-inline-block mb-0">Customer Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Customer Management
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-4 text-right">
                    <a href="{{ route('customers.new') }}" class=" btn btn-sm btn-neutral float-right">
                        <i class="fa fa-plus-circle"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card border-0 shadow">
    <div class="table-responsive py-4">
        <table id="categories" class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($customers as $key=>$customer)
                <tr>
                    <td>{{'#cus'.sprintf('%08d',  $customer->id) }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->mobile_no }}</td>
                    <td>
                        <div class="dropdown no-arrow mb-1">
                            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item edit-product"
                                    href="{{ route('customers.view',$customer->id) }}" class="btn btn-warning"
                                    title="">
                                    <i class="fa fa-eye"></i>&nbsp;View
                                </a>
                                <a class="dropdown-item edit-product"
                                    href="{{ route('customers.edit',$customer->id) }}" class="btn btn-warning"
                                    title="">
                                    <i class="fas fa-edit"></i>&nbsp;Edit
                                </a>
                                <a class="dropdown-item delete-product" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="delconf('{{ route('customers.delete',$customer->id) }}')"><i
                                        class="far fa-trash-alt"></i>&nbsp;Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('#customer-menu').toggle();
        $('#categories').dataTable({
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
</script>
@endpush
