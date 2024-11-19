@extends('admin/layout')
@section('page_title','Skimmer Volume')
@section('pools_select','active')
@section('container')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Skimmer pool type</h5>
    <div class="card">
        <div class="card-body">
            {{-- <a href="{{ route('admin.skimmer.add') }}" class="btn btn-sm btn-primary float-end mb-2" data-bs-toggle="tooltip" title="Add Skimmer Rate">
                <i class="fa fa-plus"></i>Add Skimmer Rate 
            </a> --}}

            @if(session()->has('message'))
            <div class="alert alert-success d-flex align-items-center justify-content-between" role="alert">
                <p class="mb-0">{{ session('message') }}</p>
                <i class="fa fa-fw fa-times ms-2"></i>
            </div>
            @endif

            <!-- Data Table -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="FoamTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Excavation</th>
                        <th scope="col">Leveling Compaction</th>
                        <th scope="col">Compaction Test</th>
                        <th scope="col">Polyethylene Sheet (1000 Gauge)</th>
                        <th scope="col">Rubble Soling (230 mm)</th>
                        <th scope="col">MSRC PCC (150 mm)</th>
                        <th scope="col">Modular Panels</th>
                        <th scope="col">Overflow Gutter</th>
                        <th scope="col">Fiber Lining</th>
                        <th scope="col">Paper Glass Tiling (1 ft x 1 ft)</th>
                        <th scope="col">Granite Coping</th>
                        <th scope="col">Clamps</th>  
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
 $('#FoamTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.skimmer.getdatatable') }}",
    columns: [
        { data: 'id', name: 'id'},
        { data: 'excavation', name: 'excavation'},
        { data: 'leveling_compaction', name: 'leveling_compaction' },
        { data: 'compaction_test', name: 'compaction_test' },
        { data: 'polyethylene_sheet_1000_gauge', name: 'polyethylene_sheet_1000_gauge' },
        { data: 'rubble_soling_230_th', name: 'rubble_soling_230_th' },
        { data: 'msrc_pcc_150mm_thick', name: 'msrc_pcc_150mm_thick' },
        { data: 'modular_panels', name: 'modular_panels' },
        { data: 'overflow_gutter', name: 'overflow_gutter' },
        { data: 'fiber_lining', name: 'fiber_lining' },
        { data: 'paper_glass_tiling_1ft_x_1ft', name: 'paper_glass_tiling_1ft_x_1ft' },
        { data: 'granite_coping', name: 'granite_coping' },
        { data: 'clamps', name: 'clamps' },
        { data: 'actions', name: 'actions', orderable: false, searchable: false } 
    ]

});


</script>


@endsection
