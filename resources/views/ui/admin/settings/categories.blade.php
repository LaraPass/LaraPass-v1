@extends('ui.layouts.master')

@section('title')
Account Categories
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('overview') }}"><i class="fab fa-autoprefixer"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('adminSettings') }}">APPLICATION SETTINGS</a></li>
    <li class="breadcrumb-item active" aria-current="page"><u>ACCOUNT CATEGORIES</u></li>
  </ol>
</nav>
@endsection

@section('nav_settings')
active
@endsection

@section('content')
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-md-10">
        <h1 class="display-2 text-white">Account Categories</h1>
        <p class="text-white mt-0 mb-5">You can add, activate, delete or deactivate custom account categories from here.</p>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      @include('ui.partials.alerts')
      @include('ui.partials.errors')
    </div>
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row">
            <div class="col-8">
              <h2>All Categories</h2>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-category">Add Category</button>
            </div>
          </div>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Accounts In This Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <td>
                  {{ $category->id }}
                </td>
                <td>
                  {{ $category->name }}
                </td>
                <td>
                  @if($category->active)
                  <span class="badge badge-dot mr-4">
                    <i class="bg-success"></i> Active
                  </span>
                  @else
                  <span class="badge badge-dot mr-4">
                    <i class="bg-danger"></i> Inactive
                  </span>
                  @endif
                </td>
                <td>
                  {{ $category->accounts->count() }}
                </td>
                <td >
                  @if($category->active)
                  <a href="{{ url('/admin/settings/categories/'.$category->id.'/deactivate') }}" class="btn btn-sm btn-warning ">Deactivate</a>
                  @else
                  <a href="{{ url('/admin/settings/categories/'.$category->id.'/activate') }}" class="btn btn-sm btn-success ">Activate</a>
                  @endif
                  <a href="{{ url('/admin/settings/categories/'.$category->id.'/delete') }}" class="btn btn-sm btn-danger ">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('ui.admin.settings.partials._addCategories')
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection