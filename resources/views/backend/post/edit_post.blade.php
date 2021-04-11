@extends('backend.layouts.app')

@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @if($errors->any())
            @foreach($errors->all() as $error)
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
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label>Slug (optional)</label>
                    <input name="slug" type="text" class="form-control" placeholder="Enter Slug" value="{{ $post->slug }}">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" placeholder="Enter Content">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label>New Featured Image</label>
                    <input type="file" name="image" /><br>
                    <img width="100px" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                    <p>Old photo</p>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option @if($post->category_id == $category->id)
                            selected
                            @endif
                            value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input name="submit" type="submit" value="Update Post" class="btn btn-primary btn-block" />
            </form>
        </div>
    </div>
</div>

@endsection