@extends('backend.layouts.app')

@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @if($errors->any())
            @foreach($errors->all as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
            @elseif(session('error_msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('error_msg') }}
            </div>
            @elseif(session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label>Slug (optional)</label>
                    <input name="slug" type="text" class="form-control" placeholder="Enter Slug">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" placeholder="Enter Content"></textarea>
                </div>
                <div class="form-group">
                    <label>Featured Image</label>
                    <input type="file" name="image" />
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input name="submit" type="submit" value="Add Post" class="btn btn-primary btn-block" />
            </form>
        </div>
    </div>
</div>

@endsection