@extends('admin/layout')
@section('page_title','Registered Manager')
@section('registeredmanager_select','active')
@section('container')

<div class="container-fluid">
    <h5 class="card-title fw-semibold mb-4">Registered Manager</h5>
    <div class="card">
        <div class="card-body">
        <a href="{{ route('admin.manager.manage_manager')}}" type="button"   class="btn btn-sm btn-primary float-end" data-bs-toggle="tooltip" title="Add Catgory">
                <i class="fa fa-plus"></i> Add Manager
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
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Ouote Status</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($user as $key => $lists)
                 <tr>
                 <td>{{$key + 1}}</td>
                 <td><a href="{{ route('admin.manager.manager_edit' ,$lists->id)}}" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip"  title="Edit Catgory">
                 <i class="fa fa-pencil"></i>
                </a>
                <a href="{{ route('admin.manager.delete', $lists->id) }}"
   class="btn btn-sm btn-danger"
   data-bs-toggle="tooltip"
   title="Delete Catgory"
   onclick="return confirm('Are you sure you want to delete this item?');">
   <i class="fa fa-trash"></i>
</a>
</td>
                 <td>{{$lists->name}}</td>
                 <td>{{$lists->address}}</td>
                 <td>{{$lists->email}}</td>
                 <td>{{$lists->phone}}</td>
                 <td>{{$lists->quotestatus}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </di

@endsection