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
                            <li class="breadcrumb-item active" aria-current="page">
                                Portfolio Management
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-4 text-right">
                    <div>
                        <a href="{{ route('portfolios.new') }}" class=" btn btn-sm btn-neutral float-right">
                            <i class=" fa fa-plus-circle"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card border-0 shadow">
    <div class="table-responsive py-4">
        <table class="table" id="datatableid" class="dataTables">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Images</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $key=>$portfolio)
                <tr class="ok">
                    <td>{{'#evt'.sprintf('%08d',  $portfolio->id) }}</td>
                    <td>
                        {{ $tc->limitStr($portfolio->name,40) }}
                    </td>
                    <td>
                        {!! $tc->allImage($portfolio->primaryImage?$portfolio->primaryImage->images:'') !!}
                    </td>
                    <td>Rs {{ $tc->priceFormat($portfolio->price) }}</td>
                    <td>
                        {{ $tc->limitStr($portfolio->category?$portfolio->category->name:'',40) }}
                    </td>
                    <td>
                        {!! $tc->getStatus($portfolio->status) !!}
                    </td>
                    <td>
                        <div class="dropdown no-arrow mb-1">
                            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> </a>
                            <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item show-product" target="blank"
                                    href="{{ config('app.public_path').'/view/portfolio/'.$portfolio->slug }}"
                                    class="btn btn-danger text-danger" title=""><i class="fa fa-eye "></i>&nbsp;View</a>
                                <a class="dropdown-item edit-product" href="{{ route('portfolios.edit',$portfolio->id) }}"
                                    class="btn btn-warning" title="">
                                    <i class="fas fa-edit"></i>&nbsp;Edit
                                </a>
                                <a class="dropdown-item delete-product" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="delconf('{{ route('portfolios.delete',$portfolio->id) }}')"><i
                                        class="far fa-trash-alt"></i>&nbsp;Delete</a>
                                @if ($portfolio->status == 1)
                                <a class="dropdown-item change-status" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="decline('{{ route('portfolios.status.change',$portfolio->id) }}')"><i
                                        class="fas fa-times-circle"></i>&nbsp;Draft</a>
                                @else
                                <a class="dropdown-item change-status" href="javascript:void(0)" class="btn btn-danger"
                                    title="" onclick="approve('{{ route('portfolios.status.change',$portfolio->id) }}','Do You Want To Publish It')"><i
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

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#datatableid').dataTable({
            "language": {
                "emptyTable": "No data available in the table",
                "paginate": {
                    "previous": '<i class="ni ni-bold-left"></i>',
                    "next": '<i class="ni ni-bold-right"></i>'
                },
                "sEmptyTable": "No data available in the table"
            },

        });
    });
</script>
@endsection
