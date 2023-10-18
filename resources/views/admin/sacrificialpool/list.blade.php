@extends('admin/layout')
@section('page_title','Sacrificial Pool')
@section('sacrificialpool_select','active')
@section('container')

<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Sacrificial Pool</h5>
    <div class="card">
        <div class="card-body">
        <a href="{{ route('admin.sacrificialpool.manage_sacrificialpool')}}" type="button"   class="btn btn-sm btn-primary float-end" data-bs-toggle="tooltip" title="Add Catgory">
                <i class="fa fa-plus"></i> Add Sacrificialpool
                </a>
                @if(session()->has('message'))
            
            <div class="alert alert-success d-flex align-items-center justify-content-between" role="alert">
                    <p class="mb-0">
                    {{session('message')}}!
                    </p>
                    <i class="fa fa-fw fa-times ms-2"></i>
                  </div>
            @endif 
            @if(session()->has('delete'))
            <div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert">
                    <p class="mb-0">
                    {{session('delete')}}!
                    </p>
                    <i class="fa fa-fw fa-times ms-2"></i>
                  </div>
            @endif  
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Action</th>
                        <th scope="col">Model Name</th>
                        <th scope="col">Includes</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($sacrificial as $key => $lists)
                 <tr>
                 <td>{{$key + 1}}</td>
                 <td><a href="{{ route('admin.sacrificialpool.edit' ,$lists->id)}}" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip"  title="Edit Catgory">
                 <i class="fa fa-pencil"></i>
                </a>
                <a href="{{ route('admin.sacrificialpool.delete', $lists->id) }}"
   class="btn btn-sm btn-danger"
   data-bs-toggle="tooltip"
   title="Delete Catgory"
   onclick="return confirm('Are you sure you want to delete this item?');">
   <i class="fa fa-trash"></i>
</a>
</td>
                 <td>{{$lists->modelname}}</td>
                 <td>{{$lists->includes}}</td>
                 <td>{{$lists->price}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </di

@endsection