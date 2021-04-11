@extends('backend.layouts.app')

@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @if(session('msg'))
            <div class="alert alert-success" role="alert">
            {{ session('msg') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ 0 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('category.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                                <form method="POST" class="d-inline-block" action="{{ route('category.destroy', $category->id) }}">
                                @csrf    
                                @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection