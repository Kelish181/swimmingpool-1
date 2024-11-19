@extends('admin/layout')
@section('page_title','infinity Volume')
@section('pools_select','active')
@section('container')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">infinity pool type</h5>
    <div class="card">
        <div class="card-body">
            {{-- <a href="{{ route('admin.overflow.add') }}" class="btn btn-sm btn-primary float-end mb-2" data-bs-toggle="tooltip" title="Add Skimmer Rate">
                <i class="fa fa-plus"></i>Add Overflow Rate 
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
                        <th scope="col">Paper Glass Tiling (1ft x 1ft)</th>
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
 $(document).ready(function () {
    var table = $('#FoamTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.infinity.getdatatable') }}", 
        columns: [
            { data: 'id' },
            { data: 'excavation2' },
            { data: 'leveling_compaction2' },
            { data: 'compaction_test2' },
            { data: 'polyethylene_sheet_1000_gauge2' },
            { data: 'rubble_soling_230_th2' },
            { data: 'msrc_pcc_150mm_thick2' },
            { data: 'modular_panels2' },
            { data: 'overflow_gutter2' },
            { data: 'fiber_lining2' },
            { data: 'paper_glass_tiling_1ft_x_1ft2' },
            { data: 'granite_coping2'},
            { data: 'clamps2' },
            { data: 'actions', orderable: false, searchable: false }
        ]
    });
});

</script>


@endsection
