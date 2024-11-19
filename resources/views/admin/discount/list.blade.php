@extends('admin/layout')
@section('page_title','Discount offers')
@section('pools_select','active')
@section('container')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Discount</h5>
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
                        
                        <th scope="col">Discount</th>
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
    ajax: "{{ route('admin.discount.getdatatable') }}",
    columns: [
       
        { data: 'discount', name: 'discount' },
        { data: 'actions', name: 'actions', orderable: false, searchable: false } 
    ]

});


</script>


@endsection
