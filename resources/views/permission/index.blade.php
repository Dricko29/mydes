
@extends('layouts/contentLayoutMaster')

@section('title', 'Permission')

@section('content')
<!-- Basic Tables start -->
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">List Permission</h4>
      </div>
      <div class="card-body">
        {{-- <p class="card-text">
          Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
          can use any example of below table for your table and it can be use with any type of bootstrap tables.
        </p> --}}
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Role</th>
              {{-- <th>Actions</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($permissions as $permission)               
            <tr>
              <td>
                {{ $loop->iteration }}
              </td>
              <td>
                <span class="fw-bold">{{ $permission->name }}</span>
              </td>
              <td>
                @foreach ($permission->roles as $item)
                    
                <span class="badge rounded-pill badge-light-primary me-1">{{ $item->name }}</span>
                @endforeach
              </td>
              {{-- <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td> --}}
              {{-- <td>
                <div class="dropdown">
                  <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">
                      <i data-feather="edit-2" class="me-50"></i>
                      <span>Edit</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      <i data-feather="trash" class="me-50"></i>
                      <span>Delete</span>
                    </a>
                  </div>
                </div>
              </td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Basic Tables end -->
@endsection
