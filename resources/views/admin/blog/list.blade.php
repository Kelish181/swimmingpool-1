@extends('admin/layout')
@section('page_title','Blog')
@section('blog_select','active')
@section('container')

<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Blog</h5>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.blog.add')}}" type="button"   class="btn btn-sm btn-primary float-end mb-2" data-bs-toggle="tooltip" title="Add Blog">
                <i class="fa fa-plus"></i> Add Blog
                </a>
                @if(session()->has('message'))
            
            <div class="alert alert-success d-flex align-items-center justify-content-between" role="alert">
                    <p class="mb-0">
                    {{session('message')}}!
                    </p>
                    <i class="fa fa-fw fa-times ms-2"></i>
                  </div>
            @endif 
            @if(session('delete'))
            <div id="delete-message" class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable scroll-horizontal" id="FoamTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Action</th>
                        <th scope="col">Image</th>
                        <th scope="col">Heading</th>
                    </tr>
                </thead>
            </table>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        var table = $('#FoamTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.blog.getdatatable') }}",
            columns: [
                { data: 'id'},
                { data: 'actions'},     
                {
    data: 'image',
    render: function(data, type, full, meta) {
        var baseUrl = 'assets/media/blog/';
        var imageUrl = baseUrl + data;
        return '<img src="' + imageUrl + '" alt="Image" style="width: 200px; height: 100px;">';
    }
},

                { data: 'heading'},
               
            ],
            lengthMenu: [[50, 100, -1], [50, 100, 'All']],
        });
    });

    
    // Hide the delete message after 5 seconds
    setTimeout(function() {
        let deleteMessage = document.getElementById('delete-message');
        if (deleteMessage) {
            deleteMessage.style.display = 'none';
        }
    }, 3000); 
</script>
@endsection  